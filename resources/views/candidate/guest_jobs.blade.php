@extends('master_layout.candidate_master')
@section('guest_jobs')

<style>
    /* Ensure that the container has full viewport height and full width */
    .container {
        padding-top: 20px;
        background: #97fff6;
        min-height: 100vh;
        width: 100%;
        /* Ensure full width */
        padding-left: 0;
        /* Remove padding from the left */
        padding-right: 0;
        /* Remove padding from the right */
    }

    /* Make all cards have the same height and position the button at the bottom */
    .card {
        height: 100%;
        max-height: 450px;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    /* Ensure 'View Details' button is always at the bottom of the card */
    .btn-view-details {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 10px;
    }

    /* Carousel Styling for Small Screens */
    .carousel-inner {
        display: flex;
    }

    .carousel-item {
        flex: 0 0 auto;
        width: 100%;
        transition: transform 0.5s ease;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: black;
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 10;
    }

    /* Ensure carousel items fill the container on larger screens */
    .carousel-item {
        width: 100%;
    }

    .col-md-3 {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>

<div class="container">
    <!-- Heading for Latest Jobs -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold">Latest Jobs</h2>
        </div>
    </div>

    <!-- Job Listings Carousel (Visible on medium and large screens) -->
    <div id="jobCarousel" class="carousel slide d-none d-md-block" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach(array_chunk($jobs->all(), 3) as $index => $jobChunk)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach($jobChunk as $job)
                            <div class="col-md-3 mb-3 d-flex justify-content-center">
                                <div class="card h-100 d-flex flex-column">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex justify-content-between align-items-center mb-1 mt-3">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $job->company_logo ?: 'https://via.placeholder.com/100' }}" alt=""
                                                    class="img-fluid"
                                                    style="width: 20px; height: auto; object-fit: cover; border-radius: 5px;" />
                                                <h6 class="ms-2 mb-0">{{ $job->company_name }}</h6>
                                            </div>
                                        </div>
                                        <h5 class="card-title mt-2 mb-2">{{ $job->title }}</h5>
                                        <p class="card-text text-muted mb-0">
                                            <i class="bi bi-geo-alt"></i>
                                            <span class="location-text">{{ $job->job_location }}</span>
                                            <span class="mx-1">|</span>
                                            <span>Remote</span>
                                        </p>
                                        <p class="card-text text-muted mb-0 mt-1">
                                            <i class="bi bi-cash"></i>
                                            <span class="salary-text">{{ $job->salary }}</span>
                                        </p>
                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                            <span class="badge bg-light-blue text-dark d-flex align-items-center me-2">
                                                <i class="bi bi-star me-1"></i>
                                                <span class="experience-text text-muted">{{ $job->experience_level }}</span>
                                            </span>
                                            <span class="me-1">|</span>
                                            <span class="badge bg-light-blue text-dark d-flex align-items-center me-1">
                                                <i class="bi bi-briefcase me-1"></i>
                                                <span class="job-type-text text-muted">{{ $job->job_type }}</span>
                                            </span>
                                        </div>
                                        <p class="card-text mt-3 mb-1">
                                            <span class="description-text"
                                                id="description{{ $job->id }}">{{ Str::limit($job->description, 100) }}</span>
                                            <span id="read-more{{ $job->id }}" class="text-primary"
                                                style="cursor: pointer; display: none"
                                                onclick="showFullDescription('description{{ $job->id }}', 'read-more{{ $job->id }}', '{{ $job->title }}', '{{ $job->description }}')">
                                                Read more</span>
                                        </p>

                                        <!-- Skills Section in Card -->
                                        <div class="mt-2">
                                            <h6>Skills Required:</h6>
                                            <ul class="list-inline">
                                                @foreach(explode(',', $job->skills) as $skill)
                                                    <li class="list-inline-item badge bg-secondary">{{ trim($skill) }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <!-- Redirect to login if the user is not logged in -->
                                            <a href="{{ route('candidate_login_form') }}"" class=" btn text-white
                                                btn-view-details" style="background:#7c8bff;">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#jobCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#jobCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Job Listings in Column for Small Screens (Visible on small screens) -->
    <div class="d-block d-md-none">
        <div class="row mx-2">
            @foreach($jobs as $job)
                <div class="col-12 mb-3 ">
                    <div class="card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-1 mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $job->company_logo ?: 'https://via.placeholder.com/100' }}" alt=""
                                        class="img-fluid"
                                        style="width: 20px; height: auto; object-fit: cover; border-radius: 5px;" />
                                    <h6 class="ms-2 mb-0">{{ $job->company_name }}</h6>
                                </div>
                            </div>
                            <h5 class="card-title mt-2 mb-2">{{ $job->title }}</h5>
                            <p class="card-text text-muted mb-0">
                                <i class="bi bi-geo-alt"></i>
                                <span class="location-text">{{ $job->job_location }}</span>
                                <span class="mx-1">|</span>
                                <span>Remote</span>
                            </p>
                            <p class="card-text text-muted mb-0 mt-1">
                                <i class="bi bi-cash"></i>
                                <span class="salary-text">{{ $job->salary }}</span>
                            </p>
                            <div class="d-flex justify-content-start align-items-center mt-1">
                                <span class="badge bg-light-blue text-dark d-flex align-items-center me-2">
                                    <i class="bi bi-star me-1"></i>
                                    <span class="experience-text text-muted">{{ $job->experience_level }}</span>
                                </span>
                                <span class="me-1">|</span>
                                <span class="badge bg-light-blue text-dark d-flex align-items-center me-1">
                                    <i class="bi bi-briefcase me-1"></i>
                                    <span class="job-type-text text-muted">{{ $job->job_type }}</span>
                                </span>
                            </div>
                            <p class="card-text mt-3 mb-1">
                                <span class="description-text"
                                    id="description{{ $job->id }}">{{ Str::limit($job->description, 100) }}</span>
                                <span id="read-more{{ $job->id }}" class="text-primary"
                                    style="cursor: pointer; display: none"
                                    onclick="showFullDescription('description{{ $job->id }}', 'read-more{{ $job->id }}', '{{ $job->title }}', '{{ $job->description }}')">
                                    Read more</span>
                            </p>

                            <!-- Skills Section in Card -->
                            <div class="mt-2">
                                <h6>Skills Required:</h6>
                                <ul class="list-inline">
                                    @foreach(explode(',', $job->skills) as $skill)
                                        <li class="list-inline-item badge bg-secondary">{{ trim($skill) }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <!-- Redirect to login if the user is not logged in -->
                                <a href="{{ route('candidate_login_form') }}" class="btn text-white btn-view-details"
                                    style="background:#7c8bff;">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection