<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Easy Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/frontend_images/favicon.ico')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500.00,700,300' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/67b077845a.js" crossorigin="anonymous"></script>


    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/lightslider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/magnific-popup.css') }}">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/passtrength.css') }}" rel="stylesheet">
	<script src="{{ asset('js/frontend_js/modernizr.js') }}"></script> <!-- Modernizr -->

    <script type='text/javascript'
        src='//platform-api.sharethis.com/js/sharethis.js#property=5cc08788f3971d0012e248e5&product=inline-share-buttons'
        async='async'></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    @include('layouts.frontLayout.front_header')





    @yield('content')

    @include('layouts.frontLayout.front_footer')
<!-- Code begins here -->

<a href="#" class="float">
    <i class="fab fa-facebook-messenger my-float"></i>
    </a>
    <a href="https://api.whatsapp.com/send?phone=923130787415" target="_blank" class="float1">
        <i class="fab fa-whatsapp my-float"></i>
        </a>




    <!-- all js here -->
    <!-- jquery latest version -->

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/frontend_js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/popper.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script>
    <!-- Sweet alert -->
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




    <!-- wow js -->
    <script src="{{asset('js/frontend_js/wow.min.js')}}"></script>
    <script type="text/javascript">
        new WOW().init();

    </script>

    <!-- Validate js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <!-- password strength js-->
    <script src="{{ asset('js/frontend_js/passtrength.js') }}"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5edc987ae84d149c"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('js/frontend_js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('js/frontend_js/wow.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/animated.headline.js') }}"></script>
<script src="{{ asset('js/frontend_js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/frontend_js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/lightslider.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/velocity.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/jquery.magnific-popup.min.js') }}"></script>


    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('js/frontend_js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.sticky.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- plugins js -->
  <script src="{{asset('js/frontend_js/plugins.js')}}"></script>
         <!-- main Js -->
         <script src="{{asset('js/frontend_js/main.js')}}"></script>
         @yield('scripts')
</body>

</html>
