@extends('account::theme.default.layouts.master-without-nav')

@section('title')
    Register
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
                                            <h5 class="text-primary">{{ __('Register') }}</h5>
                                            <p>Get your free Frontoffice account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="/">
                                        <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <i class="bx bx-analyse text-primary" style="font-size: 28px"></i>
                                        </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="POST" action="{{ route('account.register') }}" class="form-horizontal">
                                            @csrf
                                        <div class="form-group">
                                            <label for="user-name">{{ __('Username') }}</label>
                                            <input id="user-name" type="text" placeholder="Enter username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="user-firstname">{{ __('First Name') }}</label>
                                            <input id="user-firstname" type="text" placeholder="Enter first name" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus>
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="user-lastname">{{ __('Last Name') }}</label>
                                            <input id="user-lastname" type="text" placeholder="Enter last name" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="user-email">{{ __('E-Mail Address') }}</label>
                                            <input id="user-email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="user-password">{{ __('Password') }}</label>
                                            <input id="user-password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="user-password-confirm">{{ __('Confirm Password') }}</label>
                                            <input id="user-password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{ __('Register') }}</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the Frontoffice <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Already have an account ? <a href="/account/login" class="font-weight-medium text-primary"> Login</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Frontoffice App</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
