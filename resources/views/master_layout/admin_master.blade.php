<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Aligned: Admin Dashboard</title>

    <meta name="description"
        content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{asset('panel/css/bootstrap.css')}}">


    <!-- Related styles of various javascript plugins -->
    <link rel="stylesheet" href="{{asset('panel/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{asset('panel/css/main.css')}}">

    <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{asset('panel/css/themes.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">




    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{asset('panel/js/vendor/modernizr-respond.min.js')}}"></script>


</head>

<!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
<!-- <body class="fixed"> -->

<body>
    <!-- Page Container -->
    <div id="page-container">
        <!-- Header -->
        <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
        <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
        <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
        <header class="navbar navbar-inverse">
            <!-- Mobile Navigation, Shows up  on smaller screens -->
            <ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
                <li class="divider-vertical"></li>
                <li>
                    <!-- It is set to open and close the main navigation on smaller screens. The class .navbar-main-collapse was added to aside#page-sidebar -->
                    <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
            <!-- END Mobile Navigation -->

            <!-- Logo -->
            <a href="index.html" class="navbar-brand"><img src="img/template/aligned_logo_tr.png" alt="logo"></a>

            <!-- Loading Indicator, Used for demostrating how loading of widgets could happen, check main.js - uiDemo() -->
            <div id="loading" class="pull-left"><i class="fa fa-certificate fa-spin"></i></div>

            <!-- Header Widgets -->
            <!-- You can create the widgets you want by replicating the following. Each one exists in a <li> element -->
            <ul id="widgets" class="navbar-nav-custom pull-right">
                <!-- Just a divider -->
                <li class="divider-vertical"></li>

                <!-- RSS Widget -->
                <!-- Add .dropdown-left-responsive class to align the dropdown menu left (so its visible on mobile) -->

                <!-- END RSS Widget -->

                <li class="divider-vertical"></li>

                <!-- Twitter Widget -->
                <!-- Add .dropdown-left-responsive class to align the dropdown menu left (so its visible on mobile) -->

                <!-- END Twitter Widget -->

                <li class="divider-vertical"></li>

                <!-- Messages Widget -->
                <!-- Add .dropdown-left-responsive class to align the dropdown menu left (so its visible on mobile) -->

                <!-- END Messages Widget -->

                <li class="divider-vertical"></li>

                <!-- Notifications Widget -->
                <!-- Add .dropdown-center-responsive class to align the dropdown menu center (so its visible on mobile) -->
                {{-- <li id="notifications-widget" class="dropdown dropdown-center-responsive">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag"></i>
                        <span class="badge badge-danger">1</span>
                        <span class="badge badge-warning">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right widget">
                        <li class="widget-heading"><a href="javascript:void(0)" class="pull-right widget-link"><i
                                    class="fa fa-cog"></i></a><a href="javascript:void(0)"
                                class="widget-link">System</a></li>
                        <li>
                            <ul>
                                <li class="label label-danger">20 min ago</li>
                                <li class="text-danger">Support system is down for maintenance!</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="label label-warning">3 hours ago</li>
                                <li class="text-warning">PHP upgrade started!</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="label label-warning">5 hours ago</li>
                                <li class="text-warning"><a href="javascript:void(0)" class="widget-link">1 support
                                        ticket</a> just opened!</li>
                            </ul>
                        </li>
                        <li class="widget-heading"><a href="javascript:void(0)" class="pull-right widget-link"><i
                                    class="fa fa-bookmark"></i></a><a href="javascript:void(0)"
                                class="widget-link">Project #3</a></li>
                        <li>
                            <ul>
                                <li class="label label-success">3 weeks ago</li>
                                <li class="text-success">Project #3 <a href="javascript:void(0)"
                                        class="widget-link">published</a> successfully!</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="label label-info">1 month ago</li>
                                <li class="text-info">Milestone #3 achieved!</li>
                                <li class="text-info"><a href="javascript:void(0)" class="widget-link">John Doe</a>
                                    joined the project!</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="label label-default">1 year ago</li>
                                <li class="text-muted">This is an old notification</li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="text-center"><a href="javascript:void(0)">View All Notifications</a></li>
                    </ul>
                </li> --}}
                <!-- END Notifications Widget -->

                <li class="divider-vertical"></li>

                <!-- User Menu -->
                <li class="dropdown pull-right dropdown-user">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- Just a button demostrating how loading of widgets could happen, check main.js- - uiDemo() -->
                        <li>
                            <a href="javascript:void(0)" class="loading-on"><i class="fa fa-refresh"></i> Refresh</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <!-- Modal div is at the bottom of the page before including javascript code -->
                            <a href="#modal-user-settings" role="button" data-toggle="modal"><i class="fa fa-user"></i>
                                User Profile</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-wrench"></i> App Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin.logout')}}"><i class="fa fa-lock"></i> Log out</a>
                        </li>
                    </ul>
                </li>
                <!-- END User Menu -->
            </ul>
            <!-- END Header Widgets -->
        </header>
        <!-- END Header -->

        <!-- Inner Container -->
        <div id="inner-container">
            <!-- Sidebar -->
            <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
                <!-- Sidebar search -->
                <form id="sidebar-search" action="page_search_results.html" method="post">
                    <div class="input-group">
                        <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <!-- END Sidebar search -->

                <!-- Primary Navigation -->
                <nav id="primary-nav">
                    <ul>
                        <li>
                            <a href="{{route('admin.dashboard')}}" class="active"><i
                                    class="fa fa-fire"></i>Dashboard</a>
                        </li>
                        <!-- <li>
                                <a href="page_ui_elements.html"><i class="fa fa-glass"></i>UI Elements</a>
                            </li> -->
                        <!-- <li>
                                <a href="page_typography.html"><i class="fa fa-font"></i>Typography</a>
                            </li> -->
                        <li>
                            <a href="#"><i class="fa fa-th-list"></i>Employer Section</a>
                            <ul>
                                <li>
                                    <a href="{{route('admin.AllEmployer')}}"><i class="fa fa-file-text"></i>All
                                        Employer</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.jobslots')}}"><i class="fa fa-exclamation-triangle"></i>All
                                        Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.license')}}"><i class="fa fa-magic"></i>All Licences</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.allmessage')}}"><i class="fa fa-flask"></i>All Messages</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.allteam_member')}}"><i class="fa fa-flask"></i>Team Members
                                        & Admin Users</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.employer_interview_tracking')}}"><i
                                            class="fa fa-flask"></i>Employer Interview Tracking</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list"></i>Candidate Section</a>
                            <ul>
                                <li>
                                    <a href="{{route('admin.AllCandidate')}}"><i class="fa fa-file-text"></i>All
                                        Candidates</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.CandidateAssesment')}}"><i
                                            class="fa fa-exclamation-triangle"></i>Candidate Assesment</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.candidate_interview')}}"><i
                                            class="fa fa-magic"></i>Candidate Interview Tracking</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list"></i>Assesment Library</a>
                            <ul>

                                <li>
                                    <a href="{{ route('assessment.form', ['assessmentType' => 'behavior']) }}">
                                        <i class="fa fa-file-text"></i> Behavior Assessment
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('assessment.form', ['assessmentType' => 'values']) }}">
                                        <i class="fa fa-file-text"></i> Values Assessment
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <!-- <li>
                                <a href="#"><i class="fa fa-table"></i>Tables</a>
                                <ul>
                                    <li>
                                        <a href="page_tables.html"><i class="fa fa-tint"></i>Styles</a>
                                    </li>
                                    <li>
                                        <a href="page_datatables.html"><i class="fa fa-th"></i>DataTables</a>
                                    </li>
                                    <li>
                                        <a href="page_datatables_editable.html"><i class="fa fa-pencil"></i>Editable DataTables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-leaf"></i>Components</a>
                                <ul>
                                    <li>
                                        <a href="page_animations.html"><i class="fa fa-certificate animation-pulse"></i>CSS3 Animations</a>
                                    </li>
                                    <li>
                                        <a href="page_gallery.html"><i class="fa fa-picture-o"></i>Gallery</a>
                                    </li>
                                    <li>
                                        <a href="page_inbox.html"><i class="fa fa-envelope"></i>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="page_chatui.html"><i class="fa fa-comments"></i>ChatUI</a>
                                    </li>
                                    <li>
                                        <a href="page_charts.html"><i class="fa fa-bar-chart-o"></i>Charts</a>
                                    </li>
                                    <li>
                                        <a href="page_calendar.html"><i class="fa fa-calendar"></i>Calendar</a>
                                    </li>
                                    <li>
                                        <a href="page_maps.html"><i class="fa fa-map-marker"></i>Maps</a>
                                    </li>
                                    <li>
                                        <a href="page_syntax_highlighting.html"><i class="fa fa-flask"></i>Syntax Highlighting</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-tint"></i>Icons</a>
                                <ul>
                                    <li>
                                        <a href="page_glyphicons_pro.html"><i class="gi gi-heart"></i>Glyphicons Pro</a>
                                    </li>
                                    <li>
                                        <a href="page_fontawesome.html"><i class="fa fa-gift"></i>FontAwesome</a>
                                    </li>
                                    <li>
                                        <a href="page_gemicon.html"><i class="fa fa-smile-o"></i>Gemicon</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-o"></i>Pages</a>
                                <ul>
                                    <li>
                                        <a href="page_search_results.html"><i class="fa fa-search"></i>Search Results</a>
                                    </li>
                                    <li>
                                        <a href="page_price_tables.html"><i class="fa fa-ticket"></i>Price Tables</a>
                                    </li>
                                    <li>
                                        <a href="page_forum.html"><i class="fa fa-comment"></i>Forum</a>
                                    </li>
                                    <li>
                                        <a href="page_article.html"><i class="fa fa-pencil"></i>Article</a>
                                    </li>
                                    <li>
                                        <a href="page_invoice.html"><i class="fa fa-book"></i>Invoice</a>
                                    </li>
                                    <li>
                                        <a href="page_profile.html"><i class="fa fa-user"></i>Profile</a>
                                    </li>
                                    <li>
                                        <a href="page_faq.html"><i class="fa fa-flag"></i>FAQ</a>
                                    </li>
                                    <li>
                                        <a href="page_errors.html"><i class="fa fa-exclamation-triangle"></i>Errors</a>
                                    </li>
                                    <li>
                                        <a href="page_blank.html"><i class="fa fa-circle-o"></i>Blank</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="page_login.html"><i class="fa fa-power-off"></i>Login Page</a>
                            </li>
                            <li>
                                <a href="page_landing.html"><i class="fa fa-rocket"></i>Landing Page</a>
                            </li> -->
                    </ul>
                </nav>
                <!-- END Primary Navigation -->

                <!-- Demo Theme Options -->
                {{-- <div id="theme-options" class="text-left visible-md visible-lg">
                    <a href="javascript:void(0)" class="btn btn-theme-options"><i class="fa fa-cog"></i> Theme
                        Options</a>
                    <div id="theme-options-content">
                        <h5>Color Themes</h5>
                        <ul class="theme-colors clearfix">
                            <li class="active">
                                <a href="javascript:void(0)" class="themed-background-default themed-border-default"
                                    data-theme="default" data-toggle="tooltip" title="Default"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-deepblue themed-border-deepblue"
                                    data-theme="css/themes/deepblue.css" data-toggle="tooltip" title="DeepBlue"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-deepwood themed-border-deepwood"
                                    data-theme="css/themes/deepwood.css" data-toggle="tooltip" title="DeepWood"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="themed-background-deeppurple themed-border-deeppurple"
                                    data-theme="css/themes/deeppurple.css" data-toggle="tooltip" title="DeepPurple"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-deepgreen themed-border-deepgreen"
                                    data-theme="css/themes/deepgreen.css" data-toggle="tooltip" title="DeepGreen"></a>
                            </li>
                        </ul>
                        <h5>Header</h5>
                        <label id="topt-fixed-header-top" class="switch switch-success" data-toggle="tooltip"
                            title="Top fixed header"><input type="checkbox"><span></span></label>
                        <label id="topt-fixed-header-bottom" class="switch switch-success" data-toggle="tooltip"
                            title="Bottom fixed header"><input type="checkbox"><span></span></label>
                        <label id="topt-fixed-layout" class="switch switch-success" data-toggle="tooltip"
                            title="Fixed layout (for large resolutions)"><input type="checkbox"><span></span></label>
                    </div>
                </div> --}}
                <!-- END Demo Theme Options -->
            </aside>
            <!-- END Sidebar -->

            <!-- Page Content -->
            <div id="page-content">
                <!-- Navigation info -->
                <ul id="nav-info" class="clearfix">
                    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="">Dashboard</a></li>
                </ul>
                <!-- END Navigation info -->

                <!-- Nav Dash -->
                <ul class="nav-dash">
                    <!-- <li>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Users" class="animation-fadeIn">
                                <i class="fa fa-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Comments" class="animation-fadeIn">
                                <i class="fa fa-comments"></i> <span class="badge badge-success">3</span>
                            </a>
                        </li> -->
                    <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Calendar" class="animation-fadeIn">
                            <i class="fa fa-calendar"></i> <span class="badge badge-inverse">5</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Photos" class="animation-fadeIn">
                            <i class="fa fa-camera-retro"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Projects" class="animation-fadeIn">
                            <i class="fa fa-paperclip"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Tasks" class="animation-fadeIn">
                            <i class="fa fa-tasks"></i> <span class="badge badge-warning">1</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Reader" class="animation-fadeIn">
                            <i class="fa fa-book"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Settings" class="animation-fadeIn">
                            <i class="fa fa-cogs"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Nav Dash -->

                <!-- Tiles -->
                <!-- Row 1 -->




                @yield('dashboard')
                @yield('allemployer')
                @yield('job_slots')
                @yield('all_license')
                @yield('all_messages')
                @yield('all_team_member')
                @yield('interview_tracking')

                @yield('allcandidate')
                @yield('candidate_assesment')
                @yield('candidate_interview_tracking')

                @yield('assesment_creation')
                @yield('assessment_skills')
                @yield('assessment_values')
                @yield('assessment_behaviour')
                @yield('assessment_form')


                <!-- Row 2 -->

                <!-- END Row 3 -->
                <!-- END Tiles -->
            </div>
            <!-- END Page Content -->

            <!-- Footer -->
            <footer>
                <span id="year-copy"></span> &copy; <strong><a href="">Re-Invent Crews</a></strong> - Crafted with <i
                    class="fa fa-heart text-danger"></i> by <strong><a href="" target="">Aligned</a></strong>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Inner Container -->
    </div>
    <!-- END Page Container -->

    <!-- Scroll to top link, check main.js - scrollToTop() -->
    <a href="javascript:void(0)" id="to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- User Modal Settings, appears when clicking on 'User Settings' link found on user dropdown menu (header, top right) -->
    <div id="modal-user-settings" class="modal">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4>Profile Settings</h4>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Content -->
                <div class="modal-body">
                    <!-- Tab links -->
                    <ul id="example-user-tabs" class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#example-user-tabs-account"><i class="fa fa-cogs"></i> Account</a>
                        </li>
                        <li><a href="#example-user-tabs-profile"><i class="fa fa-user"></i> Profile</a></li>
                    </ul>
                    <!-- END Tab links -->

                    <!-- END Tab Content -->
                    <div class="tab-content">
                        <!-- First Tab -->
                        <div class="tab-pane active" id="example-user-tabs-account">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Password changed!
                            </div>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Username</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static">administrator</p>
                                        <span class="help-block">You can't change your username!</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-pass">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="example-user-pass" name="example-user-pass"
                                            class="form-control">
                                        <span class="help-block">if you want to change your password enter your current
                                            for confirmation!</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-newpass">New
                                        Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="example-user-newpass" name="example-user-newpass"
                                            class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END First Tab -->

                        <!-- Second Tab -->
                        <div class="tab-pane" id="example-user-tabs-profile">
                            <h4 class="page-header-sub">Image</h4>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <img src="img/placeholders/image_dark_120x120.png" alt="image"
                                            class="img-responsive push">
                                    </div>
                                    <div class="col-md-9">
                                        <form action="index.html" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal">
                                <h4 class="page-header-sub">Details</h4>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-firstname">Firstname</label>
                                    <div class="col-md-9">
                                        <input type="text" id="example-user-firstname" name="example-user-firstname"
                                            class="form-control" value="John">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-lastname">Lastname</label>
                                    <div class="col-md-9">
                                        <input type="text" id="example-user-lastname" name="example-user-lastname"
                                            class="form-control" value="Doe">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-gender">Gender</label>
                                    <div class="col-md-9">
                                        <select id="example-user-gender" name="example-user-gender"
                                            class="form-control">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-bio">Bio</label>
                                    <div class="col-md-9">
                                        <textarea id="example-user-bio" name="example-user-bio"
                                            class="form-control textarea-elastic" rows="3">Bio Information..</textarea>
                                    </div>
                                </div>
                                <h5 class="page-header-sub">Social</h5>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-fb">Facebook</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" id="example-user-fb" name="example-user-fb"
                                                class="form-control">
                                            <span class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-twitter">Twitter</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" id="example-user-twitter" name="example-user-twitter"
                                                class="form-control">
                                            <span class="input-group-addon"><i class="fa fa-twitter fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-pinterest">Pinterest</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" id="example-user-pinterest" name="example-user-pinterest"
                                                class="form-control">
                                            <span class="input-group-addon"><i class="fa fa-pinterest fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="example-user-github">Github</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" id="example-user-github" name="example-user-github"
                                                class="form-control">
                                            <span class="input-group-addon"><i class="fa fa-github fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END Second Tab -->
                    </div>
                    <!-- END Tab Content -->
                </div>
                <!-- END Modal Content -->

                <!-- Modal footer -->
                <div class="modal-footer remove-margin">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button class="btn btn-success"><i class="fa fa-spinner fa-spin"></i> Save changes</button>
                </div>
                <!-- END Modal footer -->
            </div>
            <!-- END Modal Content -->
        </div>
        <!-- END Modal Dialog -->
    </div>
    <!-- END User Modal Settings -->

    <!-- Excanvas for canvas support on IE8 -->
    <!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

    <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (make sure this is included at the end of the body tag) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

    <!-- Bootstrap.js -->
    <script src="{{asset('panel/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Jquery plugins and custom javascript code -->
    <script src="{{asset('panel/js/plugins.js')}}"></script>
    <script src="{{asset('panel/js/main.js')}}"></script>

    <!-- Javascript code only for this page -->
    <script>
        $(function () {
            // Initialize dash Datatables
            $('#dash-example-orders').dataTable({
                columnDefs: [{ orderable: false, targets: [0] }],
                pageLength: 6,
                lengthMenu: [[6, 10, 30, -1], [6, 10, 30, "All"]]
            });
            $('.dataTables_filter input').attr('placeholder', 'Search');

            // Dash example stats
            var dashChart = $('#dash-example-stats');

            var dashChartData1 = [
                [0, 200],
                [1, 250],
                [2, 360],
                [3, 584],
                [4, 1250],
                [5, 1100],
                [6, 1500],
                [7, 1521],
                [8, 1600],
                [9, 1658],
                [10, 1623],
                [11, 1900],
                [12, 2100],
                [13, 1700],
                [14, 1620],
                [15, 1820],
                [16, 1950],
                [17, 2220],
                [18, 1951],
                [19, 2152],
                [20, 2300],
                [21, 2325],
                [22, 2200],
                [23, 2156],
                [24, 2350],
                [25, 2420],
                [26, 2480],
                [27, 2320],
                [28, 2380],
                [29, 2520],
                [30, 2590]
            ];
            var dashChartData2 = [
                [0, 50],
                [1, 180],
                [2, 200],
                [3, 350],
                [4, 700],
                [5, 650],
                [6, 700],
                [7, 780],
                [8, 820],
                [9, 880],
                [10, 1200],
                [11, 1250],
                [12, 1500],
                [13, 1195],
                [14, 1300],
                [15, 1350],
                [16, 1460],
                [17, 1680],
                [18, 1368],
                [19, 1589],
                [20, 1780],
                [21, 2100],
                [22, 1962],
                [23, 1952],
                [24, 2110],
                [25, 2260],
                [26, 2298],
                [27, 1985],
                [28, 2252],
                [29, 2300],
                [30, 2450]
            ];

            // Initialize Chart
            $.plot(dashChart, [
                { data: dashChartData1, lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.05 }, { opacity: 0.05 }] } }, points: { show: true }, label: 'All Visits' },
                { data: dashChartData2, lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.05 }, { opacity: 0.05 }] } }, points: { show: true }, label: 'Unique Visits' }],
                {
                    legend: {
                        position: 'nw',
                        backgroundColor: '#f6f6f6',
                        backgroundOpacity: 0.8
                    },
                    colors: ['#555555', '#db4a39'],
                    grid: {
                        borderColor: '#cccccc',
                        color: '#999999',
                        labelMargin: 5,
                        hoverable: true,
                        clickable: true
                    },
                    yaxis: {
                        ticks: 5
                    },
                    xaxis: {
                        tickSize: 2
                    }
                }
            );

            // Create and bind tooltip
            var previousPoint = null;
            dashChart.bind("plothover", function (event, pos, item) {

                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0],
                            y = item.datapoint[1];

                        $('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong> visits</div>')
                            .css({ top: item.pageY - 30, left: item.pageX + 5 })
                            .appendTo("body")
                            .show();
                    }
                }
                else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        });
    </script>
</body>

</html>