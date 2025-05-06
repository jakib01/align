@extends('master_layout.employer_dashboard_master')

@section('employer_jobs')

    <main id="main" class="main ">
        <div class="container ">
            <div class="d-flex justify-content-end align-items-center mb-4">
                <!-- Display Available Job Slots -->
                <h5 class="text-muted mb-0 me-4">Available Job Slots: <span
                        class="font-weight-bold text-success">{{ $jobSlots ?? '0' }}</span></h5>
                <!-- Post a Job Button -->
                <div class="me-4">
                    <a href="{{ route('employer.job.posting') }}"
                       class="btn btn-success btn-lg rounded-pill shadow-lg transition-all hover:scale-105">
                        <i class="fas fa-plus-circle"></i> Post a Job
                    </a>
                </div>
            </div>
        </div>

        @if($jobs->isEmpty())
            <p class="text-center text-muted">You haven't posted any jobs yet. <a
                    href="{{ route('employer.job.posting') }}"
                    class="text-primary">Create a new job</a></p>
        @else
            <div class="row gy-4">
                @foreach($jobs as $job)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div
                            class="card shadow-xl border-0 rounded-lg bg-light transition-transform hover:scale-105 hover:shadow-2xl h-100">
                            <div class="card-body p-3">
                                <!-- Job Title -->
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title font-weight-bold mb-0">{{ $job->title }}</h5>
                                </div>
                                <!-- Job Description -->
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="card-text text-muted mb-0">{{ Str::limit($job->description, 120) }}</p>
                                </div>
                                <!-- Location and Deadline -->
                                <div class="d-flex justify-content-between w-100 mb-3">
                                    <p class="card-text text-muted mb-0">
                                        <strong>Location:</strong> {{ $job->job_location }}</p>
                                </div>
                                <div class="d-flex justify-content-between w-100 mb-3">
                                    <p class="card-text text-muted mb-0">
                                        <strong>Deadline:</strong> {{ $job->application_deadline }}</p>
                                </div>
                                <!-- Edit and View Buttons -->
                                <div class="d-flex justify-content-end mt-auto">
                                    <!-- Edit Button -->
                                    <button class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#editJobModal{{ $job->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- View Button -->
                                    <button class="btn btn-outline-secondary rounded-pill ms-2" data-bs-toggle="modal"
                                            data-bs-target="#viewJobModal{{ $job->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Job Modal -->
                    <div class="modal fade" id="editJobModal{{ $job->id }}" tabindex="-1"
                         aria-labelledby="editJobModalLabel{{ $job->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content shadow-lg border-0 rounded-lg">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="editJobModalLabel{{ $job->id }}">Edit
                                        Job: {{ $job->title }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('job.update', ['jobId' => $job->id]) }}">
                                        @csrf
                                        @method('POST')

                                        <!-- Job Title -->
                                        <div class="mb-3">
                                            <label for="title{{ $job->id }}" class="form-label">Job Title</label>
                                            <input type="text" class="form-control" id="title{{ $job->id }}"
                                                   name="title"
                                                   value="{{ $job->title }}" required>
                                        </div>

                                        <!-- Salary Range -->
                                        <div class="mb-3">
                                            <label for="salary_range{{ $job->id }}" class="form-label">Salary
                                                Range</label>
                                            <select name="salary_range" class="form-select"
                                                    id="salary_range{{ $job->id }}">
                                                <option
                                                    value="Below $50k" {{ $job->salary_range == 'Below $50k' ? 'selected' : '' }}>
                                                    Below $50k
                                                </option>
                                                <option
                                                    value="$50k-$100k" {{ $job->salary_range == '$50k-$100k' ? 'selected' : '' }}>
                                                    $50k-$100k
                                                </option>
                                                <option
                                                    value="$100k-$150k" {{ $job->salary_range == '$100k-$150k' ? 'selected' : '' }}>
                                                    $100k-$150k
                                                </option>
                                                <option
                                                    value="$150k+" {{ $job->salary_range == '$150k+' ? 'selected' : '' }}>
                                                    $150k+
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Seniority Level -->
                                        <div class="mb-3">
                                            <label for="seniority_level{{ $job->id }}" class="form-label">Seniority
                                                Level</label>
                                            <select name="seniority_level" class="form-select"
                                                    id="seniority_level{{ $job->id }}" required>
                                                <option
                                                    value="Junior" {{ $job->seniority_level == 'Junior' ? 'selected' : '' }}>
                                                    Junior
                                                </option>
                                                <option
                                                    value="Mid" {{ $job->seniority_level == 'Mid' ? 'selected' : '' }}>
                                                    Mid
                                                </option>
                                                <option
                                                    value="Senior" {{ $job->seniority_level == 'Senior' ? 'selected' : '' }}>
                                                    Senior
                                                </option>
                                                <option
                                                    value="Lead" {{ $job->seniority_level == 'Lead' ? 'selected' : '' }}>
                                                    Lead
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Job Location -->
                                        <div class="mb-3">
                                            <label for="job_location{{ $job->id }}" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="job_location{{ $job->id }}"
                                                   name="job_location" value="{{ $job->job_location }}" required>
                                        </div>

                                        <!-- Working Pattern -->
                                        <div class="mb-3">
                                            <label for="working_pattern{{ $job->id }}" class="form-label">Working
                                                Pattern</label>
                                            <select name="working_pattern" class="form-select"
                                                    id="working_pattern{{ $job->id }}">
                                                <option
                                                    value="Remote" {{ $job->working_pattern == 'Remote' ? 'selected' : '' }}>
                                                    Remote
                                                </option>
                                                <option
                                                    value="Hybrid" {{ $job->working_pattern == 'Hybrid' ? 'selected' : '' }}>
                                                    Hybrid
                                                </option>
                                                <option
                                                    value="On-site" {{ $job->working_pattern == 'On-site' ? 'selected' : '' }}>
                                                    On-site
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Industry -->
                                        <div class="mb-3">
                                            <label for="industry{{ $job->id }}" class="form-label">Industry</label>
                                            <select name="industry" class="form-select" id="industry{{ $job->id }}">
                                                <option
                                                    value="Technology" {{ $job->industry == 'Technology' ? 'selected' : '' }}>
                                                    Technology
                                                </option>
                                                <option
                                                    value="Finance" {{ $job->industry == 'Finance' ? 'selected' : '' }}>
                                                    Finance
                                                </option>
                                                <option
                                                    value="Healthcare" {{ $job->industry == 'Healthcare' ? 'selected' : '' }}>
                                                    Healthcare
                                                </option>
                                                <option
                                                    value="Education" {{ $job->industry == 'Education' ? 'selected' : '' }}>
                                                    Education
                                                </option>
                                                <option
                                                    value="Retail" {{ $job->industry == 'Retail' ? 'selected' : '' }}>
                                                    Retail
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Visa Sponsorship -->
                                        <div class="mb-3">
                                            <label for="visa_sponsorship{{ $job->id }}" class="form-label">Visa
                                                Sponsorship</label>
                                            <select name="visa_sponsorship" class="form-select"
                                                    id="visa_sponsorship{{ $job->id }}">
                                                <option
                                                    value="Yes" {{ $job->visa_sponsorship == 'Yes' ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option
                                                    value="No" {{ $job->visa_sponsorship == 'No' ? 'selected' : '' }}>No
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Skills (Multiple Select) -->
                                        <div class="mb-3">
                                            <label for="skills{{ $job->id }}" class="form-label">Skills</label>
                                            <select name="skills[]" class="form-select" id="skills{{ $job->id }}"
                                                    multiple>
                                                <option
                                                    value="JavaScript" {{ is_array($job->skills) && in_array('JavaScript', $job->skills) ? 'selected' : '' }}>
                                                    JavaScript
                                                </option>
                                                <option
                                                    value="PHP" {{ is_array($job->skills) && in_array('PHP', $job->skills) ? 'selected' : '' }}>
                                                    PHP
                                                </option>
                                                <option
                                                    value="Python" {{ is_array($job->skills) && in_array('Python', $job->skills) ? 'selected' : '' }}>
                                                    Python
                                                </option>
                                                <option
                                                    value="Java" {{ is_array($job->skills) && in_array('Java', $job->skills) ? 'selected' : '' }}>
                                                    Java
                                                </option>
                                                <option
                                                    value="HTML/CSS" {{ is_array($job->skills) && in_array('HTML/CSS', $job->skills) ? 'selected' : '' }}>
                                                    HTML/CSS
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Job Description -->
                                        <div class="mb-3">
                                            <label for="description{{ $job->id }}" class="form-label">Job
                                                Description</label>
                                            <textarea name="description" class="form-control"
                                                      id="description{{ $job->id }}"
                                                      required>{{ $job->description }}</textarea>
                                        </div>

                                        <!-- Requirements -->
                                        <div class="mb-3">
                                            <label for="requirements{{ $job->id }}"
                                                   class="form-label">Requirements</label>
                                            <textarea name="requirements" class="form-control"
                                                      id="requirements{{ $job->id }}">{{ $job->requirements }}</textarea>
                                        </div>

                                        <!-- Benefits -->
                                        <div class="mb-3">
                                            <label for="benefits{{ $job->id }}" class="form-label">Benefits</label>
                                            <textarea name="benefits" class="form-control"
                                                      id="benefits{{ $job->id }}">{{ $job->benefits }}</textarea>
                                        </div>

                                        <!-- Application Deadline -->
                                        <div class="mb-3">
                                            <label for="application_deadline{{ $job->id }}" class="form-label">Application
                                                Deadline</label>
                                            <input type="date" class="form-control"
                                                   id="application_deadline{{ $job->id }}"
                                                   name="application_deadline" value="{{ $job->application_deadline }}"
                                                   required>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Job Modal -->
                    <div class="modal fade" id="viewJobModal{{ $job->id }}" tabindex="-1"
                         aria-labelledby="viewJobModalLabel{{ $job->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content shadow border-0 rounded-lg">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="viewJobModalLabel{{ $job->id }}">
                                        Job Details: {{ $job->title }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Title:</strong> {{ $job->title }}</p>
                                    <p><strong>Description:</strong> {{ $job->description }}</p>
                                    <p><strong>Location:</strong> {{ $job->job_location }}</p>
                                    <p><strong>Salary Range:</strong> {{ $job->salary_range }}</p>
                                    <p><strong>Seniority Level:</strong> {{ $job->seniority_level }}</p>
                                    <p><strong>Working Pattern:</strong> {{ $job->working_pattern }}</p>
                                    <p><strong>Industry:</strong> {{ $job->industry }}</p>
                                    <p><strong>Visa Sponsorship:</strong> {{ $job->visa_sponsorship }}</p>
                                    <p><strong>Skills:</strong>
                                        {{ is_array($job->skills) ? implode(', ', $job->skills) : $job->skills }}
                                    </p>
                                    <p><strong>Requirements:</strong> {{ $job->requirements }}</p>
                                    <p><strong>Benefits:</strong> {{ $job->benefits }}</p>
                                    <p><strong>Application Deadline:</strong> {{ $job->application_deadline }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif
    </main>

@endsection
