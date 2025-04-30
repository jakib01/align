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
                {{-- <select class="form-select" name="seniority_level_id" id="seniority" required> --}}
                {{-- <option value="" disabled selected>Select Job</option>

                <option value="mid">job 2</option>
                <option value="junior">job 1</option>
                <option value="senior">job 3</option>
                <option value="lead">job 4</option>
                <option value="manager">job 5</option> --}}


                </select>
                <br>
                {{-- <button class="btn btn-primary">s</button> --}}

            </div>
            <div class="table-data">
                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Candidate Name</th>
                        <th>Applied Job Title</th>
                        <th>Profile</th>
                        <th>Score</th>
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
                                <button class="btn btn-primary mt-2" onclick="CheckScore(event)">Check Score</button>
                            </td>
                            <td></td>
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
                                <button style="font-size:11.5rem width: 30%" class="btn btn-warning">Message</button>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {!! $applied_job->links() !!}
            </div>
        </div>

        <div class="mb-3">
            <a href="all-applicants.html" class="btn btn-link text-decoration-underline">View All</a>
        </div>

        <!-- Scores Modal -->
        <div id="scores-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header sticky-top bg-light w-100 d-flex justify-content-between align-items-center">
                        <h5 class="modal-title">Assessment Scores</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h5 class="text-center">Behavior Comparison</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="employerBehaviourAssessmentChart" style="max-height: 300px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="candidateBehaviourAssessmentChart" style="max-height: 300px;"></canvas>
                            </div>
                        </div>

                        <h5 class="text-center mt-4">Value Comparison</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="employerValuesAssessmentChart" style="max-height: 300px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="candidateValuesAssessmentChart" style="max-height: 300px;"></canvas>
                            </div>
                        </div>

                        <h5 class="text-center mt-4" id="alignmentScoreText"></h5> <!-- Alignment Score Text -->
                    </div>

                </div>
            </div>
        </div>

    </main>

    <script>

        let employerBehaviourAssessmentRadarChart, candidateBehaviourAssessmentRadarChart, employerValuesAssessmentRadarChart, candidateValuesAssessmentRadarChart;

        function CheckScore(event) {
            const modalElement = document.getElementById('scores-modal');

            if (!modalElement) {
                console.error('Modal element not found!');
                return;
            }

            // If already created modal instance, don't recreate it
            let modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (!modalInstance) {
                modalInstance = new bootstrap.Modal(modalElement);
            }

            modalInstance.show();

            modalElement.addEventListener('shown.bs.modal', function onModalShown() {
                modalElement.removeEventListener('shown.bs.modal', onModalShown);

                setTimeout(() => {
                    renderCharts();
                }, 100); // wait until canvas sizes are ready
            });
        }

        function renderCharts() {

            const employerBehaviourAssessmentData = @json($avgBehaviourAssessmenta);
            const candidateBehaviourAssessmentData = @json($candidateBehaviourAssessment);

            const employerValuesAssessmentData = @json($avgValueAssessment);
            const candidateValueAssessmentData = @json($candidateValueAssessment);

            // Destroy existing charts first if they exist
            if (employerBehaviourAssessmentRadarChart) employerBehaviourAssessmentRadarChart.destroy();
            if (candidateBehaviourAssessmentRadarChart) candidateBehaviourAssessmentRadarChart.destroy();
            if (employerValuesAssessmentRadarChart) employerValuesAssessmentRadarChart.destroy();
            if (candidateValuesAssessmentRadarChart) candidateValuesAssessmentRadarChart.destroy();

            // Behavior Charts
            employerBehaviourAssessmentRadarChart = new Chart(document.getElementById('employerBehaviourAssessmentChart').getContext('2d'), {
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

            candidateBehaviourAssessmentRadarChart = new Chart(document.getElementById('candidateBehaviourAssessmentChart').getContext('2d'), {
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
            employerValuesAssessmentRadarChart = new Chart(document.getElementById('employerValuesAssessmentChart').getContext('2d'), {
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

            candidateValuesAssessmentRadarChart = new Chart(document.getElementById('candidateValuesAssessmentChart').getContext('2d'), {
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

            // Calculate and show Alignment Score
            const alignment = calculateAlignment(employerBehaviourAssessmentData, candidateBehaviourAssessmentData, employerValuesAssessmentData, candidateValueAssessmentData);
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
