<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BizLand Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('user-theme/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('user-theme/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('user-theme/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('user-theme/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('user-theme/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('user-theme/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('user-theme/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('user-theme/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('user-theme/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  @include('user.layout.header')
  <!-- End Header -->
{{-- END HEADER ------------------=========================================================== --}}

  <section id="" class="">
    <div class="container">
     
      @yield('content')

    </div>
  </section><!-- End Hero -->


 
{{-- FOOTER --------------------===================================================-------- --}}

@include('user.layout.footer')
    <!-- End Footer -->
  

  <!-- Vendor JS Files -->
  <script src="{{asset('user-theme/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('user-theme/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('user-theme/assets/js/main.js')}}"></script>
  @yield('script')
</body>

</html>