<?php

namespace App\Http\Controllers;


use App\Models\Candidate;
use App\Models\Hour;
use App\Models\Industry;
use App\Models\JobLocation;
use App\Models\SalaryRange;
use App\Models\SeniorityLevel;
use App\Models\Skill;
use App\Models\TeamMemberAssessment;
use App\Models\WorkingPattern;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;

use App\Models\JobApplied;

use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    // Authentication Views
    public function Index()
    {
        return view('employer.employer_login');
    }

    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('employer')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('employer.dashboard');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function Logout()
    {
        Auth::guard('employer')->logout();
        return redirect()->route('employer_login_form');
    }

    // Dashboard Views

    public function Dashboard(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        if (!$employer) {
            return redirect()->route('employer.login')->with('error', 'You must be logged in to view your team.');
        }

        $search = $request->input('search');

        // Filter team members if search is provided
        $teamMembers = TeamMember::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        })->paginate(10)->appends(['search' => $search]);

        $orderedValueKeys = [
            'Achievement', 'Security', 'Universalism', 'Benevolence', 'Conformity',
            'Tradition', 'Hedonism', 'Power', 'Self-Direction', 'Stimulation'
        ];

        $orderedBehaviourKeys = [
            'compassion', 'confidence', 'curiosity', 'practicality', 'discipline',
            'adaptability', 'resilience', 'sensitivity', 'sociability', 'reflectiveness'
        ];

        $valuesAssessmentData = [];
        $behaviourAssessmentData = [];

        foreach ($teamMembers as $member) {

            if((empty($member->value_assessment_score) || empty($member->behaviour_assessment_score) && $member->is_send_link = 1 && $member->is_done_assessment = 0)) {
                $member->can_resend = true;
            }else{
                $member->can_resend = false;
            }


            if (!empty($member->value_assessment_score)) {
                $scores = json_decode($member->value_assessment_score, true);
                if (is_array($scores)) {
                    $row = [];
                    foreach ($orderedValueKeys as $key) {
                        $row[] = $scores[$key] ?? 0;
                    }
                    $valuesAssessmentData[] = $row;
                }
            }

            if (!empty($member->behaviour_assessment_score)) {
                $scores = json_decode($member->behaviour_assessment_score, true);
                if (is_array($scores)) {
                    $row = [];
                    foreach ($orderedBehaviourKeys as $key) {
                        $row[] = $scores[$key] ?? 0;
                    }
                    $behaviourAssessmentData[] = $row;
                }
            }
        }

        $noTeamMembersMessage = $teamMembers->isEmpty() ? 'No team members found.' : null;

//        dd($teamMembers->toArray());

        return view('employer.employer_team', compact(
            'teamMembers', 'noTeamMembersMessage',
            'valuesAssessmentData', 'behaviourAssessmentData', 'search'
        ));
    }

//    public function Dashboard()
//    {
//        $employer = Auth::guard('employer')->user();
//
//        if (!$employer) {
//            return redirect()->route('employer.login')->with('error', 'You must be logged in to view your team.');
//        }
//
//        // Fetch only the team members belonging to the authenticated employer
//        $teamMembers = TeamMember::paginate(1);
//
//        $orderedValueKeys = [
//            'Achievement',
//            'Security',
//            'Universalism',
//            'Benevolence',
//            'Conformity',
//            'Tradition',
//            'Hedonism',
//            'Power',
//            'Self-Direction',
//            'Stimulation'
//        ];
//
//        $orderedBehaviourKeys = [
//            'compassion',
//            'confidence',
//            'curiosity',
//            'practicality',
//            'discipline',
//            'adaptability',
//            'resilience',
//            'sensitivity',
//            'sociability',
//            'reflectiveness'
//        ];
//
//        $valuesAssessmentData = [];
//        $behaviourAssessmentData = [];
//
//        foreach ($teamMembers as $member) {
//            // For value_assessment_score
//            if (!empty($member->value_assessment_score)) {
//                $scores = json_decode($member->value_assessment_score, true);
//
//                if (is_array($scores)) {
//                    $row = [];
//                    foreach ($orderedValueKeys as $key) {
//                        $row[] = $scores[$key] ?? 0;
//                    }
//                    $valuesAssessmentData[] = $row;
//                }
//            }
//
//            // For behaviour_assessment_score
//            if (!empty($member->behaviour_assessment_score)) {
//                $scores = json_decode($member->behaviour_assessment_score, true);
//
//                if (is_array($scores)) {
//                    $row = [];
//                    foreach ($orderedBehaviourKeys as $key) {
//                        $row[] = $scores[$key] ?? 0;
//                    }
//                    $behaviourAssessmentData[] = $row;
//                }
//            }
//        }
//
//        // Pass a flag to the view if no team members are found
//        $noTeamMembersMessage = $teamMembers->isEmpty() ? 'No team members found.' : null;
//
//        return view('employer.employer_team', compact('teamMembers', 'noTeamMembersMessage', 'valuesAssessmentData', 'behaviourAssessmentData'));
//    }

    // Profile Management
    public function showProfile()
    {
        $employer = Auth::guard('employer')->user(); // or use auth()->user()
        return view('employer.employer_profile', compact('employer'));
    }

    public function editProfile()
    {
        $employer = Auth::guard('employer')->user(); // or use auth()->user()
        return view('employer.employer_profile_update', compact('employer'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validating image file
            // other validations...
        ]);

        $employer = auth()->guard('employer')->user();

        if ($request->hasFile('logo')) {
            // Save the logo file to the 'public' disk and get the file path
            $logoPath = $request->file('logo')->store('logos', 'public');

            // Update the employer with the new logo path
            $employer->logo = $logoPath;
            $employer->save();
        }

        $request->validate([
            'website' => 'nullable|url',
            'industry' => 'nullable|string',
            'founded' => 'nullable|integer',
            'employees_count' => 'nullable|integer',
            'email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'about_us' => 'nullable|string',
            'logo' => 'nullable|image',
        ]);

        $employer = Auth::guard('employer')->user(); // or use auth()->user()
        $employer->update($request->only([
            'website',
            'industry',
            'founded',
            'employees_count',
            'email',
            'contact_phone',
            'contact_address',
            'social_links',
            'about_us'
        ]));

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $employer->logo = $logoPath;  // Store the full path
            $employer->save();
        }


        return redirect()->route('employer.profile')->with('success', 'Profile updated successfully!');
    }

    // Membership Management
    public function Membership()
    {
        return view('employer.employer_membership');
    }

    public function redirectToPayment(Request $request)
    {
        $membershipType = $request->input('membership_type');
        $membershipPrices = ['basic' => 0, 'premium' => 49.99];

        if (!array_key_exists($membershipType, $membershipPrices)) {
            return redirect()->route('employer.membership')->with('error', 'Invalid membership type.');
        }

        session([
            'membershipType' => $membershipType,
            'price' => $membershipPrices[$membershipType],
            'currency' => '£',
        ]);

        return redirect()->route('membership.payment.gateway');
    }

    public function showPaymentGatewayPage()
    {
        return view('employer.paymentgateway', [
            'membershipType' => session('membershipType', 'basic'),
            'price' => session('price', 0),
            'currency' => session('currency', '£'),
        ]);
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'membership_type' => 'required|string|in:basic,premium',
            'price' => 'required|numeric',
            'currency' => 'required|string',
        ]);

        // Update membership type for the logged-in employer
        $employer = auth()->guard('employer')->user();
        $employer->update(['membership_type' => $validated['membership_type']]);

        return redirect()->route('employer.membership')
            ->with('success', ucfirst($validated['membership_type']) . ' membership activated!');
    }

    public function search(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        if (!$employer) {
            return response()->json([]);
        }

        $query = $request->input('query');

        // If query is empty, return all team members
        if (empty($query)) {
            $teamMembers = TeamMember::where('employer_id', $employer->id)->get();
        } else {
            // Otherwise, filter team members based on the search query
            $teamMembers = TeamMember::where('employer_id', $employer->id)
                ->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('name', 'like', "%$query%")
                        ->orWhere('role', 'like', "%$query%")
                        ->orWhere('email', 'like', "%$query%");
                })
                ->get();
        }

        return response()->json($teamMembers);
    }

    public function store(Request $request)
    {
        // Fetch the authenticated employer user using the 'employer' guard
        $employer = Auth::guard('employer')->user();

        if (!$employer) {
            return response()->json(['error' => 'Unauthorized'], 401); // Unauthorized response
        }
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'admin_status' => 'required|string|in:admin,team-member',
                'email' => 'required|email|unique:team_members,email',
            ]);

            // Create the new team member
            $teamMember = TeamMember::create([
                'name' => $validated['name'],
                'role' => $validated['role'],
                'admin_status' => $validated['admin_status'],
                'email' => $validated['email'],
                'employer_id' => $employer->id, // Link the team member to the employer
            ]);

            return redirect()->route('employer.dashboard')->with('success', 'Team member added successfully.');

        } catch (\Exception $e) {
            return redirect()->route('employer.dashboard')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $member = TeamMember::find($id);

        if ($member) {
            $member->delete();
            // Fetch only the team members belonging to the authenticated employer
            $teamMembers = TeamMember::get();

            // Pass a flag to the view if no team members are found
            $noTeamMembersMessage = $teamMembers->isEmpty() ? 'No team members found.' : null;

            return redirect()->route('employer.dashboard')->with('success', 'Team member deleted successfully.');
        }

        // Ensure clear response for non-existing members
        return response()->json(['success' => false, 'error' => 'Team member not found'], 404);
    }

    // public function edit($id)
    // {
    //     $teamMember = TeamMember::findOrFail($id);

    //     $teamMembers = TeamMember::get();
    //     $noTeamMembersMessage = $teamMembers->isEmpty() ? 'No team members found.' : null;

    //     return view('employer.employer_team', compact('teamMembers', 'teamMember', 'noTeamMembersMessage'));
    // }

    public function edit($id)
{
    $teamMember = TeamMember::findOrFail($id);
    $teamMembers = TeamMember::get();
    $noTeamMembersMessage = $teamMembers->isEmpty() ? 'No team members found.' : null;

    $averages = $this->calculateEmployerAverages();

    return view('employer.employer_team', [
        'teamMembers' => $teamMembers,
        'teamMember' => $teamMember,
        'noTeamMembersMessage' => $noTeamMembersMessage,
        'valuesAssessmentData' => array_values($averages['avgValueAssessment']),
        'behaviourAssessmentData' => array_values($averages['avgBehaviorAssessment']),
    ]);
}


    public function updateTeam(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'admin_status' => 'required|string|max:50',
            'email' => 'required|email',
        ]);

        $teamMember->update($validatedData);

        return redirect()->route('employer.dashboard')->with('success', 'Team member updated successfully.');
    }

    // Other Pages
    public function TeamAssesment(Request $request)
    {
        $filter = $request->query('filter'); // 'complete' or 'incomplete'

        $query = TeamMember::query();

        if ($filter === 'complete') {
            $query->whereNotNull('behaviour_assessment_score')
                ->whereNotNull('behaviour_assessment_completed_at')
                ->whereNotNull('value_assessment_score')
                ->whereNotNull('value_assessment_completed_at');
        } elseif ($filter === 'incomplete') {
            $query->where(function ($q) {
                $q->whereNull('behaviour_assessment_score')
                    ->orWhereNull('behaviour_assessment_completed_at')
                    ->orWhereNull('value_assessment_score')
                    ->orWhereNull('value_assessment_completed_at');
            });
        }

        $candidates = $query->paginate(5)->appends(['filter' => $filter]);

        return view('employer.employer_team_assesment', compact('candidates', 'filter'));
    }

    public function ApplicantTracking()
    {
        return view('employer.applicant_tracking');
    }

    public function TalentSearch()
    {
        $locations = JobLocation::get();
        $salaryRanges = SalaryRange::get();
        $seniorityLevels = SeniorityLevel::get();
        $workingPatters = WorkingPattern::get();
        $hours = Hour::get();
        $industries = Industry::get();
        $skills = Skill::get();

        $candidates = Candidate::paginate(5);
//        dd($candidates->toArray());
        return view('employer.talent_search', compact('candidates', 'locations', 'salaryRanges', 'seniorityLevels', 'workingPatters', 'hours', 'industries', 'skills'));
    }

    public function searchCandidates(Request $request)
    {

        // $query = Candidate::query();

        // if ($request->job_location) {
        //     $query->where('job_location_id', $request->job_location);
        // }
        // if ($request->salary_range) {
        //     $query->where('salary_range_id', $request->salary_range);
        // }
        // if ($request->seniority_level) {
        //     $query->where('seniority_level_id', $request->seniority_level);
        // }
        // if ($request->working_pattern) {
        //     $query->where('working_pattern_id', $request->working_pattern);
        // }
        // if ($request->hours) {
        //     $query->where('hours_id', $request->hours);
        // }
        // if ($request->industries) {
        //     $query->where('industry_id', $request->industries);
        // }
        // if ($request->skills) {
        //     $query->whereHas('skills', function ($q) use ($request) {
        //         $q->where('skill_id', $request->skills);
        //     });
        // }

        // $candidates = $query->latest()->get();

        // return response()->json($candidates);

    //     $query = Candidate::query();

    // if ($request->filled('job_location')) {
    //     $query->where('job_preferences->location', $request->job_location);
    // }

    // if ($request->filled('salary_range')) {
    //     $query->where('job_preferences->salary', $request->salary_range);
    // }

    // if ($request->filled('seniority_level')) {
    //     $query->where('job_preferences->seniority', $request->seniority_level);
    // }

    // if ($request->filled('working_pattern')) {
    //     $query->where('job_preferences->working_pattern', $request->working_pattern);
    // }

    // if ($request->filled('hours')) {
    //     $query->where('job_preferences->hours', $request->hours);
    // }

    // if ($request->filled('industries')) {
    //     $query->where('job_preferences->industry', $request->industries);
    // }

    // if ($request->filled('skills')) {
    //     $query->whereJsonContains('job_preferences->skills', $request->skills);
    // }

    // $candidates = $query->latest()->get();

    // return response()->json($candidates);

//     $candidate = Candidate::first();
//   dd($candidate->job_preferences);

 $query = Candidate::query()->whereNotNull('job_preferences');

    if ($request->filled('seniority_level')) {
        $query->where('job_preferences->seniority', $request->seniority_level);
    }

    if ($request->filled('salary_range')) {
        $query->where('job_preferences->salary', $request->salary_range);
    }

    if ($request->filled('job_location')) {
        $query->where('job_preferences->location', $request->job_location);
    }

    if ($request->filled('working_pattern')) {
        $query->where('job_preferences->contract', $request->working_pattern);
    }

    $candidates = $query->get();

    return response()->json($candidates);

//  dd([
//     'filters' => $request->all(),
//     'first_candidate' => Candidate::first()->job_preferences,
// ]);
// $candidates = Candidate::whereRaw("JSON_UNQUOTE(JSON_EXTRACT(job_preferences, '$.seniority')) = ?", [$request->seniority_level])->get();

// dd([
//     'SQL' => $query->toSql(),
//     'Bindings' => $query->getBindings(),
//     'ResultsCount' => $query->count(),
//     'RequestValue' => $request->seniority_level,
//     'ExampleValue' => Candidate::whereNotNull('job_preferences')->first()->job_preferences['seniority'] ?? null,
// ]);



    }


    public function landing()
    {
        return view('employer.employer_landing');
    }

    public function showHelp()
    {
        return view('employer.employer_help');
    }

    public function showPricing()
    {
        return view('employer.employer_pricing');
    }

    public function trends()
    {
        return view('employer.trends'); // Return the view for employer inbox
    }

    public function inbox()
    {
        return view('employer.employer_inbox'); // Return the view for employer inbox
    }

    public function demo()
    {
        return view('employer.employer_demo'); // Return the view for employer inbox
    }

    public function register()
    {
        return view('employer.employer_register'); // Return the view for employer inbox
    }

    public function showPostedJobs()
    {
        // Get the authenticated employer
        $employer = Auth::guard('employer')->user();

        // Fetch all jobs posted by this employer
        // $jobs = Job::where('employer_id', $employer->id)->get();
        $jobs = Job::get();

        // Return the view with the jobs
        return view('employer.employer_jobs', compact('jobs'));
    }

    public function update(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
            'salary_range' => $request->salary_range,
            'seniority_level' => $request->seniority_level,
            'job_location' => $request->job_location,
            'working_pattern' => $request->working_pattern,
            'industry' => $request->industry,
            'visa_sponsorship' => $request->visa_sponsorship,
            'application_deadline' => $request->application_deadline,
        ]);

        return redirect()->route('employer.jobs')->with('success', 'Job updated successfully!');
    }

    public function showForm()
    {
        // Simply return the view for the form
        return view('employer.employer_job_posting');
    }

    public function storeJobPosting(Request $request)
    {
        $employer = Auth::guard('employer')->user(); // or use auth()->user()

        // Validate incoming request
        $validated = $request->validate([
            'employer_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'seniority_level' => 'nullable|string|max:255',
            'job_location' => 'nullable|string|max:255',
            'working_pattern' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'visa_sponsorship' => 'nullable|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'application_deadline' => 'nullable|date', // Validate application deadline as a date
        ]);
        $validated = $request->validate([
            'employer_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'seniority_level' => 'nullable|string|max:255',
            'job_location' => 'nullable|string|max:255',
            'working_pattern' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'visa_sponsorship' => 'nullable|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'application_deadline' => 'nullable|date', // Validate application deadline as a date
        ]);

        // Insert job data into the database
        $job = Job::create([
            'employer_id' => $employer->id,
            'company_name' => $validated['company_name'],
            'title' => $validated['job_title'],
            'description' => $validated['description'],
            'requirements' => $validated['requirements'],
            'benefits' => $validated['benefits'],
            'salary_range' => $validated['salary_range'], // Store salary range
            'seniority_level' => $validated['seniority_level'],
            'job_location' => $validated['job_location'],
            'working_pattern' => $validated['working_pattern'],
            'industry' => $validated['industry'],
            'visa_sponsorship' => $validated['visa_sponsorship'],
            'application_deadline' => $validated['application_deadline'],  // Storing application deadline
        ]);

        return redirect()->route('employer.dashboard')->with('success', 'Job posted successfully!');
    }

    // public function ApplicantReview()
    // {
    //     $applied_job = DB::table('job_applieds')
    //         ->join('job_posts', 'job_applieds.job_post_id', '=', 'job_posts.id')
    //         ->join('candidates', 'job_applieds.candidate_id', '=', 'candidates.id')
    //         ->select(
    //             'job_applieds.*',
    //             'job_posts.job_title',
    //             'candidates.id as candidate_id',
    //             'candidates.candidate_name as candidate_name',
    //             'candidates.email as candidate_email',
    //             'candidates.skill_assesment_score', // Ensure this column exists
    //             'candidates.value_assessment_score', // Ensure this column exists
    //             'candidates.behaviour_assesment_score', // Ensure this column exists
    //         )
    //         ->paginate(5);

    //     return view('employer.applicant_review', compact('applied_job', ));
    // }

     public function ApplicantReview()
    {
         $applied_job = DB::table('job_applieds')
            ->join('jobs', 'job_applieds.job_post_id', '=', 'jobs.id')
            ->join('candidates', 'job_applieds.candidate_id', '=', 'candidates.id')
            ->select(
                'job_applieds.*',
                'jobs.title',
                'candidates.id as candidate_id',
                'candidates.job_preferences as job_preferences',
                'candidates.candidate_name as candidate_name',
                'candidates.email as candidate_email',
                'candidates.skill_assesment_score', // Ensure this column exists
                'candidates.value_assessment_score', // Ensure this column exists
                'candidates.behaviour_assesment_score', // Ensure this column exists
                'candidates.technical_assessment_score', // Ensure this column exists
            )
            ->paginate(5);

        return view('employer.applicant_review', compact('applied_job', ));
    }

    public function getCandidateAssessmentData(Request $request){

        $candidateId = $request->candidate_id;

        $candidateAssessment = $this->getCandidateAssessment($candidateId);

        $candidateData = Candidate::where('id',$candidateId)->first();

        $candidate = [
            'candidate_name' => $candidateData-> candidate_name,
            'email' => $candidateData-> email,
            'profile_photo' => $candidateData->profile_photo ? asset( $candidateData->profile_photo) : asset('assets/img/demo-profile.png'),

            'job_preferences' => $candidateData-> job_preferences,
            'score' => $candidateData-> technical_assessment_score,
        ];
        return response()->json([
            'candidateBehaviorAssessment' => $candidateAssessment['behaviorAssessment'],
            'candidateValueAssessment' => $candidateAssessment['valueAssessment'],
            'candidateData' => $candidate,
        ]);
    }

    public function searchApplicant(Request $request)
    {
        $query = DB::table('job_applieds')
            ->join('jobs', 'job_applieds.job_post_id', '=', 'jobs.id')
            ->join('candidates', 'job_applieds.candidate_id', '=', 'candidates.id')
            ->select(
                'job_applieds.*',
                'jobs.title as title',
                'candidates.id as candidate_id',
                'candidates.job_preferences',
                'candidates.candidate_name',
                'candidates.email as candidate_email',
                'candidates.skill_assesment_score',
                'candidates.value_assessment_score',
                'candidates.behaviour_assesment_score'
            );

        if ($request->filled('job_title')) {
            $query->where('jobs.title', 'like', '%' . $request->job_title . '%');
        }

        if ($request->filled('candidate_name')) {
            $query->where('candidates.candidate_name', 'like', '%' . $request->candidate_name . '%');
        }

        $applied_job = $query->paginate(5);

        return view('employer.applicant_review', compact('applied_job'));
    }


    public function SaveApplicant(Request $request)
    {


        $id = $request->input('id');
        $applicant1 = DB::table('job_applieds')->where('job_post_id', $id)->update(['save_applicant' => 1]);



    }

    public function UnSaveApplicant(Request $request)
    {


        $id = $request->input('id');
        $applicant1 = DB::table('job_applieds')->where('job_post_id', $id)->update(['save_applicant' => null]);



    }

    public function SavedApplicant(Request $request)
    {
        $query = DB::table('job_applieds')->where('save_applicant', '=', '1');

        if ($request->has('q') && !empty($request->q)) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('candidate_name', 'like', '%' . $search . '%')
                    ->orWhere('job_title', 'like', '%' . $search . '%');
            });
        }

        $applicant = $query->paginate(5);

        return view('employer.saved_applicant', compact('applicant'));
    }

    public function FirstInterview()
    {
        $applicant=DB::table('job_applieds')->where('first_interview','=','1')->get();
        return view('employer.first_interview',compact('applicant'));
    }

    public function FirstInterviewDate(Request $request)
    {
        // $record = JobApplied::find($request->id);
        // $record->first_interview_date = $request->datetime;
        // $record->first_interview = 1;
        // $record->save();

        $value = $request->input('interviewStage');


        if($value == 1){
            $id = $request->input('id');
        $applicant1= DB::table('job_applieds')->where('job_post_id',$id)->update(['first_interview'=>1,'first_interview_date'=>$request->datetime]);
        return response()->json(['success' => 'Date-Time updated successfully!']);

        }
        elseif($value == 2){
            $id = $request->input('id');
        $applicant1= DB::table('job_applieds')->where('job_post_id',$id)->update(['second_interview'=>2,'second_interview_date'=>$request->datetime]);
        return response()->json(['success' => 'Date-Time updated successfully!']);
        }
        else{
            $id = $request->input('id');
        $applicant1= DB::table('job_applieds')->where('job_post_id',$id)->update(['third_interview'=>3,'third_interview_date'=>$request->datetime]);

        return response()->json(['success' => 'Date-Time updated successfully!']);
        }



        // return response()->json(['success' => 'Date-Time updated successfully!']);
    }

    public function SecondInterview()
    {
        $applicant=DB::table('job_applieds')->where('second_interview','=','2')->get();
        return view('employer.second_interview',compact('applicant'));
    }

    public function SecondInterviewDate(Request $request)
    {
        // $record = JobApplied::find($request->id);
        // $record->first_interview_date = $request->datetime;
        // $record->first_interview = 1;
        // $record->save();

        $value = $request->input('interviewStage');



        if($value == 2){
            $id = $request->input('id');
        $applicant1= DB::table('job_applieds')->where('job_post_id',$id)->update(['second_interview'=>2,'second_interview_date'=>$request->datetime]);
        return response()->json(['success' => 'Date-Time updated successfully!']);
        }
        else{
            $id = $request->input('id');
        $applicant1= DB::table('job_applieds')->where('job_post_id',$id)->update(['third_interview'=>3,'third_interview_date'=>$request->datetime]);

        return response()->json(['success' => 'Date-Time updated successfully!']);
        }



        // return response()->json(['success' => 'Date-Time updated successfully!']);
    }

    public function FinalInterview()
    {
        $applicant=DB::table('job_applieds')->where('third_interview','=','3')->get();

        return view('employer.final_interview' ,compact('applicant'));
    }

    public function FinalInterviewDate(Request $request)
    {
        // $record = JobApplied::find($request->id);
        // $record->first_interview_date = $request->datetime;
        // $record->first_interview = 1;
        // $record->save();

        $value = $request->input('interviewStage');



        if($value == 3){
            $id = $request->input('id');
        $applicant1= DB::table('job_applieds')->where('job_post_id',$id)->update(['third_interview'=>3,'third_interview_date'=>$request->datetime]);
        return response()->json(['success' => 'Date-Time updated successfully!']);
        }




        // return response()->json(['success' => 'Date-Time updated successfully!']);
    }

    public function offerletter(Request $request,$id)
    {

       $updated= DB::table('job_applieds')
        ->where('my_row_id', $id)
        ->update([
            'offerletter' => 1,
            'offerletter_message' => $request->offer_letter_content,
        ]);

        // dd("Rows updated: $updated");

    return redirect()->back()->with('success', 'Offer letter sent successfully!');
        //  $record = JobApplied::find($request->id);

        //  $record->offerletter = 1;
        //  $record->offerletter_message = $request->offer_letter_content;

        //     $record->save();

        //     return redirect()->back()->with('success', 'Offer letter sent successfully!');
        // dd($id);

        // return response()->json(['success' => 'Date-Time updated successfully!']);
    }

    public function pagination()
    {
        // $applied_job = DB::table('job_applieds')
        //     ->join('job_posts', 'job_applieds.job_post_id', 'job_posts.id')
        //     ->join('candidates', 'job_applieds.candidate_id', 'candidates.id')
        //     ->select('job_applieds.*', 'job_posts.job_title', 'candidates.*')
        //     ->paginate(5);
        // return view('employer.pagination_applicant_review', compact('applied_job'))->render();

         $applied_job = DB::table('job_applieds')
            ->join('jobs', 'job_applieds.job_post_id', 'jobs.id')
            ->join('candidates', 'job_applieds.candidate_id', 'candidates.id')
            ->select('job_applieds.', 'jobs.title', 'candidates.')
            ->paginate(5);
        return view('employer.pagination_applicant_review', compact('applied_job'))->render();


    }

    public function getAssessmentData(Request $request)
    {
        $candidateId = $request->candidate_id;

        $employerAssessment = $this->calculateEmployerAverages();
        $candidateAssessment = $this->getCandidateAssessment($candidateId);

        return response()->json([
            'employerBehaviorAssessment' => $employerAssessment['avgBehaviorAssessment'],
            'employerValueAssessment' => $employerAssessment['avgValueAssessment'],
            'candidateBehaviorAssessment' => $candidateAssessment['behaviorAssessment'],
            'candidateValueAssessment' => $candidateAssessment['valueAssessment'],
        ]);
    }

    private function calculateEmployerAverages(): array
    {
        $teamMembers = TeamMember::all();

        $valueKeys = [
            'Achievement', 'Security', 'Universalism', 'Benevolence', 'Conformity',
            'Tradition', 'Hedonism', 'Power', 'Self-Direction', 'Stimulation'
        ];

        $behaviorKeys = [
            'compassion', 'confidence', 'curiosity', 'practicality', 'discipline',
            'adaptability', 'resilience', 'sensitivity', 'sociability', 'reflectiveness'
        ];

        $valueSums = array_fill_keys($valueKeys, 0);
        $behaviorSums = array_fill_keys($behaviorKeys, 0);

        $valueCount = 0;
        $behaviorCount = 0;

        foreach ($teamMembers as $member) {
            // Process value scores
            $valueScores = json_decode($member->value_assessment_score, true);
            if (is_array($valueScores)) {
                foreach ($valueKeys as $key) {
                    $valueSums[$key] += $valueScores[$key] ?? 0;
                }
                $valueCount++;
            }

            // Process behavior scores
            $behaviorScores = json_decode($member->behaviour_assessment_score, true);
            if (is_array($behaviorScores)) {
                foreach ($behaviorKeys as $key) {
                    $behaviorSums[$key] += $behaviorScores[$key] ?? 0;
                }
                $behaviorCount++;
            }
        }

        return [
            'avgValueAssessment' => $this->calculateAverages($valueSums, $valueCount),
            'avgBehaviorAssessment' => $this->calculateAverages($behaviorSums, $behaviorCount)
        ];
    }

    private function calculateAverages(array $sums, int $count): array
    {
        $averages = [];
        foreach ($sums as $key => $total) {
            $averages[$key] = $count > 0 ? round($total / $count, 2) : 0;
        }
        return $averages;
    }

    public function getCandidateAssessment(int $candidateId): array
    {
        $candidate = Candidate::find($candidateId);

        $valueKeys = [
            'Achievement', 'Security', 'Universalism', 'Benevolence', 'Conformity',
            'Tradition', 'Hedonism', 'Power', 'Self-Direction', 'Stimulation'
        ];

        $behaviorKeys = [
            'compassion', 'confidence', 'curiosity', 'practicality', 'discipline',
            'adaptability', 'resilience', 'sensitivity', 'sociability', 'reflectiveness'
        ];

        $valueAssessment = array_fill_keys($valueKeys, 0);
        $behaviorAssessment = array_fill_keys($behaviorKeys, 0);

        if ($candidate) {
            $valueScores = json_decode($candidate->value_assessment_score, true);
            if (is_array($valueScores)) {
                foreach ($valueKeys as $key) {
                    $valueAssessment[$key] = $valueScores[$key] ?? 0;
                }
            }

            $behaviorScores = json_decode($candidate->behaviour_assesment_score, true);
            if (is_array($behaviorScores)) {
                foreach ($behaviorKeys as $key) {
                    $behaviorAssessment[$key] = $behaviorScores[$key] ?? 0;
                }
            }
        }

        return [
            'valueAssessment' => $valueAssessment,
            'behaviorAssessment' => $behaviorAssessment
        ];
    }

}
