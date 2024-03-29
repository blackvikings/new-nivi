<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    @stack("css")

    @toastr_css
    @if(Request::is('member/register'))
        <style>
            h5 { width:100%; text-align:center; border-bottom: 1px solid #000; line-height:0.1em; margin:10px 0 20px; }
            h5 span { background:#fff; padding:0 10px; font-size: 13px;  }
        </style>
    @endif
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{ route('home') }}"><img src="{{ asset('public/assets/ourImages/logo-2.png') }}" class="img-fluid" alt="Logo" style="padding-left: 32px;"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                 <li class="{{ request()->is('about') ? 'active' : '' }} "><a href="{{ route('about') }}">About Us</a></li>
                 <li class="{{ request()->is('service') ? 'active' : '' }}"><a href="{{ route('service') }}">Service</a></li>
            @auth('members')
                <li class="drop-down {{ request()->is('add-member') || request()->is('direct-member') || request()->is('view-member') ? 'active' : '' }}"><a href="">Member</a>
                    <ul>
                        <li class="{{ request()->is('add-member') ? 'active' : '' }}"><a href="{{ route('member.addMember') }}">Add Member</a></li>
                        <li class="{{ request()->is('direct-member') ? 'active' : '' }}"><a href="{{ route('member.direct') }}">Direct Sponsor</a></li>
                        <li class="{{ request()->is('binary-tree') ? 'active' : '' }}"><a href="{{ route('member.binaryTree') }}">Binary Tree</a></li>
                        <li class="{{ request()->is('view-member') ? 'active' : '' }}"><a href="{{ route('member.view') }}">View Members</a></li>
                    </ul>
                </li>
            @endauth
                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>

                @guest('members')
                <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ route('login') }}" >Sign in</a></li>
                <li class="{{ request()->is('register') ? 'active' : '' }}"><a href="{{ route('register') }}" >Sign up</a></li>


                @else
                <li class="drop-down"><a href="#" style="color:green;">{{ Auth::guard('members')->user()->name }}</a>
                    <ul>
                        <li><a href="#">My Profile</a></li>
                        <li><a href="javascript:void(0);" onclick="$('#logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">-->
                                @csrf
                        </form>
                    </ul>
                </li>
                 @endguest

            </ul>


        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

@if(!Request::is('/'))
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>@yield('title')</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>@yield('title')</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
@endif
@yield("content")
<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <!-- <img src="./assets/ourImages/logo-2-removebg-preview.png" class="img-fluid" alt="Logo" height="50px" style="max-height: 70px;"> -->
            <h1 class="logo mr-auto"><a href="index.html"><img src="./public/assets/ourImages/logo-2-removebg-preview.png" class="img-fluid" alt="Logo" height="50px" style="max-height: 70px;"><br><span style="font-size: 18px; text-transform: uppercase;">Nivi Health Care Pvt. Ltd.</span></a></h1>
            <p>
              92/2A, Kharmora<br>
              Korba(C.G.), 495677<br><br>
              <strong>Phone:</strong> 7470819273<br>
              <strong>Email:</strong> nivihealthcare@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('register') }}">Sign Up</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('login') }}">Sign In</a></li>
              {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            {{-- <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul> --}}
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Follow On Us</h4>
           {{--  <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form> --}}
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>{{ config('app.name') }}</span></strong> All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">Digitech</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
{{-- <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script> --}}
@jquery
@toastr_js
@toastr_render
<script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
{{--<script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>--}}
<script src="{{ asset('public/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
<script src="{{ asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('public/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('public/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/vendor/aos/aos.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('public/assets/js/main.js') }}"></script>
@stack("js")
</body>

</html>
