@extends('admin::theme.default.layouts.master')

@section('title') Company Form @endsection

@section('content')
    <div class="ui bottom customer-tab attached tab segment active" id="sixa">
        <p>These "Primary Contact" and "Mailing Address" are global for your customer account and will be identical when viewed through any Front Office server you own. </p>
        <form class="ui form attached fluid segment" method="post" action="{{route('admin.options.company.update')}}">
            @csrf
            <div class="ui equal width aligned padded grid">
                <div class="row">
                    <div class="six wide tablet eight wide computer column no-padding">
                        <div class="customer-section" style="margin-bottom: 45px;">
                            <h4>Company Details</h4>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Company Name:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="companyName" placeholder="Versicom Communications"
                                                   value="{{$info->call_center_name ?? old('companyName') ?? ''}}">
                                            @if ($errors->has('companyName'))
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('companyName') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Company Website:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated ">
                                            <input type="text" name="website_url" value="{{$info->website_url ?? old('website_url') ?? ''}}">
                                            @if ($errors->has('website_url'))
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('website_url') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Session life time (in hours):</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="session_lifetime" value="{{isset($info) ? $info->session_lifetime / 60 : old('session_lifetime') ?? ''}}">
                                            @if ($errors->has('session_lifetime'))
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('session_lifetime') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>General Voicemail email:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="general_mail" value="{{$info->general_voicemail_email ?? old('general_mail') ?? ''}}">
                                            @if ($errors->has('general_mail'))
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('general_mail') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Calls record:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui fluid selection dropdown">
                                                <input type="hidden" name="record_calls" value="{{$info->record_type ?? old('record_calls') ?? ''}}">
                                                <i class="dropdown icon"></i>
                                                <div class="default text"></div>
                                                <div class="menu">
                                                    @foreach(config('twilio.record_calls') as $type => $code)
                                                        <div class="item" data-value="{{$code}}">
                                                            {{ucfirst($type)}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Record calls pronounce:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui checkbox">
                                                @if(isset($info) && $info->record_pronounce)
                                                    <input type="checkbox" checked name="record_call_pronounce" value="true">
                                                @else
                                                    <input type="checkbox" name="record_call_pronounce" value="true">
                                                @endif
                                                <label>Record calls pronounce:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Debug mode:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui checkbox">
                                                @if(isset($info) && $info->debug_mode)
                                                    <input type="checkbox" checked name="debug_mode" value="true">
                                                @else
                                                    <input type="checkbox" name="debug_mode" value="true">
                                                @endif
                                                <label>Debug mode</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Pronounce working time:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui checkbox">
                                                @if(isset($info) && $info->work_time_pronounce)
                                                    <input type="checkbox" checked name="work_time_pronounce" value="true">
                                                @else
                                                    <input type="checkbox" name="work_time_pronounce" value="true">
                                                @endif
                                                <label>Pronounce working time</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Voicemail Transcription:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui checkbox">
                                                @if(isset($info) && $info->transcript_voicemails)
                                                    <input type="checkbox" checked name="transcript_voicemails" value="true">
                                                @else
                                                    <input type="checkbox" name="transcript_voicemails" value="true">
                                                @endif
                                                <label>Voicemail Transcription</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>TFTI Account:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated" id="oauthBlock">
                                            @if(isset($username))
                                                <span style="font-size: 15px">{{$username}}</span>
                                                <i class="close icon" id="unlinkOauth"></i>
                                            @else
                                                <a class="ui button" href="{{route('oauthForm')}}">Link Account</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-section">
                            <h4>Primary Contact</h4>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Full Name:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right name-field floated">
                                            <input type="text" name="first_name" value="{{$info->first_name ?? old('first_name') ?? ''}}">
                                            <input type="text" name="last_name" value="{{$info->last_name ?? old('last_name') ?? ''}}">
                                            @if ($errors->has('first_name') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('first_name') }}
                                                </div>
                                            @endif
                                            @if ($errors->has('last_name') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('last_name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Email Address:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="email" value="{{$info->email ?? old('email') ?? ''}}">
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
                                        <label>Phone Number:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="phone" value="{{$info->phone ?? old('phone') ?? ''}}">
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
                                    <div class="ui">
                                        <label>Tech Newsletter:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui checkbox">
                                                <input type="checkbox" name="tech_newsletter" value="{{old('tech_newsletter')}}">
                                                <label>email me tech updates</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="six wide tablet eight wide computer column no-padding">
                        <div class="customer-section">
                            <h4>Mailing Address</h4>

                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Country:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui fluid selection dropdown">
                                                <input type="hidden" name="country_id" id="country" value="{{$info->country_id ?? old('country_id') ?? ''}}">
                                                <i class="dropdown icon"></i>
                                                <div class="default text"></div>
                                                <div class="menu">
                                                    @foreach($countries as $country)
                                                        <div class="item" data-value="{{$country->id}}">
                                                            {{$country->country_name}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @if ($errors->has('country_id') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('country_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui items">
                                <div class="item" id="stateBlock">
                                    <div class="ui">
                                        @if(isset($info->state_name))
                                            <label>State:</label>
                                        @else
                                            <label>US State:- or -Province:</label>
                                        @endif
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated" id="stateInput">
                                            @if(isset($info->state_id))
                                                <div class="ui fluid selection dropdown">
                                                    <input type="hidden" name="state_id" value="{{$info->state_id ?? old('state_id') ??  ''}}">
                                                    <i class="dropdown icon"></i>
                                                    <div class="default text"></div>
                                                    <div class="menu">
                                                        @foreach($states as $state)
                                                            <div class="item" data-value="{{$state->id}}">
                                                                {{$state->state_name}}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <input type="text" name="state_name" value="{{$info->state_name ?? old('state_name') ?? ''}}">
                                                @if ($errors->has('state_name') )
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $errors->first('state_name') }}
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        @if ($errors->has('state_id') )
                                            <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                {{ $errors->first('state_id') }}
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>City:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="city" value="{{$info->city ?? old('city') ?? ''}}">
                                            @if ($errors->has('city') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('city') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Zip Code:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="zip" value="{{$info->zip ?? old('zip') ?? ''}}">
                                            @if ($errors->has('zip') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('zip') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui ui-title">
                                        <label>Server Timezone:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <select class="ui dropdown" name="timezone_id">
                                                @foreach($timezones as $timezone)
                                                    @if(isset($info) && $info->timezone_id == $timezone->id)
                                                        <option value="{{$timezone->id}}" selected>{{$timezone->gmt_timezone}}</option>
                                                    @else
                                                        <option value="{{$timezone->id}}">{{$timezone->gmt_timezone}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('timezone_id') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('timezone_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Address Line 1:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="address" value="{{$info->address ?? old('address') ?? ''}}">
                                            @if ($errors->has('address') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('address') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Address Line 2:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="second_address" value="{{$info->second_address ?? old('second_address') ?? ''}}">
                                            @if ($errors->has('second_address') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('second_address') }}
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
            <div class="btn">
                <input type="hidden" name="call_canter_id" value="{{$info->call_center_id ?? ''}}">
                <button class="ui button" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('js/admin/options/company.js')}}"></script>
@endpush


