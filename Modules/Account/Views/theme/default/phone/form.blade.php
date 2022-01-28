@extends('account::theme.default.layouts.master')

@section('title') Phone Number Form @endsection

@section('content')
    <div class="ui bottom customer-tab attached tab segment active">
        <form class="ui form attached fluid segment" method="post" action="{{$action}}">
            {{--            @csrf--}}
            <div class="ui equal width aligned padded grid">
                <div class="row">
                    <div class="six wide tablet eight wide computer column no-padding">
                        <div class="customer-section">
                            <h4>Phone Number</h4>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui required">
                                        <label class="control-label">Phone Number: </label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="number" value="{{$number ?? old('number')}}" placeholder="+14155551234">
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
                                        <label>Department:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <select name="department_id" class="select2">
                                                <option value="0"> Default </option>
                                                @foreach($departments as $department)
                                                    @if(($department_id ?? old('department_id')) === $department->id)
                                                        <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                                    @else
                                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                                    @endif
                                                @endforeach
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
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Emergency Call?</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="emergency_status" value="Active" {{ $emergency_status ?? old('emergency_status') ? ($emergency_status === 'Active' ? 'checked' : '') : '' }}>
                                                <label></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Fax?</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="mode" value="fax" {{ $mode ?? old('mode') ? ($mode === 'fax' ? 'checked' : '') : ''  }}>
                                                <label></label>
                                            </div>
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
                <a href="{{route('account.phone')}}" class="ui button">Cancel</a>
                <button type="reset" class="ui button">Reset</button>
            </div>
            <div class="btn">
                <button class="ui button" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

