@extends('agent::theme.default.layouts.auth')

@section('content')
    <div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
        <div class="admin-des">
            <h3>Welcome Agent</h3>
            <p>Let us Answer, Route and Manage your Tax Office Calls </p>
            <img src="/images/theme/default/agent.png" alt="logo">
        </div>
    </div>
    <div class="sixteen wide mobile eight wide tablet eight wide computer column div-section">
        <div class="login-form ">
            <div class="form-structor">
                <div class="signup" id="s">
                    <h4>Sign in</h4>
                    <div class="form-holder">
                        <form class="ui form" method="POST" action="{{ route('agent.login') }}">
                            <div class="form-group">
                                <label for="eEmail1">Email Address</label>
                                <i class="far fa-envelope"></i>
                                <input type="email" name="email" class="form-control" id="eEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') ?? '' }}">
                                @error('email')
                                <div class="ui error message" style="display: block; margin-bottom: 1em">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="spassword">Password</label>
                                <i class="fas fa-unlock-alt"></i>
                                <input type="password" name="password" placeholder="Password" id="spassword">
                                @error('password')
                                <div class="ui error message" style="display: block; margin-bottom: 1em">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <button class="ui button" type="submit">Sign in</button>
                        </form>
                        <p class="form-title" id="login">Forgot password?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
