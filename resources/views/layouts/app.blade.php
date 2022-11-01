<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HBS | Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('dashboard')}}">
                    <img src="{{asset('assets/images/logo.svg')}}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}">
                    <img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                            <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image">
                            <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{Auth::user()->name}}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-2 text-primary" ></i>
                                Signout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.navigation')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    {{$slot}}
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Project 2022</span>
                        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> <a href="https://faraimunashe.me" target="_blank">Developer</a> from Faraimunashe.me</span>
                    </div>
                </footer>
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/vendors/chart.js')}}/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
