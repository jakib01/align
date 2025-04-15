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
        $expiresAt = now()->addHours(48);

        TeamMemberAssessment::create([
            'team_member_id' => $request->member_id,
            'team_member_email' => $request->employee_email,
            'access_token' => $token,
            'expires_at' => $expiresAt,
        ]);

		$link = route('employee.assessment.access', ['page' => 1, 'token' => $token]);

        TeamMember::where('id',  $request->member_id)
            ->update([
                'is_send_link' => 1,
            ]);

        Mail::to($request->employee_email)->send(
            new \App\Mail\TeamMemberAssessmentMail($link, $request->member_id)
        );

        return back()->with('success', 'Assessment link sent successfully!');
	}

	public function accessAssessmentPage($page, $token)
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
//
//		$link->update(['is_used' => true]);
//
//		return view('employee.test-page'); // your test page
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

//		$link->update(['is_used' => true]);


		// Return success response
		return response()->json(['success' => true]);
	}

}
