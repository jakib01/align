<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ALIGN | Candidate</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- FA Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <i class="bi bi-list toggle-sidebar-btn ms-0 me-3"></i>

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('candidate.dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="" />

      </a>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        {{-- <li class="nav-item m-3">
          <a class="nav-link" href="#">Home</a>
        </li> --}}

        {{-- <li class="nav-item m-3">
          <a class="nav-link text-dark" href="#"> Browse Jobs </a>
        </li> --}}
        {{-- <li class="nav-item m-3">
          <a class="nav-link" href="#">Help Center</a>
        </li> --}}
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/placeholder.jpg')}}" alt="" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">Account</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('login_form')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
              </a>
            </li> --}}
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('candidate.logout')}}">
                <i class="bi bi-person-plus"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('candidate.dashboard')}}">
          <i class="fa-solid fa-passport"></i> <span>JobPass™

          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('candidate.assesment')}}">
          <i class="fa-solid fa-brain"></i> <span>Assessments</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('job.search')}}">
          <i class="fa-solid fa-briefcase"></i> <span>Jobs</span>
        </a>
      </li> --}}

      @php
     $canSeeJobs = $hasCompletedBehaviour && $hasCompletedValue;
      @endphp

@if($canSeeJobs)
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('job.search') }}">
      <i class="fa-solid fa-briefcase"></i> <span>Jobs</span>
    </a>
  </li>
@else
  <li class="nav-item">
    <a class="nav-link collapsed disabled" href="#" style="pointer-events: none; opacity: 0.5;" title="Complete both assessments to unlock Jobs">
      <i class="fa-solid fa-lock"></i> <span>Jobs (Please complete Assessments)</span>
    </a>
  </li>
@endif


      {{-- @if($hasCompletedBehaviour && $hasCompletedValue)
    <a href="{{ route('job.search') }}">Browse Jobs</a>
     @else
        <a class="disabled" href="#" title="Complete both assessments to unlock jobs">Jobs (Locked)</a>
     @endif --}}

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('application.tracking')}}">
          <i class="fa-regular fa-file-lines"></i> <span>Applications</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('inbox')}}">
          <i class="fa-solid fa-inbox"></i> <span>Inbox</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('careerinsight')}}">
          <i class="fa-regular fa-map"></i> <span>Discover</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('faq')}}">
          <i class="bi bi-info-square"></i></i> <span>Help</span>
        </a>
      </li>
    </ul>
  </aside>

  <!-- ======= Sidebar ======= -->
  @yield('candidate_profile')
  @yield('assesment')
  @yield('technical_assesment')

  @yield('behaviour_assesment')
  @yield('value_assesment')
  @yield('coreskill_reasoning')
  @yield('sociobilityVsReflectiveness')
  @yield('ResilienceVsSensitivity')
  @yield('DisciplineVsAdaptability')
  @yield('CuriosityVsPracticality')
  @yield('CompassionVsConfidence')
  
  @yield('quiz')
  @yield('result')
  @yield('behaviour_result')
  @yield('core_assessment_result')
  
  {{-- @yield('quiz_result') --}}
  @yield('application_tracking')
  @yield('job_search')
  @yield('job_details')



  @yield('inbox')
  @yield('career_insight')
  @yield('faq')

  {{-- <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row justify-content-center w-100">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card">
          <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="logo">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form id="loginForm" action="dashboard.html" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"
                  required>
              </div>
              <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="Enter your password" required>
              </div>
              <button type="submit" class="btn btn-primary mt-4 w-100">Login</button>
            </form>
            <a href="register.html" class="register-link">New user? Create an account</a>
          </div>
        </div>
      </div>
    </div>
  </div> --}}




  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Aligned</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by Aligned
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>