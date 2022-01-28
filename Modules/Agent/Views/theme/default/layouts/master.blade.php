<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>
    <!-- Bootstrap -->
    <link rel="shortcut icon" type="image/png" href="/images/theme/default/fabicon.png"/>
    <link rel="stylesheet" type="text/css" href="/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="/vendor/semantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/semantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="/vendor/semantic-ui-calendar/dist/calendar.css" />

    <link rel="stylesheet" type="text/css" href="/css/theme/default/libraries/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="/vendor/mmenu/dist/mmenu.css">


    <link rel="stylesheet" type="text/css" href="/vendor/magnific-popup/dist/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="/css/theme/default/stash/demo.css">
    <link rel="stylesheet" type="text/css" href="/css/theme/default/stash/mainnew.css">
    <link rel="stylesheet" type="text/css" href="/css/theme/default/stash/customnew.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">--}}
{{--    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/libraries/first_player.css')}}" />--}}
{{--    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/libraries/second_player.css')}}" />--}}
    <!-- font-family: 'Roboto', sans-serif; -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('styles')
</head>
<body>
<div id="head" class="top-bar">
    <div id="connectMicro"><i class="microphone icon"></i>Connecting to microphone...</div>
    <div id="socketConnection"><i class="exclamation triangle icon"></i>Server connection error</div>
    <div class="page-w container">
        <div class="row">
            <div class="ui secondary  menu">
{{--                @include('index.mobile.header')--}}

                <div class="menu left">
                    <ul>
                        <li class="main-logo">
                            <a href="/" >
                                <img class="ui image" src="/images/theme/default/logo.png">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="right menu mobile hidden support">
                    <a href="#deviceConfig" class="item tooltip deviceLink">
                        <i class="headphones large icon"></i><span class="tooltiptext">Devices</span>
                    </a>
                    <a href="" class="item tooltip">
                        <img src="/images/theme/default/fax.svg" alt="fax"><span class="tooltiptext">Fax</span>
                    </a>
                    <a href="#techSupport" class="item tooltip">
                        <img src="/images/theme/default/telemarketer.svg" alt="telemarketer"><span class="tooltiptext">Tech Support</span>
                    </a>
                    <a href="#" role="button" class="item tooltip" id="openVideoPopup">
                        <img src="/images/theme/default/video-player.svg" alt="video-player"><span class="tooltiptext">Video</span>
                    </a>
                    <a href="#notepopup" class="item tooltip">
                        <img src="/images/theme/default/add-text-notes.svg" alt="notes"><span class="tooltiptext">Add Notes</span>
                    </a>
                </div>
                <div class="ui dropdown link items" id="dropdownControl">
                    <div class="item">
                        <div class="ui tiny image">
{{--                            @if(!empty(auth()->guard('agents')->user()->avatar_name))--}}
{{--                                <img src="{{auth()->guard('agents')->user()->avatar_url}}" style="max-height: 73px!important; object-fit: cover;" class="profileImage">--}}
{{--                            @else--}}
                                <img src="/images/theme/default/no_image_available.png" alt="" class="profileImage" style="max-height: 73px; object-fit: cover;">
{{--                            @endif--}}
                        </div>
                        <div class="content">
                            <div class="header">Mr. Agent</div>
                            <div class="description">
                                <p><i class="fas fa-circle"></i>Account Holder</p>
                            </div>
                        </div>
                    </div>
                    <div class="menu" id="menuControll">
{{--                        @if($hasVoip)--}}
{{--                            <div class="item">--}}
{{--                                <div class="ui toggle checkbox">--}}
{{--                                    <input type="checkbox" name="public" id="setVoipMode">--}}
{{--                                    <label>VoIP Mode</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <div class="item">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="public" id="setDisturbMode">
                                <label>Don't disturb</label>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="public" id="setAway">
                                <label>Away status</label>
                            </div>
                        </div>
                        <div class="item"><a href="#whiteList">Disturb white list</a></div>
                        <div class="item"><a href="">Edit profile</a></div>
                        <div class="item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <a class="dropdown-item" href="/logout">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{route('agent.logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main index-page page-w container">
    @yield('content')
</div>
<!-- content section-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/vendor/jquery/dist/jquery.js"></script>

{{--<script type="text/javascript">--}}
{{--    var timerVar;--}}
{{--    $(document).ready(function(){--}}
{{--        timerVar  = "{{env('AWAY_STATUS_TIMER', 600000)}}";--}}
{{--    });--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}
{{--        agentName = "<?= Auth::guard('agents')->user()->web_username ?>";--}}
{{--    });--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}
{{--        callCenterId = "<?= Auth::guard('agents')->user()->call_center_id ?>";--}}
{{--    });--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function () {--}}
{{--        agentHash = "{{Auth::guard('agents')->user()->agent_hash}}";--}}
{{--    })--}}
{{--</script>--}}
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/fontawesome/js/all.js"></script>
<script src="/vendor/twilio/twilio.js"></script>
<script src="/vendor/socket.io-client/dist/socket.io.js"></script>
{{--@if(!request()->route()->named('sms.page'))--}}
{{--    <script src="/vendor/semantic/dist/semantic.js"></script>--}}
{{--@endif--}}
<script src="/vendor/semantic/dist/semantic.js"></script>
<script src="/vendor/mmenu/dist/mmenu.js"></script>

@stack('scriptsLib')
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/jquery.maskedinput/dist/jquery.maskedinput.js"></script>
<script src="/js/theme/default/sweetalert2.js"></script>
<script src="/js/theme/default/init.js"></script>
<script src="/js/theme/default/agent.js"></script>
@stack('scripts')



<div id="callingpopup" class="overlay">
    <div class="popup callingp">
        <a class="close" href="#">&times;</a>
        <div class="image content">
            <div class="image">
                <img class="ui image" id="callAvatar" src="/images/theme/default/incoming.png">
            </div>
            <div class="description">
                <div class="user-info" id="call_from">
                    <p><span id="callerId"> </span></p>
                    <span id="extCallId">calling....</span>
                </div>
                <div class="options">
                    <div class="items accept" id="accept_call">
                        <i class="fas fa-phone fa-flip-horizontal"></i>Accept
                    </div>
                    <div class="items message" id="voicemailCallTrigger">
                      <span class="fa-layers fa-fw">
                        <i class="far fa-comment" style="color:#fff"></i>
                        <i class="fas fa-equals" data-fa-transform="shrink-7"></i>
                      </span>Message
                    </div>
                    <div class="items forward" id="reject_call">
                        <i class="fas fa-arrow-right"></i>Forward
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="currentCallPopup" style="display: none">
    <div class="sidebar-one">
        <div class="sidebar">
            <div class="info mobile hidden callInfoBlock" id="call_info">
                <div class="ui horizontal list call-div">
                    <div class="item callInfo">
                        <i class="fas fa-phone fa-flip-horizontal icon" style="margin-top: 10px;"></i>
                        <div class="content">
                            <div class="ui sub header" id="callName"></div>
                            inbound on call
                            <span id="durationCall" style="font-size: 11px;color: #e7e1e1;font-weight: 400"></span>
                        </div>
                    </div>
                    <div class="right item" style="margin-left: 0; display: inline-block">
                        <ul>
                            <li class="end-call">
                                <a class="reject_current_call" role="button">
                                    <img src="/images/theme/default/end-call.svg">
                                </a>
                            </li>
                            <li class="pause holdCall">
                                <a href="#">
                                    <img src="/images/theme/default/pause.svg">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="item incomingCall" style="margin-left: 0; display: inline-block">
                        <div class="content">
                            <div class="ui sub header incomingCallName">+380965451710</div>
                            <div class="incomingExt">ext: 303</div>
                        </div>
                    </div>
                </div>
                <div class="inline fields">
                    <button id="keypadPopup" class="ui button">Keypad</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pad" style="display: none;">
        <i class="close icon" id="closeKey"></i>
        <div class="dial-pad">
            <div class="digits">
                <div class="dig pound number-dig" name="1">1</div>
                <div class="dig number-dig" name="2">2
                    <div class="sub-dig">ABC</div>
                </div>
                <div class="dig number-dig" name="3">3
                    <div class="sub-dig">DEF</div>
                </div>
                <div class="dig number-dig" name="4">4
                    <div class="sub-dig">GHI</div>
                </div>
                <div class="dig number-dig" name="5">5
                    <div class="sub-dig">JKL</div>
                </div>
                <div class="dig number-dig" name="6">6
                    <div class="sub-dig">MNO</div>
                </div>
                <div class="dig number-dig" name="7">7
                    <div class="sub-dig">PQRS</div>
                </div>
                <div class="dig number-dig" name="8">8
                    <div class="sub-dig">TUV</div>
                </div>
                <div class="dig number-dig" name="9">9
                    <div class="sub-dig">WXYZ</div>
                </div>
                <div class="dig number-dig astrisk" name="*">*</div>
                <div class="dig number-dig pound" name="0">0</div>
                <div class="dig number-dig pound" name="#">#</div>
            </div>
            <div class="digits">
                <div class="dig-spacer"></div>
            </div>
        </div>
        <div class="call-pad">
            <div class='pulsate'>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="ca-name">Chris Mullins</div>
            <div class="ca-number">123 456 7890</div>
            <div class="ca-status" data-dots="...">Calling</div>
        </div>
        <div class="call action-dig">
            <div class="call-change"><span></span></div>
            <div class="call-icon"><i class="fas fa-phone fa-flip-horizontal"></i><i class="fas fa-phone-slash fa-flip-horizontal"></i></div>
        </div>
    </div>
</div>
<div class="ui modal tiny" id="redirectCallPopup">
    <i class="close icon"></i>
    <div class="header">
        Redirect call
    </div>
    <div class="content">
        <select class="ui fluid dropdown" id="redirectSelect">
        </select>
    </div>
    <div class="actions">
        <div class="ui button cancel">Cancel</div>
        <div class="ui button ok" id="redirectCallBtn">OK</div>
    </div>
</div>
<!-- Note popup model start -->
<div id="notepopup" class="overlay">
    <div class="popup notesadd">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <h3>Add Notes</h3>
            <form id="addNoteForm">
                <div class="field">
                    <label>Title</label>
                    <input type="text" name="title" id="addNoteTitle">
                </div>
                <div class="field">
                    <label>Message</label>
                    <textarea name="text" id="addNoteText"></textarea>
                </div>
                <input type="hidden" name="id" id="addNoteId" disabled>
                <button class="ui button" id="addNote" type="button">Save</button>
            </form>
        </div>
    </div>
</div>
<!-- Note popup model end -->
<!--View-Note model popup -->
<div id="viewnote" class="overlay">
    <div class="popup notesadd">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <h3 id="noteTitle"></h3>
            <p id="noteText"></p>
        </div>
    </div>
</div>
<div id="voiceTranscription" class="overlay">
    <div class="popup notesadd">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <h3>Voice Message Transcription</h3>
            <p id="transcriptionText"></p>
        </div>
    </div>
</div>
<div id="techSupport" class="overlay">
    <div class="popup techSupport">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <img src="/images/theme/default/logo2.png" alt="" class="ui centered image">
            <div class="ui items">
                <div class="item">
                    <div class="ui tiny image">
                        <i class="blue phone icon big rotated"></i>
                    </div>
                    <div class="middle aligned content large" style="font-size: 18px; height: 25px">
                        For technical support call 1-800-222-8170
                    </div>
                </div>
                <div class="ui horizontal divider">
                    Or
                </div>
                <div class="item">
                    <div class="ui tiny image">
                        <i class="blue envelope icon big"></i>
                    </div>
                    <div class="middle aligned content" style="font-size: 18px;  height: 25px">
                        email us at support@versicomcorp.com
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="deviceConfig" class="overlay">
    <div class="popup deviceConfig">
        <a class="close" href="#">&times;</a>
        <div class="content" style="overflow: unset">
            <h4 class="ui dividing header">Devices</h4>
            <div class="ui icon warning message" style="height: auto;">
                <i class="exclamation triangle icon"></i>
                <div class="content">
                    <div class="header">
                        Warning!
                    </div>
                    <p>This feature correctly works only in Chrome, Edge and Opera browsers.</p>
                </div>
            </div>
            <form class="ui form">
                <div class="field">
                    <div class="two fields inline">
                        <div class="field thirteen wide ui grid">
                            <div class="column three wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                <label>Ringtone device</label>
                            </div>
                            <div class="column twelve wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                <div class="field">
                                    <select class="ui fluid dropdown" id="ringtoneDevice" style="width: 100%">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field three wide">
                            <button class="ui button blue" id="ringtoneDeviceTest" role="button">Speaker Test</button>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="two fields inline">
                        <div class="field thirteen wide ui grid">
                            <div class="column three wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                <label>Active call device</label>
                            </div>
                            <div class="column twelve wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                <div class="field">
                                    <select class="ui fluid dropdown" id="callDevice" style="width: 100%">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field three wide">
                            <button class="ui button blue" id="speakerTest" role="button">Speaker Test</button>
                        </div>
                    </div>
                </div>
                <button class="ui button positive fluid" id="saveDevices" role="button">Apply changes</button>
            </form>
        </div>
    </div>
</div>
<!--View-Note popup end -->
<div id="allnotes" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <table class="ui celled striped table unstackable" id="notesTable" style="width: 100%;">
                <thead>
                <tr>
                    <th class="left aligned collapsing five wide">
                        <label>Title</label>
                    </th>
                    <th class="center aligned collapsing one wide">
                        <label> Actions </label>
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Add New model popup -->
<div id="viewcontact" class="overlay">
    <div class="popup addnew">
        <div class="top-section">
            <div class="title-area">
                <h3>
                </h3>
            </div>
            <div class="action-btn">
                <a role="button" id="showContactNotes" href="#viewContactNotes" data-tooltip="View notes"><i class="fas fa-sticky-note"></i></a>
                <a role="button" id="addNote" href="#addContactNote" data-tooltip="Add note"><i class="fas fa-edit"></i></a>
                <a role="button" id="editProfile" data-tooltip="Edit contact"><i class="fas fa-pencil-alt"></i></a>
                <a role="button" id="deleteContact" data-tooltip="Delete contact"><i class="far fa-trash-alt"></i></a>
                <a class="close" href="#">&times;</a>
            </div>
        </div>
        <div class="content">
            <p>Phone <span class="contactPhone"></span></p>
            <ul>
                <li class="">
                    <a role="button" onclick="window.location.href = ''">
                        <i class="fas fa-comment"></i>
                        Sms
                    </a>
                </li>
                <li class="">
                    <a role="button" id="contactMail">
                        <i class="fas fa-comments"></i>
                        Email
                    </a>
                </li>
            </ul>
        </div>
        <input type="hidden" id="contactId" value="">
    </div>
</div>
<!--Add New popup end -->
<!--Add New model popup -->
<div id="editcontact" class="overlay">
    <div id="popup-design" class="popup addnew">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form class="ui form" id="editContactForm">
                <div class="inline fields">
                    <label class="name">
                    </label>
                    <div class="field">
                        <input type="text" class="contactName" name="name" placeholder="Alex Blake" value="">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Phone</label>
                    <div class="field">
                        <input type="text" class="contactPhone" name="phone" placeholder="1172-78945612" value="">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Email</label>
                    <div class="field">
                        <input type="text" class="contactEmail" name="email" placeholder="alex_blake@domain.com" value="">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Address</label>
                    <div class="field">
                        <input type="text" class="contactAddress" name="address" placeholder="Address" value="">
                    </div>
                </div>
                <div class="inline fields">
                    <label>City</label>
                    <div class="field">
                        <input type="text" class="contactCity" name="city" placeholder="City" value="">
                    </div>
                </div>
                <div class="inline fields">
                    <label>State</label>
                    <div class="field">
                        <input type="text" class="contactState" name="state" placeholder="State" value="">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Type</label>
                    <div class="field radio">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type" value="public">
                            <label>Public</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type" value="private">
                            <label>Private</label>
                        </div>
                    </div>
                </div>
                <input type="file" name="avatar" id="editContactAvatar" style="display: none">
                <div class="ui submit button" id="updateContact" data-id=""><i class="fas fa-check"></i>Save</div>
            </form>
        </div>
    </div>
</div>
<!--Add New popup end -->
<!--Add New model popup -->
<div id="addcontact" class="overlay">
    <div id="popup-design" class="popup addnew">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form class="ui form" id="contactForm">
                <div class="fields">
                    <div class="upload-img">
                        <img id="profileImage" src="/images/theme/default/camera.png" />
                        <input id="imageUpload" type="file" name="avatar" placeholder="Photo" required="" capture class="contactAvatar">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Name</label>
                    <div class="field">
                        <input type="text" name="name" value="" placeholder="Enter name">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Phone</label>
                    <div class="field">
                        <input type="text" name="phone" value="" placeholder="Enter phone number">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Email</label>
                    <div class="field">
                        <input type="text" name="email" placeholder="Enter email address">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Address</label>
                    <div class="field">
                        <input type="text" name="address" placeholder="Enter address">
                    </div>
                </div>
                <div class="inline fields">
                    <label>City</label>
                    <div class="field">
                        <input type="text" name="city" placeholder="Enter city">
                    </div>
                </div>
                <div class="inline fields">
                    <label>State</label>
                    <div class="field">
                        <input type="text" name="state" placeholder="Enter state">
                    </div>
                </div>
                <div class="inline fields">
                    <label>Type</label>
                    <div class="field radio">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type" checked value="public">
                            <label>Public</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type" value="private">
                            <label>Private</label>
                        </div>
                    </div>
                </div>
                <div class="ui submit button" id="saveContact"><i class="fas fa-plus-circle"></i>Add</div>
            </form>
        </div>
    </div>
</div>
<div id="whiteList" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <div class="ui form">
                <div class="inline fields">
                    <label>Phone Number</label>
                    <div class="field twelve wide">
                        <input type="text" placeholder="+19375451211" id="whiteListNumber">
                    </div>
                    <div class="ui submit button green" id="addNumberToWhiteList">Add number</div>
                </div>
            </div>
            <table class="ui celled striped table unstackable" id="whiteListTable" style="width: 100%;">
                <thead>
                <tr>
                    <th class="left aligned collapsing seven wide">
                        <label>Number</label>
                    </th>
                    <th class="center aligned collapsing one wide">
                        <label>Actions</label>
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--Create Conference Modal--}}
<div id="createConferenceModel" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="scrolling content">
            <div class="ui form">
                <div class="field">
                    <label for="conferenceName">Conference name</label>
                    <input type="text" id="conferenceName">
                </div>
                <div class="field">
                    <label for="conferenceDigits">Conference Password</label>
                    <input type="text" id="conferenceDigits">
                </div>
                <div class="field">
                    <label>Connected Agents</label>
                    <select multiple="" class="ui dropdown" id="conferenceAgent">
{{--                        @foreach($agents ?? $mobileAgent as $agent)--}}
{{--                            <option value="{{$agent->agent_hash}}">{{$agent->first_name}} {{$agent->last_name}}</option>--}}
{{--                        @endforeach--}}
                    </select>
                </div>
                <div id="conferenceNumbers">
                    <div class="field">
                        <label>Connected Numbers</label>
                        <i class="plus circle large blue icon addConferenceNumber"></i>
                        <input type="text" class="conferenceNumber">
                    </div>
                </div>

                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" id="deleteAfterEnd">
                        <label>Remove after conference end</label>
                    </div>
                </div>

                <button class="positive ui button" id="addConference">Make Conference</button>
            </div>
        </div>
    </div>
</div>
{{--Show Conferences List Modal--}}
<div id="allConferenceModal" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <table class="ui celled striped table unstackable" id="conferenceTable" style="width: 100%;">
                <thead>
                <tr>
                    <th class="left aligned collapsing conference_name" style="width: 60%">
                        <label>Name</label>
                    </th>
                    <th class="center aligned collapsing conference_member" style="width: 10%">
                        <label>Members</label>
                    </th>
                    <th class="center aligned collapsing conference_member" style="width: 10%">
                        <label>In Conference</label>
                    </th>
                    <th class="center aligned collapsing conference_join_table" style="width: 20%">
                        <label>Actions</label>
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--Join Conference Modal--}}
<div class="ui modal small" id="joinConferenceModal">
    <div class="header">Enter Join Code</div>
    <div class="content">
        <div class="ui form">
            <div class="field">
                <label for="joinCode">Join Code</label>
                <input type="text" id="joinCode">
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui left floated button" id="sendCode">Send Code Again</div>
        <div class="ui cancel button">Cancel</div>
        <div class="ui approve positive button">Join</div>
    </div>
</div>
{{--Import contact file--}}
<div id="contactFile" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="ui center aligned grid content">
            <div class="centered column row">
                <h3>Upload your file</h3>
                <div id='contactFileDrag'>
                    <i class="huge upload icon"></i>
                </div>
                <input type="file" name="contactFile" id="contactFileInput">
            </div>
        </div>
    </div>
</div>
<div id="contactFileContent" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="scrolling content">
        </div>
        <div class="actions">
            <div class="ui buttons fluid">
                <button class="ui blue button" id="importPublicContacts">Import as public</button>
                <div class="or"></div>
                <button class="ui positive button" id="importPrivateContacts">Import as private</button>
            </div>
        </div>
    </div>
</div>
<!-- IMPORT LARGE EXCEL FILE -->
<div id="contactLargeExcelFileContent" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="actions">
            <div class="ui buttons fluid">
                <button class="ui blue button" id="importPublicLargeExcelContacts">Import as public</button>
                <div class="or"></div>
                <button class="ui positive button" id="importPrivateLargeExcelContacts">Import as private</button>
            </div>
        </div>
    </div>
</div>
<!--Add New popup end -->
<!-- ADD CONTACT NOTE -->
<div id="addContactNote" class="overlay">
    <div id="popup-addnote" class="popup addnew">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form class="ui form" id="addContactNoteForm">
                <div class="inline fields">
                    <label>Text</label>
                    <div class="field">
                        <textarea></textarea>
                    </div>
                </div>
                <div class="ui submit button" id="saveNote" data-id=""><i class="fas fa-check"></i>Save</div>
            </form>
        </div>
    </div>
</div>
<!-- VIEW CONTACT NOTES -->
<div id="viewContactNotes" class="overlay" style="overflow: unset;">
    <div class="popup" style="height: 90%;">
        <a class="close" href="#">&times;</a>
        <div class="content" style="max-height: 100%; overflow: scroll;">
            <table class="ui celled striped table unstackable" id="contactNotesTable" style="width: 100%;">
                <thead>
                <tr>
                    <th class="left aligned collapsing five wide">
                        Text
                    </th>
                    <th class="center aligned collapsing one wide">
                        Date
                    </th>
                    <th class="center aligned collapsing one wide">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- VIEW CONTACT NOTE -->
<div id="viewContactNote" class="overlay">
    <div class="popup notesadd">
        <a class="close" href="#viewContactNotes">&times;</a>
        <div class="content">
            <p id="contactNoteText"></p>
        </div>
    </div>
</div>
<!-- EDIT CONTACT NOTE -->
<div id="editContactNote" class="overlay">
    <div id="popup-addnote" class="popup addnew">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form class="ui form" id="editContactNoteForm">
                <div class="inline fields">
                    <label>Text</label>
                    <div class="field">
                        <textarea></textarea>
                    </div>
                </div>
                <div class="ui submit button" id="saveNoteChanges" data-note-id=""><i class="fas fa-check"></i>Save</div>
            </form>
        </div>
    </div>
</div>
<!-- VIDEO POPUP -->
<div class="ui modal small" id="videoPopup">
    <i class="close icon"></i>
    <div class="header">Video Intro</div>
    <div class="content">
        <div class="ui centered grid">
            <div class="sixteen column centered row">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/rlaqLc4hLoI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

</body>
</html>
