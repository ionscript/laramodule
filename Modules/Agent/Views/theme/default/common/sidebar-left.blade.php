<div class="sixteen wide mobile four wide tablet four wide computer column sidebar-one">
    <div class="sidebar">
        <div class="ui pointing secondary contact-list menu mobile hidden">
            <a class="item active" data-tab="first">All</a>
            <a class="item" data-tab="second">Missed</a>
            <a class="item" data-tab="third">Recent</a>
            <a class="item" data-tab="four">Contacts</a>
            <a class="item" data-tab="five">Groups</a>
        </div>
        <div class="ui active tab segment" data-tab="first">
            <div class="account-holder-info general">


                <div class="ui styled fluid room accordion">
                    <div class="title callHead active">
                        <div class="icon-side">
            <span class="fa-layers fa-fw">
              <img src="/images/theme/default/make-call.svg" style="width: 22px;">
            </span>
                        </div>
                        <div class="title-style">
                            <p>FULL_NAME</p>
                        </div>
                        <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                    </div>
                    <div class="content active" style="padding: 5px!important; position: relative;" id="callsBlockWrapper">
{{--                        @forelse($activeCalls as $activeCall)--}}
{{--                            <div class="info callInfoBlock" id="call_info" data-call-sid="">--}}
{{--                                <div class="ui horizontal list call-div">--}}
{{--                                    <div class="item callInfo" style="display:inline-block;">--}}
{{--                                        <div class="call-info">--}}
{{--                                            <i class="fas fa-phone fa-flip-horizontal icon" style="margin-top: 10px;"></i>--}}
{{--                                            <div class="content">--}}
{{--                                                <div class="ui sub header callName">CALLER_ID</div>--}}
{{--                                                inbound on call--}}
{{--                                                <span class="durationCall" style="font-size: 11px;color: #e7e1e1;font-weight: 400"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="call-contact" data-contact-id="">--}}
{{--                                            <a role="button">--}}
{{--                                                <i class="far fa-address-card"></i>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="right item callInfo" style="margin-left: 0; display: inline-block">--}}
{{--                                        <ul>--}}
{{--                                            <li class="end-call" style="text-align: center">--}}
{{--                                                <a class="reject_current_call" role="button">--}}
{{--                                                    <img src="/images/theme/default/end-call.svg">--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="pause holdCall" style="text-align: center">--}}
{{--                                                <a href="#">--}}
{{--                                                    <div style="color: #fff; margin-bottom: 5px;">HOLD</div>--}}
{{--                                                    <img src="/images/theme/default/pause.svg">--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="item incomingCall" style="display: none">--}}
{{--                                        <div class="content">--}}
{{--                                            <div class="ui sub header incomingCallName"></div>--}}
{{--                                            <div class="incomingExt"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <span class="dropCall" style="display: none;">--}}
{{--                            <i class="fas fa-phone fa-flip-horizontal"></i> Drop your call here.--}}
{{--                    </span>--}}
{{--                                    <div class="right item acceptIncomingCall" style="margin-left: 0; display: none">--}}
{{--                                        <ul>--}}
{{--                                            <li class="accept-call">--}}
{{--                                                <a class="acceptIncomingCall" role="button">--}}
{{--                                                    <i class="fas fa-phone fa-flip-horizontal"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p>Status: Available...</p>--}}
{{--                            </div>--}}
{{--                        @empty--}}
                            <div class="info callInfoBlock" id="call_info">
                                <div class="ui horizontal list call-div">
                                    <div class="left item callInfo">
                                        <div class="call-info">
                                            <i class="fas fa-phone fa-flip-horizontal icon"></i>
                                            <div class="content">
                                                <div class="ui sub header callName"></div>
                                                inbound on call
                                                <span class="durationCall" style="font-size: 11px;color: #e7e1e1;font-weight: 400"></span>
                                            </div>
                                        </div>
                                        <div class="call-contact" data-contact-id="" data-contact-number="">
                                            <a role="button">
                                                <i class="far fa-address-card"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="right item callInfo" style="margin-left: 0; display: none">
                                        <ul>
                                            <li class="end-call" style="text-align: center">
                                                <a class="reject_current_call" role="button">
                                                    <img src="/images/theme/default/end-call.svg">
                                                </a>
                                            </li>
                                            <li class="pause holdCall" style="text-align: center">
                                                <a href="#">
                                                    <div style="color: #fff; margin-bottom: 5px;">HOLD</div>
                                                    <img src="/images/theme/default/pause.svg">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item incomingCall" style="display: none">
                                        <div class="content">
                                            <div class="ui sub header incomingCallName"></div>
                                            <div class="incomingExt"></div>
                                        </div>
                                    </div>
                                    <span class="dropCall" style="display: block;">
                        <i class="fas fa-phone fa-flip-horizontal"></i> Drop your call here.
                    </span>
                                    <div class="right item acceptIncomingCall" style="margin-left: 0">
                                        <ul>
                                            <li class="accept-call">
                                                <a class="acceptIncomingCall" role="button">
                                                    <i class="fas fa-phone fa-flip-horizontal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p>Status: Available...</p>
                            </div>
{{--                        @endforelse--}}
                    </div>
                </div>



                <br>

                <div class="ui styled fluid room accordion callOnHoldBlock">
                    <div class="title">
                        <div class="icon-side">
            <span class="fa-layers fa-fw">
              <img src="/images/theme/default/parked.svg" style="width: 22px;">
            </span>
                        </div>
                        <div class="title-style">
                            <p>Calls on Hold</p>
                        </div>
                        <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                    </div>
                    <div class="content">
                        <div class="items ui link">
                            <!-- mobile style -->
                            <div class="active content mobile only">
                                <div class="member ui items callOnHoldWrapper">
{{--                                    @foreach($holdCalls as $holdCall)--}}
                                        <div class="item call-receive">
                                            <div class="call-top-sec">
                                                <div class="ui medium-img image mobile ">
                                                    <img src="/images/theme/default/no_image_available.png">
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="header">
                                                        CONTACT_NAME_OR_CALLER_ID
                                                        <span>EXTENSION_NUMBER</span>
                                                    </div>
                                                    <div class="description">
                                                        <p class="mobile hidden">CONTACT_NAME_OR_CALLER_ID_OR_EXTENSION_NUMBER</p>
                                                        <p class="offline"><i class="fas fa-circle"></i>Available</p>
                                                        <p class="timing"><i class="far fa-clock"></i>
                                                            <span class="holdDuration" style="color: #fff">
                                                HOLD_TIME
                                            </span>
                                                        </p>
                                                        <p class="on-hold">Status : Call on hold...</p>
                                                    </div>
                                                </div>
                                                <div class="extra">
                                                    <div class="ui right">
                                                        <a href="#" class="disconnect"><i class="flaticon-end-call-button"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                    @endforeach--}}
                                </div>
                            </div>
                            <!-- mobile style -->
                            <!-- desktop style -->
                            <div class="content mobile hidden">
                                <div class="member ui items callOnHoldWrapper">
{{--                                    @foreach($holdCalls as $holdCall)--}}
                                        <div class="item call-receive callOnHold" draggable="true" data-call="" data-hold-second="">
                                            <div class="call-top-sec">
                                                <div class="ui medium-img image mobile ">
                                                    <img src="/images/theme/default/no_image_available.png">
                                                </div>
                                                <div class="middle aligned content">
                                                    <div class="header">
                                                        CALLER_ID_OR_CONTACT_NAME
                                                    </div>
                                                    <div class="description">
                                                        <p>CONTACT_NAME_OR_CALLER_ID_OR_EXTENSION_NUMBER</p>
                                                        <p class="offline mobile hidden"><i class="fas fa-circle"></i>Available</p>
                                                    </div>
                                                </div>
                                                <div class="extra">
                                                    <div class="ui right">
                                                        <img class="mobile only" src="/images/theme/default/phone-receiver.svg" alt="chat">
                                                        <a href="#" class="disconnect"><i class="flaticon-phone-receiver mobile hidden"></i><i class="flaticon-end-call-button mobile hidden"></i></a>
                                                    </div>
                                                </div>
                                                <div class="time-count">
                                                    <div class="call-info">
                                                        <p>Inbound on call
                                                            <span class="holdDuration" style="color: #fff">HOLD_TIME
                                            </span>
                                                        </p>
                                                        <p>Status : Call on hold...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                    @endforeach--}}
                                </div>
                            </div>
                            <!-- desktop style -->
                        </div>
                    </div>
                </div>


                <br>
                {{--Keypad Section Start Here--}}


                <div class="ui styled fluid room accordion">
                    <div class="title">
                        <div class="icon-side">
            <span class="fa-layers fa-fw">
              <img src="/images/theme/default/make-call.svg" style="width: 22px;">
            </span>
                        </div>
                        <div class="title-style">
                            <p>Make a Call Now</p>
                        </div>
                        <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                    </div>
                    <div class="content">
                        <div class="ui form call-btn mobile hidden">
                            <div class="inline fields">
                                <div class="field phoneString">
                                    <input id="textclear" class="number" type="text" placeholder="Phone Number">
                                    <button class="ui btn-pad keypad" id="numKeypad"><i class="keyboard icon"></i></button>
                                    <button id="mykey" class="ui btn-pad"><img src="/images/theme/default/pad.png" alt="keypad"></button>
                                </div>
                                <button class="ui button btn-icon" type="submit" id="newCall"><img src="/images/theme/default/n-cal.png" alt="call">Call</button>
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
                                            <div class="dig addPerson"><a href="#addcontact"><img style="width: 25px;" src="/images/theme/default/add-user.svg"></a></div>
                                            <div class="dig-spacer"></div>
                                            <div class="dig goBack action-dig"><i class="fas fa-backspace"></i></div>
                                        </div>
                                    </div>
                                    <div class="call-pad">
                                        <div class='pulsate'>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="ca-avatar" style="background-image: url(./images/dave-bledsoe.png);"></div>
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
                        </div>
                    </div>
                </div>

                {{--Keypad Section End Here--}}
            </div>

            <br class="mobile hidden">

            {{--Agents List Start Here--}}

            <div class="ui general accordion mobile hidden">
                <div class="title active">
                    <img src="/images/theme/default/user.svg" alt="general">
                    General
                    <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                </div>
                <div class="active content">
                    <div class="member ui items" id="agentsBlock">
{{--                        @foreach($agents as $agent)--}}
{{--                            @if(isset($agent->call_status) && $agent->call_status == 'ringing')--}}
{{--                                <div class="item agentCallBlock incall call-receive" draggable="true" data-sid="">--}}
{{--                                    @elseif(isset($agent->call_status) && $agent->call_status == 'in-progress')--}}
{{--                                        <div class="item agentCallBlock activecall call-receive" data-sid>--}}
{{--                                            @else--}}
                                                <div class="item agentCallBlock call-receive nocall" data-sid>
{{--                                                    @endif--}}
                                                    <div class="call-top-sec">
                                                        <div class="ui medium-img image mobile">
{{--                                                            @if(!empty($agent->avatar_name))--}}
{{--                                                                <img src="{{$agent->avatar_url}}">--}}
{{--                                                            @else--}}
                                                                <img src="/images/theme/default/no_image_available.png" alt="">
{{--                                                            @endif--}}
                                                        </div>
                                                        <div class="middle aligned content">
                                                            <div class="header">
                                                                AGENT_FULL_NAME
                                                            </div>
                                                            <div class="description">
                                                                <p>AGENT_EXTENSION_NUMBER_OR_NON_EXTENSION</p>
                                                                <span class="online">
{{--                                                                    @switch($agent->code)--}}
{{--                                                                        @case('available')--}}
{{--                                                                        <p class="available mobile hidden"><i class="fas fa-circle"></i>available</p>--}}
{{--                                                                        @break--}}
{{--                                                                        @case('offline')--}}
{{--                                                                        <p class="offline mobile hidden"><i class="fas fa-circle"></i>Offline</p>--}}
{{--                                                                        @break--}}
{{--                                                                        @case('away')--}}
                                                                        <p class="away mobile hidden"><i class="fas fa-circle"></i>Away</p>
{{--                                                                        @break--}}
{{--                                                                    @endswitch--}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="extra">
                                                            <div class="ui right">
                                                                <img class="mobile only"
                                                                     src="/images/theme/default/phone-receiver.svg"
                                                                     alt="chat">
                                                                <img class="mobile only"
                                                                     src="/images/theme/default/chat-comments.svg"
                                                                     alt="chat">
                                                                <a role="button" class="agent_call" data-agent="client:WEB_USERNAME"><i class="flaticon-phone-receiver mobile hidden" style="display:block;"></i></a>
                                                                <a role="button" class="chat_btn" data-chat-id="" data-user-id="">
{{--                                                                    @if($agent->unread > 0)--}}
{{--                                                                        <div class="floating ui red label unreadedCount" style="top: -15px;">{{$agent->unread}}</div>--}}
{{--                                                                    @endif--}}
                                                                    <i class="flaticon-chat mobile hidden"></i>
                                                                </a>
                                                            </div>
                                                        </div>
{{--                                                        @if(isset($agent->callerId))--}}
{{--                                                            <div class="time-count" data-seconds="{{$agent->call_seconds ?? ''}}" data-agent="{{$agent->agent_hash}}">--}}
{{--                                                                <div class="call-info">--}}
{{--                                                                    <p>Caller: <span class="popupCaller">{{$agent->callerId ?? ''}}</span></p>--}}
{{--                                                                    {!! isset($agent->contactName) ? '<p>Name: ' . $agent->contactName . '</p>' : '' !!}--}}
{{--                                                                    <p>Time: <span class="popupTime">{{$agent->call_duration ?? ''}}</span></p>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
                                                    </div>
                                                </div>
{{--                                                @endforeach--}}

                                        </div>
                </div>
            </div>


            {{--Agents List End Here--}}

            <br class="mobile hidden">

            {{--Queue Block Start Here--}}

            <div class="ui styled fluid room accordion  mobile hidden">
                <div class="title">
                    <div class="icon-side">
            <span class="fa-layers fa-fw">
                <img src="/images/theme/default/queue.svg" alt="phone" style="width: 22px;">
            </span>
                    </div>
                    <div class="title-style">
                        <p>My Queues</p>
                        <p class="status">Logged in (AGENT_QUEUES_COUNT),</p>
                    </div>
                    <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                </div>

                <div class="content">
                    <div class="items ui link ">
{{--                        @foreach($agentQueues as $agentQueue)--}}
                            <div class="item">
                                <div class="ui avatar mini image">
                                    <img src="/images/theme/default/sales-que.png">
                                </div>
                                <div class="content">
                                    <div class="header">QUEUE_NAME</div>
                                    <div class="description">
                                        <p>Logged in</p>
                                    </div>
                                </div>
                            </div>
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>

            {{--Queue Block End Here--}}

            <div class="ui category search mobile hidden">
                <div class="ui icon input">
                    <input class="prompt" id="searchAgentInput" type="text" placeholder="Search people...">
                    <i class="search icon fa-flip-horizontal" id="searchAgentButton"></i>
                </div>
                <div class="results"></div>
            </div>
            <br class="mobile hidden">


            <div class="ui styled fluid room accordion mobile hidden">
                <div class="title">
                    <div class="icon-side">
            <span class="fa-layers fa-fw" style="">
               <img src="/images/theme/default/speech-bubble.svg" alt="room" style="width: 22px;">
            </span>
                    </div>
                    <div class="title-style">
                        <p>Conference</p>
                    </div>
                    <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                </div>
                <div class="content roomgroup">
                    <div class="items ui link ">
                        <div class="item">
                            <div class="content">
                                <div class="description">
                                    <p class="room-info">Room is free and you can do it...</p>
                                </div>
                                <div class="btn-section">
                                    <a class="ui button" id="showConference" href="#allConferenceModal">
                                        Join Now!
                                    </a>
{{--                                    @if(session()->has('admin_id') || Auth::guard('agents')->user()->conference_permission)--}}
{{--                                        <a class="ui button" id="makeConference" href="#createConferenceModel">--}}
{{--                                            Make Conference--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="ui tab segment" data-tab="second">
            <div class="ui general accordion">
                <div class="title active">
                    Missed Calls
                    <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                </div>
                <div class="active content">
                    <div class="member ui items ">
{{--                        @forelse($missedCalls as $missedCall)--}}
                            <div class="item">
                                <div class="aligned content" style="display: inline-block">
                                    <h3>
                                        NUMBER_FROM CONTACT_NAME_OR_EMPTY
                                    </h3>
                                    <div class="description">
                                        <p>DATE</p>
                                    </div>
                                </div>
{{--                                @if(!$miniVersion)--}}
{{--                                    <div class="extra recentCalls" style="display: inline-block">--}}
{{--                                        <div class="ui right callRecent" data-call-to="{{$missedCall->callTo}}">--}}
{{--                                            <img class="mobile only" src="{{asset('images/phone-receiver.svg')}}" alt="chat">--}}
{{--                                            <i class="flaticon-phone-receiver mobile hidden"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                            </div>
{{--                        @empty--}}
                            <div class="item">
                                <div class="aligned content">
                                    <div class="description">You don't have recent calls</div>
                                </div>
                            </div>
{{--                        @endforelse--}}
                    </div>
                </div>
            </div>
        </div>


        {{--Recent Call Start Here--}}



        <div class="ui tab segment" data-tab="third">
            <div class="ui general accordion">
                <div class="title active">
                    Recent Calls
                    <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i>
                </div>
                <div class="active content">
                    <div class="member ui items ">
{{--                        @forelse($recentCalls as $recentCall)--}}
                            <div class="item">
                                <div class="aligned content" style="display: inline-block">
                                    <h3>
{{--                                        @if($recentCall->type === 'incoming')--}}
{{--                                            <i class="icon long arrow alternate down text-danger"></i>--}}
{{--                                        @endif--}}
{{--                                        @if($recentCall->type === 'outgoing')--}}
{{--                                            <i class="icon long arrow alternate up"></i>--}}
{{--                                        @endif--}}
{{--                                        @if($recentCall->type === 'queue')--}}
{{--                                            <i class="icon random"></i>--}}
{{--                                        @endif--}}
{{--                                        @if($recentCall->type === 'clients')--}}
{{--                                            <i class="icon ellipsis horizontal"></i>--}}
{{--                                        @endif--}}
                                        CALLER_ID CONTACT_NAME_OR_EMPTY
                                    </h3>
                                    <div class="description">
                                        <p>DATE</p>
                                    </div>
                                </div>
{{--                                @if(!$miniVersion)--}}
{{--                                    <div class="extra recentCalls" style="display: inline-block">--}}
{{--                                        <div class="ui right callRecent" data-call-to="{{$recentCall->callTo}}">--}}
{{--                                            <img class="mobile only" src="{{asset('images/phone-receiver.svg')}}" alt="chat">--}}
{{--                                            <i class="flaticon-phone-receiver mobile hidden"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                            </div>
{{--                        @empty--}}
                            <div class="item">
                                <div class="aligned content">
                                    <div class="description">You don't have recent calls</div>
                                </div>
                            </div>
{{--                        @endforelse--}}
                    </div>
                </div>
            </div>
        </div>



        {{--Recent Call End Here--}}



        <div class="ui tab segment" data-tab="four">
            <div class="contact-wrapper">
                <div class="searchbar">
                    <form id="demo-2">
                        <input class="prompt" type="search" placeholder="Search" id="contactSearch">
                        <i class="search icon"></i>
                        <a class="add" href="#addcontact"><i class="plus circle icon"></i>Add New</a>
                    </form>

                </div>
                <a class="ui primary basic button fluid contactFile" href="#contactFile">
                    <i class="file icon"></i>Import File
                </a>
                <div class="contact-info" id="contactBlock">

{{--                    @forelse($contacts as $id => $contact)--}}
{{--                        @if($loop->first || $contact['name'][0] != $contacts[$id - 1]['name'][0])--}}
                            <div class="list-group">
                                <h3 class="side-title">CONTACT_NAME</h3>
                                <ul>
{{--                                    @endif--}}
                                    <li>
                                        <a role="button" data-id="" class="list-group-item show-contact list-group-item-action">
                                            CONTACT_NAME
                                        </a>
                                    </li>
{{--                                    @if($loop->last || $contact['name'][0] != $contacts[$id + 1]['name'][0])--}}
                                </ul>
                            </div>
{{--                        @endif--}}
{{--                    @empty--}}
                        <ul>
                            <li style="text-align: center">Empty List</li>
                        </ul>
{{--                    @endforelse--}}
                    <div class="contacts-pagination">
{{--                        {{ $contacts->links('vendor/pagination/semantic-ui') }}--}}
                    </div>



                </div>
            </div>
        </div>



        {{--Groups List Start Here--}}



        <div class="ui tab segment" data-tab="five">
            <div class="ui general accordion">
                <div class="title active">
                    Groups
                </div>
                <div class="active content">
                    <div class="member ui items ">
{{--                        @forelse($groups as $group)--}}
                            <div class="item">
                                <div class="aligned content">
                                    <h1 class="header">
                                        GROUP_NAME
                                    </h1>
                                    <div class="description">GROUP_COUNT users in this group</div>
                                </div>
                                <div class="extra">
                                    <div class="ui right groupChatSelect" data-group-hash="">
{{--                                        @if($group->unread != 0)--}}
{{--                                            <div class="floating ui red label unreadedCount" style="top: -1em; left: 90%;">GROUP_UNREAD</div>--}}
{{--                                        @endif--}}
                                        <img class="mobile only" src="/images/theme/default/phone-receiver.svg" alt="chat">
                                        <img class="mobile only" src="/images/theme/default/chat-comments.svg" alt="chat">
                                        <img class="mobile hidden" src="/images/theme/default/chat.svg" alt="chat">
                                    </div>
                                </div>
                            </div>
{{--                        @empty--}}
                            <div class="item">
                                <div class="aligned content">
                                    <div class="description">You are not a member of any groups</div>
                                </div>
                            </div>
{{--                        @endforelse--}}
                    </div>
                </div>
            </div>
        </div>


        {{--Groups List End Here--}}

    </div>
</div>
