@extends('agent::theme.default.layouts.master')

@section('title') Dashboard @endsection

@section('content')
    <div class="ui internally celled grid">
        <div class="row">
            <div class="ui internally celled grid">
                {{--Left Sidebar Start Here--}}
                @include('agent::theme.default.common.sidebar-left')
                {{--Left Sidebar End Here--}}
                {{--Center Sidebar Start Here--}}
                @include('agent::theme.default.common.sidebar-center')
                {{--Center Sidebar End Here--}}
                {{--Right Sidebar Start Here--}}
                @include('agent::theme.default.common.sidebar-right')
                {{--Right Sidebar End Here--}}
            </div>
        </div>
        <input type="hidden" id="currentCallId">
        <div class="currentCallPopup" id="secondaryCall" style="display: none;">
            <div class="sidebar-one">
                <div class="sidebar">
                    <div class="info mobile hidden callInfoBlock" id="call_info">
                        <div class="ui horizontal list call-div">
                            <div class="right item" style="margin-left: 0; display: inline-block">
                                <ul>
                                    <li class="accept-call" style="text-align: center; margin: 0 0 5px;">
                                        <a class="acceptSecondaryCall" role="button">
                                            <i class="fas fa-phone fa-flip-horizontal"></i>
                                        </a>
                                    </li>
                                    <li class="end-call">
                                        <a class="rejectSecondaryCall" role="button">
                                            <img src="/images/theme/default/end-call.svg">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="item incomingCall" style="margin-left: 0; display: inline-block">
                                <div class="content">
                                    <div class="ui sub header secondaryCallerName"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--PUSH LIBS SECTION--}}
@push('scriptsLib')
{{--    <script src="{{asset('js/libraries/initaudioplayer1.js')}}"></script>--}}
{{--    <script src="{{asset('js/libraries/initaudioplayer2.js')}}"></script>--}}
{{--    <script type='text/javascript' src='https://amazingaudioplayer.com/wp-content/uploads/amazingaudioplayer/sharedengine/amazingaudioplayer.js?ver=1.0'></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>--}}
@endpush

