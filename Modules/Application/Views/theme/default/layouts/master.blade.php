<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | Frontoffice</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png')}}">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.css')}}">

        @yield('css')
        <!-- App css -->
        <link href="{{ URL::asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />
    </head>

    @section('body')
    @show
    <body data-spy="scroll" data-target="#topnav-menu" data-offset="60">
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
          <!-- Begin page -->
            @include('application::theme.default.layouts.topbar')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            @yield('content')
            <!-- End Page-content -->
            @include('application::theme.default.layouts.footer')

            <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>

    <script src="{{ URL::asset('assets/libs/jquery.easing/jquery.easing.min.js')}}"></script>

    <!-- owl.carousel js -->
    <script src="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.js')}}"></script>

    <!-- ICO landing init -->
    <script src="{{ URL::asset('assets/js/pages/ico-landing.init.js')}}"></script>

    @yield('script')

    <!-- App js -->
    <script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

    @yield('script-bottom')
    </body>
</html>