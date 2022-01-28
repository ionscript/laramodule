@extends('account::theme.default.layouts.flow')

@section('title') Flow Form @endsection



@section('content')

{{--    <div class="ui clearing segment block" style="width: 100%;margin: 0 auto;z-index: 1600; border: none; padding: 0; background-color: #edf1f5; border-radius: 0;box-shadow: 0 2px 4px rgba(0,0,0,.3);">--}}
{{--        <div class="block-header" style="width: 1200px;margin: 0 auto; border: none; box-shadow: none;padding: 10px 25px 0 25px;">--}}
{{--            <h3 class="ui left floated header" style="margin-top: 8px;padding:0;">Flow Editor</h3>--}}
{{--            <a href="{{route('account.flow.add')}}" class="ui right floated  basic icon button" data-tooltip="Cancel" data-inverted="">--}}
{{--                <i class="icon reply"></i>--}}
{{--            </a>--}}
{{--            <button class="ui right floated primary icon button" type="button" onclick="$('#form-flow').submit();" data-tooltip="Save" data-inverted="">--}}
{{--                <i class="icon save"></i>--}}
{{--            </button>--}}
{{--        </div>--}}


{{--    </div>--}}
    <div class="ui block">
        <form method="post" action="{{$action}}">
            @csrf
            <div class="block-section">
                <div class="block-header">

                </div>
                <div class="ui left floated icon buttons">
{{--                    <button type="button" class="ui button" style="z-index: 1600" data-toggle="layout" data-action="sidebar_mini_toggle">--}}
{{--                        <i class="ellipsis vertical icon"></i>--}}
{{--                    </button>--}}
                </div>

{{--                <button type="button" class="ui big icon button" style="z-index: 1600;position:absolute; right: 20px; border-radius: 5em; " data-toggle="option" data-action="fullscreen">--}}
{{--                    <i class="cog icon"></i>--}}
{{--                </button>--}}

                <div class="ui left floated icon buttons" style="margin: 10px 10px 10px 240px;">
                    <button type="button" style="z-index: 1600" class="ui button" data-toggle="layout" data-action="sidebar_toggle"><i class="ellipsis vertical icon"></i></button>
                    <button type="button" style="z-index: 1600" class="ui button" data-toggle="layout" data-action="sidebar_mini_toggle"><i class="pin icon"></i></button>

                </div>

                <div class="ui right floated icon buttons" style="margin: 10px;">
                    <button type="button" style="z-index: 1600" class="ui button" data-toggle="option" data-action="fullscreen"><i class="cog icon"></i></button>
                    <button type="button" style="z-index: 1600" class="ui button" data-toggle="layout" data-action="side_overlay_toggle"><i class="icon cog"></i></button>
                </div>

                <div id="flow-editor" class="block-content" style="position: relative">
                {{--                            <div id="flow-palette" class="block-content" style="position:absolute;z-index: 1200;top:55px; left: 0; background-color: white">--}}
                {{--                                <div class="ui items sticky">--}}
                {{--                                    <div class="item">--}}
                {{--                                        <i class="bx bx-dialpad-alt" draggable="true" style="font-size: 28px"></i>--}}
                {{--                                        <div class="ui">--}}
                {{--                                            <label> Listen Keypress</label>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="item">--}}
                {{--                                        <i class="bx bx-phone-outgoing" draggable="true" style="font-size: 32px"></i>--}}
                {{--                                        <div class="ui">--}}
                {{--                                            <label> Connect CAll to</label>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                                <div class="ui compact icon menu " style="background-color: white">--}}
                {{--                                    <a class="item">--}}
                {{--                                        <i class="bx bx-dialpad-alt" draggable="true" style="font-size: 34px"></i>--}}
                {{--                                    </a>--}}
                {{--                                    <a class="item">--}}
                {{--                                        <i class="bx bx-phone-outgoing" draggable="true" style="font-size: 34px"></i>--}}
                {{--                                    </a>--}}
                {{--                                    <a class="item">--}}
                {{--                                        <i class="bx bx-phone-incoming" draggable="true" style="font-size: 34px"></i>--}}
                {{--                                    </a>--}}
                {{--                                </div>--}}

                {{--                                <div class="ui compact icon menu " style="background-color: white">--}}
                {{--                                    <a class="item">--}}
                {{--                                        <i class="bx bx-upload" draggable="true" style="font-size: 34px"></i>--}}
                {{--                                    </a>--}}
                {{--                                    <a class="item">--}}
                {{--                                        <i class="bx bx-save" style="font-size: 34px"></i>--}}
                {{--                                    </a>--}}
                {{--                                </div>--}}

                {{--                            </div>--}}


{{--                    <div class="ui clearing segment block" style="width: 100%;z-index: 1500;margin: 0 auto;border: none; padding: 0; background-color: #edf1f5; border-radius: 0;box-shadow: 0 2px 4px rgba(0,0,0,.3);">--}}
{{--                        <div class="block-header" style="width: 1200px;margin: 0 auto; border: none; box-shadow: none;padding: 10px 25px 0 25px;">--}}
{{--                            <h3 class="ui left floated header" style="margin-top: 8px;padding:0;">Flow Editor</h3>--}}
{{--                            <a href="{{route('account.flow.add')}}" class="ui right floated  basic icon button" data-tooltip="Cancel" data-inverted="">--}}
{{--                                <i class="icon reply"></i>--}}
{{--                            </a>--}}
{{--                            <button class="ui right floated primary icon button" type="button" onclick="$('#form-flow').submit();" data-tooltip="Save" data-inverted="">--}}
{{--                                <i class="icon save"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}


{{--                    </div>--}}



                <!-- Sidebar-->
                    <aside id="sidebar" style="position: absolute; z-index: 1550; top: 0; width: 230px; background-color: white">
                        <!-- Side Overlay Scroll Container -->
                        <div id="sidebar-scroll">







                            <!-- Side Header -->
                            <div class="side-header side-content bg-white-op">

                                   <h3 style="margin: 20px">WIDGET LIBRARY <i class="clone outline icon" style="padding-left: 18px"></i></h3>

{{--                                   <i class="pin icon" style="float: right; margin: 25px; cursor: pointer" data-toggle="layout" data-action="sidebar_mini_toggle"></i>--}}

                            </div>
                            <!-- END Side Header -->

                            <!-- Side Content -->
                            <div id="flow-palette" class="side-content" >

                                <div class="ui big  vertical menu" style="width: 100%; border-radius: 0;">
                                    <a class="item" style="cursor:move" draggable="true">
                                        <i class="phone icon"></i>
                                        Input Listening
                                    </a>
                                    <a class="item" style="cursor:move" draggable="true">
                                        <i class="music icon"></i>
                                        Play/Say
                                    </a>
                                    <a class="item" style="cursor:move" draggable="true">
                                        <i class="microphone icon"></i>
                                        Record Voicemail
                                    </a>
                                    <a class="item" style="cursor:move" draggable="true">
                                        <i class="play circle outline icon"></i>
                                        Connect To
                                    </a>
                                </div>

                            </div>
                            <!-- END Side Content -->
                            <!-- END Side Content -->
                        </div>
                        <!-- END Side Overlay Scroll Container -->
                    </aside>
                    <!-- END Side Overlay -->


                    <!-- Side Overlay-->
                    <aside id="side-overlay" style="width: 320px; z-index: 1700; top: 0; margin: auto 0">
                        <!-- Side Overlay Scroll Container -->
                        <div id="side-overlay-scroll">
                            <!-- Side Header -->
                            <div class="side-header side-content">
                                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                <button class="ui button floated right icon" type="button" data-toggle="layout" data-action="side_overlay_close">
                                    <i class="bx bx-x-circle"></i>
                                </button>
                                FLOW CONFIGURATION

                            </div>
                            <!-- END Side Header -->

                            <!-- Side Content -->
                            <div class="side-content remove-padding-t">
                                <!-- Side Overlay Tabs -->

                                <!-- END Side Overlay Tabs -->
                            </div>
                            <!-- END Side Content -->
                        </div>
                        <!-- END Side Overlay Scroll Container -->
                    </aside>
                    <!-- END Side Overlay -->


                    {{--                            <div class="blueprint" id="flow-scroll-container">--}}


{{--                    <div id="flow-container" style="cursor: grab"></div>--}}
                    <div id="flow-container" class="blueprint" style="cursor: grab"></div>
                    <div id="flow-contextmenu">
                        <div>
                            <button type="button" id="pulse-button">Pulse</button>
                            <button type="button" id="delete-button">Delete</button>
                        </div>
                    </div>
                    {{--                            </div>--}}
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script async type="module" src="/js/theme/default/flow.js"></script>
    <script async type="module" src="/js/app/app.js"></script>
@endpush
