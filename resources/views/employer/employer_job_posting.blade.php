@extends('master_layout.employer_dashboard_master')

@section('employer_job_posting')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Job Posting</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('job_posting.store') }}" method="post">
        @csrf

        <!-- Employer Name -->
        <div class="mb-3">
            <label for="employerName" class="form-label">Employer Name</label>
            <input type="text" name="employer_name" class="form-control" required placeholder="Enter Employer Name">
        </div>

        <!-- Company Name -->
        <div class="mb-3">
            <label for="companyName" class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" required placeholder="Enter Company Name">
        </div>

        <!-- Job Title -->
        <div class="mb-3">
            <label for="jobTitle" class="form-label">Job Title</label>
            <input type="text" name="job_title" class="form-control" required placeholder="Enter Job Title">
        </div>

        <!-- Salary Range -->
        <div class="mb-3">
            <label for="salary" class="form-label">Salary Range</label>
            <select name="salary_range" class="form-select">
                <option value="" disabled selected>Select Salary Range</option>
                <option value="Below $50k">Below $50k</option>
                <option value="$50k-$100k">$50k-$100k</option>
                <option value="$100k-$150k">$100k-$150k</option>
                <option value="$150k+">$150k+</option>
            </select>
        </div>

        <!-- Seniority Level -->
        <div class="mb-3">
            <label for="seniority" class="form-label">Seniority Level</label>
            <select name="seniority_level" class="form-select" required>
                <option value="" disabled selected>Select Seniority Level</option>
                <option value="Junior">Junior</option>
                <option value="Mid">Mid</option>
                <option value="Senior">Senior</option>
                <option value="Lead">Lead</option>
            </select>
        </div>

        <!-- Job Location -->
        <div class="mb-3">
            <label for="jobLocation" class="form-label">Job Location</label>
            <input type="text" name="job_location" class="form-control" placeholder="Enter Job Location">
        </div>

        <!-- Working Pattern -->
        <div class="mb-3">
            <label for="workingPattern" class="form-label">Working Pattern</label>
            <select name="working_pattern" class="form-select">
                <option value="" disabled selected>Select Working Pattern</option>
                <option value="Remote">Remote</option>
                <option value="Hybrid">Hybrid</option>
                <option value="On-site">On-site</option>
            </select>
        </div>

        <!-- Industry -->
        <div class="mb-3">
            <label for="industry" class="form-label">Industry</label>
            <select name="industry" class="form-select">
                <option value="" disabled selected>Select Industry</option>
                <option value="Technology">Technology</option>
                <option value="Finance">Finance</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Education">Education</option>
                <option value="Retail">Retail</option>
                <!-- Add more industries as needed -->
            </select>
        </div>

        <!-- Visa Sponsorship -->
        <div class="mb-3">
            <label for="visaSponsorship" class="form-label">Visa Sponsorship</label>
            <select name="visa_sponsorship" class="form-select">
                <option value="" disabled selected>Select Visa Sponsorship</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <!-- Skills (Multiple Select) -->
        <div class="mb-3">
            <label for="skills" class="form-label">Skills</label>
            <select name="skills[]" class="form-select" multiple>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Python">Python</option>
                <option value="Java">Java</option>
                <option value="HTML/CSS">HTML/CSS</option>
                <!-- Add more skills as needed -->
            </select>
            <small class="form-text text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple skills.</small>
        </div>

        <!-- Job Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea name="description" class="form-control" required placeholder="Enter Job Description"></textarea>
        </div>

        <!-- Requirements -->
        <div class="mb-3">
            <label for="requirements" class="form-label">Requirements</label>
            <textarea name="requirements" class="form-control" placeholder="Enter Job Requirements"></textarea>
        </div>

        <!-- Benefits -->
        <div class="mb-3">
            <label for="benefits" class="form-label">Benefits</label>
            <textarea name="benefits" class="form-control" placeholder="Enter Job Benefits"></textarea>
        </div>

        <div class="mb-4">
            <label for="application_deadline" class="form-label">Application Deadline</label>
            <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Post Job</button>
    </form>
</main>

@endsection