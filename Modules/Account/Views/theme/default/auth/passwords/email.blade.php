@extends('account::theme.default.layouts.auth')

@section('title')
    Reset Password
@endsection

@section('content')
<div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
    <div class="admin-des">
        <h3>Welcome</h3>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="ui form" method="POST" action="{{ route('account.password.email') }}">
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
                        <button class="ui button" type="submit">{{ __('Send Password Reset Link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
