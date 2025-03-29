@extends('master_layout.employer_dashboard_master')

@section('employer_membership_paymentgateway')

<main id="main" class="main" style="background: #f7f7f7; color: #333;">
    <div class="pagetitle text-center mt-4">
        <h4 class="text-uppercase fw-bold" style="letter-spacing: 1px; color: #4a4a4a;">Complete Your Payment</h4>
        <p class="text-muted">You're one step away from unlocking your <strong>{{ $membershipType }}</strong>
            membership. Secure your payment now.</p>
    </div>

    <section class="section dashboard">
        <div class="container py-5">
            <div class="card shadow-lg mx-auto" style="max-width: 600px; border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4" style="color: #2c3e50;">Secure Payment</h5>
                    <p class="text-center mb-4" style="font-size: 1.1rem;">Total amount:
                        <strong>{{ $currency }}{{ $price }}</strong> for your <strong>{{ $membershipType }}</strong>
                        membership.
                    </p>

                    <!-- Display Logged-In Employer Email -->
                    <p class="text-center mt-3 mb-4" style="font-size: 1.1rem;">Your Email:
                        <strong>{{ auth()->guard('employer')->user()->email }}</strong>
                    </p>

                    <!-- Payment Methods Section -->
                    <h6 class="text-center mt-4 mb-3" style="color: #34495e;">Choose Your Payment Method</h6>
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-outline-secondary mx-2 p-2"
                            style="border-radius: 50px; font-size: 1rem; border: 2px solid #ccc;" id="visaBtn">
                            <i class="fab fa-cc-visa fa-2x" style="color: #1a73e8;"></i>
                        </button>
                        <button class="btn btn-outline-secondary mx-2 p-2"
                            style="border-radius: 50px; font-size: 1rem; border: 2px solid #ccc;" id="mastercardBtn">
                            <i class="fab fa-cc-mastercard fa-2x" style="color: #e84393;"></i>
                        </button>
                        <button class="btn btn-outline-secondary mx-2 p-2"
                            style="border-radius: 50px; font-size: 1rem; border: 2px solid #ccc;" id="paypalBtn">
                            <i class="fab fa-cc-paypal fa-2x" style="color: #ffb22e;"></i>
                        </button>
                        <button class="btn btn-outline-secondary mx-2 p-2"
                            style="border-radius: 50px; font-size: 1rem; border: 2px solid #ccc;" id="applePayBtn">
                            <i class="fab fa-apple fa-2x" style="color: #333;"></i>
                        </button>
                        <button class="btn btn-outline-secondary mx-2 p-2"
                            style="border-radius: 50px; font-size: 1rem; border: 2px solid #ccc;" id="googlePayBtn">
                            <i class="fab fa-google-pay fa-2x" style="color: #4285F4;"></i>
                        </button>
                    </div>

                    <!-- Card Details Section -->
                    <div id="cardDetails" class="mt-4">
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label" style="font-size: 1rem;">Card Number</label>
                            <input type="text" id="cardNumber" name="card_number" class="form-control"
                                placeholder="1234 5678 9012 3456" style="border-radius: 10px;">
                        </div>

                        <div class="mb-3 d-flex">
                            <div class="me-3 w-50">
                                <label for="expiryDate" class="form-label" style="font-size: 1rem;">Expiry Date</label>
                                <input type="text" id="expiryDate" name="expiry_date" class="form-control"
                                    placeholder="MM/YY" style="border-radius: 10px;">
                            </div>
                            <div class="w-50">
                                <label for="cvv" class="form-label" style="font-size: 1rem;">CVV</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" placeholder="123"
                                    style="border-radius: 10px;">
                            </div>
                        </div>
                    </div>

                    <!-- Billing Address Section -->
                    <div id="billingAddress" class="mt-4">
                        <h6 class="text-center mb-3" style="color: #34495e;">Billing Address</h6>
                        <div class="mb-3">
                            <label for="street" class="form-label" style="font-size: 1rem;">Street Address</label>
                            <input type="text" id="street" name="street" class="form-control"
                                placeholder="Enter your street address" style="border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label" style="font-size: 1rem;">City</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city"
                                style="border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label for="postcode" class="form-label" style="font-size: 1rem;">Postcode</label>
                            <input type="text" id="postcode" name="postcode" class="form-control"
                                placeholder="Enter your postcode" style="border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label" style="font-size: 1rem;">Country</label>
                            <input type="text" id="country" name="country" class="form-control"
                                placeholder="Enter your country" style="border-radius: 10px;">
                        </div>
                    </div>

                    <form action="{{ route('membership.payment.process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="membership_type" value="{{ $membershipType }}">
                        <!-- This needs to reflect the selected membership -->
                        <input type="hidden" name="price" value="{{ $price }}">
                        <input type="hidden" name="currency" value="{{ $currency }}">

                        <button type="submit" class="btn btn-danger w-100 mt-4"
                            style="border-radius: 25px; font-size: 1.2rem;">
                            <i class="fas fa-check"></i> Pay Now
                        </button>
                    </form>





                    <!-- Payment Gateway Footer (Optional) -->
                    <div class="mt-4 text-center">
                        <p class="text-muted">This is a demo version; no payment will be processed.</p>
                        <small class="text-muted">By proceeding, you agree to our <a href="#">Terms and Conditions</a>
                            and <a href="#">Privacy Policy</a>.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



@endsection