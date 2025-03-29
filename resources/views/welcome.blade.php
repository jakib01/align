@extends('master_layout.master')
@section('welcome')



<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container-fluid px-3 d-flex align-items-center justify-content-between">

    <!-- Mobile Header -->
    <div class="d-flex d-lg-none w-100 justify-content-start align-items-center">
      <!-- Button for the menu toggle -->
      <button class="btn btn-lg p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar"
        style="margin-left: 0;">
        <i class="bi bi-list"></i>
      </button>

      <!-- Button for the logo with no decoration on click -->
      <button class="btn p-0 ms-auto" type="button" onclick="window.location.href='{{ route('landing.page') }}'"
        style="text-decoration: none;">
        <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="ms-auto"
          style="height: auto; max-height: 2rem; background: transparent;" />
      </button>
    </div>

    <!-- Desktop Header -->
    <div class="d-none d-lg-flex align-items-center w-100">
      <a href="{{ route('landing.page') }}">
        <img src="{{asset('assets/img/logo.png')}}" alt="Logo"
          style="height: auto; max-height: 2rem; background: transparent;" />
      </a>
    </div>

    <!-- Navigation Items (Desktop Only) -->
    <nav class="header-nav ms-auto d-none d-lg-block">
      <ul class="d-flex align-items-center flex-column flex-lg-row">
        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('employer.landing') }}">Employers</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('candidate.landing') }}">Candidates</a></li>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/placeholder.jpg" alt="" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">Account</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('employer_login_form') }}"
                style="border-bottom: 1px solid #ddd;">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Employer</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('candidate_login_form') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Candidate</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
<!-- End Header -->

<!-- Mobile Navigation -->
<!-- Off-canvas Menu -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobileNavbar"
  style="max-width: 280px; background: white; color: #fff; border-top-right-radius: 15px; border-bottom-right-radius: 15px; overflow: hidden;">
  <!-- Header -->
  <div class="offcanvas-header border-bottom" style="border-color: rgba(255, 255, 255, 0.2);">
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="img-fluid"
        style="max-height: 2.5rem; width: auto; " />
    </div>
    <!-- Close Button -->
    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <!-- Body -->
  <div class="offcanvas-body p-0">
    <ul class="navbar-nav p-3">
      <!-- Nav Item: Employers -->
      <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center gap-2 px-3 py-2" href="{{ route('employer.landing') }}"
          style="color: black; border-radius: 8px; transition: all 0.3s ease;">
          <i class="bi bi-briefcase" style="color: #4db5ff;"></i>
          <span>Employers</span>
        </a>
      </li>
      <!-- Nav Item: Candidates -->
      <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center gap-2 px-3 py-2" href="{{ route('candidate.landing') }}"
          style="color: black; border-radius: 8px; transition: all 0.3s ease;">
          <i class="bi bi-person" style="color: #ff6b6b;"></i>
          <span>Candidates</span>
        </a>
      </li>

      <!-- Account Dropdown -->
      <li class="nav-item dropdown mt-3">
        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 px-3 py-2" href="#" id="accountDropdown"
          role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black; border-radius: 8px;">
          <i class="bi bi-person-circle" style="color: #fdbb2d;"></i>
          <span>Account</span>
        </a>
        <ul class="dropdown-menu shadow-lg border-0 bg-light text-dark" aria-labelledby="accountDropdown"
          style="border-radius: 10px; overflow: hidden;">
          <li>
            <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('employer_login_form') }}"
              style="color: black; transition: all 0.3s ease;">
              <i class="bi bi-box-arrow-in-right" style="color: #4db5ff;"></i>
              <span>Employer</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('candidate_login_form') }}"
              style="color: black; transition: all 0.3s ease;">
              <i class="bi bi-box-arrow-in-right" style="color: #4db5ff;"></i>
              <span>Candidate</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>


<!-- Hero Section -->
<div class="hero d-flex align-items-center" style="margin-top: -12px; height: 95vh; color: black; background:#7C8BFF;;">
  <div class="container-fluid px-3">
    <div class="row">
      <!-- Content Column with left margin -->
      <div class="col-lg-6 col-12 d-flex flex-column justify-content-center mt-4 mt-lg-0 mb-3 mb-lg-0"
        style="padding-left: 2rem;">
        <h1 class="fw-bold" style="font-size: 2.25rem;">Say goodbye to old-fashioned, CV-based recruitment</h1>
        <p class="fs-5 mt-3">Create your unique <strong>JobPass™</strong> on Align by taking our skills, behaviours and
          values
          assessments, and get hired based on your future potential, rather than your previous experience. Your JobPass™
          is your ticket out of biased and frustrating job searches.</p>
      </div>

      <!-- Video Column with right margin and no extra space between content and video -->
      <!-- Video Column with equal padding for left and right -->
      <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center text-center px-4">
        <div class="video-wrapper mx-auto"
          style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; background: black;">
          <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
            <source src="{{ asset('assets/img/welcomevideo.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Hero Section -->




<!-- Employer Section -->
<div class="featurette py-4 px-3" style="background:#ffb900;">
  <div class="row align-items-center justify-content-center">
    <!-- Content (left) with custom padding and centered on small screens -->
    <div class="col-12 col-md-6 px-4 d-flex justify-content-center" style="padding-left: 64px; padding-right: 16px;">
      <!-- Left padding 64px, right padding 16px -->
      <div class="text-center text-md-start">
        <h2 class="fw-bold text-dark">Employers</h2>
        <p>
          Drowning in hundreds of irrelevant CVs? Struggling to hire diverse talent for your team? Counting the cost of
          failed recruitment? Align is here to help!
        </p>
        <a href="{{route('employer.landing')}}" class="btn fw-semibold btn-sm btn-lg-sm"
          style="font-size: 1rem; margin-top: 1rem; border: 1px solid #ccc; transition: background-color 0.3s ease, color 0.3s ease; background:#ecf2fe;">
          Learn More
        </a>
      </div>
    </div>

    <!-- Image (right) with custom max-width and no padding -->
    <div class="col-12 col-md-6 text-center" style="padding-left: 0; padding-right: 0; max-width: 423.33px;">
      <img src="{{ asset('assets/img/employer.jpg') }}" alt="Employer" class="img-fluid"
        style="max-width: 100%; height: 300px; object-fit: cover;" loading="lazy" />
    </div>
  </div>
</div>

<!-- Candidate Section -->
<div class="featurette py-4 px-3" style="background:#ffb900;">
  <div class="row align-items-center justify-content-center ">
    <!-- Content (left) for small screens and right for large screens, centered on small screens -->
    <div class="col-12 col-md-7 order-md-2 d-flex justify-content-center px-4"
      style="padding-left: 64px; padding-right: 16px;">
      <!-- Left padding 64px, right padding 16px -->
      <div class="text-center text-md-start">
        <h2 class="fw-bold text-dark">Candidates</h2>
        <p>
          Feel like your applications are going into a black hole? Frustrated at being rejected because you don’t have
          “relevant” experience? Unsure about how to career switch? Align is here to help!
        </p>
        <a href="{{route('candidate.landing')}}" class="btn btn-light fw-semibold btn-sm btn-lg-sm text-dark"
          style="font-size: 1rem; margin-top: 1rem; border: 1px solid #ccc; transition: background-color 0.3s ease, color 0.3s ease; background:#ecf2fe;">
          Learn More
        </a>
      </div>
    </div>

    <!-- Image (right) for small screens and left for large screens -->
    <div class="col-12 col-md-5 order-md-1 text-center" style="padding-left: 0; padding-right: 0; max-width: 423.33px;">
      <img src="{{ asset('assets/img/candidate.jpg') }}" alt="Candidate" class="img-fluid"
        style="max-width: 100%; height: 300px; object-fit: cover;" loading="lazy" />
    </div>
  </div>
</div>






<!-- Newsletter -->
<section class="newsletter-section text-center p-5 " style="background: #97fff6;">
  <div class="container-fluid px-3">
    <h4>Stay ahead of the curve
    </h4>
    <p>Sign up for our newsletter and get exclusive insights, updates, and career advice straight to your inbox.</p>
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
<!-- End Newsletter -->

<!-- Footer -->
<footer class="footer bg-light py-4 px-2">
  <div class="container-fluid text-center" style="max-width: 1140px; padding-left: 1rem; padding-right: 1rem;">
    <div class="row justify-content-center">
      <!-- Left Side -->
      <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-2"
        style="padding-left: 0; padding-right: 0;">
        <a href="{{ route('landing.page') }}" class="d-flex align-items-center mb-2 text-decoration-none">
          <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="footer-logo"
            style="max-height: 2rem; height: auto; margin-right: 0; background: transparent;" />
        </a>
        <p class="text-dark mb-0" style="text-align: center;">
          Align is reinventing recruitment by focusing on what matters most: skills, values, and the future potential
          of every candidate.
        </p>
      </div>
      <!-- Middle Side -->
      <div class="col-12 col-md-3 mb-2" style="padding-left: 0; padding-right: 0;">
        <h5 class="fw-bold mb-2 fs-6">Quick Links</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="{{route('employer.landing')}}" class="text-dark text-decoration-none">Employers</a></li>
          <li><a href="{{route('candidate.landing')}}" class="text-dark text-decoration-none">Candidates</a></li>
        </ul>
      </div>
      <!-- Right Side -->
      <div class="col-12 col-md-3 mb-2" style="padding-left: 0; padding-right: 0;">
        <h5 class="fw-bold mb-2 fs-6">Legal</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="terms.html" class="text-dark text-decoration-none">Terms & Conditions</a></li>
          <li><a href="privacy.html" class="text-dark text-decoration-none">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>



@endsection