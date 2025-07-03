<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\TeamMemberAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TeamMemberAssessmentController extends Controller
{
    public function sendAssessmentLink(Request $request): \Illuminate\Http\RedirectResponse
	{
        $request->validate([
            'member_id' => 'required|string',
            'employee_email' => 'required|email'
        ]);

        $token = Str::uuid();
        $expiresAt = now()->addHours(24);

        TeamMemberAssessment::create([
            'team_member_id' => $request->member_id,
            'team_member_email' => $request->employee_email,
            'access_token' => $token,
            'expires_at' => $expiresAt,
        ]);

        $linkValues = route('employee.values.assessment.access', ['page' => 1, 'token' => $token]);

        $behaviorValues = route('employee.behavior.assessment.access', ['token' => $token]);

        TeamMember::where('id',  $request->member_id)
            ->update([
                'is_send_link' => 1,
            ]);

        Mail::to($request->employee_email)->send(
            new \App\Mail\TeamMemberAssessmentMail($linkValues, $behaviorValues, $request->member_id)
        );

        return back()->with('success', 'Assessment link sent successfully!');
	}

	public function accessValuesAssessmentPage($page, $token)
	{
		$link = TeamMemberAssessment::where('access_token', $token)->first();

		if (!$link || $link->is_used || $link->expires_at->isPast()) {
			abort(403, 'Link is expired or already used.');
		}

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
			return redirect('employer/value/assessment/' . $page);
		}

		// Pass words, current page, and total pages to the view
		return view('employer.quiz', [
			'words' => $words,
			'page' => $page,
			'totalPages' => $totalPages,
			'token' => $token,
		]);
	}

	public function valueAssessmentSubmit(Request $request)
	{
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

		$link = TeamMemberAssessment::where('access_token', $request->token)->where('is_used', 0)->first();

		// Clear previous selections to prevent duplicates
		DB::table('employer_selections')
			->where('team_member_id', $link->team_member_id)
			->delete();

		// Save new selections to the database
		foreach ($selectedWords as $page => $words) {
			foreach ($words as $index => $word) {
				$value = DB::table('value_words')
					->where('child_word', $word)
					->first();

				if ($value) {
					DB::table('employer_selections')->insert([
						'team_member_id' => $link->team_member_id,
						'page' => str_replace('quiz_page_', '', $page),
						'value_word_id' => $value->id,
						'score' => 5 - $index,
						'created_at' => now(),
						'updated_at' => now()
					]);
				}
			}
		}

        $results = DB::table('employer_selections')
            ->join('value_words', 'employer_selections.value_word_id', '=', 'value_words.id')
            ->where('employer_selections.team_member_id',  $link->team_member_id)
            ->select('value_words.mother_word', DB::raw('SUM(employer_selections.score) as total'))
            ->groupBy('value_words.mother_word')
            ->get()
            ->map(function ($item) {
                $item->percentage = round(($item->total / 25) * 100, 2);
                return $item;
            });

        // 🔄 Convert to key-value pair for JSON storage
        $scoreData = $results->pluck('percentage', 'mother_word')->toArray();

        // 💾 Store JSON in the candidates table
        DB::table('team_members')
            ->where('id', $link->team_member_id)
            ->update([
                'value_assessment_score' => json_encode($scoreData),
                'value_assessment_completed_at' => now(),
            ]);

        $teamMember = TeamMember::Where('id', $link->team_member_id)->first();

        if (isset($teamMember->value_assessment_completed_at) && isset($teamMember->behaviour_assessment_completed_at)) {
            TeamMember::where('id',  $link->team_member_id)
                ->update([
                    'is_done_assessment' => 1,
                ]);

            if ($link) {
                $link->is_used = 1;
                $link->save();
            }
        }

		return response()->json(['success' => true]);
	}

    // Assessment 1
    public function accessBehaviorAssessmentPage($token)
    {
        $link = TeamMemberAssessment::where('access_token', $token)->first();

        if (!$link || $link->is_used || $link->expires_at->isPast()) {
            abort(403, 'Link is expired or already used.');
        }

        $questions = DB::table('compassion_vs_confidence_questions')->get();
        return view('employer.assessment.CompassionVsConfidence', compact('questions','link'));
    }

    public function behaviorAssessmentSubmit(Request $request)
    {
        $link = TeamMemberAssessment::where('access_token', $request->token)->where('is_used', 0)->first();

        $teamMember = TeamMember::Where('id', $link->team_member_id)->first();

        $total_compassion = 0;
        $total_confidence = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('compassion_vs_confidence_questions')->where('id', $question_id)->first();

            $compassion_score = $question->{$response . '_compassion'};
            $confidence_score = $question->{$response . '_confidence'};

            DB::table('employer_compassion_vs_confidence_responses')->insert([
                'team_member_id' => $link->team_member_id,
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

        // Decode existing scores
        $currentScores = json_decode($teamMember->behaviour_assessment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['compassion'] = $compassion_percentage;
        $currentScores['confidence'] = $confidence_percentage;

        // Decode completion timestamps
        $completed = json_decode($teamMember->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t1'] = now()->toDateTimeString();

        // Save both
        TeamMember::where('id', $link->team_member_id)->update([
            'behaviour_assessment_score' => json_encode($currentScores),
            'behaviour_assessment_completed_at' => json_encode($completed),
        ]);


        if (isset($teamMember->value_assessment_completed_at) && isset($teamMember->behaviour_assessment_completed_at)) {
            TeamMember::where('id',  $request->member_id)
                ->update([
                    'is_done_assessment' => 1,
                ]);

            // if ($link) {
            //     $link->is_used = 1;
            //     $link->save();
            // }
        }

        return redirect()->route('employer.behavior.assessment.CuriosityVsPracticality', ['token' => $request->token]);

    }

    // Assessment 2
    public function accessCuriosityVsPracticality($token)
    {
        $link = TeamMemberAssessment::where('access_token', $token)->first();

        if (!$link || $link->is_used || $link->expires_at->isPast()) {
            abort(403, 'Link is expired or already used.');
        }

        $questions = DB::table('curiosity_vs_practicality_questions')->get();
        return view('employer.assessment.CuriosityVsPracticality', compact('questions', 'link'));
    }

    public function behaviorCuriosityVsPracticalitySubmit(Request $request)
    {
        $link = TeamMemberAssessment::where('access_token', $request->token)->where('is_used', 0)->first();

        $teamMember = TeamMember::Where('id', $link->team_member_id)->first();

        $total_curiosity = 0;
        $total_practicality = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('curiosity_vs_practicality_questions')->where('id', $question_id)->first();

            $curiosity_score = $question->{$response . '_curiosity'};
            $practicality_score = $question->{$response . '_practicality'};

            DB::table('employer_curiosity_vs_practicality_responses')->insert([
                'team_member_id' => $link->team_member_id,
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

        // Decode existing scores
        $currentScores = json_decode($teamMember->behaviour_assessment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['curiosity'] = $curiosity_percentage;
        $currentScores['practicality'] = $practicality_percentage;

        // Decode completion timestamps
        $completed = json_decode($teamMember->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t2'] = now()->toDateTimeString();

        // Save both
        TeamMember::where('id', $link->team_member_id)->update([
            'behaviour_assessment_score' => json_encode($currentScores),
            'behaviour_assessment_completed_at' => json_encode($completed),
        ]);

        if (isset($teamMember->value_assessment_completed_at) && isset($teamMember->behaviour_assessment_completed_at)) {
            TeamMember::where('id',  $link->team_member_id)
                ->update([
                    'is_done_assessment' => 1,
                ]);

            // if ($link) {
            //     $link->is_used = 1;
            //     $link->save();
            // }
        }

        return redirect()->route('employer.behavior.assessment.DisciplineVsAdaptability', ['token' => $request->token]);
    }

    // Assessment 3
    public function accessDisciplineVsAdaptability($token)
    {
        $link = TeamMemberAssessment::where('access_token', $token)->first();
        // dd($link , $link->is_used , $link->expires_at->isPast());
        if (!$link || $link->is_used || $link->expires_at->isPast()) {
            abort(403, 'Link is expired or already used.');
        }

        $questions = DB::table('discipline_vs_adaptability_questions')->get();
        return view('employer.assessment.DisciplineVsAdaptability', compact('questions', 'link'));
    }

    public function behaviorDisciplineVsAdaptabilitySubmit(Request $request)
    {
        $link = TeamMemberAssessment::where('access_token', $request->token)->where('is_used', 0)->first();

        $teamMember = TeamMember::Where('id', $link->team_member_id)->first();
        $total_discipline = 0;
        $total_adaptability = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('discipline_vs_adaptability_questions')->where('id', $question_id)->first();

            $discipline_score = $question->{$response . '_discipline'};
            $adaptability_score = $question->{$response . '_adaptability'};

            DB::table('employer_discipline_vs_adaptability_responses')->insert([
                'team_member_id' => $link->team_member_id,
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

        // Decode existing scores
        $currentScores = json_decode($teamMember->behaviour_assessment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['discipline'] = $discipline_percentage;
        $currentScores['adaptability'] = $adaptability_percentage;

        // Decode completion timestamps
        $completed = json_decode($teamMember->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t3'] = now()->toDateTimeString();

        // Save both
        TeamMember::where('id', $link->team_member_id)->update([
            'behaviour_assessment_score' => json_encode($currentScores),
            'behaviour_assessment_completed_at' => json_encode($completed),
        ]);

        if (isset($teamMember->value_assessment_completed_at) && isset($teamMember->behaviour_assessment_completed_at)) {
            TeamMember::where('id',  $link->team_member_id)
                ->update([
                    'is_done_assessment' => 1,
                ]);

            // if ($link) {
            //     $link->is_used = 1;
            //     $link->save();
            // }
        }

        return redirect()->route('employer.behavior.assessment.ResilienceVsSensitivity', ['token' => $request->token]);
    }

    // Assessment 4
    public function accessResilienceVsSensitivity($token)
    {
        $link = TeamMemberAssessment::where('access_token', $token)->first();

        if (!$link || $link->is_used || $link->expires_at->isPast()) {
            abort(403, 'Link is expired or already used.');
        }

        $questions = DB::table('resilience_vs_sensitivity_questions')->get();
        return view('employer.assessment.ResilienceVsSensitivity', compact('questions', 'link'));
    }

    public function behaviorResilienceVsSensitivitySubmit(Request $request)
    {
        $link = TeamMemberAssessment::where('access_token', $request->token)->where('is_used', 0)->first();

        $teamMember = TeamMember::Where('id', $link->team_member_id)->first();
        $total_resilience = 0;
        $total_sensitivity = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('resilience_vs_sensitivity_questions')->where('id', $question_id)->first();

            $resilience_score = $question->{$response . '_resilience'};
            $sensitivity_score = $question->{$response . '_sensitivity'};

            DB::table('employer_resilience_vs_sensitivity_responses')->insert([
                'team_member_id' => $link->team_member_id,
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


        // Decode existing scores
        $currentScores = json_decode($teamMember->behaviour_assessment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['resilience'] = $resilience_percentage;
        $currentScores['sensitivity'] = $sensitivity_percentage;

        // Decode completion timestamps
        $completed = json_decode($teamMember->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t4'] = now()->toDateTimeString();

        // Save both
        TeamMember::where('id', $link->team_member_id)->update([
            'behaviour_assessment_score' => json_encode($currentScores),
            'behaviour_assessment_completed_at' => json_encode($completed),
        ]);

        if (isset($teamMember->value_assessment_completed_at) && isset($teamMember->behaviour_assessment_completed_at)) {
            TeamMember::where('id',  $link->team_member_id)
                ->update([
                    'is_done_assessment' => 1,
                ]);

            // if ($link) {
            //     $link->is_used = 1;
            //     $link->save();
            // }
        }

        return redirect()->route('employer.behavior.assessment.SociobilityVsReflectiveness', ['token' => $request->token]);
    }

    // Assessment 5
    public function accessSocioblityVsReflectiveness($token)
    {
        $link = TeamMemberAssessment::where('access_token', $token)->first();

        if (!$link || $link->is_used || $link->expires_at->isPast()) {
            abort(403, 'Link is expired or already used.');
        }
        $questions = DB::table('sociability_vs_reflectiveness_questions')->get();
        return view('employer.assessment..sociobilityVsReflectiveness', compact('questions', 'link'));
    }

    public function behaviorSocioblityVsReflectivenessSubmit(Request $request)
    {
        $link = TeamMemberAssessment::where('access_token', $request->token)->where('is_used', 0)->first();

        $teamMember = TeamMember::Where('id', $link->team_member_id)->first();
        $total_sociability = 0;
        $total_reflectiveness = 0;

        foreach ($request->input('responses') as $question_id => $response) {
            $question = DB::table('sociability_vs_reflectiveness_questions')->where('id', $question_id)->first();

            $sociability_score = $question->{$response . '_sociability'};
            $reflectiveness_score = $question->{$response . '_reflectiveness'};

            DB::table('employer_sociability_vs_reflectiveness_responses')->insert([
                'team_member_id' => $link->team_member_id,
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

        $currentScores = json_decode($teamMember->behaviour_assessment_score, true) ?? [];
        if (!is_array($currentScores)) $currentScores = [];
        $currentScores['sociability'] = $sociability_percentage;
        $currentScores['reflectiveness'] = $reflectiveness_percentage;

        // Decode completion timestamps
        $completed = json_decode($teamMember->behaviour_assesment_completed_at, true) ?? [];
        if (!is_array($completed)) $completed = [];
        $completed['t5'] = now()->toDateTimeString();

        // Save both

        // Save both
        TeamMember::where('id', $link->team_member_id)->update([
            'behaviour_assessment_score' => json_encode($currentScores),
            'behaviour_assessment_completed_at' => json_encode($completed),
        ]);

        if (isset($teamMember->value_assessment_completed_at) && isset($teamMember->behaviour_assessment_completed_at)) {
            TeamMember::where('id',  $link->team_member_id)
                ->update([
                    'is_done_assessment' => 1,
                ]);

            if ($link) {
                $link->is_used = 1;
                $link->save();
            }
        }

        return redirect()->route('employee.value.result', ['assessment' => 'Behaviour']);
    }

    public function showResult(Request $request)
    {
        $assessmentName = $request->query('assessment');

        return view('employer.assessment-success', compact('assessmentName'));
    }
}
