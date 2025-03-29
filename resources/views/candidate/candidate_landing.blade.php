@extends('master_layout.candidate_master')
@section('candidate_landing')





<!-- Hero Section -->
<div class="hero d-flex align-items-center"
  style="margin-top: -12px; height: 105vh; color: black; background: #97fff6; ">
  <div class="container-fluid px-3">
    <div class="row">
      <!-- Content Column with left margin -->
      <div class="col-lg-6 col-12 d-flex flex-column justify-content-center mt-4 mt-lg-0 mb-3 mb-lg-0"
        style="padding-left: 2rem;">
        <h1 class="fw-bold" style="font-size: 2.25rem;"> Skills over CVs, potential over experience.
        </h1>
        <p class="fs-5 mt-3"> Align redefines job hunting by focusing on your skills, not your CV, to connect you with
          opportunities that match
          your abilities and values.</p>

      </div>

      <!-- Video Column with right margin and no extra space between content and video -->
      <!-- Video Column with equal padding for left and right -->
      <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center text-center px-4">
        <div class="video-wrapper mx-auto"
          style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; background: black;">
          <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
            <source src="{{ secure_asset('assets/img/candidate.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- START THE FEATURETTES -->

<!-- Boost Your Interview Chances Section -->
<div class="featurette py-4 px-3" style="background: #bedbed;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Boost Your Interview Chances</h2>
      <p class="lead text-dark">
        Align’s skills-based application process ensures you only apply for roles that align with your abilities and
        values, leading to more relevant matches and increased visibility with employers!
      </p>
    </div>
    <!-- Image Column -->
    <div class="col-12 col-md-5 text-center">
      <img src="{{ asset('assets/img/interview.jpg') }}" alt="Boost Your Interview Chances" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>

<!-- Explore New Industries Section -->
<div class="featurette py-4 px-3" style="background: #bedbed;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 order-md-2 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Explore New Industries</h2>
      <p class="lead text-dark">
        Align focuses on what you can do, not just your past roles. Align gives you access to more opportunities, even
        in
        industries you might not have considered!
      </p>
    </div>
    <!-- Image Column -->
    <div class="col-12 col-md-5 order-md-1 text-center">
      <img src="{{ asset('assets/img/industries.jpg') }}" alt="Explore New Industries" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>

<!-- Break free from Bias Section -->
<div class="featurette py-4 px-3" style="background: #bedbed;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Break Free From Bias</h2>
      <p class="lead text-dark">
        Align’s only focus is skills, behaviours and values. This allows you to showcase your true potential without
        being overlooked because of your background, gender, age, or other biases!
      </p>
    </div>
    <!-- Image Column -->
    <div class="col-12 col-md-5 text-center">
      <img src="{{ asset('assets/img/breakbias.jpg') }}" alt="Escape Bias" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>

<!-- Reuse Your Job Passport Section -->
<div class="featurette py-4 px-3" style="background: #bedbed;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 order-md-2 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Reuse Your JobPass™</h2>
      <p class="lead text-dark">
        Your JobPass™ is a one-time effort that keeps working for you. After completing your assessments, you can
        use
        it to apply to multiple jobs without having to redo the process each time!
      </p>
    </div>
    <!-- Image Column -->
    <div class="col-12 col-md-5 order-md-1 text-center">
      <img src="{{ asset('assets/img/jobpassport.jpg') }}" alt="Reuse Your Job Passport" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>

<!-- Receive Custom Job Matches Section -->
<div class="featurette py-4 px-3" style="background: #bedbed;">
  <div class="row align-items-center justify-content-center text-center text-md-start">
    <!-- Content Column -->
    <div class="col-12 col-md-7 px-3 px-md-5">
      <h2 class="fw-bold text-dark">Receive Custom Job Matches</h2>
      <p class="lead text-dark">
        Align's algorithm matches you with jobs that fit your skills, values, and career goals—not just your experience.
        This leads to better fits and a higher chance of job satisfaction!
      </p>
    </div>
    <!-- Image Column -->
    <div class="col-12 col-md-5 text-center">
      <img src="{{ asset('assets/img/customjob.jpg') }}" alt="Receive Custom Job Matches" class="img-fluid mx-auto"
        style="max-width: 100%; max-height: 300px;" />
    </div>
  </div>
</div>


<!-- /END THE FEATURETTES -->

<!-- New Card Section with Bootstrap -->
<section class="card-section py-5" style="background: #7c8bff;">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-dark">How it works?</h2>
    <div class="row justify-content-center g-4">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="card h-100 text-center border-0 shadow-lg rounded-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-1-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <p class="card-text">
              <strong>Complete your profile,</strong> stating your preferences on seniority, location, salary, and
              flexible working.

            </p>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="card h-100 text-center border-0 shadow-lg rounded-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-2-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <p class="card-text">
              Take competency and behavioural assessments to <strong>create your personalised Job Passport. </strong>



            </p>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="card h-100 text-center border-0 shadow-lg rounded-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-3-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <p class="card-text">
              <strong> Explore jobs </strong> based on skills and values to find positions that truly align with you.

            </p>
          </div>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="col-md-4">
        <div class="card h-100 text-center border-0 shadow-lg rounded-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-4-circle-fill fs-2"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <p class="card-text">
              <strong> Receive job matches</strong> and gain skill development insights based on your career goals.

            </p>
          </div>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="col-md-4">
        <div class="card h-100 text-center border-0 shadow-lg rounded-4">
          <div class="features-icon mt-3" style="color: #5e7dee">
            <i class="bi bi-5-circle-fill fs-2 transition"></i>
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <p class="card-text">
              <strong>Easily apply to multiple jobs </strong>using your single Job Passport.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action (CTA) -->
<section class="cta-section text-center p-5 bg-black">
  <div class="container" style="color: white">
    <h1>Ready for your next career step?</h1>
    <p>
      Embark on a new era of effortless, fair and personalised recruitment.
      Join Align now and find your dream-fit role!
    </p>
    <a href="register.html" class="btn btn-light btn-lg">Get Started</a>
  </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section text-center p-5" style="background: #97FFF6;">
  <div class="container">
    <h2>Stay ahead of the curve
    </h2>
    <p>Sign up for our newsletter and get exclusive insights, updates, and career advice straight to your inbox.


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