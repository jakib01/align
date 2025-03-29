@extends('master_layout.candidate_dashboard_master')

@section('job_details')

<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ $job->employer->company_logo  }}" alt="Company Logo"
                            class="img-fluid rounded-circle me-3" style="max-width: 50px;">
                        <div>
                            <h4>{{ $job->title }}</h4>
                            <small>Posted by {{ $job->company_name }}</small>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-success" type="button">Apply</button>
                        <button class="btn btn-secondary ms-2" type="button">Save</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row g-2 my-2">
                        <div class="col-md-6">
                            <p><strong>Location:</strong> {{ $job->job_location }}</p>
                            <p><strong>Salary:</strong> {{ $job->salary_range }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Seniority Level:</strong> {{ $job->seniority_level }}</p>
                            <p><strong>Working Pattern:</strong> {{ $job->working_pattern }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h5>Description:</h5>
                        <p>{{ $job->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h5>Requirements:</h5>
                        <p>{{ $job->requirements }}</p>
                    </div>

                    <div class="mb-4">
                        <h5>Benefits:</h5>
                        <p>{{ $job->benefits }}</p>
                    </div>

                    <div class="mb-4">
                        <h5>About Us:</h5>
                        <p>{{ $job->employer->about_us }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Application Deadline:</strong> {{ $job->application_deadline }}</p>
                        <p><strong>Visa Sponsorship:</strong> {{ $job->visa_sponsorship }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@endsection