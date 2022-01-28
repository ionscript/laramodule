@extends('account::theme.default.layouts.auth')

@section('content')
<div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
    <div class="admin-des">
        <h3>Welcome</h3>
        <p>Let us Answer, Route and Manage your Tax Office Calls </p>
        <img src="/images/theme/default/adminl.png" alt="logo">
    </div>
</div>
<div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
    @if (session('resent'))
        <div class="ui success message">
            <i class="close icon"></i>
            <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
        </div>
    @endif

    <div class="login-form ">
        <div class="form-structor">
            <div class="signup" id="s">
                <h4>Sign in</h4>
                <div class="form-holder">
                    <div class="form-group">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                    </div>

                    <form class="ui form" method="POST" action="{{ route('account.verification.resend') }}">
                        <button class="ui button link" type="submit">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
