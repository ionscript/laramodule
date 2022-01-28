@extends('account::theme.default.layouts.master')

@section('title') SIP Form @endsection

@section('content')
    <h2 class="ui header">Sip Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
{{--                 @csrf--}}
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Sip</h4>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Sip Number: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="number" value="{{$number ?? old('number') ?? ''}}">
                                                @if ($errors->has('number') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('number') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                            <label>Agent:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="agent_id" class="select2">
                                                    @forelse($agents as $agent)
                                                        @if(($agent_id ?? old('agent_id')) === $agent->id)
                                                            <option value="{{$agent->id}}" selected>{{$agent->firstname}} {{$agent->lastname}} ({{$agent->username}})</option>
                                                        @else
                                                            <option value="{{$agent->id}}">{{$agent->firstname}} {{$agent->lastname}} ({{$agent->username}})</option>
                                                        @endif
                                                    @empty
                                                        <option value=""> --- None --- </option>
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('agent_id') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('agent_id') }}
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
                    <a href="{{route('account.sip')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
