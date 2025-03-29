@extends('master_layout.candidate_master')
@section('candidate_register')

<div class="container-fluid d-flex justify-content-center align-items-center vh-100" style="background: #97fff6;">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card p-4 border-0 shadow-sm w-100"
                style="background: #ffffff; border-radius: 15px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);">

                <!-- Display errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Display success message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                        style="max-width: 80px; filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));">
                </div>

                <!-- Title -->
                <h4 class="text-center mb-4" style="color: #4a5568; font-weight: bold; letter-spacing: 0.5px;">
                    Candidate - Register
                </h4>

                <!-- Form -->
                <form action="{{ route('candidate.register') }}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Candidate Name -->
                        <div class="col-md-12 mb-3">
                            <label for="candidate-name" class="form-label" style="color: #4a5568;">Full Name</label>
                            <input type="text" id="candidate-name" name="candidate_name" class="form-control"
                                placeholder="Enter your full name" required
                                style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; background: #f9fbfc;">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Candidate Email -->
                        <div class="col-md-12 mb-3">
                            <label for="candidate-email" class="form-label" style="color: #4a5568;">Email
                                Address</label>
                            <input type="email" id="candidate-email" name="email" class="form-control"
                                placeholder="Enter your email address" required
                                style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; background: #f9fbfc;">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label" style="color: #4a5568;">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter your password" required
                                style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; background: #f9fbfc;">
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-4">
                            <label for="confirm-password" class="form-label" style="color: #4a5568;">Confirm
                                Password</label>
                            <input type="password" id="confirm-password" name="password_confirmation"
                                class="form-control" placeholder="Confirm your password" required
                                style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; background: #f9fbfc;">
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms-checkbox" required>
                        <label class="form-check-label" for="terms-checkbox" style="color: #4a5568;">
                            I agree to the <a href="#" class="text-decoration-none" style="color: #4cafec;">Terms &
                                Conditions</a> and
                            <a href="#" class="text-decoration-none" style="color: #4cafec;">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="btn w-100 py-2"
                        style="background: linear-gradient(90deg, #4cafec, #66ccff); border: none; border-radius: 10px; color: #fff; font-weight: bold; font-size: 16px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                        Register
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-3">
                    <a href="{{ route('candidate_login_form') }}" class="text-decoration-none"
                        style="color: #7c8bff; font-weight: 500;">Already have an account? Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection