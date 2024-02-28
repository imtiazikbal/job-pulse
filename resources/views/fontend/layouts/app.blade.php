<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job Pulse </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/flaticon.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/price_rangs.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/slicknav.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/animate.min.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/themify-icons.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/slick.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/nice-select.css">
            <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/style.css">
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <style>
              .colored-toast.swal2-icon-success {
            background-color: #58f100 !important;
          }
          
          .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
          }
          
          .colored-toast.swal2-icon-warning {
            background-color: #ff0000 !important;
          }
          
          .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
          }
          
          .colored-toast.swal2-icon-question {
            background-color: #f6f600 !important;
          }
          
          .colored-toast .swal2-title {
            color: white;
          }
          
          .colored-toast .swal2-close {
            color: white;
          }
          .colored-toast .swal2-html-container {
            color: white;
          }
            </style>
        </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img width="50%" src="{{ asset('assets') }}/images/jobPulse/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
   @include('fontend.layouts.header')
   @yield('content')
  @include('fontend.layouts.footer')

  <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('fontend') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('fontend') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('fontend') }}/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('fontend') }}/assets/js/owl.carousel.min.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/slick.min.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/price_rangs.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('fontend') }}/assets/js/wow.min.js"></script>
		<script src="{{ asset('fontend') }}/assets/js/animated.headline.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('fontend') }}/assets/js/jquery.scrollUp.min.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/jquery.nice-select.min.js"></script>
		<script src="{{ asset('fontend') }}/assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="{{ asset('fontend') }}/assets/js/contact.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/jquery.form.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/jquery.validate.min.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/mail-script.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('fontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('fontend') }}/assets/js/main.js"></script>
        
    </body>
</html>