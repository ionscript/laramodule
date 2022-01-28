<div class="sixteen wide mobile eight wide tablet eight wide computer column middle-section">
    <div class="ui pointing chat-sections mobile hidden menu">
        <a class="item active mobile hidden chat-tab-link tab-link" data-tab="first1">Chat</a>
        <a class="item mobile hidden voicemail-tab-link tab-link" data-tab="second2">Voicemail</a>
        <a class="item mobile hidden group-tab-link tab-link" data-tab="three3">Group</a>
        <a class="item mobile hidden tab-link" data-tab="four4" id="queueIndecator">Queues</a>
        <a class="item mobile hidden tab-link" data-tab="five5">Recordings</a>
    </div>
    <div class="ui pointing secondary mobile only chat-sections  menu">
        <a class="item active chat-tab-link tab-link" data-tab="first1">Chat</a>
        <a class="item voicemail-tab-link tab-link" data-tab="second2">Voicemail<span>2</span></a>
        <a class="item group-tab-link tab-link" data-tab="three3">Group</a>
        <a class="item tab-link" data-tab="four4">Queues</a>
        <a class="item tab-link" data-tab="five5">Recordings</a>
    </div>
{{--    --}}{{--Chat Block--}}
    <div class="ui active tab segment main-tab" data-tab="first1" id="chat-tab" style="position: relative">
{{--        @isset($lastChat)--}}
{{--            <div style="position: absolute; top: -14px; background: #fff; left: 0; right: 0; padding: 5px; cursor: pointer;--}}
{{--            border-bottom: 2px solid #f7f7f7; z-index: 999" id="lastChatMessage" data-chat="{{$lastChat['chatHash']}}">--}}
{{--                <p style="margin-bottom: 5px; text-align: center">Last Chat Message</p>--}}
{{--                <div>--}}
{{--                    <p style="margin-bottom: 5px; float: left" id="lastChatMsg">{{$lastChat->first_name}} {{$lastChat->last_name}}: {{str_limit($lastChat->message, 30)}}</p>--}}
{{--                    <p style="margin-bottom: 5px; float: right; margin-right: 20px" id="lastChatTime">{{$lastChat['date']}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endisset--}}
{{--        @isset($lastSms)--}}
{{--            <div style="position: absolute; top: {{isset($lastChat) ? '50px' : '-14px'}}; background: #fff; left: 0; cursor: pointer;--}}
{{--                    right: 0; padding: 5px; z-index: 999" id="lastSmsMessage" onclick="window.location.href = '{{route('sms.page',['number' => urlencode($lastSms->from)])}}'">--}}
{{--                <p style="margin-bottom: 5px; text-align: center">Last SMS Message</p>--}}
{{--                <div>--}}
{{--                    <p style="margin-bottom: 5px; float: left" id="lastSmsMsg">{{$lastSms->name ?? $lastSms->from}}: {{str_limit($lastSms->message, 30)}}</p>--}}
{{--                    <p style="margin-bottom: 5px; float: right; margin-right: 20px" id="lastSmsTime">{{$lastSms['date']}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endisset--}}
        <div class="chat-area scrollbar-inner" id="chat-area">
            <!-- chat room-->
            <div style="height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h3 class='ui center aligned grid' style='color: #aaaaaa'>You can start chatting</h3>
            </div>
            <!-- chat room-->
        </div>
        <form class="ui reply form" id="chatForm" data-chat-hash style="height: 50px;">
            <div class="field">
                <div class="ui input icon">
                    <input class="text-field" type="text" id="chatMsgInput" placeholder="Type your message...">
                    <div class="segment">
                        <input type="file" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" />
                        <input type="hidden" id="authId" value="">
                        <input type="hidden" id="toId" value="">
                        <label for="embedpollfileinput" class="ui upload-icon">
                            <i class="fas fa-paperclip fa-rotate-90"></i>
                        </label>
                    </div>
                    <div class="right-side">
                        {{--<i class="far fa-smile icon right"></i>--}}
                        <div class="ui submit labeled icon button disabledBtn" id="sendMsgBtn" data-chat-room="">
                            <img src="/images/theme/default/send.png" alt="send">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{--    --}}{{--Voicemail Block--}}
    <div class="ui tab segment voice-section" data-tab="second2">
        <div class="ui two column padded grid mobile hidden">
            <div class="six wide column drop-section">
                <select class="ui search sort-by dropdown">
                    <option value="">Sort By</option>
                    <option value="AL">no</option>
                    <option value="AK">date</option>
                </select>
            </div>
            <div class="ten wide column search-input">
                <div class="search">
                    <div class="ui icon input">
                        <input type="text" placeholder="Search">
                        <i class="search link icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--content-->
        <table class="voicemail-record ui selectable celled table mobile hidden" id="voicemailTable" data-page-length="10" style="width: 100%;">
            <thead>
            <tr>
                <th>
                    <div class="ui checkbox">
                        <input type="checkbox" id="selectAllVoicemail">
                        <label></label>
                    </div>
                </th>
                <th>Received</th>
                <th>Caller</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
        <div class="demo-slider mobile hidden" style="max-width:100%;">
{{--            @if(!$voiceMails->isEmpty())--}}
                <div id="amazingaudioplayer-1" style="display:block;position:relative;width:100%;height:auto;margin:0px auto 0px;">
                    <img class="person-pic" src="/images/theme/default/layer-42.png">
                    <div class="ui horizontal list">
                        <div class="item">
                            <div class="content">
                                <div class="header">NUMBER_FROM</div>
                            </div>
                        </div>
                        <div class="item right">
                            <div class="content">
                                April, 28, 2017 13:22 PM
                            </div>
                        </div>
                    </div>

                    <ul class="amazingaudioplayer-audios" style="display:none;">
{{--                        @foreach($voiceMails as $voiceMail)--}}
{{--                            <li data-artist="pinkzebra" data-album="AudioJungle" data-info="" data-image="https://amazingaudioplayer.com/wp-content/uploads/amazingaudioplayer/2/audios/golden-wheat-field.jpg" data-duration="{{$voiceMail->duration}}">--}}
{{--                                <div class="amazingaudioplayer-source" data-type="audio/mpeg"--}}
{{--                                     data-src="{{asset(config('files.voicemails_audio_path'))}}/{{$voiceMail->file_name}}.{{$voiceMail->extension}}"  />--}}
{{--                                <div class="amazingaudioplayer-source"  data-type="audio/ogg"--}}
{{--                                     data-src="{{asset(config('files.voicemails_audio_path'))}}/{{$voiceMail->file_name}}.{{$voiceMail->extension}}" />--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
                    </ul>

                </div>
{{--            @endif--}}
        </div>
        <!-- only computer screen end -->
        <!-- only for mobile -->
        <table class="voicemail-record ui selectable celled table mobile only" id="mobileVoicemail">
            <thead>
            </thead>
            <tbody>
{{--            @forelse($voiceMails as $voiceMail)--}}
                <tr data-mail="">
                    <td class="play-icon">
                    <span class="fa-layers fa-fw">
                        <i class="fas fa-circle"></i>
                        <i class="fas fa-play play-file" data-fa-transform="shrink-6" data-sound=""></i>
                    </span>
                    </td>
                    <td class="caller"><p>Voicemail (DURATION)</p></td>
                    <td class="call-details">
                       'l'
                        <P>'h:i a'</P>
                    </td>
                    <td class="action-td">
                        <div class="ui teal ">
                            <div class="ui combo top right pointing dropdown icon button">
                                <i class="fas fa-ellipsis-v"></i>
                                <div class="menu">
                                    <div class="item">
                                        <a href="">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="item voiceMailCall" data-voice-number=""><i class="fas fa-phone fa-flip-horizontal"></i></div>
                                    <div class="item voiceMailDel" data-voice-id=""><i class="far fa-trash-alt"></i></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
{{--            @empty--}}
                <tr>
                    <td>Empty Data</td>
                </tr>
{{--            @endforelse--}}
            </tbody>
        </table>

        <div class="player mobile only">
            <div class="player__bar">
                <div class="player__album">
{{--                    @if(!$voiceMails->isEmpty())--}}
{{--                        <div class="active-song" data-author="937-859-1720" data-song="April, 28, 2017 09:25 AM" data--}}
{{--                             data-src="{{asset(config('files.voicemails_audio_path'))}}/{{$voiceMails->first()->file_name}}.{{$voiceMails->first()->extension}}">--}}
{{--                        </div>--}}
{{--                        <div class="" data-author="937-859-1720" data-song="Angels" data--}}
{{--                             data-src="{{asset(config('files.voicemails_audio_path'))}}/{{$voiceMails->first()->file_name}}.{{$voiceMails->first()->extension}}">--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
                <div class="player__controls">

                    <div class="player__prev">
                        <i class="fas fa-fast-forward"></i>
                    </div>

                    <div class="player__play">
                        <span class="fa-layers fa-fw" style="width: 50px !important;">
                          <i class="far fa-circle"></i>
                         <i class="fas fa-play"></i>
                        </span>
                    </div>

                    <div class="player-next">
                        <i class="fas fa-fast-forward"></i>
                    </div>
                </div>
            </div>
            <div class="player__timeline">
                <p class="player__author"></p>
                <p class="player__song"></p>
                <div class="player__timelineBar">
                    <div id="playhead"></div>
                </div>
            </div>
            <div class="audioplayer-volume"><div class="audioplayer-volume-button" title=""><a href="#"></a></div><div class="audioplayer-volume-adjust"><div><div style="width: 100%;"></div></div></div></div>
        </div>
        <!-- only for mobile -->
        <!--content-->
    </div>

    {{--    --}}{{--Group Block--}}
    <div class="ui tab segment main-tab" data-tab="three3" id="group-tab">
        <div class="group-chat-area scrollbar-inner" id="group-chat-area">
            <!-- chat room-->
            <div style="height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h3 class='ui center aligned grid' style='color: #aaaaaa'>You can start chatting</h3>
            </div>
            <!-- chat room-->

        </div>
        <form class="ui reply form" id="groupChatForm" data-group-hash style="height: 50px;">
            <div class="field">

                <div class="ui input icon">

                    <input class="text-field" type="text" id="groupChatMsgInput" placeholder="Type your message...">
                    <div class="segment">
                        <input type="file" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinputGroup" />
                        <input type="hidden" id="groupAuthId" value="">
                        <label for="embedpollfileinputGroup" class="ui upload-icon">
                            <i class="fas fa-paperclip fa-rotate-90"></i>
                        </label>
                    </div>
                    <div class="right-side">
                        <div class="ui submit labeled icon button disabledBtn" id="sendGroupMsgBtn" data-group-room="">
                            <img src="/images/theme/default/send.png" alt="send">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
{{--    --}}{{--Queue Block--}}
    <div class="ui tab segment voice-section main-tab" data-tab="four4">
        <table class="voicemail-record ui selectable celled table mobile hidden" id="queueTable" data-page-length="40" style="width: 100%;">
            <thead>
            <tr>
                <th>Queued Time</th>
                <th>Caller</th>
                <th>Queue Name</th>
                <th>Queue priority</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
{{--    --}}{{--Voicemail Block--}}
    <div class="ui tab segment voice-section main-tab" data-tab="five5">
        <div class="ui two column padded grid mobile hidden">
            <div class="six wide column drop-section">
                <select class="ui search sort-by dropdown">
                    <option value="">Sort By</option>
                    <option value="AL">no</option>
                    <option value="AK">date</option>
                </select>
            </div>
            <div class="ten wide column search-input">
                <div class="search">
                    <div class="ui icon input">
                        <input type="text" placeholder="Search">
                        <i class="search link icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--content-->
        <table class="voicemail-record ui selectable celled table mobile hidden" id="recordsTable" data-page-length="10" style="width: 100%;">
            <thead>
            <tr>
                <th>
                    <div class="ui checkbox">
                        <input type="checkbox" id="selectAllRecords">
                        <label></label>
                    </div>
                </th>
                <th>Received</th>
                <th>From</th>
                <th>To</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
        <div class="demo-slider mobile hidden" style="max-width:100%;">
{{--            @if(!$recording->isEmpty())--}}
                <div id="amazingaudioplayer-2" style="display:block;position:relative;width:100%;height:auto;margin:0px auto 0px;">
                    <img class="person-pic" src="/images/theme/default/layer-42.png">
                    <div class="ui horizontal list">
                        <div class="item">
                            <div class="content">
                                <div class="header"></div>
                            </div>
                        </div>
                        <div class="item right">
                            <div class="content">
                                April, 28, 2017 13:22 PM
                            </div>
                        </div>
                    </div>

                    <ul class="amazingaudioplayer-audios" style="display:none;">
{{--                        @foreach($recording as $record)--}}
{{--                            <li data-artist="pinkzebra" data-album="AudioJungle" data-info="" data-image="https://amazingaudioplayer.com/wp-content/uploads/amazingaudioplayer/2/audios/golden-wheat-field.jpg" data-duration="{{$record->duration}}">--}}
{{--                                <div class="amazingaudioplayer-source" data-src="" data-type="audio/mpeg" />--}}
{{--                                <div class="amazingaudioplayer-source" data-src="" data-type="audio/ogg" />--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
                    </ul>

                </div>
{{--            @endif--}}
        </div>
        <!-- only computer screen end -->
        <!-- only for mobile -->
        <table class="voicemail-record ui selectable celled table mobile only">
            <thead>
            </thead>
            <tbody>
{{--            @forelse($recording as $record)--}}
                <tr data-mail="">
                    <td class="play-icon">
                    <span class="fa-layers fa-fw">
                        <i class="fas fa-circle"></i>
                        <i class="fas fa-play play-file" data-fa-transform="shrink-6" data-sound=""></i>
                    </span>
                    </td>
                    <td class="caller">From: FROM<br>To: NUMBER_TO<p>Record (RECORD_DURATION seconds)</p></td>
                    <td class="call-details">
                       'l'
                        <p>'h:i a'</p>
                    </td>
                    <td class="action-td">
                        <div class="ui teal ">
                            <!-- <div class="ui button">Action</div> -->
                            <div class="ui combo top right pointing dropdown icon button">
                                <i class="fas fa-ellipsis-v"></i>
                                <div class="menu">
                                    <div class="item">
                                        <a href="">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="item voiceMailCall" data-voice-number=""><i class="fas fa-phone fa-flip-horizontal"></i></div>
                                    <div class="item recordDel" data-voice-id=""><i class="far fa-trash-alt"></i></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
{{--            @empty--}}
                <tr>
                    <td>Empty Data</td>
                </tr>
{{--            @endforelse--}}
            </tbody>
        </table>

        <div class="player mobile only">
            <div class="player__bar">
                <div class="player__album">
{{--                    @if(!$recording->isEmpty())--}}
{{--                        <div class="active-song" data-author="937-859-1720" data-song="April, 28, 2017 09:25 AM" data data-src="{{$recording->first()->url}}">--}}
{{--                        </div>--}}
{{--                        <div class="" data-author="937-859-1720" data-song="Angels" data data-src="{{$recording->first()->url}}">--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
                <div class="player__controls">
                    <div class="player__prev">
                        <i class="fas fa-fast-forward"></i>
                    </div>

                    <div class="player__play">
                        <span class="fa-layers fa-fw" style="width: 50px !important;">
                          <i class="far fa-circle"></i>
                         <i class="fas fa-play"></i>
                        </span>
                    </div>

                    <div class="player-next">
                        <i class="fas fa-fast-forward"></i>
                    </div>
                </div>
            </div>
            <div class="player__timeline">
                <p class="player__author"></p>
                <p class="player__song"></p>
                <div class="player__timelineBar">
                    <div id="playhead"></div>
                </div>
            </div>
            <div class="audioplayer-volume"><div class="audioplayer-volume-button" title=""><a href="#"></a></div><div class="audioplayer-volume-adjust"><div><div style="width: 100%;"></div></div></div></div>
        </div>
        <!-- only for mobile -->
        <!--content-->
    </div>

</div>