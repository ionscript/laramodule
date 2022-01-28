@extends('admin::theme.default.layouts.master')

@section('title') Voicemail Extension Form @endsection

@section('content')
    <div class="ui bottom routing attached tab segment active" id="fourc">
        <form action="{{route('admin.extensions.virtual.create')}}" method="post">
            @csrf
            <div class="routing-call-sec">
                <div class="ui styled">
                    <div class="title active">
                        <div class="ui top attached menu">
                            <div class="left menu">
                                <h4 class="ui header">Add Voicemail Extension</h4>
                            </div>
                        </div>
                    </div>

                    {{--    TODO: voicemail type --}}
                    <div class="content active">
                        <form method="post" action="{{route('admin.extensions.voicemail.create')}}">
                            @csrf
                            <div class="ui equal width aligned padded grid transition visible" style="display: flex !important;">
                                <div class="row">
                                    <div class="sixteen wide tablet eight wide computer column no-padding">
                                        <div class="ui items">
                                            <div class="item">
                                                <div class="ui ui-title">
                                                    <label>Voicemail Extension<i class="inline question circle icon link" data-html="<b>Voicemail Extension</b><br>This is the extension belonging to this voicemail box. Internal callers will simply dial this number to reach it (they will not even have to dial a '9' first). External callers will dial this number after calling your main Front Office phone number. To check for messages, dial x8500 from any phone followed by the Voicemail Extension number. It is recommended that you do not start this number with any Keypress Options used in your Call Menu. For example if your callers can press '1' to go to 'Sales' do not start any extensions with '1' such as extension '101'.<font style=font-size:9px;><br><font color='#0364C4'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="ui right floated">
                                                        <input type="text" name="extension_number" value="{{old('extension_number') ?? ''}}">
                                                        @if ($errors->has('extension_number'))
                                                            <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                                <p>{{ $errors->first('extension_number') }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ui items">
                                            <div class="item">
                                                <div class="ui ui-title">
                                                    <label>Description<i class="inline question circle icon link" data-html="<b>Description</b><br>Your description may be up to 99 characters.<br/><font color='#0364C4'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="ui right floated">
                                                        <input type="text" name="description" value="{{old('description') ?? ''}}">
                                                        @if ($errors->has('description'))
                                                            <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                                <p>{{ $errors->first('description') }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui items">
                                            <div class="item">
                                                <div class="ui ui-title">
                                                    <label>Voicemail Greeting</label>
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="ui right full-dropdown-field floated">
                                                        <select name="prompt" class="ui dropdown">
                                                            <option value="0" {{!isset($currentExtension->prompt_id) ? 'selected' : ''}}>None</option>
                                                            <option value="-1" {{isset($currentExtension->prompt_id) && $currentExtension->prompt_id == -1 ? 'selected' : ''}}>
                                                                Default Greeting
                                                            </option>
                                                            @foreach($callCenterPrompts as $callCenterPrompt)
                                                                <option value="{{$callCenterPrompt->id}}"
                                                                        {{isset($currentExtension) && $callCenterPrompt->id == $currentExtension->prompt_id ? 'selected' : ''}}>
                                                                    {{$callCenterPrompt->description}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('keep_message_id'))
                                                            <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                                <p>{{ $errors->first('keep_message_id') }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sixteen wide tablet eight wide computer column no-padding">
                                        <div class="ui items">
                                            <div class="item">
                                                <div class="ui ui-title">
                                                    <label>Voicemail Email<i class="inline question circle icon link" data-html="<b>Voicemail Email</b><br>If an email address is entered here, then email notifications will be sent when this extension receives a voicemail message.<br/><font color='#0364C4'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="ui right floated">
                                                        <input type="text" name="email" value="{{old('email') ?? ''}}">
                                                        @if ($errors->has('email'))
                                                            <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                                <p>{{ $errors->first('email') }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui items inline-style">
                                            <div class="item">
                                                <div class="ui ui-title">
                                                    <label>Email Attachments<i class="inline question circle icon link" data-html="<b>Email Attachments</b><br>If set to 'yes' then email notifications of new voicemails will also contain attached audio files (.wav) of the new voice message. This means you can listen from any computer with Web access! <b>Note:</b> Attachments will only be sent to your 'Voicemail Email' address. The 'Pager Email' address is for notifications only.<br/><font color='#0364C4'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="ui right floated">
                                                        <div class="ui radio-style">
                                                            <div class="inline fields">
                                                                <div class="field">
                                                                    <div class="ui radio checkbox">
                                                                        <input type="radio" name="attachment" value="true" tabindex="0" class="hidden">
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="field">
                                                                    <div class="ui radio checkbox">
                                                                        <input type="radio" name="attachment" value="false" checked="checked" tabindex="0" class="hidden">
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('attachment'))
                                                                    <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                                        <p>{{ $errors->first('attachment') }}</p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui items">
                                            <div class="item">
                                                <div class="ui ui-title">
                                                    <label>Delete When Emailed<i class="inline question circle icon link" data-html="<b>Delete When Emailed</b><br>If set to 'yes' then voicemails sent to this extension will be deleted as soon as they are emailed.<span class=cp_warning_text_small>WARNING:</span> Your Front Office server will not know if the emailed attachments it sends are actually received by the recipient. Therefore, only enable this feature if the email address listed is known to be reliably receiving email messages.<br/><font color='#0364C4'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="ui right floated">
                                                        <div class="ui radio-style">
                                                            <div class="inline fields">
                                                                <div class="field">
                                                                    <div class="ui radio checkbox">
                                                                        <input type="radio" name="remove" value="true" tabindex="0" class="hidden">
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="field">
                                                                    <div class="ui radio checkbox">
                                                                        <input type="radio" name="remove" value="false" checked="checked" tabindex="0" class="hidden">
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('remove'))
                                                                    <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                                        <p>{{ $errors->first('remove') }}</p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn" style="margin: 30px 0;width: 100%;text-align: center;">
                                        <button class="ui button" type="submit">Add Voicemail-only Extension</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--    TODO: end voicemail type --}}

                </div>
                <div class="btn" style="margin: 30px 0;width: 100%;text-align: center;">
                    <button class="ui button" type="submit">Add Voicemail Extension</button>
                </div>
            </div>
        </form>
    </div>
@endsection
