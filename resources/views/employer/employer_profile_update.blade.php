@extends('master_layout.employer_dashboard_master')

@section('employer_profile_update')

<main id="main" class="main py-5 bg-light">
    <div class="container">
        <h2>Edit Profile</h2>

        <form action="{{ route('employer.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mt-4">
                <!-- Logo -->
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg p-4 mb-3 bg-white border-0">
                        <h4 class="card-title text-dark font-weight-bold">Logo</h4>
                        <input type="file" name="logo" class="form-control">
                    </div>
                </div>

                <!-- Website -->
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg p-4 mb-3 bg-white border-0">
                        <h4 class="card-title text-dark font-weight-bold">Website</h4>
                        <input type="text" name="website" class="form-control"
                            value="{{ old('website', $employer->website ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg p-4 mb-3 bg-white border-0">
                        <h4 class="card-title text-dark font-weight-bold">Company Overview</h4>
                        <input type="text" name="industry" class="form-control"
                            value="{{ old('industry', $employer->industry ?? '') }}">
                        <input type="text" name="founded" class="form-control mt-2"
                            value="{{ old('founded', $employer->founded ?? '') }}">
                        <input type="number" name="employees_count" class="form-control mt-2"
                            value="{{ old('employees_count', $employer->employees_count ?? '') }}">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg p-4 mb-3 bg-white border-0">
                        <h4 class="card-title text-dark font-weight-bold">Contact Information</h4>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $employer->email ?? '') }}">
                        <input type="text" name="contact_phone" class="form-control mt-2"
                            value="{{ old('contact_phone', $employer->contact_phone ?? '') }}">
                        <input type="text" name="contact_address" class="form-control mt-2"
                            value="{{ old('contact_address', $employer->contact_address ?? '') }}">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg p-4 mb-3 bg-white border-0">
                        <h4 class="card-title text-dark font-weight-bold">Social Media Links</h4>
                        <input type="text" name="facebook" class="form-control"
                            value="{{ old('facebook', $employer->social_links['facebook'] ?? '') }}">
                        <input type="text" name="instagram" class="form-control mt-2"
                            value="{{ old('instagram', $employer->social_links['instagram'] ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-lg p-4 mb-3 bg-white border-0">
                        <h4 class="card-title text-dark font-weight-bold">About Us</h4>
                        <textarea name="about_us" class="form-control"
                            rows="5">{{ old('about_us', $employer->about_us ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
        </form>
    </div>

 




</main>


@endsection