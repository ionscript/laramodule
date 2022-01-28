@extends('account::theme.default.layouts.master')

@section('title') Contact Form @endsection

@section('content')
    <h2 class="ui header"> Contact Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                {{--            @csrf--}}
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Contact</h4>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Phone Number: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="phone" value="{{$phone ?? old('phone') ?? ''}}">
                                                @if ($errors->has('phone') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('phone') }}
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

                            </div>
                        </div>


                    </div>
                </div>
                <div>
                    <a href="{{route('account.contact')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
