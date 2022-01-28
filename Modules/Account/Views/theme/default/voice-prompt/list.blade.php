@extends('admin::theme.default.layouts.master')

@section('title') Voice Prompt List @endsection

@section('content')
    <div class="ui bottom voice-prompts attached tab active segment" id="firstc">
        <p>Voice prompts are recorded via the telephone, or by uploading them from your computer. To record a new voice prompt, enter a <span>File Name</span> for your new recording and an <span>Extension Number</span> to record from. Front Office will then call you at your extension (or phone number).</p>
        <div class="ui styled all-details">
            <div class="title">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header">Showing 4 Voice Prompts</h4>
                    </div>
                    <div class="right menu">
                        <div class="ui right aligned category search item">
                            <div class="ui transparent icon input">
                                <input class="prompt" type="text" placeholder="Search...">
                                <i class="search link icon"></i>
                            </div>
                            <div class="results"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <table class="ui single group-info line table" style="margin-bottom: 0; border-bottom: 1px solid rgba(34,36,38,.15);" id="promptTable">
                    <thead>
                    <tr>
                        <th class="center aligned one wide">
                            <label>Play</label>
                        </th>
                        <th class="center aligned collapsing two wide">
                            <div class="ui number form">
                                <div class="inline field">
                                    <label>Delete</label>
                                </div>
                            </div>
                        </th>
                        <th class="left aligned one wide"><label>Save</label></th>
                        <th class="center aligned two wide"><label>Re-record</label></th>
                        <th class="left aligned two wide"><label>File Name</label></th>
                        <th class="left aligned six wide"><label>Description </label></th>
                        <th class="center aligned one wide"><label>Size</label></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="6" style="text-align:right">Total:</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
                {{--<div class="total-size">--}}
                {{--<div class="right-section">--}}
                {{--<ul>--}}
                {{--<li>Total</li>--}}
                {{--<li>{{$size}}</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
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