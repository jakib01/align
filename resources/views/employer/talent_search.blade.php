@extends('master_layout.employer_dashboard_master')
@section('applicant_tracking')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Talent Search</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid p-4" id="main-content">
        <div id="team-page-content" style="display: none;"></div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="applicant-filters">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="job_location">Job Location</label>
                                <select id="job_location" class="form-control">
                                    <option value="">Select Job Location</option>
                                @foreach($locations as $location)
                                        <option value={{ $location->job_location }}>{{ $location->job_location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="salary_range">Salary Range</label>
                                <select id="salary_range" class="form-control">
                                    <option value="">Select Salary Range</option>
                                    @foreach($salaryRanges as $salary_range)
                                        <option value={{ $salary_range->salary_range }}>{{ $salary_range->salary_range }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="seniority_level">Seniority Level</label>
                                <select id="seniority_level" class="form-control">
                                    <option value="">Select Seniority Level</option>
                                    @foreach($seniorityLevels as $seniorityLevel)
                                        <option value={{ $seniorityLevel->seniority_level }}>{{ $seniorityLevel->seniority_level }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="working_pattern">Contract</label>
                                <select id="working_pattern" class="form-control">
                                    <option value="">Select Contract</option>
                                    @foreach($workingPatters as $workingPatter)
                                        <option value={{ $workingPatter->working_pattern }}>{{ $workingPatter->working_pattern }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-2 form-group">
                                <label for="hours">Working Hours</label>
                                <select id="hours" class="form-control">
                                    <option value="">Select Working Hours</option>
                                    @foreach($hours as $hour)
                                        <option value={{ $hour->hours }}>{{ $hour->hours }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="col-md-2 form-group">
                                <label for="industries">Industries</label>
                                <select id="industries" class="form-control">
                                    <option value="">Select Industries</option>
                                    @foreach($industries as $industry)
                                        <option value={{ $industry->industries }}>{{ $industry->industries }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="col-md-2 form-group">
                                <label for="skills">Skills</label>
                                <select id="skills" class="form-control">
                                    <option value="">Select Skills</option>
                                    @foreach($skills as $skill)
                                        <option value={{ $skill->skills }}>{{ $skill->skills }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                        </div>
                    </div>

                    <div class="btn-search text-center mt-3">
                        <button class="btn btn-primary" onclick="searchJobs()">
                            <i class="fas fa-search search-icon"></i> Keyword
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <h1 class="my-4">Candidates</h1>
            <table class="table table-bordered" id="candidates-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Behavioral Assessment</th>
                        <th>Value Assessment</th>
                    </tr>
                </thead>
                <tbody id="candidates-body">
                    @foreach($candidates as $index => $candidate)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $candidate->candidate_name }}</td>
                            <td>{{ $candidate->email }}</td>
                            <td>
                                @if(isset($candidate->behaviour_assesment_score) && isset($candidate->behaviour_assesment_completed_at))
                                    ✅ Completed
                                @else
                                    ❌ Not Completed
                                @endif
                            </td>
                            <td>
                                @if(isset($candidate->value_assessment_score) && isset($candidate->value_assessment_completed_at))
                                    ✅ Completed
                                @else
                                    ❌ Not Completed
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $candidates->links() }}
        </div>
    </div>
</main>

<script>
    function searchJobs() {
        const filters = {
            job_location: $('#job_location').val(),
            salary_range: $('#salary_range').val(),
            seniority_level: $('#seniority_level').val(),
            working_pattern: $('#working_pattern').val(),
            hours: $('#hours').val(),
            industries: $('#industries').val(),
            skills: $('#skills').val()
        };

        $.ajax({
            url: "{{ route('talent.search.candidates') }}",
            type: "GET",
            data: filters,
            beforeSend: function () {
                $('#candidates-body').html('<tr><td colspan="5">Loading...</td></tr>');
            },
            success: function (response) {
                $('#candidates-body').html('');
                if (response.length === 0) {
                    $('#candidates-body').html('<tr><td colspan="5">No candidates found.</td></tr>');
                } else {
                    response.forEach((candidate, index) => {
                        $('#candidates-body').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${candidate.candidate_name}</td>
                                <td>${candidate.email}</td>
                                <td>${candidate.behaviour_assesment_score && candidate.behaviour_assesment_completed_at ? '✅ Completed' : '❌ Not Completed'}</td>
                                <td>${candidate.value_assessment_score && candidate.value_assessment_completed_at ? '✅ Completed' : '❌ Not Completed'}</td>
                            </tr>
                        `);
                    });
                }
            },
            error: function () {
                $('#candidates-body').html('<tr><td colspan="5">Something went wrong. Please try again.</td></tr>');
            }
        });
    }
</script>


@endsection
