@extends('master_layout.employer_master')
@section('employer_landing')



<!-- Hero Section -->
<div class="hero d-flex align-items-center bg-black" style="margin-top: -12px; height: 105vh; color: white; ">
  <div class="container-fluid px-3">
    <div class="row">
      <!-- Content Column with left margin -->
      <div class="col-lg-6 col-12 d-flex flex-column justify-content-center mt-4 mt-lg-0 mb-3 mb-lg-0"
        style="padding-left: 2rem;">
        <h1 class="fw-bold" style="font-size: 2.25rem;">Save time, reduce bias, and unlock hidden talent.</h1>
        <p class="fs-5 mt-3">Align transforms recruitment by replacing outdated CVs with skills and values-based
          assessments, empowering you to make objective, inclusive, and high-impact hiring decisions.</p>
      </div>

      <!-- Video Column with right margin and no extra space between content and video -->
      <!-- Video Column with equal padding for left and right -->
      <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center text-center px-4">
        <div class="video-wrapper mx-auto"
          style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; background: black;">
          <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
            <source src="{{ secure_asset('assets/img/employer.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- End Hero Section -->


<!-- START THE FEATURETTES -->

<!-- Save Time Section -->
<div class="featurette py-4 px-3" style="background: #A6DDF1;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Save Time</h2>
      <p class="lead text-dark">
        Stop sifting through hundreds of mismatched CVs. Aligned delivers pre-qualified candidates with the skills you
        need, faster.
      </p>
    </div>

    <!-- Image Column -->
    <div class="col-12 col-md-5 text-center">
      <img src="{{asset('assets/img/savetime.jpg')}}" alt="Save Time" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>

<!-- Unlock Diverse Talent Section -->
<div class="featurette py-4 px-3" style="background:#A6DDF1;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 order-md-2 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Unlock Diverse Talent</h2>
      <p class="lead text-dark">
        Stop limiting your talent pool. Align unlocks untapped talent by shifting the focus from experience to skills,
        helping you build diverse, high-performing teams.
      </p>
    </div>

    <!-- Image Column -->
    <div class="col-12 col-md-5 order-md-1 text-center">
      <img src="{{asset('assets/img/diverse.png')}}" alt="Unlock Diverse Talent" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>

<!-- Make Smart Decisions Section -->
<div class="featurette py-4 px-3" style="background: #A6DDF1;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Make Smart Decisions</h2>
      <p class="lead text-dark">
        Stop relying on subjective hiring decisions. Align makes recruitment data-driven, ensuring you hire the best
        talent based on skills, not stereotypes.
      </p>
    </div>

    <!-- Image Column -->
    <div class="col-12 col-md-5 text-center">
      <img src="{{asset('assets/img/smart.png')}}" alt="Make Smart Decisions" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>




<!-- New Card Section -->
<section class="card-section py-5" style="background: #7C8BFF;">
  <h3 class="text-center fw-bold mb-5 text-dark">How it works?</h3>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mb-4">
        <div class="card h-100 text-center shadow-sm border-0 rounded-4 p-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-1-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Create Effortless Job Posts </h5>
            <p class="card-text">
              Showcase the core of your role, required skills, and team values with ease, ensuring clarity and
              precision.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 text-center shadow-sm border-0 rounded-4 p-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-2-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title"> Receive Relevant Applications </h5>
            <p class="card-text">
              Filter candidates based on skills and values data, connecting only with those who align with your needs.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 text-center shadow-sm border-0 rounded-4 p-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-3-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Access In-Depth Reports</h5>
            <p class="card-text">
              Make smarter hiring decisions by exploring detailed reports that cover skills, behaviours, and values.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 text-center shadow-sm border-0 rounded-4 p-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-4-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Build a Talent Pipeline </h5>
            <p class="card-text">
              Search and discover passive candidates who match your ideal skill set, behaviours, and values.

            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 text-center shadow-sm border-0 rounded-4 p-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-5-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Streamline Interview Tracking</h5>
            <p class="card-text">
              Simplify your hiring process by scheduling and tracking candidate progress directly through the platform.

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Call to Action (CTA) -->
<section class="cta-section text-center p-5" style="background-color: black">
  <div class="container" style="color: white">
    <h1>Join The Recruitment Revolution</h1>
    <p class="mb-0">
      Join Align today and start using our cutting-edge technology to transform your hiring process.
    </p>
    <p>
      Save time, reduce
      bias, and unlock hidden talent.
    </p>
    <a href="{{route('employer.register')}}" class="btn btn-light btn-lg">Get Started</a>
  </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section text-center p-5" style="background: #97fff6;">
  <div class="container">
    <h2>Stay ahead of the curve
    </h2>
    <p>Sign up for our newsletter for exclusive insights, updates, and advice on how to build diverse, high-performing
      teams.
    </p>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="newsletter-form d-flex flex-column flex-lg-row align-items-center">
          <input type="email" class="form-control me-lg-2 mb-2 mb-lg-0 email-input" placeholder="Enter your email" />
          <button type="submit" class="btn text-white" style="background:#7c8bff;">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection()