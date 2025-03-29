@extends('master_layout.master')
@section('candidate_login')


<div class="container d-flex justify-content-center align-items-center vh-100"
    style="background: linear-gradient(135deg, #f7f9fc, #e9eff6);">
    <div class="row justify-content-center w-100">
        <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="card p-4 border-0 shadow-sm"
                style="background: #ffffff; border-radius: 15px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                        style="max-width: 80px; filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));">
                </div>

                <!-- Title -->
                <h4 class="text-center mb-4" style="color: #4a5568; font-weight: bold; letter-spacing: 0.5px;">
                    Candidate Login
                </h4>

                <!-- Error Message -->
                @if (Session::has('error'))
                    <div class="alert alert-danger text-center">
                        {{ session::get('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <!-- Form -->
                <form action="{{ route('candidate.login') }}" method="post">
                    @csrf
                    <!-- Email Input -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label" style="color: #4a5568;">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
                            required
                            style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; background: #f9fbfc;">
                    </div>

                    <!-- Password Input -->
                    <div class="form-group mb-4">
                        <label for="password" class="form-label" style="color: #4a5568;">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter your password" required
                            style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; background: #f9fbfc;">
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn w-100 py-2"
                        style="background: #7c8bff; border: none; border-radius: 10px; color: #fff; font-weight: bold; font-size: 16px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                        Login
                    </button>
                </form>

                <!-- Register Link -->
                <div class="text-center mt-3">
                    <a href="{{ route('candidate.register') }}" class="text-decoration-none"
                        style="color: black; font-weight: 500;">New
                        user? Create an account</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection