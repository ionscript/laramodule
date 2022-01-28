@extends('account::theme.default.layouts.auth')

@section('title')
    Confirm Password
@endsection


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
                        <h4>{{ __('Confirm Password') }}</h4>
                        <div class="form-holder">
                            <form class="ui form" method="POST" action="{{ route('account.password.confirm') }}">
                                @csrf
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    {{ __('Please confirm your password before continuing.') }}
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <i class="fas fa-unlock-alt"></i>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <div class="ui error message" style="display: block; margin-bottom: 1em">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <button class="ui button" type="submit">{{ __('Reset Password') }}</button>
                                @if (Route::has('account.password.request'))
                                    <a class="btn btn-link" href="{{ route('account.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
