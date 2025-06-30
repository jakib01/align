@extends('master_layout.employer_dashboard_master')

@section('employer_profile')

<main id="main" class="main py-5 bg-light">
    <div class="container">

        <div id="profile-header"
            class="d-flex align-items-center p-4 rounded shadow-lg bg-dark text-white position-relative">
            <div class="mr-5">
                <!-- Display Company Logo with added margin -->
                <img src="{{ asset('storage/' . $employer->logo) }}" alt="Company Logo" class="img-fluid rounded-circle"
                    style="width: 120px; height: 120px; margin-right: 20px;">
                <!-- Added margin-right to create space -->
            </div>
            <div class="d-flex flex-column ml-3">
                <!-- Added ml-3 class for margin-left -->
                <h2 class="h4 font-weight-bold">Company: {{ $employer->company_name ?? 'Company Not Found' }}</h2>
                <span>Employer Name: {{$employer->username}}</span>
                <p>website: {{ $employer->website ?? 'Not Provided' }}</p> <!-- Website field -->
            </div>
            <!-- Edit Button moved to Top Right -->
            <a href="{{ route('employer.profile.edit') }}" class="btn btn-warning btn-sm position-absolute"
                style="top: 10px; right: 10px;">
                Edit Profile
            </a>
        </div>





        <!-- Other Sections -->

        <!-- New Company Overview Section -->
        <div class="row mt-4">
            <!-- Company Overview -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card shadow-lg p-4 mb-3 bg-white border-0 flex-fill">
                    <h4 class="card-title text-dark font-weight-bold">Company Overview</h4>
                    <ul class="list-unstyled">
                        <li><strong>Industry:</strong> {{ $employer->industry ?? 'Not Provided' }}</li>
                        <li><strong>Founded:</strong> {{ $employer->founded ?? 'Not Provided' }}</li>
                        <li><strong>Employees:</strong> {{ $employer->employees_count ?? 'Not Provided' }}</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card shadow-lg p-4 mb-3 bg-white border-0 flex-fill">
                    <h4 class="card-title text-dark font-weight-bold">Contact Information</h4>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> {{ $employer->email ?? 'Not Provided' }}</li>
                        <li><strong>Phone:</strong> {{ $employer->contact_phone ?? 'Not Provided' }}</li>
                        <li><strong>Address:</strong> {{ $employer->contact_address ?? 'Not Provided' }}</li>
                    </ul>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card shadow-lg p-4 mb-3 bg-white border-0 flex-fill">
                    <h4 class="card-title text-dark font-weight-bold">Social Media Links</h4>
                    @if (!empty($employer->social_links))
                                        @php
                                            // Check if social_links is already an array
                                            $socialLinks = is_array($employer->social_links) ? $employer->social_links : json_decode($employer->social_links, true);
                                        @endphp
                                        <ul class="list-unstyled">
                                            @foreach($socialLinks as $platform => $url)
                                                <li>
                                                    <a href="{{ $url }}" target="_blank">
                                                        {{ ucfirst($platform) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                    @else
                        <p>No social links available.</p>
                    @endif

                </div>
            </div>
        </div>


        <!-- About Us -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-lg p-4 mb-0 bg-dark text-white border-0">
                    <h4 class="card-title font-weight-bold">About Us</h4>
                    <p>{{ $employer->about_us ?? 'No details available.' }}</p>
                </div>
            </div>
        </div>



    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'Okay',
            timer: 3000  // Optional: auto close after 3 seconds
        });
    </script>
@endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@if(session('success'))
    <script>
        toastr.success('{{ session('success') }}', 'Success', {
            positionClass: 'toast-top-right',
            timeOut: 3000
        });
    </script>
@endif







@endsection