@extends('account::theme.default.layouts.auth')

@section('content')
<div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
    <div class="admin-des">
        <h3>Welcome Admin</h3>
        <p>Let us Answer, Route and Manage your Tax Office Calls </p>
        <img src="{{asset('images/adminl.png')}}" alt="logo">
    </div>
</div>
<div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
    <div class="login-form ">
        <div class="form-structor">
            <div class="signup" id="s">
                <h4>Registration</h4>
                <div class="form-holder">
                    <form class="ui form" method="POST" action="{{ route('register.form') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <i class="far fa-user"></i>
                            <input type="text" id="name" name="name" placeholder="Name" required>
                            @if ($errors->has('name'))
                                <div class="ui error message" style="display: block; margin-bottom: 1em">
                                    <p>{{ $errors->first('name') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <i class="far fa-envelope"></i>
                            <input type="text" id="email" name="email" placeholder="E-Mail Address" required>
                            @if ($errors->has('email'))
                                <div class="ui error message" style="display: block; margin-bottom: 1em">
                                    <p>{{ $errors->first('email') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <div class="ui error message" style="display: block; margin-bottom: 1em">
                                    <p>{{ $errors->first('password') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                            @if ($errors->has('password_confirmation'))
                                <div class="ui error message" style="display: block; margin-bottom: 1em">
                                    <p>{{ $errors->first('password_confirmation') }}</p>
                                </div>
                            @endif
                        </div>
                        <button class="ui button" type="submit">Registration</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
