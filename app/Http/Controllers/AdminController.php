<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Assessment;
use Illuminate\Support\Facades\Log;


use App\Models\AssessmentQuestion;
use App\Models\AssessmentOption;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin_login');
    }



    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login_form');
    }


    public function Dashboard()
    {
        return view('admin.dashboard');
    }

    // employer

    public function AllEmployer()
    {
        return view('admin.employer.allemployer');
    }

    public function JobSlots()
    {
        $job = DB::table('job_posts')
            ->join('seniority_levels', 'job_posts.seniority_level_id', 'seniority_levels.id')
            ->join('industries', 'job_posts.industry_id', 'industries.id')
            ->join('job_locations', 'job_posts.job_location_id', 'job_locations.id')
            ->join('working_patterns', 'job_posts.working_pattern_id', 'working_patterns.id')
            ->join('hours', 'job_posts.hours_id', 'hours.id')
            ->join('skill_lists', 'job_posts.skill_id', 'skill_lists.id')
            ->select('job_posts.*', 'seniority_levels.seniority_level', 'industries.industries', 'job_locations.job_location', 'working_patterns.working_pattern', 'hours.hours', 'skill_lists.skills')
            ->get();
        return view('admin.employer.job_slots', compact('job'));
    }

    public function AllLicense()
    {
        return view('admin.employer.all_license');
    }

    public function AllMessage()
    {
        return view('admin.employer.all_messages');
    }

    public function AllTeamMember()
    {
        return view('admin.employer.allteam_member');
    }

    public function InterviewTracking()
    {
        return view('admin.employer.interview_tracking');
    }


    // candidate

    public function AllCandidate()
    {
        return view('admin.candidate.allcandidate');
    }

    public function CandidateAssesment()
    {
        return view('admin.candidate.candidate_assesment');
    }

    public function CandidateInterview()
    {
        return view('admin.candidate.interview_tracking');
    }

    public function Assesment()
    {
        return view('admin.assesment_creation');
    }
    // public function skills()
    // {
    //     return view('admin.assessment_skills');
    // }
    // public function behaviour()
    // {
    //     return view('admin.assessment_behaviour');
    // }
    // public function values()
    // {
    //     return view('admin.assessment_values');
    // }
    // Store an Assessment

    public function storeAssessment(Request $request)
    {
        $validated = $request->validate([
            'questions' => 'required|array',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.option_text' => 'required|string|max:255',
            'questions.*.answers.*.score' => 'required|integer|min:0',
        ]);

        try {
            foreach ($validated['questions'] as $question) {
                // Store question
                $questionData = AssessmentQuestion::create([
                    'question_text' => $question['question'],
                    'assessment_type' => $request->type,
                ]);

                // Store answers for each question
                foreach ($question['answers'] as $answer) {
                    $questionData->options()->create([
                        'option_text' => $answer['option_text'],
                        'score' => $answer['score'],
                        'question_id' => $questionData->id, // Explicitly set the question_id
                    ]);
                }
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.dashboard')->with('success', 'Assessment stored successfully');
    }


    public function showAssessmentForm($assessmentType)
    {
        // Pass the assessmentType to the view
        return view('admin.assessment_form', compact('assessmentType'));
    }











}
