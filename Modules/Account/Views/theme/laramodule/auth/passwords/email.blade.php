@extends('account::theme.default.layouts.master-without-nav')

@section('title')
    Reset Password
@endsection

@section('body')
    <body>
    @endsection

    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="index" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary"> {{ __('Reset Password') }}</h5>
                                            <p>Re-Password with Frontoffice.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="index">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-2">
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Enter your Email and instructions will be sent to you!
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form class="form-horizontal" action="{{ route('account.password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="user-email">{{ __('E-Mail Address') }}</label>
                                            <input id="user-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="button">{{ __('Send Password Reset Link') }}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Remember It ? <a href="/account/login" class="font-weight-medium text-primary"> Sign In here</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Frontoffice App</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
