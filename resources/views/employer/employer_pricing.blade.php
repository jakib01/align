@extends('master_layout.employer_master')
@section('employer_pricing')


<style>
    body {
        background: black;
        min-height: 100vh;
    }
</style>


<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 px-lg-5">
        <div class="col-12 col-lg-10 mx-auto text-center text-white">
            <h4 class="display-4 fw-bold text-white">Fair and transparent pricing</h4>
            <p class="lead mb-2 text-white" style="line-height: 1.4;">
                We are currently refining our pricing model as we finalise and BETA test our product. Our goal is to
                offer
                competitive pricing that reflects our value. Once complete, we will release a clear, transparent, and
                fair
                pricing structure. Stay tuned for exclusive offers, early-bird discounts, and further updates on our
                pricing
                structure.
            </p>
            <p class="mb-0">
                <a href="{{ route('employer.help') }}" class="text-decoration-none fw-bold" style="color: #97fff6;">
                    For further information, contact us
                </a>
            </p>

        </div>
    </div>
</div>






@endsection()