@extends('admin::theme.default.layouts.master')

@section('title') Account Form @endsection

@section('content')
    <div style="width: 100%">
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="personal">Personal</a>
            <a class="item" data-tab="offices">Offices</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="personal">
            <form class="ui form" method="POST" action="{{ route('admin.options.personal.update') }}">
                @csrf
                <div class="field {{ $errors->has('name') ? ' error' : ''}}">
                    <label>{{ __("Name") }}</label>
                    <input id="first_name" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <div class="ui error message" style="display: block; margin-bottom: 1em">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                </div>

                <div class="field {{ $errors->has('email') ? ' error' : ''}}">
                    <label>{{ __("Email") }}</label>
                    <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>

                    @if ($errors->has('email'))
                        <div class="ui error message" style="display: block; margin-bottom: 1em">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>

                <div class="field {{ $errors->has('password') ? ' error' : ''}}">
                    <label>{{ __("Password") }}</label>
                    <input id="password" type="password" name="password" value="{{ old('password') }}">

                    @if ($errors->has('password'))
                        <div class="ui error message" style="display: block; margin-bottom: 1em">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                <div class="field {{ $errors->has('password_confirmation') ? ' error' : ''}}">
                    <label>{{ __("Confirm password") }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">

                    @if ($errors->has('password_confirmation'))
                        <div class="ui error message" style="display: block; margin-bottom: 1em">
                            <p>{{ $errors->first('password_confirmation') }}</p>
                        </div>
                    @endif
                </div>

                <button class="ui button" type="submit">Update</button>
            </form>
        </div>

        <div class="ui bottom attached tab segment" data-tab="offices">
            <button class="ui primary button" id="addNewOffice">
                Add new
            </button>
            <table class="ui single line table" id="officeTablePersonal" style="width: 100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Number</th>
                    <th>Default</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="ui modal" id="newOfficeModal">
        <div class="header">Add new office</div>
        <div class="content">
            <form class="ui form">
                <div class="field" id="callCenterNameBlock">
                    <label>Name</label>
                    <input type="text" id="callCenterName" placeholder="Office Name">
                </div>

                <button class="ui button" id="addCallCenter" type="button">Submit</button>
            </form>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.menu .item').tab();
    </script>
@endpush

