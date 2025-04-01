<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentOption;
use App\Models\CandidateAnswer;
use App\Models\CandidateAssessment;




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
    public function Dashboard()
    {
        return view('candidate.candidate_profile');
    }
    public function Assesment()
    {
        return view('candidate.assesment');
    }
    public function TechnicalAssesment()
    {
        return view('candidate.technical_assessment');
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

        return view('candidate.ResilienceVsSensitivityResult', compact(
            'total_resilience',
            'total_sensitivity',
            'resilience_percentage',
            'sensitivity_percentage'
        ));
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

        return view('candidate.sociobilityVsReflectivenessResult', compact(
            'total_sociability',
            'total_reflectiveness',
            'sociability_percentage',
            'reflectiveness_percentage'
        ));
    }



    // public function submitAssessment(Request $request, $assessmentId)
    // {
    //     $candidate = auth()->guard('candidate')->user(); // Use the 'candidate' guard explicitly

    //     // Ensure that the assessmentId is valid or corresponds to behavior/values
    //     if (!in_array($assessmentId, ['behavior', 'values'])) {
    //         return redirect()->route('candidate.assessment.index')->with('error', 'Invalid assessment');
    //     }

    //     // Collect answers submitted by the candidate
    //     $answers = $request->input('answers'); // Assume answers come as an array of question_id => option_id

    //     // Update candidate answers
    //     foreach ($answers as $questionId => $optionId) {
    //         $question = AssessmentQuestion::findOrFail($questionId);
    //         $option = AssessmentOption::findOrFail($optionId);

    //         // Save the candidate's answer
    //         CandidateAnswer::updateOrCreate(
    //             ['candidate_id' => $candidate->id, 'question_id' => $questionId],
    //             ['option_id' => $optionId, 'score' => $option->score]
    //         );
    //     }

    //     // Calculate the total score for the assessment
    //     $totalScore = CandidateAnswer::where('candidate_id', $candidate->id)
    //         ->whereHas('question', function ($query) use ($assessmentId) {
    //             $query->where('assessment_type', $assessmentId); // Use the assessment type
    //         })
    //         ->sum('score');

    //     // Update or create the candidate_assessment record
    //     CandidateAssessment::updateOrCreate(
    //         ['candidate_id' => $candidate->id, 'assessment_type' => $assessmentId],
    //         [
    //             'total_score' => $totalScore,
    //             'status' => 'completed',
    //             'submitted_at' => now()
    //         ]
    //     );

    //     return redirect()->route('candidate.assesment');
    // }





    // public function ValueAssesment()
    // {
    //     return view('candidate.value_assesment');
    // }

    public function show($page)
{
    $words = DB::table('quiz_pages')
        ->where('page', $page)
        ->pluck('word')
        ->toArray();

    if (empty($words)) return redirect('candidate/value/assessment/1');

    return view('candidate.quiz', ['words' => $words, 'page' => $page]);
}

public function submit(Request $request, $page)
{

    $totalPages = 5;

    $selected = json_decode($request->input('selected_words'), true);

    if (count($selected) !== 5) {
        return back()->withErrors(['You must select exactly 5 words.']);
    }

    $candidateId = auth()->guard('candidate')->id();

    foreach ($selected as $index => $word) {
        $value = DB::table('value_words')->where('child_word', $word)->first();

        if ($value) {
            DB::table('candidate_selections')->insert([
                'candidate_id' => $candidateId,
                'value_word_id' => $value->id,
                'score' => 5 - $index,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    return $page < $totalPages
    ? redirect("candidate/value/assessment/" . ($page + 1))
    : redirect()->route('value.result');

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

    /**
     * Retrieve and display the latest quiz results.
     */
    // public function results()
    // {
    //     // Retrieve the most recent quiz result
    //     $latestResult = DB::table('quiz_results')->latest()->first();

    //     // If no results exist yet, return an empty scores array
    //     if (!$latestResult) {
    //         return view('results', ['scores' => []]);
    //     }

    //     // Decode JSON scores from the database
    //     $scores = json_decode($latestResult->scores, true);

    //     // Pass the percentage scores to the results view
    //     return view('candidate.quiz_result', ['scores' => $scores]);
    // }


    public function ApplicationTracking()
    {
        return view('candidate.application_tracking');
    }

    // public function JobSearch()
    // {
    //     // Fetch real jobs from the database
    //     $databaseJobs = DB::table('job_posts')
    //         ->join('seniority_levels', 'job_posts.seniority_level_id', 'seniority_levels.id')
    //         ->join('industries', 'job_posts.industry_id', 'industries.id')
    //         ->join('job_locations', 'job_posts.job_location_id', 'job_locations.id')
    //         ->join('working_patterns', 'job_posts.working_pattern_id', 'working_patterns.id')
    //         ->join('hours', 'job_posts.hours_id', 'hours.id')
    //         ->join('skill_lists', 'job_posts.skill_id', 'skill_lists.id')
    //         ->select(
    //             'job_posts.*',
    //             'seniority_levels.seniority_level',
    //             'industries.industries',
    //             'job_locations.job_location',
    //             'working_patterns.working_pattern',
    //             'hours.hours',
    //             'skill_lists.skills'
    //         )
    //         ->where('approve', '=', '1')
    //         ->get();

    //     // Add dummy jobs for testing purposes
    //     $dummyJobs = collect([
    //         (object) [
    //             'id' => 1,
    //             'title' => 'Software Developer',
    //             'company_name' => 'Tech Solutions Inc.',
    //             'company_logo' => null,
    //             'job_location' => 'New York, NY',
    //             'salary' => '£80,000 - £100,000',
    //             'job_type' => 'Full-Time',
    //             'experience_level' => 'Mid-Level',
    //             'description' => 'We are looking for a talented Software Developer to join our team...',
    //             'requirements' => 'Experience with PHP, JavaScript, Laravel, React...',
    //             'benefits' => 'Health insurance, 401k matching, Paid time off',
    //             'seniority_level' => 'Mid-Level',
    //             'industries' => 'Software',
    //             'working_pattern' => 'Remote',
    //             'hours' => '40 hours/week',
    //             'skills' => 'PHP, JavaScript, Laravel, React',
    //             'about_us' => 'We are a fast-growing tech company focused on innovation...',
    //             'application_deadline' => '2024-12-31',
    //             'visa_sponsorship' => 'Yes',
    //         ],
    //         (object) [
    //             'id' => 2,
    //             'title' => 'Product Manager',
    //             'company_name' => 'Innovative Products LLC',
    //             'company_logo' => null, // No logo for now
    //             'job_location' => 'San Francisco, CA',
    //             'salary' => '£120,000 - £150,000',
    //             'job_type' => 'Full-Time',
    //             'experience_level' => 'Senior',
    //             'description' => 'As a Product Manager, you will be responsible for defining and driving...',
    //             'requirements' => 'Experience with agile methodologies, strong communication skills...',
    //             'benefits' => 'Generous vacation days, Health and dental insurance...',
    //             'seniority_level' => 'Senior',
    //             'industries' => 'E-commerce',
    //             'working_pattern' => 'Hybrid',
    //             'hours' => '40 hours/week',
    //             'skills' => 'Product Management, Agile, Scrum',
    //             'about_us' => 'Innovative Products is a leader in e-commerce solutions...',
    //             'application_deadline' => '2024-12-15',
    //             'visa_sponsorship' => 'No',
    //         ],
    //         (object) [
    //             'id' => 3,
    //             'title' => 'UX/UI Designer',
    //             'company_name' => 'Creative Solutions',
    //             'company_logo' => null, // No logo for now
    //             'job_location' => 'Los Angeles, CA',
    //             'salary' => '£70,000 - £90,000',
    //             'job_type' => 'Part-Time',
    //             'experience_level' => 'Junior',
    //             'description' => 'We are seeking a passionate UX/UI Designer...',
    //             'requirements' => 'Experience with design tools such as Sketch, Figma, Adobe XD...',
    //             'benefits' => 'Flexible hours, Remote work, Design-related training budget',
    //             'seniority_level' => 'Junior',
    //             'industries' => 'Design',
    //             'working_pattern' => 'Remote',
    //             'hours' => '30 hours/week',
    //             'skills' => 'Sketch, Figma, Adobe XD',
    //             'about_us' => 'Creative Solutions is a leading design agency...',
    //             'application_deadline' => '2024-11-30',
    //             'visa_sponsorship' => 'Yes',
    //         ],
    //         // Additional dummy job objects here...
    //     ]);

    //     // Merge real jobs with dummy jobs
    //     $jobs = $databaseJobs->merge($dummyJobs);

    //     return view('candidate.job_search', compact('jobs'));
    // }


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
