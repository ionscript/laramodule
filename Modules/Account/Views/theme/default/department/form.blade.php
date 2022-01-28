@extends('account::theme.default.layouts.master')

@section('title') Office Form @endsection

@section('content')
    <h2 class="ui header"> Department Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                {{--            @csrf--}}
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Office</h4>
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
                                        <div class="ui">
                                            <label>Office:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="office_id" class="select2">
                                                    <option value="0"> Default </option>
                                                    @foreach($offices as $office)
                                                        @if(($office_id ?? old('office_id')) === $office->id)
                                                            <option value="{{$office->id}}" selected>{{$office->name}}</option>
                                                        @else
                                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('office_id') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('office_id') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Phone Number:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="phone_id" class="select2">
                                                    <option value="0"> Default </option>
                                                    @foreach($phones as $phone)
                                                        @if(($phone_id ?? old('phone_id')) === $phone->id)
                                                            <option value="{{$phone->id}}" selected>{{$phone->name}}</option>
                                                        @else
                                                            <option value="{{$phone->id}}">{{$phone->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('phone_id') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('phone_id') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Default</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" value="1" name="default" {{ $default ?? (old('default') ? 'checked' : '') }}>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div>
                    <a href="{{route('account.department')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
