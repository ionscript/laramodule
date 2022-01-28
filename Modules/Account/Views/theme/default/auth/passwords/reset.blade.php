@extends('account::theme.default.layouts.auth')

@section('content')
    <div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
        <div class="admin-des">
            <h3>Welcome Admin</h3>
            <p>Let us Answer, Route and Manage your Tax Office Calls </p>
            <img src="/images/theme/default/adminl.png" alt="logo">
        </div>
    </div>
    <div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
        <div class="login-form ">
            <div class="form-structor">
                <div class="signup" id="s">
                    <h4>{{ __('Reset Password') }}</h4>
                    <div class="form-holder">
                        <form class="ui form" method="POST" action="{{ route('account.password.reset') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">


                            <div class="alert alert-success text-center mb-4" role="alert">
                                {{ __('Please confirm your password before continuing.') }}
                            </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
