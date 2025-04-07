<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateAuthController;
use App\Http\Controllers\EmployerAuthController;


use App\Http\Middleware\Candidate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Prevent back after logout

Route::group(['middleware' => 'prevent-back-history'], function () {





    // Employer route starts------------



    Route::prefix('employer')->group(function () {


        Route::get('/login', [EmployerController::class, 'Index'])->name('employer_login_form');
        Route::post('/login', [EmployerController::class, 'Login'])->name('employer.login');
        Route::get('/logout', [EmployerController::class, 'Logout'])->name('employer.logout')->middleware('employer');

        Route::get('/register', [EmployerAuthController::class, 'showRegisterForm'])->name('employer.register');
        Route::post('/register', [EmployerAuthController::class, 'register'])->name('employer.register');

        Route::get('/dashboard', [EmployerController::class, 'Dashboard'])->name('employer.dashboard')->middleware('employer');


        Route::get('/profile', [EmployerController::class, 'showProfile'])->name('employer.profile')->middleware('employer');
        Route::get('/profile/edit', [EmployerController::class, 'editProfile'])->name('employer.profile.edit')->middleware('employer');
        Route::put('/profile/update', [EmployerController::class, 'updateProfile'])->name('employer.profile.update')->middleware('employer');

        Route::get('/membership', [EmployerController::class, 'Membership'])->name('employer.membership')->middleware('employer');

        Route::post('/payment', [EmployerController::class, 'redirectToPayment'])->name('membership.payment')->middleware('employer');
        // Route to show the payment gateway page (GET method)
        Route::get('/payment-gateway', [EmployerController::class, 'showPaymentGatewayPage'])->name('membership.payment.gateway')->middleware('employer');


        // Route to handle the payment submission (POST method)
        Route::post('/payment-gateway', [EmployerController::class, 'processPayment'])->name('membership.payment.gateway.process')->middleware('employer');
        Route::post('/membership/process-payment', [EmployerController::class, 'processPayment'])->name('membership.payment.process')->middleware('employer');


        Route::post('/team/store', [EmployerController::class, 'store'])->name('team.store')->middleware('employer');
        Route::delete('/team/{id}', [EmployerController::class, 'destroy'])->name('team.destroy')->middleware('employer');
        Route::put('/team/{id}', [EmployerController::class, 'updateTeam'])->name('team.update')->middleware('employer');


        Route::get('/search', [EmployerController::class, 'search'])->name('team.search')->middleware('employer');


        Route::get('/jobs', [EmployerController::class, 'showPostedJobs'])->name('employer.jobs')->middleware('employer');
        Route::post('/{jobId}/update', [EmployerController::class, 'update'])->name('job.update')->middleware('employer');

        Route::get('/posting', [EmployerController::class, 'showForm'])->name('employer.job.posting')->middleware('employer');
        Route::post('/posting', [EmployerController::class, 'storeJobPosting'])->name('job_posting.store')->middleware('employer');

        Route::get('/team_assesment', [EmployerController::class, 'TeamAssesment'])->name('employer.team.assesment')->middleware('employer');
        Route::get('/applicant_review', [EmployerController::class, 'ApplicantReview'])->name('applicant.review')->middleware('employer');
        // interview routes
        Route::get('/saved-applicant', [EmployerController::class, 'SavedApplicant'])->name('saved.applicant')->middleware('employer');
        Route::get('/first-interview', [EmployerController::class, 'FirstInterview'])->name('first.interview')->middleware('employer');
        Route::post('/first-interview-date', [EmployerController::class, 'FirstInterviewDate'])->name('first.interview.date')->middleware('employer');

        Route::get('/second-interview', [EmployerController::class, 'SecondInterview'])->name('second.interview')->middleware('employer');

        Route::post('/second-interview-date', [EmployerController::class, 'SecondInterviewDate'])->name('second.interview.date')->middleware('employer');


        Route::get('/final-interview', [EmployerController::class, 'FinalInterview'])->name('final.interview')->middleware('employer');

        Route::post('/final-interview-date', [EmployerController::class, 'FinalInterviewDate'])->name('final.interview.date')->middleware('employer');

        Route::post('/offer-letter/{id}', [EmployerController::class, 'offerletter'])->name('offer.letter')->middleware('employer');

        Route::get('/applicant_tracking', [EmployerController::class, 'ApplicantTracking'])->name('applicant.tracking')->middleware('employer');
        Route::get('/talent_search', [EmployerController::class, 'TalentSearch'])->name('talent.search')->middleware('employer');
        Route::get('/trends', [EmployerController::class, 'trends'])->name('employer.trends')->middleware('employer');
        Route::get('/inbox', [EmployerController::class, 'inbox'])->name('employer.inbox')->middleware('employer');

        Route::get('/landing', [EmployerController::class, 'landing'])->name('employer.landing');
        Route::get('/help', [EmployerController::class, 'showHelp'])->name('employer.help'); // Changed the route to '/help'
        Route::get('/employer-pricing', [EmployerController::class, 'showPricing'])->name('employer.pricing');
        Route::get('/demo', [EmployerController::class, 'demo'])->name('employer.demo');
        Route::get('/register', [EmployerController::class, 'register'])->name('employer.register');

        Route::post('/save-applicant', [EmployerController::class, 'SaveApplicant'])->name('employer.save')->middleware('employer');

        Route::post('/unsave-applicant', [EmployerController::class, 'UnSaveApplicant'])->name('employer.unsave')->middleware('employer');

        //pagination in applicant review

        Route::get('/pagination/paginate-data', [EmployerController::class, 'pagination'])->middleware('employer');

        //search in applicant review

        Route::get('/search-applicant', [EmployerController::class, 'searchApplicant'])->name('search.applicant')->middleware('employer');

    });

    // Employer route ends------------


    // candidate route starts-----

    Route::prefix('candidate')->group(function () {
        // Login Form (GET request)
        Route::get('/login/form', [CandidateController::class, 'Index'])->name('candidate_login_form');

        // Login Submission (POST request)
        Route::post('/login', [CandidateController::class, 'Login'])->name('candidate.login');

        // Registration Routes
        Route::get('/register', [CandidateAuthController::class, 'showRegistrationForm'])->name('candidate.register');
        Route::post('/register', [CandidateAuthController::class, 'register'])->name('candidate.register');

        Route::get('/login-assesment', [CandidateAuthController::class, 'loginAssesment'])->name('candidate_login_assesment');


        Route::get('/logout', [CandidateController::class, 'Logout'])->name('candidate.logout')->middleware('candidate');


        Route::get('/dashboard', [CandidateController::class, 'Dashboard'])->name('candidate.dashboard')->middleware('candidate');
        Route::get('/assesment', [CandidateController::class, 'Assesment'])->name('candidate.assesment')->middleware('candidate');
        Route::get('/technical/assesment', [CandidateController::class, 'TechnicalAssesment'])->name('technical.assesment')->middleware('candidate');
        Route::get('/behaviour/assesment', [CandidateController::class, 'BehaviourAssesment'])->name('behaviour.assesment')->middleware('candidate');

        Route::get('/CompassionVsConfidence', [CandidateController::class, 'showCompassionVsConfidence'])->name('CompassionVsConfidence');
        Route::post('/CompassionVsConfidence/submit', [CandidateController::class, 'savet1'])->name('store.CompassionVsConfidence');

        Route::get('/CuriosityVsPracticality', [CandidateController::class, 'showCuriosityVsPracticality'])->name('CuriosityVsPracticality');
        Route::post('/CuriosityVsPracticality/submit', [CandidateController::class, 'savet2'])->name('store.CuriosityVsPracticality');

        Route::get('/DisciplineVsAdaptability', [CandidateController::class, 'showDisciplineVsAdaptability'])->name('DisciplineVsAdaptability');
        Route::post('/DisciplineVsAdaptability/submit', [CandidateController::class, 'savet3'])->name('store.DisciplineVsAdaptability');

        Route::get('/ResilienceVsSensitivity', [CandidateController::class, 'showtResilienceVsSensitivity'])->name('ResilienceVsSensitivity');
        Route::post('/ResilienceVsSensitivity/submit', [CandidateController::class, 'savet4'])->name('store.ResilienceVsSensitivity');

        Route::get('/SocioblityVsReflectiveness', [CandidateController::class, 'showtSociobilityVsReflectiveness'])->name('SociobilityVsReflectiveness');
        Route::post('/SocioblityVsReflectiveness/submit', [CandidateController::class, 'savet5'])->name('store.SociobilityVsReflectiveness');

        // Route for Behavior Assessment (assuming no 'assessmentId' is needed for now)
        // Route::post('/submit-assessment/{assessmentId}', [CandidateController::class, 'submitAssessment'])->name('candidate.submitAssessment')->middleware('candidate');

        // Route::get('/value/assesment', [CandidateController::class, 'ValueAssesment'])->name('value.assesment')->middleware('candidate');

        Route::get('/value/assessment/{page}', [CandidateController::class, 'show'])
        ->where('page', '[0-9]+')->middleware('candidate');
        Route::post('/value/assessment/submit', [CandidateController::class, 'submit'])->middleware('candidate');
        Route::get('/value/assessment/result', [CandidateController::class, 'result'])->name('value.result')->middleware('candidate');

        // Submit Quiz Answers (AJAX Post)
        // Route::post('/submit-quiz', [CandidateController::class, 'store']);

        // // Show Results Page
        // Route::get('/results', [CandidateController::class, 'results']);

        Route::get('/application/tracking', [CandidateController::class, 'ApplicationTracking'])->name('application.tracking')->middleware('candidate');

        // Route::get('/job/{id}', [CandidateController::class, 'showJobDetails'])->name('candidate.showJobDetails')->middleware('candidate');
        // Job Search Page (main page)
        Route::get('/job', [CandidateController::class, 'showAllJobs'])->name('job.search');

        // Job Details Page
        Route::get('/job-details/{jobId}', [CandidateController::class, 'showJobDetails'])->name('job.details');

        Route::get('/inbox', [CandidateController::class, 'inbox'])->name('inbox')->middleware('candidate');
        Route::get('/careerinsight', [CandidateController::class, 'careerinsight'])->name('careerinsight')->middleware('candidate');
        Route::get('/f.a.q', [CandidateController::class, 'faq'])->name('faq')->middleware('candidate');

        Route::get('/landing', [CandidateController::class, 'landing'])->name('candidate.landing');

        Route::get('/help', [CandidateController::class, 'showHelp'])->name('candidate.help'); // Changed the route to '/help'

        Route::get('/jobs', [CandidateController::class, 'jobs'])->name('guest.jobs');
        Route::get('/job/{id}', [CandidateController::class, 'showJobDetails'])->name('guest.job.details');


    });



    // candidate route ends-----



    // admin route starts-----

    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'Index'])->name('admin_login_form');
        Route::post('/login', [AdminController::class, 'Login'])->name('admin.login');
        Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout')->middleware('admin');


        Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

        //employer---
        Route::get('/all-employer', [AdminController::class, 'AllEmployer'])->name('admin.AllEmployer')->middleware('admin');
        Route::get('/all-jobs', [AdminController::class, 'JobSlots'])->name('admin.jobslots')->middleware('admin');
        Route::get('/all-license', [AdminController::class, 'AllLicense'])->name('admin.license')->middleware('admin');
        Route::get('/all-messages', [AdminController::class, 'AllMessage'])->name('admin.allmessage')->middleware('admin');
        Route::get('/all-team-members', [AdminController::class, 'AllTeamMember'])->name('admin.allteam_member')->middleware('admin');
        Route::get('/interview-tracking', [AdminController::class, 'InterviewTracking'])->name('admin.employer_interview_tracking')->middleware('admin');


        //candidate---
        Route::get('/all-candidate', [AdminController::class, 'AllCandidate'])->name('admin.AllCandidate')->middleware('admin');
        Route::get('/candidate-assesment', [AdminController::class, 'CandidateAssesment'])->name('admin.CandidateAssesment')->middleware('admin');
        Route::get('/interview', [AdminController::class, 'CandidateInterview'])->name('admin.candidate_interview')->middleware('admin');

        //assesment--

        Route::get('/assesment-creation', [AdminController::class, 'Assesment'])->name('admin.AssesmentCreation')->middleware('admin');
        // Route::get('/assessment/skills', [AdminController::class, 'skills'])->name('assessment.skills')->middleware('admin');
        // Route::get('/assessment/values', [AdminController::class, 'values'])->name('assessment.values')->middleware('admin');
        // Route::get('/assessment/behaviour', [AdminController::class, 'behaviour'])->name('assessment.behaviour')->middleware('admin');

        Route::post('/assessments/{type}', [AdminController::class, 'storeAssessment'])->name('assessment.store')->middleware('admin');
        Route::get('assessment/{assessmentType}', [AdminController::class, 'showAssessmentForm'])->name('assessment.form')->middleware('admin');

        // Routes for showing specific assessment forms
        Route::get('assessment/behavior', [AdminController::class, 'showAssessmentForm'])->name('assessment.form.behavior')->middleware('admin');
        Route::get('assessment/values', [AdminController::class, 'showAssessmentForm'])->name('assessment.form.values')->middleware('admin');



    });


    // admin route ends-----

});

// Prevent back after logout





//all default routes start-------



Route::get('/', function () {
    return view('welcome');
})->name('landing.page');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
