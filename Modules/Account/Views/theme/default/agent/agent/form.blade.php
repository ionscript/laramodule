@extends('account::theme.default.layouts.master')

@section('title') Agent Form @endsection

@section('content')
    <h2 class="ui header"> Agent Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                {{--            @csrf--}}
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Agent</h4>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Username: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="username" value="{{$username ?? old('username') ?? ''}}">
                                                @if ($errors->has('username') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('username') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">First Name: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="firstname" value="{{$firstname ?? old('firstname') ?? ''}}">
                                                @if ($errors->has('firstname') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('firstname') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Last Name: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="lastname" value="{{$lastname ?? old('lastname') ?? ''}}">
                                                @if ($errors->has('lastname') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('lastname') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Email: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="email" name="email" value="{{$email ?? old('email') ?? ''}}">
                                                @if ($errors->has('email') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Description: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="description" value="{{$description ?? old('description') ?? ''}}">
                                                @if ($errors->has('description') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Password: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="password" name="password" value="{{$password ?? old('password') ?? ''}}">
                                                @if ($errors->has('password') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Password Confirm: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="password" name="password_confirmation" value="{{$password_confirmation ?? old('password_confirmation') ?? ''}}">
                                                @if ($errors->has('password_confirmation') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('password_confirmation') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Department:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="department_id" class="select2">
                                                    @forelse($departments as $department)
                                                        @if(($department_id ?? old('department_id')) === $department->id)
                                                            <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                                        @else
                                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                                        @endif
                                                    @empty
                                                    <option value="0"> Default </option>
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('department_id') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('department_id') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div>
                    <a href="{{route('account.agent')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
