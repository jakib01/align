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
                placeholder="Search job title/applicant name" />
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
                        <th>Canidate Name</th>
                        <th>Applied Job Title</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Skill 3</th>
                        <th>Behaviour</th>
                        <th>Values </th>
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
                        <td>sdf</td>
                        <td>sdf</td>
                        <td>sdf</td>
                        <td>{{$row->skill_assesment_score}}</td>
                        <td>{{$row->value_assessment_score}}</td>
                        <td>

                            <button @php
    if ($row->save_applicant == 1) {
                            @endphp disabled @php
                                }
                            @endphp
                                style="font-size:11.5rem width: 30%" data-id="{{$row->job_post_id}}"
                                class="save-button btn btn-secondary send-id">save</button>

                            <button @php
    if ($row->save_applicant == null) {
                            @endphp disabled @php
                                }
                            @endphp
                                style="font-size:11.5rem width: 30%" data-id="{{$row->job_post_id}}"
                                class="unsave-button btn btn-secondary send-id">unsave</button>
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
</main>
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
            data: { search_string: search_string },
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