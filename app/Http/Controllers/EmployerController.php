<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;





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
    public function Dashboard()
    {
        $employer = Auth::guard('employer')->user();

        if (!$employer) {
            return redirect()->route('employer.login')->with('error', 'You must be logged in to view your team.');
        }

        // Fetch only the team members belonging to the authenticated employer
        $teamMembers = TeamMember::where('employer_id', $employer->id)->get();

        // Pass a flag to the view if no team members are found
        $noTeamMembersMessage = $teamMembers->isEmpty() ? 'No team members found.' : null;

        return view('employer.employer_team', compact('teamMembers', 'noTeamMembersMessage'));
    }

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

            // Return the newly added member as a JSON response
            return response()->json([
                'success' => true,
                'member' => $teamMember,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    // In EmployerController.php

    public function destroy($id)
    {
        $member = TeamMember::find($id);

        if ($member) {
            $member->delete();
            return response()->json(['success' => true]);
        }

        // Ensure clear response for non-existing members
        return response()->json(['success' => false, 'error' => 'Team member not found'], 404);
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

        return response()->json(['success' => true]);
    }

















    // Other Pages
    public function TeamAssesment()
    {
        return view('employer.employer_team_assesment');
    }



    public function ApplicantTracking()
    {
        return view('employer.applicant_tracking');
    }

    public function TalentSearch()
    {
        return view('employer.talent_search');
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
        $jobs = Job::where('employer_id', $employer->id)->get();

        // Return the view with the jobs
        return view('employer.employer_jobs', compact('jobs'));
    }
    public function update(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);

        $job->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'job_location' => $request->input('job_location'),
            'application_deadline' => $request->input('application_deadline'),
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

    public function ApplicantReview()
    {
        $applied_job = DB::table('job_applieds')
            ->join('job_posts', 'job_applieds.job_post_id', '=', 'job_posts.id')
            ->join('candidates', 'job_applieds.candidate_id', '=', 'candidates.id')
            ->select(
                'job_applieds.*',
                'job_posts.job_title',
                'candidates.candidate_name as candidate_name',
                'candidates.email as candidate_email',
                'candidates.skill_assesment_score', // Ensure this column exists
                'candidates.value_assesment_score', // Ensure this column exists
            )
            ->paginate(5);

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


    public function SavedApplicant()
    {  
        $applicant=DB::table('job_applieds')->where('save_applicant','=','1')->get();
        return view('employer.saved_applicant',compact('applicant'));
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
         $record = JobApplied::find($request->id);

         $record->offerletter = 1;
         $record->offerletter_message = $request->offer_letter_content;

            $record->save();
        
            return redirect()->back()->with('success', 'Offer letter sent successfully!');

        // return response()->json(['success' => 'Date-Time updated successfully!']);
    }



    public function pagination()
    {
        $applied_job = DB::table('job_applieds')
            ->join('job_posts', 'job_applieds.job_post_id', 'job_posts.id')
            ->join('candidates', 'job_applieds.candidate_id', 'candidates.id')
            ->select('job_applieds.*', 'job_posts.job_title', 'candidates.*')
            ->paginate(5);
        return view('employer.pagination_applicant_review', compact('applied_job'))->render();
    }

}
