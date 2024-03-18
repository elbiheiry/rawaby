<!DOCTYPE html>
<html>
    <head>

        <!-- Basic page needs
        ===========================-->
        <title>{{$settings->name}} | @yield('title')</title>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile specific metas
        ===========================-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/fav.png')}}">


        <!-- Css Base And Vendor
        ===========================-->
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/fontawesome-free-5.1.0-web/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl-carousel/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl-carousel/css/owl.theme.css')}}">

        <link rel="stylesheet" href="{{asset('assets/site/vendor/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/timepicker/jquery.timepicker.css')}}">

        
        <!-- Site Style
        ===========================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="preloader">
            <div id="loading"></div>
        </div>
        <div id="wrapper">
            @include('site.layouts.header')
            <div class="main">
                @yield('content')
                
                @include('site.layouts.footer')
            </div><!--End main-->
        </div><!--End wrapper-->

        <!--Scribts Base And Vendor
        ================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery-validation/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery-validation/js/additional-methods.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/timepicker/jquery.timepicker.min.js')}}"></script>

        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.validate.js')}}"></script>
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}"></script>

        @yield('js')
        <script src="{{asset('assets/admin/js/jquery.form.js')}}"></script>
        <script src="{{asset('assets/site/js/site.js')}}"></script>

    </body>
</html>