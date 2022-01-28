<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link rel="shortcut icon" type="image/png" href="/images/theme/default/fabicon.png'"/>
    <link rel="stylesheet" href="/vendor/semantic/dist/semantic.css">
    <link rel="stylesheet" href="/vendor/semantic/dist/components/grid.css">

    <link rel="stylesheet" href="/css/theme/default/stash/mainnew.css">
    <link rel="stylesheet" href="/css/theme/default/stash/customnew.css">
    <link rel="stylesheet" href="/css/theme/default/stash/admin/style.css">
    <link rel="stylesheet" href="/css/theme/default/stash/admin/responsiveadmin.css">
    <link rel="stylesheet" href="/css/theme/default/stash/secondaryLibrary.css">

    <link rel="stylesheet" href="/css/theme/default/boxicons.css">
    <link rel="stylesheet" href="/css/theme/default/dripicons.css">

    <link rel="stylesheet" href="/vendor/semantic-ui-calendar/dist/calendar.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
@stack('css')
<!-- font-family: 'Roboto', sans-serif; -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
</head>
<body style="background-color: #fff;">
<div class="admin-header">
    <div class="container">
        <div class="row">
            <div class="ui grid">
                <div class="sixteen wide mobile four wide tablet four wide computer column">
                    <div class="ui segment logo">
                        <img src="/images/theme/default/adminlogo.png" alt="logo">
                    </div>
                </div>
                <div class="sixteen wide mobile twelve wide tablet twelve wide computer column">
                    <div id="top-menu">
                        <div class="ui secondary top-menu menu">
                            <a class="item" data-tab="first">
                                <div class="content"><i class="bx bx-phone-call"></i> AutoAnswer</div>
                            </a>
                            <a class="item" data-tab="second">
                                <div class="content"><i class="bx bx-user-circle"></i> Users/Extensions</div>
                            </a>
                            <a class="item" data-tab="third">
                                <div class="content"><i class="bx bx-voicemail"></i> ACD</div>
                            </a>
                            <a class="item" data-tab="four">
                                <div class="content"><i class="bx bx-bar-chart-alt-2"></i> Reporting</div>
                            </a>
                            <a class="item" data-tab="six">
                                <div class="content"><i class="bx bx-wrench"></i> Options</div>
                            </a>
                            <a class="item" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <div class="content">
                                    <i class="dripicons-exit"></i> Logout ()
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('account.logout') }}" method="POST" style="display: none;">
                                {{--  {{ csrf_field() }}--}}
                            </form>
                        </div>
                        <div class="ui tab segment" data-tab="first">
                            <div class="ui top attached tabular menu">
                                {{--                                <a class="item" href="{{route('account.schedule')}}">Scheduler</a>--}}
                                {{--                                <a class="item" href="{{route('account.voice-prompt')}}">Voice prompts</a>--}}
                                {{--                                <a class="item" href="{{route('account.hold-music')}}">Music on hold</a>--}}


                                <a class="item">Scheduler</a>
                                <a class="item">Voice prompts</a>
                                <a class="item">Music on hold</a>

                                <a class="item" href="{{route('account.submenu')}}">Sub-menus</a>
                                <a class="item" href="{{route('account.flow')}}">Flow <div class="floating ui tiny blue label">new</div></a>
                            </div>
                        </div>
                        <div class="ui tab segment" data-tab="second">
                            <div class="ui top attached tabular menu">
                                <a class="item" href="{{route('account.agent')}}">Agent</a>
                                <a class="item" href="{{route('account.sip')}}">SIP</a>
                                <a class="item" href="{{route('account.extension')}}">Extension</a>
                                <a class="item" href="{{route('account.contact')}}">Contact</a>
                                {{--                                <a class="item" href="{{route('account.agent-group')}}">Group</a>--}}

                                <a class="item">Group</a>
                            </div>
                        </div>
                        <div class="ui tab segment" data-tab="third">
                            <div class="ui top attached tabular menu">
                                <a class="item" href="{{route('account.queue')}}">Queue</a>
                                <a class="item" href="{{route('account.address')}}">Address</a>
                                <a class="item" href="{{route('account.phone')}}">Phone Number</a>
                                <a class="item" href="{{route('account.office')}}">Office</a>
                                <a class="item" href="{{route('account.department')}}">Department</a>
                                {{--                                <a class="item" href="{{route('account.recording')}}">Recordings</a>--}}
                                {{--                                <a class="item" href="{{route('account.sms')}}">SMS Routing</a>--}}

                                <a class="item">Recordings</a>
                                <a class="item">SMS Routing</a>
                            </div>
                        </div>
                        <div class="ui tab segment" data-tab="four">
                            <div class="ui top attached tabular menu">
                                {{--                                <a class="item" href="{{route('account.report')}}">CDR Reports </a>--}}
                                <a class="item">CDR Reports </a>
                            </div>
                        </div>
                        <div class="ui tab segment" data-tab="six">
                            <div class="ui top attached tabular menu">
                                {{--                                <a class="item" href="{{route('account.account')}}">Account</a>--}}
                                <a class="item">Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="main-container" class="main container">
    <div class="ui internally admin-body celled grid">
        <div class="row">
            <div id="page-container" class="ui top attached tabular menu sixteen wide column" style="padding: 0">
                @if (session('error'))
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <p>{{ session('error')}}</p>
                    </div>
                @endif
                @if (session('success'))
                    <div class="ui success message">
                        <i class="close icon"></i>
                        <p>{{ session('success')}}</p>
                    </div>
                @endif
                @if (session('status'))
                    <div class="ui success message">
                        <i class="close icon"></i>
                        <p>{{ session('status')}}</p>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <p>{{ session('warning')}}</p>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- content asection-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/vendor/jquery/dist/jquery.js"></script>
<script src="/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/vendor/semantic/dist/semantic.js"></script>
<script src="/vendor/semantic-ui-calendar/dist/calendar.js"></script>
<script src="/js/theme/default/autocomplete.js"></script>
<script src="/vendor/konva/konva.js"></script>
<script src="/js/theme/default/account.js"></script>
@stack('scripts')
</body>
</html>
