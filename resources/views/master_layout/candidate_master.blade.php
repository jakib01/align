<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> ALIGN | Candidate </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- FA Icons     -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">


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

</head>

<body>

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
                <button class="btn p-0 ms-auto" type="button"
                    onclick="window.location.href='{{ route('landing.page') }}'" style="text-decoration: none;">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="ms-auto"
                        style="height: auto; max-height: 2rem; background: transparent;" />
                </button>
            </div>




            <!-- Desktop Header -->
            <div class="d-none d-lg-flex align-items-center w-100">
                <a href="{{ route('landing.page') }}">
                    <img src="{{ secure_asset('assets/img/logo.png') }}" alt="Logo"
                        style="height: auto; max-height: 2rem; background: transparent;" />
                </a>
            </div>

            <!-- Navigation Items (Desktop Only) -->
            <nav class="header-nav ms-auto d-none d-lg-block">
                <ul class="d-flex align-items-center flex-column flex-lg-row">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{route('guest.jobs')}}"> Jobs
                        </a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{route(name: 'candidate.help')}}">Help</a>
                    </li>

                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="assets/img/placeholder.jpg" alt="" class="rounded-circle" />
                            <span class="d-none d-md-block dropdown-toggle ps-2">Account</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="{{route('candidate_login_form')}}" style="border-bottom: 1px solid #ddd;">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="{{route('candidate.register')}}">
                                    <i class="bi bi-person-plus"></i>
                                    <span>Register</span>
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
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                    style="max-height: 2.5rem; width: auto; ">
            </div>
            <!-- Close Button -->
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <!-- Body -->
        <div class="offcanvas-body p-0">
            <ul class="navbar-nav p-3">
                <!-- Nav Item: Jobs -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 px-3 py-2" href="{{ route('guest.jobs') }}"
                        style="color: black; border-radius: 8px; transition: all 0.3s ease;">
                        <i class="fa-solid fa-receipt" style="color: #4db5ff;"></i>
                        <span>Jobs</span>
                    </a>
                </li>
                <!-- Nav Item: Help -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 px-3 py-2" href="{{ route('candidate.help') }}"
                        style="color: black; border-radius: 8px; transition: all 0.3s ease;">
                        <i class="bi bi-info-square" style="color: #ff6b6b;"></i>
                        <span>Help</span>
                    </a>
                </li>

                <!-- Account Dropdown -->
                <li class="nav-item dropdown mt-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 px-3 py-2" href="#"
                        id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="color: black; border-radius: 8px;">
                        <i class="bi bi-person-circle" style="color: #fdbb2d;"></i>
                        <span>Account</span>
                    </a>
                    <ul class="dropdown-menu shadow-lg border-0 bg-light text-dark" aria-labelledby="accountDropdown"
                        style="border-radius: 10px; overflow: hidden;">
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('candidate_login_form') }}"
                                style="color: black; transition: all 0.3s ease;">
                                <i class="bi bi-box-arrow-in-right" style="color: #4db5ff;"></i>
                                <span>Login</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('candidate.register') }}"
                                style="color: black; transition: all 0.3s ease;">
                                <i class="bi bi-person-plus" style="color: #ff6b6b;"></i>
                                <span>Register</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


    @yield('candidate_landing')
    @yield('candidate_help')
    @yield('guest_jobs')
    @yield('candidate_register')
    @yield('candidate_login_assesment')
    






    <!-- Footer -->
    <footer class="footer  bg-light py-4 px-2">
        <div class="container-fluid text-center" style="max-width: 1140px; padding-left: 1rem; padding-right: 1rem;">
            <div class="row justify-content-center">
                <!-- Left Side -->
                <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-2"
                    style="padding-left: 0; padding-right: 0;">
                    <a href="{{ route('landing.page') }}" class="d-flex align-items-center mb-2 text-decoration-none">
                        <img src="{{asset('assets/img/logo.png')}}" alt="Align Logo" class="footer-logo"
                            style="max-height: 2rem; height: auto; margin-right: 0; background: transparent;" />
                    </a>
                    <p class="text-dark mb-0" style="text-align: center;">
                        Align is reinventing recruitment by focusing on what matters most: skills, values, and the
                        future potential
                        of every candidate.
                    </p>
                </div>
                <!-- Middle Side -->
                <div class="col-12 col-md-3 mb-2" style="padding-left: 0; padding-right: 0;">
                    <h5 class="fw-bold mb-2 fs-6">Quick Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{route(name: 'guest.jobs')}}" class="text-dark text-decoration-none">Jobs</a></li>
                        <li><a href="{{route(name: 'candidate.help')}}" class="text-dark text-decoration-none">Help</a>
                        </li>
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const header = document.querySelector("#header");
            const body = document.querySelector("body"); // Or target a specific main section like 'main'

            if (header) {
                const headerHeight = header.offsetHeight;
                body.style.marginTop = `${headerHeight}px`;
            }
        });

    </script>


</body>

</html>