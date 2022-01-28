@extends('admin::theme.default.layouts.master')

@section('title') Voice Prompt Form @endsection

@section('content')
    <div class="ui bottom voice-prompts attached tab active segment" id="firstc">
        <div class="ui styled">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header">Record New Voice Prompt</h4>
                    </div>
                </div>
            </div>
            <div class="content active">
                <input type="hidden" id="authId" value="{{Auth::id()}}">
                <table class="ui single promot line table transition visible" style="display: table !important;">
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="ui number form">
                                <div class="inline field">
                                    <label>File Name<i class="inline question circle icon link" data-html="<b>File Name</b></br>Enter a name for your new voice prompt. You may use any name you wish.<br/><font color='#0364C4'>Call your Versicom Rep for additional help.</font>"></i></label>
                                    <input class="full" type="text" id="name">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="ui number form">
                                <div class="inline field">
                                    <label>Description <i class="inline question circle icon link" data-html="<b>Description</b></br>Your description may be up to 99 characters.<br/><font color='#0364C4'>Call your Versicom Rep for additional help.</font>"></i></label>
                                    <input class="Description-input" type="text" id="description">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="ui number form">
                                <div class="inline field">
                                    <label>Extension<i class="inline question circle icon link" data-html="<b>Extension</b></br>Enter an extension on your Front-Office. The system will then call you at that extension and provide instructions so you may record your voice prompt. <br/>You may use a local extension in your office or you may enter a regular 10-digit phone number (such as your cell phone).</br><font color='#0364C4'>Call your Versicom Rep if you need additional help.</font>"></i></label>
                                    <input class="extention-input" type="text" id="recordNumber">
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="ui button" type="submit" id="recordPrompt">Call me!</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="ui styled">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header">Upload Existing Voice Prompt</h4>
                    </div>
                </div>
            </div>
            <div class="content active">
                {{--<form method="POST" action="#" enctype="multipart/form-data">--}}
                <table class="ui single promot line table transition visible" style="display: table !important;">
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="left aligned six wide mobile-width">
                            <div class="ui number form" id="file">
                                <div class="inline field">
                                    <label>File Name<i class="inline question circle icon link" data-html="<b>File Name</b></br>Enter a name for your new voice prompt. You may use any name you wish.<br/><font color='#0364C4'>Call your Versicom Rep if you have additional questions.</font>"></i></label>
                                    <input type="file" name="file" id="filePrompt" />
                                </div>
                            </div>
                        </td>
                        <td class="left aligned eight wide">
                            <div class="ui number form" id="description">
                                <div class="inline field">
                                    <label>Description <i class="inline question circle icon link" data-html="<b>Description</b></br>Your description may be up to 99 characters. <br/><font color='#0364C4'>Call your Versicom Rep if you have additional questions.</font>"></i></label>
                                    <input class="d-input" type="text" id="descPrompt">
                                </div>
                            </div>
                        </td>
                        <td  class="center aligned two wide">
                            <button class="ui button" type="button" id="uploadPrompt">Upload</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                {{--</form>--}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            agentName = "adminCallCenter";
            callCenterId = "{{$callCenterId}}";
        });
    </script>
    <script src="{{asset('js/libraries/socket.io.2.1.0.js')}}"></script>
    {{--<script type="text/javascript" src="https://media.twiliocdn.com/sdk/js/client/v1.4/twilio.min.js"></script>--}}
    {{--<script src="{{asset('js/twilio/index.js')}}"></script>--}}
    <script src="{{asset('js/admin/voice_prompt/index.js')}}"></script>
@endpush
