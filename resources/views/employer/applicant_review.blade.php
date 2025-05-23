@extends('master_layout.employer_dashboard_master')
@section('applicant_review')

    <style>
        .small-dropdown {
            width: 100px;
            padding: 5px;
            font-size: 12px;
        }

        .filter-row {
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .btn-search {
            margin-top: 1rem;
        }

        .applicant-section {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .post-job-link {
            margin-bottom: 1rem;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        .applicant-name {
            display: flex;
            align-items: center;
        }

        .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(71, 69, 69);
            display: block;
            object-fit: cover;
        }
    </style>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Applicant Review</h1>
            <h1 class="my-4">All Candidate</h1>

            <div class="col-md-4 mb-3">
                <label for="seniority" class="form-label">Search</label>
                <br>
                <input type="text" name="search" id="search" class="form-control"
                       placeholder="Search job title/applicant name"/>

            </div>
            <div class="table-data">
                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Candidate Name</th>
                        <th>Applied Job Title</th>
                        <th>Score</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {{-- <tbody id="applicantTableBody"> --}}
                    <tbody>
                    @foreach($applied_job as $key => $row)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$row->candidate_name}}</td>
                            <td>{{$row->job_title}}</td>
                            <td>
                                <button class="btn btn-primary mt-2"
                                        onclick="openAssessmentModal({{ $row->candidate_id }})">Check Score
                                </button>
                            </td>
                            <td>
                                <button
                                    class="btn btn-primary mt-2 profile-button"
                                    data-id="{{ $row->candidate_id }}">
                                    Profile
                                </button>
                            </td>
                            <td>

                                <button @php
                                            if ($row->save_applicant == 1) {
                                        @endphp disabled @php
                                            }
                                        @endphp
                                        style="font-size:11.5rem width: 30%" data-id="{{$row->job_post_id}}"
                                        class="save-button btn btn-secondary send-id">save
                                </button>

                                <button @php
                                            if ($row->save_applicant == null) {
                                        @endphp disabled @php
                                            }
                                        @endphp
                                        style="font-size:11.5rem width: 30%" data-id="{{$row->job_post_id}}"
                                        class="unsave-button btn btn-secondary send-id">unsave
                                </button>
{{--                                <button style="font-size:11.5rem width: 30%" class="btn btn-warning">Message</button>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {!! $applied_job->links() !!}
            </div>
        </div>

        <div class="mb-3">
            {{--            <a href="all-applicants.html" class="btn btn-link text-decoration-underline">View All</a>--}}
        </div>

        <!-- Scores Modal -->
        <div id="scores-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">

                    <div
                        class="modal-header sticky-top bg-light w-100 d-flex justify-content-between align-items-center">
                        <h5 class="modal-title">Assessment Scores</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h5 class="text-center">Behavior Comparison</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="chartEmployerBehavior" style="max-height: 300px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="chartCandidateBehavior" style="max-height: 300px;"></canvas>
                            </div>
                        </div>

                        <h5 class="text-center mt-4">Value Comparison</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="chartEmployerValues" style="max-height: 300px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="chartCandidateValues" style="max-height: 300px;"></canvas>
                            </div>
                        </div>

                        <h5 class="text-center mt-4" id="alignmentScoreText"></h5> <!-- Alignment Score Text -->
                    </div>

                </div>
            </div>
        </div>

        <!-- Profile Modal -->
        <div id="profile-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header sticky-top bg-light d-flex justify-content-between align-items-center">
                        <h5 class="modal-title">Candidate Profile Assessment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Candidate Info -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-2 text-center">
                                <img id="candidatePhoto" src="" alt="Profile Photo" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <div class="col-md-10">
                                <h5 id="candidateName" class="mb-1"></h5>
                                <p id="candidateEmail" class="mb-1"></p>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Location:</strong> <span id="candidateLocation"></span></li>
                                    <li><strong>Seniority:</strong> <span id="candidateSeniority"></span></li>
                                    <li><strong>Salary:</strong> <span id="candidateSalary"></span></li>
                                    <li><strong>Contract:</strong> <span id="candidateContract"></span></li>
                                    <li><strong>Sponsorship:</strong> <span id="candidateSponsorship"></span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-center">Behavior Assessment</h6>
                                <canvas id="chartCandidateBehaviorOnly" style="max-height:300px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-center">Value Assessment</h6>
                                <canvas id="chartCandidateValuesOnly" style="max-height:300px;"></canvas>
                            </div>
                        </div>

                    </div>


                    {{--                    <div class="modal-body">--}}
{{--                        <h5 class="text-center">Behavior Assessment</h5>--}}
{{--                        <canvas id="chartCandidateBehaviorOnly" style="max-height:300px;"></canvas>--}}

{{--                        <h5 class="text-center mt-4">Value Assessment</h5>--}}
{{--                        <canvas id="chartCandidateValuesOnly" style="max-height:300px;"></canvas>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>


    </main>

    <script>

        let chartEmployerBehavior, chartCandidateBehavior, chartEmployerValues, chartCandidateValues;

        function openAssessmentModal(candidate_id) {
            const modalElement = document.getElementById('scores-modal');

            if (!modalElement) {
                console.error('Modal element not found!');
                return;
            }

            let modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (!modalInstance) {
                modalInstance = new bootstrap.Modal(modalElement);
            }

            // Fetch dynamic data before showing modal
            $.ajax({
                url: "/employer/api/get-assessment", // <-- adjust the route if needed
                method: "GET",
                data: {candidate_id: candidate_id},
                success: function (response) {
                    const {
                        employerBehaviorAssessment,
                        employerValueAssessment,
                        candidateBehaviorAssessment,
                        candidateValueAssessment
                    } = response;

                    modalInstance.show();

                    modalElement.addEventListener('shown.bs.modal', function onModalShown() {
                        modalElement.removeEventListener('shown.bs.modal', onModalShown);
                        setTimeout(() => {
                            renderCharts(
                                employerBehaviorAssessment,
                                candidateBehaviorAssessment,
                                employerValueAssessment,
                                candidateValueAssessment
                            );
                        }, 100);
                    });

                },
                error: function (xhr) {
                    console.error('Failed to load assessment data:', xhr.responseText);
                }
            });
        }

        function renderCharts(employerBehaviourAssessmentData, candidateBehaviourAssessmentData, employerValuesAssessmentData, candidateValueAssessmentData) {
            if (chartEmployerBehavior) chartEmployerBehavior.destroy();
            if (chartCandidateBehavior) chartCandidateBehavior.destroy();
            if (chartEmployerValues) chartEmployerValues.destroy();
            if (chartCandidateValues) chartCandidateValues.destroy();

            // Behavior Charts
            chartEmployerBehavior = new Chart(document.getElementById('chartEmployerBehavior').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: Object.keys(employerBehaviourAssessmentData),
                    datasets: [{
                        label: 'Employee Behavior',
                        data: Object.values(employerBehaviourAssessmentData),
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)'
                    }]
                }
            });

            chartCandidateBehavior = new Chart(document.getElementById('chartCandidateBehavior').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: Object.keys(candidateBehaviourAssessmentData),
                    datasets: [{
                        label: 'Candidate Behavior',
                        data: Object.values(candidateBehaviourAssessmentData),
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)'
                    }]
                }
            });

            // Value Charts
            chartEmployerValues = new Chart(document.getElementById('chartEmployerValues').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: Object.keys(employerValuesAssessmentData),
                    datasets: [{
                        label: 'Employee Values',
                        data: Object.values(employerValuesAssessmentData),
                        fill: true,
                        backgroundColor: 'rgba(133, 250, 240, 0.2)',
                        borderColor: 'rgb(68, 242, 248)'
                    }]
                }
            });

            chartCandidateValues = new Chart(document.getElementById('chartCandidateValues').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: Object.keys(candidateValueAssessmentData),
                    datasets: [{
                        label: 'Candidate Values',
                        data: Object.values(candidateValueAssessmentData),
                        fill: true,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgb(255, 206, 86)'
                    }]
                }
            });

            const alignment = calculateAlignment(
                employerBehaviourAssessmentData,
                candidateBehaviourAssessmentData,
                employerValuesAssessmentData,
                candidateValueAssessmentData
            );
            document.getElementById('alignmentScoreText').innerText = `Alignment Score: ${alignment}%`;
        }


        function calculateAlignment(scores1a, scores1b, scores2a, scores2b) {
            let total = 0;
            let count = 0;

            for (const key in scores1a) {
                total += 100 - Math.abs(scores1a[key] - scores1b[key]);
                count++;
            }

            for (const key in scores2a) {
                total += 100 - Math.abs(scores2a[key] - scores2b[key]);
                count++;
            }

            return Math.round(total / count);
        }
    </script>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        let chartCandidateBehaviorOnly, chartCandidateValuesOnly;

        // Click handler for Profile buttons
        $(document).on('click', '.profile-button', function() {
            const candidate_id = $(this).data('id');
            openProfileModal(candidate_id);
        });

        function openProfileModal(candidate_id) {
            const modalEl = document.getElementById('profile-modal');
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);

            // Fetch only candidate assessments
            $.ajax({
                url: '/employer/api/get-candidate-assessment',
                method: 'GET',
                data: { candidate_id },
                success: function(response) {
                    const { candidateBehaviorAssessment, candidateValueAssessment, candidateData } = response;

                    // Inject candidate info
                    $('#candidateName').text(candidateData.candidate_name);
                    $('#candidateEmail').text(candidateData.email);
                    $('#candidatePhoto').attr('src', candidateData.profile_photo || '/default-avatar.png');

                    $('#candidateLocation').text(candidateData.job_preferences.location || '-');
                    $('#candidateSeniority').text(candidateData.job_preferences.seniority || '-');
                    $('#candidateSalary').text(candidateData.job_preferences.salary || '-');
                    $('#candidateContract').text(candidateData.job_preferences.contract || '-');
                    $('#candidateSponsorship').text(candidateData.job_preferences.sponsorship_required || '-');

                    modal.show();

                    // Wait for modal to be fully visible before drawing
                    modalEl.addEventListener('shown.bs.modal', function handler() {
                        modalEl.removeEventListener('shown.bs.modal', handler);
                        renderCandidateCharts(candidateBehaviorAssessment, candidateValueAssessment);
                    });
                },
                error: function(xhr) {
                    console.error('Failed to load candidate assessment:', xhr.responseText);
                }
            });
        }

        function renderCandidateCharts(behaviorData, valueData) {
            // Destroy previous instances
            if (chartCandidateBehaviorOnly)  chartCandidateBehaviorOnly.destroy();
            if (chartCandidateValuesOnly)    chartCandidateValuesOnly.destroy();

            // Behavior
            chartCandidateBehaviorOnly = new Chart(
                document.getElementById('chartCandidateBehaviorOnly').getContext('2d'),
                {
                    type: 'radar',
                    data: {
                        labels: Object.keys(behaviorData),
                        datasets: [{
                            label: 'Candidate Behavior',
                            data: Object.values(behaviorData),
                            fill: true,
                            backgroundColor: 'rgba(54,162,235,0.2)',
                            borderColor: 'rgb(54,162,235)'
                        }]
                    }
                }
            );

            // Values
            chartCandidateValuesOnly = new Chart(
                document.getElementById('chartCandidateValuesOnly').getContext('2d'),
                {
                    type: 'radar',
                    data: {
                        labels: Object.keys(valueData),
                        datasets: [{
                            label: 'Candidate Values',
                            data: Object.values(valueData),
                            fill: true,
                            backgroundColor: 'rgba(255,206,86,0.2)',
                            borderColor: 'rgb(255,206,86)'
                        }]
                    }
                }
            );
        }
    </script>

    <script>



        //pagination

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];

            applicant(page);

        })

        function applicant(page) {
            $.ajax({
                url: "pagination/paginate-data?page=" + page,
                success: function (res) {
                    $('.table-data').html(res);
                }
            })
        }

    </script>


    <script>

        //Search applicant

        $(document).on('keyup', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();

            $.ajax({
                url: "{{route('search.applicant')}}",
                method: 'GET',
                data: {search_string: search_string},
                success: function (res) {
                    $('.table-data').html(res);
                    if (res.status == 'nothing_found') {
                        $('.table-data').html('<span class="text-danger">' + 'nothing found' + '</span>');
                    }
                }
            });
        });

    </script>


    {{-- save applicant --}}

    <script>
        $(document).on('click', '.save-button', '.send-id', function () {
            var id = $(this).data('id'); // Get the id from the button

            // console.log(id);

            $.ajax({
                url: "{{route('employer.save')}}", // Replace with your route
                method: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function (response) {
                    console.log('Success:', response);
                    location.reload();
                    // Handle success response
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    // Handle error response
                }
            });


        });
    </script>

    {{-- unsave applicant --}}

    <script>
        $(document).on('click', '.unsave-button', '.send-id', function () {
            var id = $(this).data('id'); // Get the id from the button

            // console.log(id);

            $.ajax({
                url: "{{route('employer.unsave')}}", // Replace with your route
                method: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function (response) {
                    console.log('Success:', response);
                    location.reload();
                    // Handle success response
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    // Handle error response
                }
            });


        });
    </script>

@endsection
