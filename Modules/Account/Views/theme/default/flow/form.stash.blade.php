@extends('account::theme.default.layouts.flow')

@section('title') Flow Form @endsection

@section('content')

    {{--    <!-- Side Overlay-->--}}
    {{--    <aside id="side-overlay">--}}
    {{--        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">--}}
    {{--            <i class="bx bx-x-circle"></i>--}}
    {{--        </button>--}}
    {{--        <!-- Side Overlay Scroll Container -->--}}
    {{--        <div id="side-overlay-scroll">--}}
    {{--            <!-- Side Header -->--}}
    {{--            <div class="side-header side-content">--}}
    {{--                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->--}}
    {{--                <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">--}}
    {{--                    <i class="bx bx-x-circle"></i>--}}
    {{--                </button>--}}

    {{--            </div>--}}
    {{--            <!-- END Side Header -->--}}

    {{--            <!-- Side Content -->--}}
    {{--            <div class="side-content remove-padding-t">--}}
    {{--                <!-- Side Overlay Tabs -->--}}

    {{--                <!-- END Side Overlay Tabs -->--}}
    {{--            </div>--}}
    {{--            <!-- END Side Content -->--}}
    {{--        </div>--}}
    {{--        <!-- END Side Overlay Scroll Container -->--}}
    {{--    </aside>--}}
    {{--    <!-- END Side Overlay -->--}}






    <div class="ui clearing segment" style="width: 1200px;margin: 0 auto; background: transparent; border: none; box-shadow: none">
        <h3 class="ui left floated header">Flow Form</h3>
        {{--        <button onclick="import('./foo.mjs')">Click me</button>--}}
        <a href="{{route('account.flow.add')}}" class="ui right floated  basic icon button" data-tooltip="Cancel" data-inverted="">
            <i class="icon reply"></i>
        </a>
        <button class="ui right floated primary icon button" type="button" onclick="$('#form-flow').submit();" data-tooltip="Save" data-inverted="">
            <i class="icon save"></i>
        </button>
    </div>
    <div class="ui bottom block-tab attached segment active block">
        <form method="post" action="{{$action}}">
            @csrf
            <div class="ui equal width aligned padded grid">
                {{--                <div class="three wide tablet wide computer column no-padding">--}}
                {{--                    <div class="block-section">--}}
                {{--                        <h4>Actions Palette</h4>--}}
                {{--                        <div class="ui clearing fitted divider"></div>--}}
                {{--                        <div id="flow-palette" class="block-content">--}}
                {{--                            <div class="ui items">--}}
                {{--                                <div class="item">--}}
                {{--                                    <img src="/images/flow/img-1.png" draggable="true"/>--}}
                {{--                                    <div class="ui">--}}
                {{--                                        <label> Incoming</label>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="ui items">--}}
                {{--                                <div class="item">--}}
                {{--                                    <img src="/images/flow/img-2.png" draggable="true"/>--}}
                {{--                                    <div class="ui">--}}
                {{--                                        <label> Hang Up</label>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}


                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="thirteen wide tablet sixteen wide computer column no-padding">
                    <div class="block-section">
                        {{--                        <div class="block-header">--}}
                        <h4 class="ui left floated header">Flow Editor</h4>
                        <button type="button" class="ui compact big right floated basic button icon" data-toggle="option" data-action="close" data-tooltip="Close" data-inverted=""><i class="bx bx-x-circle"></i></button>
                        <button type="button" class="ui compact big right floated basic button icon" data-toggle="option" data-action="toggle" data-tooltip="Toggle" data-inverted=""><i class="bx bx-up-arrow-circle"></i></button>
                        <button type="button" class="ui compact big right floated basic button icon" data-toggle="option" data-action="fullscreen" data-tooltip="Fullscreen" data-inverted=""><i class="bx bx-expand"></i></button>
                        <button type="button" class="ui compact big right floated basic button icon" data-toggle="layout" data-action="side_overlay_toggle" data-tooltip="Sideovewrlay" data-inverted=""><i class="bx bx-grid-alt"></i></button>
                        {{--                        </div>--}}
                        {{--                        <div class="ui clearing fitted divider"></div>--}}
                        <div id="flow-editor" class="block-content">
                            <div id="flow-palette" class="ui  internal attached rail block-content">
                                <div class="ui items sticky">
                                    <div class="item">
                                        <img src="/images/flow/img-1.png" draggable="true"/>
                                        <div class="ui">
                                            <label> Incoming</label>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="/images/flow/img-2.png" draggable="true"/>
                                        <div class="ui">
                                            <label> Hang Up</label>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <!-- Side Overlay-->
                            <aside id="side-overlay">
                                <!-- Side Overlay Scroll Container -->
                                <div id="side-overlay-scroll">
                                    <!-- Side Header -->
                                    <div class="side-header side-content">
                                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                        <button class="ui button floated right icon" type="button" data-toggle="layout" data-action="side_overlay_close">
                                            <i class="bx bx-x-circle"></i>
                                        </button>

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










                            <div class="blueprint" id="flow-scroll-container">






                                {{--                                <div class="flow-large-container">--}}
                                <div id="flow-container"></div>
                                <div id="flow-contextmenu">
                                    <div>
                                        <button type="button" id="pulse-button">Pulse</button>
                                        <button type="button" id="delete-button">Delete</button>
                                    </div>
                                </div>


                                {{--                                        start widget --}}
                                {{--                                        <div class="tw-widget__container tw-start-widget__container tw-widget--selected jtk-endpoint-anchor" >--}}
                                {{--                                            <div class="tw-widget-header tw-initial-widget-header">--}}
                                {{--                                                <div class="tw-endpoint__container"></div>--}}
                                {{--                                                <div class="tw-widget-name__container">--}}
                                {{--                                                    <div class="tw-widget-name">--}}
                                {{--                                                        <div class="tw-widget-icon">--}}
                                {{--                                                            <i class="icon icon-2x "></i>--}}
                                {{--                                                        </div>--}}
                                {{--                                                        <div class="tw-widget-title">--}}
                                {{--                                                            <span class="tw-intial-widget-title">--}}
                                {{--                                                                Trigger--}}
                                {{--                                                                <span class=" ui-component-tooltip__anchor">--}}
                                {{--                                                                    <a href="#">--}}
                                {{--                                                                        <i class="ui-component-icon ui-component-icon_size_null icon-twilio-question tw-grey-icon "></i>--}}
                                {{--                                                                    </a>--}}
                                {{--                                                                </span>--}}
                                {{--                                                            </span>--}}
                                {{--                                                        </div>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="tw-widget-label"></div>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="tw-widget-controls__container">--}}
                                {{--                                                    <i class="icon icon-cogs icon-2x tw-configure-flow-icon"></i>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div>--}}
                                {{--                                                <div class="tw-widget__separator"></div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="tw-widget__body">--}}
                                {{--                                                <div style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">--}}
                                {{--                                                    <p class="tw-widget__body-text"></p>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <ul class="tw-widget-endpoints__container">--}}
                                {{--                                                <div class="tw-widget__endpoints-wrapper">--}}

                                {{--                                                    <div>--}}
                                {{--                                                    <li id="FF4ba8a5b2eb9ff27025fa8a20818391ab0"--}}
                                {{--                                                        class="tw-widget__endpoint">--}}
                                {{--                                                        <span class="tw-widget-start__endpoints-circle-icon"></span>--}}
                                {{--                                                        <span class="tw-widget-start__endpoints-title">--}}
                                {{--                                                            Incoming Message--}}
                                {{--                                                            <span class=" ui-component-tooltip__anchor"><a href="#">--}}
                                {{--                                                                    <i class="ui-component-icon ui-component-icon_size_null icon-twilio-question tw-grey-icon tw-widget-start__help-icon "></i>--}}
                                {{--                                                                </a>--}}
                                {{--                                                            </span>--}}
                                {{--                                                        </span>--}}
                                {{--                                                        <div class="tw-widget-endpoint--no-next"></div>--}}
                                {{--                                                    </li>--}}
                                {{--                                                    <li id="FF4ba8a5b2eb9ff27025fa8a20818391ab1" class="tw-widget__endpoint">--}}
                                {{--                                                        <span class="tw-widget-start__endpoints-circle-icon"></span>--}}
                                {{--                                                        <span class="tw-widget-start__endpoints-title">--}}
                                {{--                                                            Incoming Call--}}
                                {{--                                                            <span class=" ui-component-tooltip__anchor"><a href="#">--}}
                                {{--                                                                    <i class="ui-component-icon ui-component-icon_size_null icon-twilio-question tw-grey-icon tw-widget-start__help-icon "></i>--}}
                                {{--                                                                </a>--}}
                                {{--                                                            </span>--}}
                                {{--                                                        </span>--}}
                                {{--                                                    </li>--}}
                                {{--                                                    <li id="FF4ba8a5b2eb9ff27025fa8a20818391ab2" class="tw-widget__endpoint">--}}
                                {{--                                                        <span class="tw-widget-start__endpoints-circle-icon"></span>--}}
                                {{--                                                        <span class="tw-widget-start__endpoints-title">--}}
                                {{--                                                            REST API--}}
                                {{--                                                            <span class=" ui-component-tooltip__anchor">--}}
                                {{--                                                                <a href="#">--}}
                                {{--                                                                    <i class="ui-component-icon ui-component-icon_size_null icon-twilio-question tw-grey-icon tw-widget-start__help-icon "></i>--}}
                                {{--                                                                </a>--}}
                                {{--                                                            </span>--}}
                                {{--                                                        </span>--}}
                                {{--                                                        <div class="tw-widget-endpoint--no-next"></div>--}}
                                {{--                                                    </li>--}}

                                {{--                                                    </div>--}}

                                {{--                                                    <div class="jtk-endpoint tw-red-endpoint tw-endpoint-transition jtk-endpoint-anchor jtk-draggable jtk-droppable">--}}
                                {{--                                                        <svg  width="20" height="20" pointer-events="all" position="absolute" version="1.1" xmlns="http://www.w3.org/2000/svg">--}}
                                {{--                                                            <circle cx="10" cy="10" r="10" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#456" stroke="none" style=""></circle>--}}
                                {{--                                                        </svg>--}}
                                {{--                                                    </div>--}}

                                {{--                                                </div>--}}
                                {{--                                            </ul>--}}
                                {{--                                            <div class="tw-widget__controls"></div>--}}
                                {{--                                        </div>--}}

                                {{--                                        end widget --}}


                                {{--                                </div>--}}

                                {{--                                <div id="flow-options" class="ui compact icon buttons"--}}
                                {{--                                     style="position: absolute; top:30px; right: 50px;">--}}
                                {{--                                    <button type="button" class="ui button"><i class="save icon"></i></button>--}}
                                {{--                                    <button type="button" class="ui button"><i class="upload icon"></i></button>--}}
                                {{--                                    <button type="button" class="ui button"><i class="download icon"></i>--}}
                                {{--                                    </button>--}}
                                {{--                                </div>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn">
                <button class="ui button" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script type="module" src="/js/theme/default/flow.js"></script>
    {{--    <script>--}}
    {{--        var width = window.innerWidth;--}}
    {{--        var height = window.innerHeight;--}}

    {{--        var stage = new Konva.Stage({--}}
    {{--            container: 'flow-container',--}}
    {{--            width: width,--}}
    {{--            height: height,--}}
    {{--        });--}}

    {{--        var layer = new Konva.Layer();--}}
    {{--        stage.add(layer);--}}

    {{--        var circle = new Konva.Circle({--}}
    {{--            x: stage.width() / 2,--}}
    {{--            y: stage.height() / 2,--}}
    {{--            radius: 50,--}}
    {{--            fill: 'green',--}}
    {{--        });--}}
    {{--        layer.add(circle);--}}

    {{--        layer.draw();--}}

    {{--        var scaleBy = 1.01;--}}

    {{--        stage.on('wheel', (e) => {--}}
    {{--            e.evt.preventDefault();--}}
    {{--            var oldScale = stage.scaleX();--}}

    {{--            var pointer = stage.getPointerPosition();--}}

    {{--            var mousePointTo = {--}}
    {{--                x: (pointer.x - stage.x()) / oldScale,--}}
    {{--                y: (pointer.y - stage.y()) / oldScale,--}}
    {{--            };--}}

    {{--            var newScale =--}}
    {{--                e.evt.deltaY > 0 ? oldScale * scaleBy : oldScale / scaleBy;--}}

    {{--            stage.scale({ x: newScale, y: newScale });--}}

    {{--            var newPos = {--}}
    {{--                x: pointer.x - mousePointTo.x * newScale,--}}
    {{--                y: pointer.y - mousePointTo.y * newScale,--}}
    {{--            };--}}
    {{--            stage.position(newPos);--}}
    {{--            stage.batchDraw();--}}
    {{--        });--}}
    {{--    </script>--}}
@endpush
