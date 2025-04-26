<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentOption;
use App\Models\CandidateAnswer;
use App\Models\CandidateAssessment;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;




use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function Index()
    {
        return view('candidate.candidate_login');
    }

    public function Register()
    {
        return view('candidate.candidate_register');
    }

    public function showRegisterForm()
    {
        return view('candidate.candidate_register'); // Return the registration form view
    }

    // public function Dashboard()
    // {
    //     $candidate = auth()->guard('candidate')->user();
    
    //     $valueScores = [];
    //     $behaviourScores = [];
    
    //     if (!empty($candidate->value_assessment_score)) {
    //         $decoded = json_decode($candidate->value_assessment_score, true);
    //         $valueScores = is_array($decoded) ? $decoded : [];
    //     }
    
    //     if (!empty($candidate->behaviour_assesment_score)) {
    //         $decoded = json_decode($candidate->behaviour_assesment_score, true);
    //         if (json_last_error() === JSON_ERROR_NONE) {
    //             $behaviourScores = is_array($decoded) ? $decoded : [];
    //         }
    //     }

    //    $valueassessmentTakenDate = $candidate->value_assessment_completed_at ?? null;
    //    $valueassessmentExpireDate = $valueassessmentTakenDate ? Carbon::parse($valueassessmentTakenDate)->addYear() : null;

    //    $t5Date = null;

    //     if (!empty($candidate->behaviour_assesment_completed_at)) {
    //         $decoded = json_decode($candidate->behaviour_assesment_completed_at, true);

    //         if (json_last_error() === JSON_ERROR_NONE && isset($decoded['t5'])) {
    //             try {
    //                 $t5Date = \Carbon\Carbon::parse($decoded['t5']);
    //             } catch (\Exception $e) {
    //                 $t5Date = null;
    //             }
    //         }
    //     }

    //     $behaviourassessmentTakenDate = $t5Date;
    //     $behaviourassessmentExpireDate = $t5Date ? $t5Date->copy()->addYear() : null;

    
    //     return view('candidate.candidate_profile', [
    //         'candidate' => $candidate,
    //         'valueScores' => $valueScores,
    //         'behaviourScores' => $behaviourScores,
    //         'behaviourassessmentTakenDate' => $behaviourassessmentTakenDate,
    //         'behaviourassessmentExpireDate' => $behaviourassessmentExpireDate,

    //         'valueassessmentTakenDate' => $valueassessmentTakenDate,
    //         'valueassessmentExpireDate' => $valueassessmentExpireDate,
    //     ]);
    // }
    
    public function Dashboard()
{
    $candidate = auth()->guard('candidate')->user();

    $valueScores = [];
    $behaviourScores = [];
    $behaviourassessmentTakenDate = null;
    $behaviourassessmentExpireDate = null;
    $jobPreferences = [];

    // Handle Value Assessment
    if (!empty($candidate->value_assessment_score)) {
        $decoded = json_decode($candidate->value_assessment_score, true);
        $valueScores = is_array($decoded) ? $decoded : [];
    }

    $valueassessmentTakenDate = $candidate->value_assessment_completed_at ?? null;
    $valueassessmentExpireDate = $valueassessmentTakenDate ? Carbon::parse($valueassessmentTakenDate)->addYear() : null;

    // Handle Behaviour Assessment
    if (!empty($candidate->behaviour_assesment_score) && !empty($candidate->behaviour_assesment_completed_at)) {
        $scoreDecoded = json_decode($candidate->behaviour_assesment_score, true);
        $completedDecoded = json_decode($candidate->behaviour_assesment_completed_at, true);

        if (
            json_last_error() === JSON_ERROR_NONE &&
            is_array($scoreDecoded) &&
            is_array($completedDecoded)
        ) {
            $requiredTimestamps = ['t1', 't2', 't3', 't4', 't5'];
            $allTimestampsPresent = !array_diff($requiredTimestamps, array_keys(array_filter($completedDecoded)));

            if ($allTimestampsPresent) {
                $behaviourScores = $scoreDecoded;

                try {
                    $t5Date = Carbon::parse($completedDecoded['t5']);
                    $behaviourassessmentTakenDate = $t5Date;
                    $behaviourassessmentExpireDate = $t5Date->copy()->addYear();
                } catch (\Exception $e) {
                    // Invalid t5 date format
                }
            }
        }
    }

    if (!empty($candidate->job_preferences)) {
        $decoded = json_decode($candidate->job_preferences, true);
        $jobPreferences = is_array($decoded) ? $decoded : [];
    }

    $hasCompletedBehaviour = !empty($behaviourassessmentTakenDate);
    $hasCompletedValue = !empty($valueassessmentTakenDate);


    return view('candidate.candidate_profile', [
        'candidate' => $candidate,
        'valueScores' => $valueScores,
        'behaviourScores' => $behaviourScores,
        'behaviourassessmentTakenDate' => $behaviourassessmentTakenDate,
        'behaviourassessmentExpireDate' => $behaviourassessmentExpireDate,
        'valueassessmentTakenDate' => $valueassessmentTakenDate,
        'valueassessmentExpireDate' => $valueassessmentExpireDate,

        'hasCompletedBehaviour' => $hasCompletedBehaviour,
        'hasCompletedValue' => $hasCompletedValue,
        'jobPreferences' => $jobPreferences,

    ]);
}

public function updateProfilePhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $candidate = \App\Models\Candidate::find(auth()->guard('candidate')->id());

    if ($candidate && $request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile_photos', $filename);
        $candidate->profile_photo = 'storage/profile_photos/' . $filename;
        $candidate->save();
    }

    return redirect()->back()->with('success', 'Profile photo updated!');
}


public function updateSinglePreference(Request $request, $id)
{
    $key = $request->input('key');
    $value = $request->input('value');

    $allowedKeys = ['location', 'seniority', 'salary', 'contract', 'sponsorship_required'];

    if (!in_array($key, $allowedKeys)) {
        return response()->json(['success' => false, 'message' => 'Invalid key']);
    }

    $candidate = DB::table('candidates')->where('id', $id)->first();

    $preferences = json_decode($candidate->job_preferences ?? '{}', true);
    $preferences[$key] = $value;

    DB::table('candidates')
        ->where('id', $id)
        ->update([
            'job_preferences' => json_encode($preferences),
            'updated_at' => now(),
        ]);

    return response()->json(['success' => true]);
}



public function downloadProfilePdf()
{
    $candidate = auth()->guard('candidate')->user();

    $valueScores = [];
    $behaviourScores = [];
    $behaviourassessmentTakenDate = null;
    $behaviourassessmentExpireDate = null;

    if (!empty($candidate->value_assessment_score)) {
        $decoded = json_decode($candidate->value_assessment_score, true);
        $valueScores = is_array($decoded) ? $decoded : [];
    }

    $valueassessmentTakenDate = $candidate->value_assessment_completed_at ?? null;
    $valueassessmentExpireDate = $valueassessmentTakenDate ? Carbon::parse($valueassessmentTakenDate)->addYear() : null;

    if (!empty($candidate->behaviour_assesment_score) && !empty($candidate->behaviour_assesment_completed_at)) {
        $scoreDecoded = json_decode($candidate->behaviour_assesment_score, true);
        $completedDecoded = json_decode($candidate->behaviour_assesment_completed_at, true);

        if (
            json_last_error() === JSON_ERROR_NONE &&
            is_array($scoreDecoded) &&
            is_array($completedDecoded)
        ) {
            $requiredTimestamps = ['t1', 't2', 't3', 't4', 't5'];
            $allTimestampsPresent = !array_diff($requiredTimestamps, array_keys(array_filter($completedDecoded)));

            if ($allTimestampsPresent) {
                $behaviourScores = $scoreDecoded;

                try {
                    $t5Date = Carbon::parse($completedDecoded['t5']);
                    $behaviourassessmentTakenDate = $t5Date;
                    $behaviourassessmentExpireDate = $t5Date->copy()->addYear();
                } catch (\Exception $e) {
                    // Handle error
                }
            }
        }
    }

    $pdf = Pdf::loadView('pdf.candidate_profile_pdf', [
        'candidate' => $candidate,
        'valueScores' => $valueScores,
        'behaviourScores' => $behaviourScores,
        'behaviourassessmentTakenDate' => $behaviourassessmentTakenDate,
        'behaviourassessmentExpireDate' => $behaviourassessmentExpireDate,
        'valueassessmentTakenDate' => $valueassessmentTakenDate,
        'valueassessmentExpireDate' => $valueassessmentExpireDate,
    ]);

    return $pdf->download("{$candidate->candidate_name}_JobPass.pdf");
}



    public function Assesment()
    {
        return view('candidate.assesment');
    }

    public function TechnicalAssesment()
    {
        return view('candidate.technical_assessment');
    }

    public function CoreSkillAssesment()
    {
        $questions = DB::table('core_skill_questions')->get();
        return view('candidate.coreskill_reasoning', compact('questions'));
    }

    public function CoreSkillAssesmentSubmit(Request $request)
    {
        $candidateId = auth()->guard('candidate')->id();
        $questions = DB::table('core_skill_questions')->get();
        $score = 0;

        foreach ($questions as $question) {
            $selected = $request->input("question_{$question->id}");
            $options = json_decode($question->options, true);
            $score += $options[$selected]['score'] ?? 0;
        }

        DB::table('candidates')->where('id', $candidateId)->update([
            'technical_assessment_score' => $score,
            'technical_assessment_completed_at' => now()
        ]);

        return view('candidate.core_assessment_result', compact('score'));
    }

    public function BehaviourAssesment()
    {
        // $questions = AssessmentQuestion::where('assessment_type', 'behavior')
        //     ->with('options') // Ensure options are loaded for each question
        //     ->get();

        // // Debugging: Log or dump the data
        // if ($questions->isEmpty()) {
        //     dd("No questions found for 'behavior' assessment");
        // }

        return view('candidate.behaviour_assesment');
    }

    public function BehaviourAssesmentResult()
    {
        $candidate = auth()->guard('candidate')->user();
    
        
        $behaviourScores = [];
    
    
        if (!empty($candidate->behaviour_assesment_score)) {
            $decoded = json_decode($candidate->behaviour_assesment_score, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $behaviourScores = is_array($decoded) ? $decoded : [];
            }
        }

        
    
        return view('candidate.behaviour_assesment_result', [
            'candidate' => $candidate,
            
            'behaviourScores' => $behaviourScores,
        ]);
    }

    public function showCompassionVsConfidence()
    {
        $questions = DB::table('compassion_vs_confidence_questions')->get();
        return view('candidate.CompassionVsConfidence', compact('questions'));
    }

    public function savet1(Request $request)
    {
        $candidate_id = auth()->guard('candidate')->id();
        $total_compassion = 0;
        $total_confidence = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('compassion_vs_confidence_questions')->where('id', $question_id)->first();

            $compassion_score = $question->{$response . '_compassion'};
            $confidence_score = $question->{$response . '_confidence'};

            DB::table('compassion_vs_confidence_responses')->insert([
                'candidate_id' => $candidate_id,
                'question_id' => $question_id,
                'response' => $response,
                'compassion_score' => $compassion_score,
                'confidence_score' => $confidence_score,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $total_compassion += $compassion_score;
            $total_confidence += $confidence_score;
        }

        $compassion_percentage = ($total_compassion / 2000) * 100;
        $confidence_percentage = ($total_confidence / 2000) * 100;


        

        $current['compassion'] = $compassion_percentage;
        $current['confidence'] = $confidence_percentage;

        // start Store the scores & time in the candidate table

        $candidate = auth()->guard('candidate')->user();
        // Decode existing scores
        $currentScores = json_decode($candidate->behaviour_assesment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['compassion'] = $compassion_percentage;
        $currentScores['confidence'] = $confidence_percentage;
        
        // Decode completion timestamps
        $completed = json_decode($candidate->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t1'] = now()->toDateTimeString();
        
        // Save both
        DB::table('candidates')->where('id', $candidate->id)->update([
            'behaviour_assesment_score' => json_encode($currentScores),
            'behaviour_assesment_completed_at' => json_encode($completed),
        ]);

        // end Store the scores & time in the candidate table

        // return view('candidate.CompassionVsConfidenceResult', compact(
        //     'total_compassion',
        //     'total_confidence',
        //     'compassion_percentage',
        //     'confidence_percentage'
        // ));

        return redirect()->route('CuriosityVsPracticality');

    }

    

    public function showCuriosityVsPracticality()
    {
        $questions = DB::table('curiosity_vs_practicality_questions')->get();
        return view('candidate.CuriosityVsPracticality', compact('questions'));
    }

    public function savet2(Request $request)
    {
        $candidate_id = auth()->guard('candidate')->id();
        $total_curiosity = 0;
        $total_practicality = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('curiosity_vs_practicality_questions')->where('id', $question_id)->first();

            $curiosity_score = $question->{$response . '_curiosity'};
            $practicality_score = $question->{$response . '_practicality'};

            DB::table('curiosity_vs_practicality_responses')->insert([
                'candidate_id' => $candidate_id,
                'question_id' => $question_id,
                'response' => $response,
                'curiosity_score' => $curiosity_score,
                'practicality_score' => $practicality_score,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $total_curiosity += $curiosity_score;
            $total_practicality += $practicality_score;
        }

        $curiosity_percentage = ($total_curiosity / 2000) * 100;
        $practicality_percentage = ($total_practicality / 2000) * 100;

        // start Store the scores & time in the candidate table

        $candidate = auth()->guard('candidate')->user();
        // Decode existing scores
        $currentScores = json_decode($candidate->behaviour_assesment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['curiosity'] = $curiosity_percentage;
        $currentScores['practicality'] = $practicality_percentage;
        
        // Decode completion timestamps
        $completed = json_decode($candidate->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t2'] = now()->toDateTimeString();
        
        // Save both
        DB::table('candidates')->where('id', $candidate->id)->update([
            'behaviour_assesment_score' => json_encode($currentScores),
            'behaviour_assesment_completed_at' => json_encode($completed),
        ]);

        // end Store the scores & time in the candidate table

        // return view('candidate.CuriosityVsPracticalityResult', compact(
        //     'total_curiosity',
        //     'total_practicality',
        //     'curiosity_percentage',
        //     'practicality_percentage'
        // ));

        return redirect()->route('DisciplineVsAdaptability');

    }

    public function showDisciplineVsAdaptability()
    {
        $questions = DB::table('discipline_vs_adaptability_questions')->get();
        return view('candidate.DisciplineVsAdaptability', compact('questions'));
    }

    public function savet3(Request $request)
    {
        $candidate_id = auth()->guard('candidate')->id();
        $total_discipline = 0;
        $total_adaptability = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('discipline_vs_adaptability_questions')->where('id', $question_id)->first();

            $discipline_score = $question->{$response . '_discipline'};
            $adaptability_score = $question->{$response . '_adaptability'};

            DB::table('discipline_vs_adaptability_responses')->insert([
                'candidate_id' => $candidate_id,
                'question_id' => $question_id,
                'response' => $response,
                'discipline_score' => $discipline_score,
                'adaptability_score' => $adaptability_score,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $total_discipline += $discipline_score;
            $total_adaptability += $adaptability_score;
        }

        $discipline_percentage = ($total_discipline / 2000) * 100;
        $adaptability_percentage = ($total_adaptability / 2000) * 100;

        // start Store the scores & time in the candidate table

        $candidate = auth()->guard('candidate')->user();
        // Decode existing scores
        $currentScores = json_decode($candidate->behaviour_assesment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['discipline'] = $discipline_percentage;
        $currentScores['adaptability'] = $adaptability_percentage;
        
        // Decode completion timestamps
        $completed = json_decode($candidate->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t3'] = now()->toDateTimeString();
        
        // Save both
        DB::table('candidates')->where('id', $candidate->id)->update([
            'behaviour_assesment_score' => json_encode($currentScores),
            'behaviour_assesment_completed_at' => json_encode($completed),
        ]);

        // end Store the scores & time in the candidate table

        // return view('candidate.DisciplineVsAdaptabilityResult', compact(
        //     'total_discipline',
        //     'total_adaptability',
        //     'discipline_percentage',
        //     'adaptability_percentage'
        // ));

        return redirect()->route('ResilienceVsSensitivity');

    }

    public function showtResilienceVsSensitivity()
    {
        $questions = DB::table('resilience_vs_sensitivity_questions')->get();
        return view('candidate.ResilienceVsSensitivity', compact('questions'));
    }

    public function savet4(Request $request)
    {
        $candidate_id = auth()->guard('candidate')->id();
        $total_resilience = 0;
        $total_sensitivity = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('resilience_vs_sensitivity_questions')->where('id', $question_id)->first();

            $resilience_score = $question->{$response . '_resilience'};
            $sensitivity_score = $question->{$response . '_sensitivity'};

            DB::table('resilience_vs_sensitivity_responses')->insert([
                'candidate_id' => $candidate_id,
                'question_id' => $question_id,
                'response' => $response,
                'resilience_score' => $resilience_score,
                'sensitivity_score' => $sensitivity_score,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $total_resilience += $resilience_score;
            $total_sensitivity += $sensitivity_score;
        }

        $resilience_percentage = ($total_resilience / 2000) * 100;
        $sensitivity_percentage = ($total_sensitivity / 2000) * 100;

        // start Store the scores & time in the candidate table

        $candidate = auth()->guard('candidate')->user();
        // Decode existing scores
        $currentScores = json_decode($candidate->behaviour_assesment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['resilience'] = $resilience_percentage;
        $currentScores['sensitivity'] = $sensitivity_percentage;
        
        // Decode completion timestamps
        $completed = json_decode($candidate->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t4'] = now()->toDateTimeString();
        
        // Save both
        DB::table('candidates')->where('id', $candidate->id)->update([
            'behaviour_assesment_score' => json_encode($currentScores),
            'behaviour_assesment_completed_at' => json_encode($completed),
        ]);

        // end Store the scores & time in the candidate table

        // return view('candidate.ResilienceVsSensitivityResult', compact(
        //     'total_resilience',
        //     'total_sensitivity',
        //     'resilience_percentage',
        //     'sensitivity_percentage'
        // ));
        return redirect()->route('SociobilityVsReflectiveness');
        
    }

    public function showtSociobilityVsReflectiveness()
    {
        $questions = DB::table('sociability_vs_reflectiveness_questions')->get();
        return view('candidate.sociobilityVsReflectiveness', compact('questions'));
    }

    

    public function savet5(Request $request)
    {
        $candidate_id = auth()->guard('candidate')->id();
        $total_sociability = 0;
        $total_reflectiveness = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('sociability_vs_reflectiveness_questions')->where('id', $question_id)->first();

            $sociability_score = $question->{$response . '_sociability'};
            $reflectiveness_score = $question->{$response . '_reflectiveness'};

            DB::table('sociability_vs_reflectiveness_responses')->insert([
                'candidate_id' => $candidate_id,
                'question_id' => $question_id,
                'response' => $response,
                'sociability_score' => $sociability_score,
                'reflectiveness_score' => $reflectiveness_score,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $total_sociability += $sociability_score;
            $total_reflectiveness += $reflectiveness_score;
        }

        $sociability_percentage = ($total_sociability / 2000) * 100;
        $reflectiveness_percentage = ($total_reflectiveness / 2000) * 100;

        // start Store the scores & time in the candidate table

        $candidate = auth()->guard('candidate')->user();
        // Decode existing scores
        $currentScores = json_decode($candidate->behaviour_assesment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['sociability'] = $sociability_percentage;
        $currentScores['reflectiveness'] = $reflectiveness_percentage;
        
        // Decode completion timestamps
        $completed = json_decode($candidate->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t5'] = now()->toDateTimeString();
        
        // Save both
        DB::table('candidates')->where('id', $candidate->id)->update([
            'behaviour_assesment_score' => json_encode($currentScores),
            'behaviour_assesment_completed_at' => json_encode($completed),
        ]);

        // end Store the scores & time in the candidate table

        // return view('candidate.sociobilityVsReflectivenessResult', compact(
        //     'total_sociability',
        //     'total_reflectiveness',
        //     'sociability_percentage',
        //     'reflectiveness_percentage'
        // ));

        return redirect()->route('behaviour.assesment.result');

    }

    // Show words for the current page
    public function show($page)
    {
        // Get words for the current page
        $words = DB::table('quiz_pages')
            ->where('page', $page)
            ->pluck('word')
            ->toArray();

        // Get the total number of pages
        $totalPages = DB::table('quiz_pages')
            ->distinct('page')
            ->count('page');

        // Redirect to page 1 if the requested page has no words or exceeds the total pages
        if (empty($words) || $page > $totalPages) {
            return redirect('candidate/value/assessment/1');
        }

        // Pass words, current page, and total pages to the view
        return view('candidate.quiz', [
            'words' => $words,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }

    // Submit all selected words after final submission
    public function submit(Request $request)
    {
        $candidateId = auth()->guard('candidate')->id();
        $selectedWords = $request->input('selected_words');

        // Validate that exactly 5 words are selected per page
        foreach ($selectedWords as $page => $words) {
            if (count($words) !== 5) {
                return response()->json([
                    'success' => false,
                    'error' => "You must select exactly 5 words on page " . str_replace('quiz_page_', '', $page)
                ], 422);
            }
        }

        // Clear previous selections to prevent duplicates
        DB::table('candidate_selections')
            ->where('candidate_id', $candidateId)
            ->delete();

        // Save new selections to the database
        foreach ($selectedWords as $page => $words) {
            foreach ($words as $index => $word) {
                $value = DB::table('value_words')
                    ->where('child_word', $word)
                    ->first();

                if ($value) {
                    DB::table('candidate_selections')->insert([
                        'candidate_id' => $candidateId,
                        'page' => str_replace('quiz_page_', '', $page),
                        'value_word_id' => $value->id,
                        'score' => 5 - $index,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }

        // Return success response
        return response()->json(['success' => true]);
    }

    public function result()
{
    $candidateId = auth()->guard('candidate')->id();

    $results = DB::table('candidate_selections')
        ->join('value_words', 'candidate_selections.value_word_id', '=', 'value_words.id')
        ->where('candidate_selections.candidate_id', $candidateId)
        ->select('value_words.mother_word', DB::raw('SUM(candidate_selections.score) as total'))
        ->groupBy('value_words.mother_word')
        ->get()
        ->map(function ($item) {
            $item->percentage = round(($item->total / 25) * 100, 2);
            return $item;
        });

         // 🔄 Convert to key-value pair for JSON storage
    $scoreData = $results->pluck('percentage', 'mother_word')->toArray();

    // 💾 Store JSON in the candidates table
    DB::table('candidates')
        ->where('id', $candidateId)
        ->update([
            'value_assessment_score' => json_encode($scoreData),
            'value_assessment_completed_at' => now(),
        ]);


    return view('candidate.result', ['results' => $results]);
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'selectedValues' => 'required|array'
        ]);

        // Initialize category scores
        $categoryScores = [];
        foreach ($data['selectedValues'] as $round) {
            foreach ($round as $category) {
                if (!isset($categoryScores[$category])) {
                    $categoryScores[$category] = 0;
                }
                $categoryScores[$category] += 1; // Each selection counts as 1 point
            }
        }

        // Convert scores to percentages (Each category max score = 5 * 5 rounds = 25)
        $percentageScores = [];
        foreach ($categoryScores as $category => $score) {
            $percentageScores[$category] = round(($score / 25) * 100, 2);
        }

        DB::table('quiz_results')->insert([
            'scores' => json_encode($percentageScores),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Quiz submitted successfully!'], 200);
    }

    public function ApplicationTracking()
    {
        return view('candidate.application_tracking');
    }

    public function showAllJobs()
    {
        $jobs = Job::all(); // Fetch jobs from the database
        $jobs = Job::with('employer')->get();

        return view('candidate.job_search', compact('jobs'));
    }

    public function showJobDetails($jobId)
    {
        $job = Job::find($jobId); // Fetch the job based on the jobId
        if (!$job) {
            abort(404); // Return 404 if the job is not found
        }
        return view('candidate.job_details', compact('job'));
    }

    public function inbox()
    {
        return view('candidate.inbox');
    }

    public function careerinsight()
    {
        return view('candidate.career_insight');
    }

    public function faq()
    {
        return view('candidate.faq');
    }

    public function landing()
    {
        return view('candidate.candidate_landing');
    }

    public function showHelp()
    {
        return view('candidate.candidate_help'); // This will look for resources/views/candidate_help.blade.php
    }

    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('candidate')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('candidate.dashboard');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function Logout()
    {
        Auth::guard('candidate')->logout();
        return redirect()->route('candidate_login_form');
    }

    // Method to show the latest 10 jobs for guest users
    public function Jobs()
    {
        // Create dummy jobs data for testing purposes
        $jobs = collect([
            (object) [
                'id' => 1,
                'title' => 'Software Developer',
                'company_name' => 'Tech Solutions Inc.',
                'company_logo' => null, // No logo for now
                'job_location' => 'New York, NY',
                'salary' => '£80,000 - £100,000',
                'job_type' => 'Full-Time',
                'experience_level' => 'Mid-Level',
                'description' => 'We are looking for a talented Software Developer to join our team...',
                'requirements' => 'Experience with PHP, JavaScript, Laravel, React...',
                'benefits' => 'Health insurance, 401k matching, Paid time off',
                'seniority_level' => 'Mid-Level',
                'industries' => 'Software',
                'working_pattern' => 'Remote',
                'hours' => '40 hours/week',
                'skills' => 'PHP, JavaScript, Laravel, React',
            ],
            (object) [
                'id' => 2,
                'title' => 'Product Manager',
                'company_name' => 'Innovative Products LLC',
                'company_logo' => null, // No logo for now
                'job_location' => 'San Francisco, CA',
                'salary' => '£120,000 - £150,000',
                'job_type' => 'Full-Time',
                'experience_level' => 'Senior',
                'description' => 'As a Product Manager, you will be responsible for defining and driving...',
                'requirements' => 'Experience with agile methodologies, strong communication skills...',
                'benefits' => 'Generous vacation days, Health and dental insurance...',
                'seniority_level' => 'Senior',
                'industries' => 'E-commerce',
                'working_pattern' => 'Hybrid',
                'hours' => '40 hours/week',
                'skills' => 'Product Management, Agile, Scrum',
            ],
            (object) [
                'id' => 3,
                'title' => 'UX/UI Designer',
                'company_name' => 'Creative Solutions',
                'company_logo' => null, // No logo for now
                'job_location' => 'Los Angeles, CA',
                'salary' => '£70,000 - £90,000',
                'job_type' => 'Part-Time',
                'experience_level' => 'Junior',
                'description' => 'We are seeking a passionate UX/UI Designer...',
                'requirements' => 'Experience with design tools such as Sketch, Figma, Adobe XD...',
                'benefits' => 'Flexible hours, Remote work, Design-related training budget',
                'seniority_level' => 'Junior',
                'industries' => 'Design',
                'working_pattern' => 'Remote',
                'hours' => '30 hours/week',
                'skills' => 'Sketch, Figma, Adobe XD',
            ],
            (object) [
                'id' => 4,
                'title' => 'Product Manager',
                'company_name' => 'Innovative Products LLC',
                'company_logo' => null,
                'job_location' => 'San Francisco, CA',
                'salary' => '£120,000 - £150,000',
                'job_type' => 'Full-Time',
                'experience_level' => 'Senior',
                'description' => 'As a Product Manager, you will be responsible for defining and driving...',
                'skills' => 'Product Management, Agile, Scrum',
            ],
            (object) [
                'id' => 5,
                'title' => 'Product Manager',
                'company_name' => 'Innovative Products LLC',
                'company_logo' => null,
                'job_location' => 'San Francisco, CA',
                'salary' => '£120,000 - £150,000',
                'job_type' => 'Full-Time',
                'experience_level' => 'Senior',
                'description' => 'As a Product Manager, you will be responsible for defining and driving...',
                'skills' => 'Product Management, Agile, Scrum',
            ],
            // Additional dummy job objects can be added here...
        ]);

        // Return the guest_jobs view with the dummy jobs data
        return view('candidate.guest_jobs', compact('jobs'));
    }
}
