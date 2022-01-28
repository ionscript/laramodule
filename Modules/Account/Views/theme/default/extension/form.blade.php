@extends('account::theme.default.layouts.master')

@section('title') Extension Form @endsection

@section('content')
    <h2 class="ui header">Extension Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                {{--            @csrf--}}
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Extension</h4>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Extension Number: </label>
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
                                        <div class="ui">
                                            <label>Phone Number:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="phone_id" class="select2">
                                                    @forelse($phones as $phone)
                                                        @if(($phone_id ?? old('phone_id')) === $phone->id)
                                                            <option value="{{$phone->id}}" selected>{{$phone->name}}</option>
                                                        @else
                                                            <option value="{{$phone->id}}">{{$phone->name}}</option>
                                                        @endif
                                                    @empty
                                                        <option value="0"> Default </option>
                                                    @endforelse
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
                                            <label>Submenu?</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <div class="ui toggle checkbox">
                                                    <input type="checkbox" name="destination" value="submenu" {{ $destination ?? old('destination') ? ($destination === 'submenu' ? 'checked' : '') : ''  }}>
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
                    <a href="{{route('account.extension')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
