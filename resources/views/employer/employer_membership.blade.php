@extends('master_layout.employer_dashboard_master')

@section('employer_membership')

<main id="main" class="main">
    <div class="pagetitle text-center mt-3">
        <h4 class="text-uppercase fw-bold" style="letter-spacing: 2px;">Membership Plans</h4>
    </div>
    <section class="section dashboard">
        <div class="container py-5">
            <div class="row justify-content-center">
                <!-- Basic Membership -->
                <div class="col-md-5 mb-4 d-flex">
                    <div class="card text-center shadow-lg w-100 h-100 
                        {{ auth()->guard('employer')->user()->membership_type == 'basic' ? 'border border-success' : '' }}"
                        style="background: #F0F9FF; color: #06283D; border-radius: 15px;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold mb-3">Basic Membership</h5>
                                <p class="text-muted small">Designed for individuals starting their journey.</p>
                                <h3 class="text-primary fw-bold mb-3">£0.00 / month</h3> <!-- Free Membership -->
                                <ul class="list-unstyled text-start">
                                    <li>✔ Access to basic job listings.</li>
                                    <li>✔ Basic collaboration tools.</li>
                                    <li>✔ Limited reporting features.</li>
                                    <li class="text-danger">✖ Advanced analytics tools.</li>
                                    <li class="text-danger">✖ Priority support and services.</li>
                                </ul>
                            </div>
                            @if(auth()->guard('employer')->user()->membership_type == 'basic')
                                <button class="btn btn-secondary w-100 mt-3" disabled>
                                    Current Plan
                                </button>
                            @else
                                <form method="POST" action="{{ route('membership.payment') }}">
                                    @csrf
                                    <input type="hidden" name="membership_type" value="basic">
                                    <button type="submit" class="btn btn-primary w-100 mt-3"
                                        style="background: #A2D2FF; color: #06283D; border: none;">
                                        Subscribe
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Premium Membership -->
                <div class="col-md-5 mb-4 d-flex">
                    <div class="card text-center shadow-lg w-100 h-100 
                        {{ auth()->guard('employer')->user()->membership_type == 'premium' ? 'border border-success' : '' }}"
                        style="background: #FFF4E1; color: #46344E; border-radius: 15px;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold mb-3">Premium Membership</h5>
                                <p class="text-muted small">Best for professionals looking for comprehensive tools.</p>
                                <h3 class="text-success fw-bold mb-3">£49.99 / month</h3> <!-- Premium Membership -->
                                <ul class="list-unstyled text-start">
                                    <li>✔ Access to basic job listings.</li>
                                    <li>✔ Basic collaboration tools.</li>
                                    <li>✔ Limited reporting features.</li>
                                    <li>✔ Advanced analytics tools.</li>
                                    <li>✔ Priority support and services.</li>
                                </ul>
                            </div>
                            @if(auth()->guard('employer')->user()->membership_type == 'premium')
                                <button class="btn btn-secondary w-100 mt-3" disabled>
                                    Current Plan
                                </button>
                            @else
                                <form method="POST" action="{{ route('membership.payment') }}">
                                    @csrf
                                    <input type="hidden" name="membership_type" value="premium">
                                    <button type="submit" class="btn btn-success w-100 mt-3"
                                        style="background: #FFE9AE; color: #46344E; border: none;">
                                        Subscribe
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection