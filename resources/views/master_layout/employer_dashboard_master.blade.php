<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ALIGN | Employer</title>
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">




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
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="" />

      </a>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/placeholder.jpg')}}" alt="" class="rounded-circle" />
            <!-- <span class="d-none d-md-block dropdown-toggle ps-2">Account</span> -->
             <span class="dropdown-toggle ps-2">Account</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('login_form')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
              </a>
            </li> --}}
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('employer.profile')}}">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('employer.membership')}}">
                <i class="fa-solid fa-crown"></i>
                <span>Membership</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('employer.logout')}}">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>



  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('employer.dashboard')}}">
          <i class="fa-solid fa-users"></i>
          <span>Team</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('employer.team.assesment')}}">
          <i class="fa-solid fa-brain"></i> <span>Assessments</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('employer.jobs')}}">
          <i class="fa-solid fa-briefcase"></i> <span>Jobs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('applicant.review')}}">
          <i class="fa-regular fa-file-lines"></i> <span>Applicants</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('applicant.tracking')}}">
          <i class="fa-regular fa-calendar-check"></i> <span>Interviews</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span> interviews </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{route('saved.applicant')}}">
              <i class="bi bi-circle"></i><span>saved applicant</span>
            </a>
          </li>

          <li>
            <a href="{{route('first.interview')}}">
              <i class="bi bi-circle"></i><span>first interview</span>
            </a>
          </li>
          <li>
            <a href="{{route('second.interview')}}">
              <i class="bi bi-circle"></i><span>second interview</span>
            </a>
          </li>
          <li>
            <a href="{{route('final.interview')}}">
              <i class="bi bi-circle"></i><span>final interview</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('talent.search')}}">
          <i class="fa-solid fa-binoculars"></i> <span>Scout </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('employer.trends')}}">
          <i class="fa-solid fa-arrow-trend-up"></i></i> <span>Trends </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('employer.inbox')}}">
          <i class="fa-solid fa-inbox"></i></i> <span>Inbox </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-info-square"></i></i> <span>Help</span>
        </a>
      </li>
    </ul>

  </aside>


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

  @yield('employer_team')
  @yield('employer_jobs')
  @yield('employer_job_posting')
  @yield('employer_team_assesment')
  @yield('applicant_review')
  @yield('saved_applicant')
  @yield('first_interview')
  @yield('second_interview')
  @yield('final_interview')
  @yield('applicant_tracking')
  @yield('employer_membership')
  @yield('employer_membership_payment')
  @yield('employer_membership_paymentgateway')
  @yield('employer_trends')
  @yield('employer_inbox')
  @yield('employer_profile')
  @yield('employer_profile_update')

  @yield('employer_help')



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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>






  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>



</body>

</html>