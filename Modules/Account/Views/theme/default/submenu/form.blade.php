@extends('account::theme.default.layouts.master')

@section('title') Sub Menu Form @endsection

@section('content')
    <h2 class="ui header">Sub Menu Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                {{--                 @csrf--}}
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Queue</h4>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Name: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="name" value="{{$name ?? old('name') ?? ''}}">
                                                @if ($errors->has('name') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('name') }}
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

                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Queue</h4>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Name: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="name" value="{{$name ?? old('name') ?? ''}}">
                                                @if ($errors->has('name') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('name') }}
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
                    <a href="{{route('account.submenu')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
