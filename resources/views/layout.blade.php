<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- FAVICON -->
    <link href="img/favicon.png')}}" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->


    <link rel="stylesheet" href="{{asset('asset/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/bootstrap/css/bootstrap-slider.css')}}">
    <!-- Font Awesome -->
    <link href="{{asset('asset/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{asset('asset/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('asset/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{asset('asset/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
    <link href="{{asset('asset/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">


</head>

<body class="body-wrapper">

    @include('components.header')

    <!--==================================
=            User Profile            =
===================================-->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
    <!--============================
=            Footer            =
=============================-->
    @include('components.footer')


    <!-- JAVASCRIPTS -->
    <script src="{{asset('asset/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
    <!-- tether js -->
    <script src="{{asset('asset/plugins/tether/js/tether.min.js')}}"></script>
    <script src="{{asset('asset/plugins/raty/jquery.raty-fa.js')}}"></script>
    <script src="{{asset('asset/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{asset('asset/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('asset/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('asset/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="{{asset('asset/plugins/google-map/gmap.js')}}"></script>
    <script src="{{asset('asset/js/script.js')}}"></script>
    @yield('javascript')
</body>

</html>