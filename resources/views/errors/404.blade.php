<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>404 Error Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">

    @yield('css')

<!-- App css -->
    <link href="{{ URL::asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />
</head>

@yield('body')
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
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h1 class="display-2 font-weight-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                    <h4 class="text-uppercase">Sorry, page not found</h4>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="/admin">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div>
                    <img src="/assets/images/error-img.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@yield('script-bottom')
</body>
</html>
