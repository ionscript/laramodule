var socket;
var messageBlockIn = '<div class="ui left feed {UNREAD}" data-message-id="{ID}" data-chat-hash-from="{HASH}">'+
                     '<div class="event">'+
                        '<div class="label">'+
                            '<img src="{IMG}">'+
                            '<span class="online-message-block">'+
                                '<i class="fas fa-circle {ONLINE_STATUS}"></i>'+
                            '</span>'+
                            '<p class="chatName">{NAME}</p>'+
                            '<p>{TIME}</p>'+
                        '</div>'+
                    '<div class="ui cards chat-card">'+
                        '<div class="card">'+
                            '<div class="content">'+
                                '<div class="description">{MSG}</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';

var messageBlockOut = '<div class="ui right feed" data-message-id="{ID}" data-chat-hash-from="{HASH}">'+
                        '<div class="event">'+
                            '<div class="ui cards chat-card">'+
                                '<div class="card">'+
                                    '<div class="content">'+
                                        '<div class="description">{MSG}</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                                '<div class="label">'+
                                    '<img src="{IMG}">'+
                                    '<span class="online-message-block">'+
                                        '<i class="fas fa-circle {ONLINE_STATUS}"></i>'+
                                    '</span>'+
                                    '<p class="chatName">{NAME}</p>'+
                                    '<p>{TIME}</p>'+
                                '</div>'+
                        '</div>'+
                        '</div>';

var imgBlock = '<a href="{MEDIA}" class="image-link ui medium image" title="{FILENAME}">'+
                    '<img src="{MEDIA}" alt="{FILENAME}">'+
                '</a>';


var audioBlock = '<a href="/chat/download/{MEDIA}">{FILENAME}</a>';

var dragDropBlock = '<div style="position: absolute;" id="dragDrop" class="draggable">'+
                        '<i class="fa fa-file draggable"></i>'+
                        '<p class="draggable">Drag your file here</p>'+
                    '</div>';

var alertBlock = '<div class="ui tiny {COLOR} message" style="margin-bottom: 0">' +
                    '<i class="close icon"></i>'+
                    '{MESSAGE}'+
                '</div>';

var notificationBlockWtraper = '<div style="width: 375px;  clear: both; position: fixed; left: 10px; z-index: 999; bottom: 10px;" id="notificationBlock">'+
                                '</div>';

var notificationBlock = '<div class="notification" style="font-size: 14px; background-color: rgba(0, 0, 0, 0.6); ' +
                                'color: #fff; height: 135px; padding: 10px; margin-bottom: 5px;">'+
                                '<p style="margin-bottom: 5px; color: #fff">You have new message from {USER}</p>'+
                                '<img src="{IMG}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 100%; float: left; margin-right: 20px">'+
                                '<p style="color: #fff">{MSG}</p>'+
                        '</div>';

var faxNotificationBlock = '<div class="notification" style="font-size: 14px; background-color: rgba(0, 0, 0, 0.6); ' +
                                'color: #fff; height: 55px; padding: 10px; margin-bottom: 5px;">'+
                                '<p style="margin-bottom: 5px; color: #fff">You have new fax from {NUMBER}</p>'+
                            '</div>';

var hideAllBlock = '<div id="hideAllNotification" style="font-size: 14px; background-color: rgba(0, 0, 0, 0.7); '+
                    'color: #fff; padding: 15px 0; margin-bottom: 5px; border: 1px solid #000">'+
                        '<p style="text-align: center">Hide all</p>'+
                    '</div>';

var unreadCountBlock = '<div class="floating ui red label unreadedCount" style="top: -2em; left: 90%;">{COUNT}</div>';

var onlineBlock = '<p class="available"><i class="fas fa-circle"></i>Available</p>';

var oflineBlock = '<p class="offline"><i class="fas fa-circle"></i>Offline</p>';

var awayBlock = '<p class="away mobile hidden"><i class="fas fa-circle"></i>Away</p>';

var agentBlock = '<div class="item">'+
                    '<div class="ui medium-img image">' +
                        '<a href="#" id="call-popup">' +
                            '<img src="{IMAGE}">' +
                        '</a>' +
                    '</div>' +
                    '<div class="middle aligned content">' +
                        '<div class="header">{NAME_BLOCK}</div>' +
                        '<div class="description">' +
                            '<p>#{ID}</p>\n' +
                            '<span class="online">{ONLINE_BLOCK}</span>' +
                        '</div>'+
                    '</div>' +
                    '<div class="extra">' +
                        '<div class="ui right">' +
                            '<img class="mobile only" src="images/phone-receiver.svg" alt="chat">'+
                            '<img class="mobile only" src="images/chat-comments.svg" alt="chat">'+
                            '<a href="#" class="agent_call" data-agent="client:{AGENT_NAME}"><i class="flaticon-phone-receiver mobile hidden"></i></a>'+
                            '<a role="button" class="chat_btn" data-chat-id="{CHAT_HASH}" data-user-id="{AGENT_HASH}">'+
                                '<i class="flaticon-chat mobile hidden"></i>'+
                            '</a>'+
                        '</div>' +
                    '</div>' +
                  '</div>';

var unreadAllBlock =  '<div class="floating ui red label unreadedCountAll" style="top: 0.3em; left: 85%;">{COUNT}</div>';

var miniChat = '<li>' +
                    '<div class="{MINI_CHAT_CLASS}">'+
                        '<img class="avatar" src="{MINI_AVATAR}">'+
                        '<i class="fas fa-circle"></i>'+
                        '<p>{MINI_MESSAGE}</p>'+
                        '<span>{MINI_TIME}</span>'+
                    '</div>'+
                    '</li>';

var imgBlockMini = '<a href="{MEDIA}" class="image-link ui medium image" title="{FILENAME}">'+
                        '<p>{FILENAME}</p>'+
                    '</a>';
var callOnHoldBlock = '<div class="item call-receive callOnHold" draggable="true" data-call="{CALL_ID}" data-hold-second="0">'+
                            '<div class="call-top-sec">'+
                                '<div class="ui medium-img image mobile ">'+
                                    '<img src="images/no_image_available.png">'+
                                '</div>'+
                                '<div class="middle aligned content">'+
                                    '<div class="header">{USER}</div>'+
                                    '<div class="description">'+
                                        '<p>{EXT}</p>'+
                                        '<p class="offline mobile hidden"><i class="fas fa-circle"></i>Available</p>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="extra">'+
                                    '<div class="ui right">'+
                                        '<img class="mobile only" src="images/phone-receiver.svg" alt="chat">'+
                                        '<a href="#" class="disconnect"><i class="flaticon-phone-receiver mobile hidden"></i><i class="flaticon-end-call-button mobile hidden"></i></a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="time-count">'+
                                    '<div class="call-info">'+
                                        '<p>Inbound on call '+
                                            '<span class="holdDuration" style="color: #fff">00:00:00</span>'+
                                        '</p>'+
                                        '<p>Status : Call on hold...</p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

var activeCallPopup = '<div class="callInfoPopup">'+
                            'Caller: <span class="popupCaller">{CALLER}</span>' +
                            '</br>'+
                            'Time: <span class="popupTime">{TIME}</span>' +
                        '</div>';
var defaultCallPopup = '<div class="callInfoPopup">'+
                            'no active calls'+
                        '</div>';
var callInfoBlock = '<div class="time-count" data-seconds="0" data-agent="{AGENT}">'+
                    '<div class="call-info">'+
                        '<p>Caller: <span class="popupCaller">{CALLER}</span></p>'+
                        '<p>Time: <span class="popupTime">{TIME}</span></p>'+
                    '</div>'+
                '</div>';

var newPrompt = '<option value="{ID}">{NAME}</option>';

$(document).ready(function () {
    //socket and variable init
    socket = io.connect('', { query: {"user_id":$('#authId').val(), "namespace":callCenterId }, secure: true, path:'/socketServer/socket.io'});

    socket.on('disconnect', (reason) => {
        console.log(reason);
        $('#socketConnection').show();
        socket.open();
    });
    socket.on('connect_error', (error) => {
        console.log(error);
        $('#socketConnection').show();
    });
    socket.on('connect', () => {
        $('#socketConnection').hide();
    });

    var height = 0;
    var dropbox;
    var timeout;
    var scrollHeight = 0;
    var ajaxRun = false;
    var prevDate = '';
    var notificationTimeout = [];
    var awayTimer;
    var isAway = false;
    var holdTimer = [];
    var callTimer = [];
    var maxSession = $('#sessionProgress').attr('data-session');
    var currentSession = 0;
    var sessionTimerId;
    var isIe = false;
    var secondaryAudio = undefined;
    const chatNotificationAudio = new Audio('../audio/system/newMsg.mp3');

    window.addEventListener("focus", () => socket.connect());

    $('.callOnHold').each(function (key, value) {
        // var holdCallSecond = $(value).attr('data-hold-second');
        var holdCallSid = $(value).attr('data-call');

        holdTimer[holdCallSid] = setInterval(function(){
            holdDuration(holdCallSid);
        }, 1000)
    });

    $('.time-count').each(function (key, value) {
        var agent = $(value).attr('data-agent');

        callTimer[agent] = setInterval(function () {
            callDuration(agent);
        }, 1000)
    });

    $('#agentsBlock').on('mouseenter', '.agentCallBlock.pendingCall, .agentCallBlock.activeCall', function () {
        var agentHash = $(this).find('.chat_btn').attr('data-user-id');
        $(this).popup({
                position : 'right center',
                popup : $('.custom.popup[data-agent-popup="'+agentHash+'"]')
            });
        $(this).popup('show');
    });
    //notification request
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){
        isIe = true;
    }

    if(!isIe){
        if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {
                if (!(permission in Notification)) {
                    Notification.permission = permission;
                }
            });
        }
    }

    $('#setAway').change(function () {
        socket.emit('switchStatus', 'away');
    });

    $('#sessionProgress').progress({
        total: maxSession,
        percent: 0
    });

    sessionTimerId = setInterval(function () {
        sessionTimer();
    }, 60*1000);
    //dragDrop init
    if(window.location.pathname === '/'){
        dropbox = document.getElementById("chat-area");
        groupDropbox = document.getElementById("group-chat-area");

        dropbox.addEventListener("dragenter", dragenter, false);
        dropbox.addEventListener("dragover", dragover, false);
        dropbox.addEventListener("dragend", dragend, false);
        dropbox.addEventListener("drop", drop, false);

        groupDropbox.addEventListener("dragenter", groupDragenter, false);
        groupDropbox.addEventListener("dragover", groupDragover, false);
        groupDropbox.addEventListener("dragend", groupDragend, false);
        groupDropbox.addEventListener("drop", groupDrop, false);

        $('body').on('dragstart', 'img, svg' ,function(event) { event.preventDefault(); });
        //drag drop events
        function dragenter(e) {
            testr = e;
            e.stopPropagation();
            e.preventDefault();
            if($('#dragDrop').length == 0 && !$(e.target).hasClass("draggable")){
                $('#chat-area div').hide();
                $('#chat-area p').hide();
                $('#chat-area').append(dragDropBlock);
            }
        }

        document.addEventListener("dragleave", function(e) {
            if ( e.target.className == "draggable" ) {
                $('#chat-area div').show();
                $('#chat-area p').show();
                $('#dragDrop').remove();
            }
        }, false);


        function dragend(e) {
            e.stopPropagation();
            e.preventDefault();
            $('#chat-area div').show();
            $('#chat-area p').show();
            $('#dragDrop').remove();
        }

        function dragover(e) {
            e.stopPropagation();
            e.preventDefault();
        }

        function drop(e) {
            e.stopPropagation();
            e.preventDefault();
            $('#chat-area div').show();
            $('#chat-area p').show();
            $('#dragDrop').remove();
            var dt = e.dataTransfer;
            var files = dt.files;
            if(files.length > 0){
                uploadFile(files);
            }
        }

        function groupDragenter(e) {
            e.stopPropagation();
            e.preventDefault();
            if($('#dragDrop').length == 0 && !$(e.target).hasClass("draggable")){
                $('#group-chat-area div').hide();
                $('#group-chat-area p').hide();
                $('#group-chat-area').append(dragDropBlock);
            }
        }

        function groupDragend(e) {
            e.stopPropagation();
            e.preventDefault();
            $('#group-chat-area div').show();
            $('#group-chat-area p').show();
            $('#dragDrop').remove();
        }

        function groupDragover(e) {
            e.stopPropagation();
            e.preventDefault();
        }

        function groupDrop(e) {
            e.stopPropagation();
            e.preventDefault();
            $('#group-chat-area div').show();
            $('#group-chat-area p').show();
            $('#dragDrop').remove();
            var dt = e.dataTransfer;
            var files = dt.files;

            if(files.length > 0){
                uploadFile(files, 'group');
            }
        }
    }
    //call center socket
    socket.emit('entryCallCenter', callCenterId);
    /*
    * Socket ping pong
    * */
    socket.on('userPing', () => {
        socket.emit('userPong');
    });
    //chat block styles
    $('#chat-area, #group-chat-area').css({
        'overflow-y': 'scroll',
        'overflow-x': 'hidden'
    });
    //button styles
    $('#chatMsgInput, #groupChatMsgInput').keyup(function (e) {
        if($(this).attr('id') == 'chatMsgInput'){
            button = $('#sendMsgBtn');
        }
        if($(this).attr('id') == 'groupChatMsgInput'){
            button = $('#sendGroupMsgBtn');
        }
        if($(this).val().length>0){
            button.removeClass('disabledBtn');
        } else {
            button.addClass('disabledBtn');
        }
    });
    //infinity scroll
    $('#chat-area, #group-chat-area').bind('mousewheel DOMMouseScroll MozMousePixelScroll', function(event) {
        delta = parseInt(event.originalEvent.wheelDelta || -event.originalEvent.detail);
        if($(this).hasClass('chat-area')){
            element = '#chat-area';
            nextLink = '.page-next';
            area = 'chat';
            ajaxUrl = 'get_message';
            pagination = '.pagination';
            form = '#chatForm';
        }
        if($(this).hasClass('group-chat-area')){
            element = '#group-chat-area';
            nextLink = '.groupNextPage';
            area = 'group';
            ajaxUrl = 'get_groups_message';
            pagination = '.groupPagination';
            form = '#groupChatForm';
        }
        var firstElem = $(element+' div.ui.feed').first();
        var nextElemHeight = firstElem.next();
        var thirdElemHeight = nextElemHeight.next();

        if (delta >= 0 && $(element).scrollTop() < nextElemHeight.height()+firstElem.height()+thirdElemHeight.height()
            && $(nextLink).length >= 1 && !ajaxRun) {
            var message = $('#chatMsgInput').val();
            var room = (area == 'chat') ? $('#sendMsgBtn').attr('data-chat-room') : -1;
            var chatHash = (area == 'group') ? $('#sendGroupMsgBtn').attr('data-group-room') : -1;
            var toId = (area == 'chat') ? $('#toId').val() : -1;
            var url = $(nextLink).attr('href').split('page=')[1];
            ajaxRun = true;
            $.ajax({
                type: 'POST',
                url: '/chat',
                data: {
                    ajax: ajaxUrl,
                    page: url,
                    userId: toId,
                    authId: $('#authId').val(),
                    chatHash: room,
                    groupHash: chatHash
                },
                success: function (response) {
                    scrollHeight = $(element).prop('scrollHeight');
                    prependMessage(response, element);
                    currentHeight = $(element).prop('scrollHeight');
                    if($(pagination).length > 0){
                        $(pagination).remove();
                    }
                    $(form).append(response.buttons);
                    $(element).animate({ scrollTop: currentHeight-scrollHeight }, 0);
                    ajaxRun = false;
                }
            })
        }
    });
    //gallery init
    $('.chat-area, .group-chat-area').on('click', '.image-link', function () {
        event.preventDefault();
        var self = $(this);
        self.magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            image: {
                verticalFit: true,
                titleSrc: function() {
                    return self.attr('title') + ' &middot; <a class="image-source-link" href="'+self.attr('href')+'" target="_blank">Full size</a>';
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }

        }).magnificPopup('open');
    });

    $('.slideup').click(function () {
       var bottomPosition = $('.mini-chat-section').css('bottom');
       if(bottomPosition == '-350px'){
           $('.mini-chat-section').css('bottom', 0);
       } else {
           $('.mini-chat-section').css('bottom', '-350px');
       }
    });

    // get messages
    $('#agentsBlock, #mobileAgent').on('click', '.chat_btn', function () {
        var user_id = $(this).attr('data-user-id');
        var auth_id = $('#authId').val();
        var chat_hash = $(this).attr('data-chat-id');
        var self = $(this);

        $.ajax({
            type: 'POST',
            url: '/chat',
            data: {
                ajax: 'get_message',
                _token: $('meta[name="csrf-token"]').attr('content'),
                userId: user_id,
                authId: auth_id,
                chatHash: chat_hash
            },
            success: function (response) {
                $('#lastSmsMessage').hide();
                $('#lastChatMessage').hide();
                if($('.pagination').length > 0){
                    $('.pagination').remove();
                }
                if(!$('#chat-tab').hasClass('active')){
                    $('.main-tab.active, .tab-link.active').removeClass('active');
                    $('#chat-tab, .chat-tab-link').addClass('active');
                }
                $('#chatForm').append(response.buttons);
                $('#chat-area').html("");
                $('#toId').val(user_id);

                if($('#emptyMsg').length > 0){
                    $('#emptyMsg').remove();
                }

                switch (response.status){
                    case 'empty':
                        $('#chat-area').html("<p class='ui center aligned grid' id='emptyMsg' style='margin-top: 20px'>You don't have messages with this user</p>");
                        chatRoom(chat_hash);
                        break;
                    case 'message':
                        prependMessage(response, '#chat-area');

                        chatRoom(chat_hash);
                        var offset = $('#chat-area>.ui').last()[0].offsetTop;
                        var height = $('#chat-area>.ui').last().height();
                        $('.chat-area').animate({ scrollTop: offset+height }, 0);
                        $('#chatForm').attr('data-chat-hash', chat_hash);
                        break;
                    case 'error':
                        break;
                    case 'success':
                        self.attr('data-chat-id', response.message);
                        $('#chat-area').html("<p class='ui center aligned grid' id='emptyMsg'>You don't have messages with this user</p>");
                        chatRoom(response.message);
                        break;
                    default:
                        break;
                }
            }
        })
    });
    // send msg by click action
    $('#sendMsgBtn').click(function () {
        sendMessage(this);
    });
    // send msg by keypress action
    $('#chatMsgInput').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            sendMessage($('#sendMsgBtn'));
        }
    });
    //upload file action
    $('#embedpollfileinput, #embedpollfileinputGroup').change(function () {
        if($(this).prop('id') == 'embedpollfileinputGroup'){
            uploadFile($(this).prop('files'), 'group');
        } else {
            uploadFile($(this).prop('files'));
        }

    });
    //send msg function
    function sendMessage($this) {
        if($('#chatMsgInput').val().length>0){
            var toId = $('#toId').val();
            var message = $('#chatMsgInput').val();
            var room = $($this).attr('data-chat-room');
            $.ajax({
                type: 'POST',
                url: '/message',
                data:{
                    to: toId,
                    message: message,
                    room: room
                },
                success: function (data) {
                    if(data.status === 'error'){
                        var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
                        var status = colorBlock.replace(/{MESSAGE}/gi, data.message);

                        $('#chatForm .field').prepend(status);
                        timeout = setTimeout(hideMessage, 2000);
                    }
                }
            });
            $('#chatMsgInput').val('');
            $('#sendMsgBtn').addClass('disabledBtn');
        } else {
            var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
            var status = colorBlock.replace(/{MESSAGE}/gi, 'You can not write empty message!');
            $('#chatForm .field').prepend(status);
        }
    }
    // switch room function
    function chatRoom(room) {
        var authId = $('#authId').val();
        $('#sendMsgBtn').attr('data-chat-room', room);
        socket.emit('switchRoom', room, authId);
    }
    // update chat socket event
    socket.on('updateChat', function (message) {
        if(message.status === 'error'){
            const colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
            const status = colorBlock.replace(/{MESSAGE}/gi, message);
            $('#chatForm .field').prepend(status);
            timeout = setTimeout(hideMessage, 2000);

            return false;
        }

        const authId = $('#authId').val();
        let image = '';
        const path = message.publicPath;

        const dateArea = (message.area === 'chat') ? '.chat-area' : '.group-chat-area';
        if(message.firstToday){
            $(dateArea).append("<p class='ui center feed chat-date'>Today</p>");
        }

        if(authId === message.hashFrom){
            var messageBlock = messageBlockOut;
            image = path+message.avatarFrom;
            var name = message.firstNameFrom;
            unreaded = '';

            switch (message.onlineCodeFrom) {
                case 'available':
                    var onlineStatusClass = 'chat-online-status';
                    break;
                case 'away':
                    var onlineStatusClass = 'chat-away-status';
                    break;
                case 'offline':
                    var onlineStatusClass = 'chat-offline-status';
                    break;
            }
        } else {
            var messageBlock = messageBlockIn;
            image = path+message.avatarFrom;
            var name = message.firstNameFrom;
            if(message.area === 'chat'){
                unreaded = 'unread unreadChat';

                switch (message.onlineCodeTo) {
                    case 'available':
                        var onlineStatusClass = 'chat-online-status';
                        break;
                    case 'away':
                        var onlineStatusClass = 'chat-away-status';
                        break;
                    case 'offline':
                        var onlineStatusClass = 'chat-offline-status';
                        break;
                }
            }
            if(message.area === 'group'){
                unreaded = 'unread unreadGroup';
            }
        }
        var time = formatTime(message.created_at);
        var messageRead = messageBlock.replace(/{UNREAD}/gi, unreaded);
        var messageId = messageRead.replace(/{ID}/gi, message.id);
        var timeMessage = messageId.replace(/{TIME}/gi, time);
        var imgMessage = timeMessage.replace(/{IMG}/gi, image);
        var nameMessage = imgMessage.replace(/{NAME}/gi, name);
        var onlineMessage = nameMessage.replace(/{ONLINE_STATUS}/gi, onlineStatusClass);
        var finishMessage = onlineMessage.replace(/{MSG}/gi, message.message);


        if(message.area  === 'chat'){
            $('#chat-area').append(finishMessage);
            var offset = $('#chat-area>.ui').last()[0].offsetTop;
            var height = $('#chat-area>.ui').last().height();
            $('.scrollbar-inner').animate({ scrollTop: offset+height }, 0);
            var empty = $('#emptyMsg');
        } else {
            if(message.room === $('#sendGroupMsgBtn').attr('data-group-room')){
                $('#group-chat-area').append(finishMessage);
                var offset = $('#group-chat-area>.ui').last()[0].offsetTop;
                var height = $('#group-chat-area>.ui').last().height();
                $('.scrollbar-inner').animate({ scrollTop: offset+height }, 0);
                var empty = $('#groupEmptyMsg');
            }
        }
        if(empty.length > 0){
            empty.remove();
        }

    });
    // file upload socket action
    socket.on('fileUpload', function (body) {
        var mediaBlock;
        var messageBlock;
        var authId = $('#authId').val();
        var path = body.path+body.file_name+'.'+body.extension;
        var avatarPath = body.publicPath;
        switch (body.extension){
            case 'jpg':
            case 'jpeg':
            case 'png':
                mediaBlock = imgBlock;
                break;
            case 'mp3':
            case 'wav':
                mediaBlock = audioBlock;
                break;
        }

        if(authId == body.hashFrom){
            messageBlock = messageBlockOut;
        } else {
            messageBlock = messageBlockIn;
        }

        if(body.target == 'group'){
            appendArea = $('.group-chat-area');
            unreaded = 'unread unreadGroup';
            scrollArea = '#group-chat-area';
            var online = (body.onlineCodeFrom == null) ? body.onlineCodeTo : body.onlineCodeFrom;
        }
        if(body.target == 'chat'){
            appendArea = $('.chat-area');
            unreaded = 'unread unreadChat';
            scrollArea = '#chat-area';
            var hash = body.hashFrom;
            var online = body.onlineCodeFrom;
        }

        switch (online) {
            case 'available':
                var onlineStatusClass = 'chat-online-status';
                break;
            case 'away':
                var onlineStatusClass = 'chat-away-status';
                break;
            case 'offline':
                var onlineStatusClass = 'chat-offline-status';
                break;
        }

        image = avatarPath+body.avatarFrom;

        var time = formatTime(body.created_at);

        var mediaMsg = mediaBlock.replace(/{MEDIA}/gi, path);
        var mediaWithName = mediaMsg.replace(/{FILENAME}/gi, body.real_name);
        var messageId = messageBlock.replace(/{ID}/gi, body.messageId);
        var unreadMsg = messageId.replace(/{UNREAD}/gi, unreaded);
        var timeMessage = unreadMsg.replace(/{TIME}/gi, time);
        var imgMessage = timeMessage.replace(/{IMG}/gi, image);
        var nameMessage = imgMessage.replace(/{NAME}/gi, body.firstNameFrom);
        var onlineMessage = nameMessage.replace(/{ONLINE_STATUS}/gi, onlineStatusClass);
        var hashMessage = onlineMessage.replace(/{HASH}/gi, body.hashFrom);
        var finishMessage = hashMessage.replace(/{MSG}/gi, mediaWithName);
        if(body.target == 'chat' || (body.target == 'group' && $('#sendGroupMsgBtn').attr('data-group-room') == body.room)){
            appendArea.append(finishMessage);
            var offset = $(scrollArea+'>.ui').last()[0].offsetTop;
            var height = $(scrollArea+'>.ui').last().height();
            $(scrollArea).animate({ scrollTop: offset+height }, 0);
        }

    });
    // errors socket event
    socket.on('serverError', function (body){
        var status;

        switch(body){
            case 'accessError':
                status = 'You can not be here! Refresh this page!';
                break;
            case 'emptyMsg':
                status = 'You can not write empty message!';
                break;
            default:
                status = 'Something was wrong';
                break;
        }

        var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
        var status = colorBlock.replace(/{MESSAGE}/gi, status);

        $('#chatForm .field').prepend(status);
        timeout = setTimeout(hideMessage, 2000);
    });
    //notification socket event
    socket.on('notification', function (data) {
        if (data.target !== undefined && data.target === 'sms'){
            const sms = data.message;
            const messageFrom = data.from;
            namesBlock = notificationBlock.replace(/{USER}/gi, messageFrom);
            image = namesBlock.replace(/{IMG}/gi, '/images/sms.png');

            finalBlock = image.replace(/{MSG}/gi, sms);

            $('#lastSmsMsg').text(messageFrom + ': ' + sms);
            $('#lastSmsTime').text(data.date)
        } else{
            var message = data.message;
            if(message === null && data.fileId !== undefined && data.fileId != null){
                switch (data.extension){
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                        message = 'Image file';
                        break;
                    case 'mp3':
                    case 'wav':
                        message = 'Audio file';
                        break;
                }
            }

            var message_from = data.firstNameFrom + ' ' + data.lastNameFrom +
                ((data.group_name !== undefined && data.group_name !== null) ? ' in ' + data.group_name  : '');

            namesBlock = notificationBlock.replace(/{USER}/gi, message_from);
            image = namesBlock.replace(/{IMG}/gi, data.publicPath+data.avatarFrom);

            finalBlock = image.replace(/{MSG}/gi, message);

            if(data.area === 'chat'){
                $('#lastChatMsg').text(data.firstNameFrom + ' ' + data.lastNameFrom + ': ' + message);
                $('#lastChatTime').text(data.date)
            }

            var unreadArea =  ((data.group_name !== undefined && data.group_name !== null && data.group_name.length !== 0) ? 'data-group-hash=' : 'data-user-id=');
            var hashUnread =  ((data.group_name !== undefined && data.group_name !== null && data.group_name.length !== 0) ? data.groupHash : data.hashFrom);

            if(parseInt(data.unread)  != 0) {
                if ($('['+unreadArea+'"' + hashUnread + '"] .unreadedCount').length > 0) {
                    $('['+unreadArea+'"' + hashUnread + '"] .unreadedCount').text(data.unread);
                } else {
                    var unreadBlock = unreadCountBlock.replace(/{COUNT}/gi, data.unread);
                    $('['+unreadArea+'"' + hashUnread + '"]').prepend(unreadBlock);
                }
            }

            if(data.unreadAll != 0 && data.group_name === undefined) {
                if ($('.unreadedCountAll').length > 0) {
                    $('.unreadedCountAll').text(data.unreadAll);
                } else {
                    var unreadAll = unreadAllBlock.replace(/{COUNT}/gi, data.unreadAll);
                    $('#generalChanel').prepend(unreadAll);
                }
            }
        }

        if($('#notificationBlock').length == 0){
            $('body').append(notificationBlockWtraper);
        }
        $('#notificationBlock').append(finalBlock);

        chatNotificationAudio.play();

        if($('.notification').length >= 2 && $('#hideAllNotification').length == 0){
            $('#notificationBlock').prepend(hideAllBlock);
        }
        if($('.notification').length > 3){
            $('.notification').last().hide().addClass('hidden');
        } else {
            notifier = setTimeout(notificationTimer, 5000);
            notificationTimeout.push(notifier);
        }


    });

    // change online status socket event
    socket.on('online', function (data) {
       var userBlock = $("[data-user-id='"+data.data.user+"']").parents('.item').find('.online');
       var userMessage = $("[data-chat-hash-from='"+data.data.user+"']").find('.fa-circle');

       switch(data.data.online){
           case 'available':
               statusBlock = onlineBlock;
               onlineClass = 'chat-online-status';
               break;
           case 'offline':
               statusBlock = oflineBlock;
               onlineClass = 'chat-offline-status';
               break;
           case 'away':
               statusBlock = awayBlock;
               onlineClass = 'chat-away-status';
               break;
           default:
               statusBlock = '';
               onlineClass = '';
               break;
       }
        userMessage.removeClass('chat-online-status chat-offline-status chat-away-status').addClass(onlineClass);
        userBlock.html(statusBlock);
    });

    socket.on('updateCallStatus', function (data) {
        const callInfo = JSON.parse(data.info);

        if (data.is_queue !== undefined){
            switch (data.status) {
                case 'ringing':
                    $.each(callInfo, function (key, value) {
                        var agentPopup = $('.time-count[data-agent="'+value.agent_hash+'"]');
                        var agentBlock = $('.chat_btn[data-user-id="'+value.agent_hash+'"]').parents('.agentCallBlock');

                        var callerBlock = callInfoBlock.replace(/{CALLER}/gi, value.caller);
                        var agentHashBlock = callerBlock.replace(/{AGENT}/gi, value.agent_hash);
                        var finishBlock = agentHashBlock.replace(/{TIME}/gi, '');

                        // agentPopup.removeClass('activeCallPopup').find('.content').html(finishBlock);
                        agentPopup.remove();
                        agentBlock.removeClass('nocall activecall').addClass('incall').attr('data-sid', data.sid)
                            .attr('draggable', true).find('.call-top-sec').append(finishBlock);

                        if(callTimer[value.agent_hash] !== undefined){
                            clearInterval(callTimer[value.agent_hash]);
                        }

                        agentBlock.remove();
                        $('#agentsBlock').prepend(agentBlock);
                    });


                    break;
                case 'in-progress':
                    $.each(callInfo, function (key, value) {
                        var agentPopup = $('.time-count[data-agent="' + value.agent_hash + '"]');
                        var agentBlock = $('.chat_btn[data-user-id="' + value.agent_hash + '"]').parents('.agentCallBlock');

                        var callerBlock = callInfoBlock.replace(/{CALLER}/gi, value.caller);
                        var agentHashBlock = callerBlock.replace(/{AGENT}/gi, value.agent_hash);
                        var finishBlock = agentHashBlock.replace(/{TIME}/gi, '00:00');

                        agentPopup.remove();

                        callTimer[value.agent_hash] = setInterval(function () {
                            callDuration(value.agent_hash);
                        }, 1000);

                        agentBlock.removeClass('nocall incall').addClass('activecall').attr('data-sid', data.sid)
                            .attr('draggable', false).find('.call-top-sec').append(finishBlock);
                        agentBlock.remove();
                        $('#agentsBlock').prepend(agentBlock);
                    });

                    break;
                default:
                    $.each(callInfo, function (key, value) {
                        var agentPopup = $('.time-count[data-agent="' + value.agent_hash + '"]');
                        var agentBlock = $('.chat_btn[data-user-id="' + value.agent_hash + '"]').parents('.agentCallBlock');
                        if(value.agent_hash === data.hold){
                            var callerBlock = callInfoBlock.replace(/{CALLER}/gi, 'On hold');
                            var agentHashBlock = callerBlock.replace(/{AGENT}/gi, value.agent_hash);
                            var finishBlock = agentHashBlock.replace(/{TIME}/gi, '');

                            agentPopup.remove();
                            agentBlock.attr('data-sid', data.sid).find('.call-top-sec').append(finishBlock);

                        } else {
                            agentPopup.remove();
                            agentBlock.removeClass('pendingCall').removeClass('incall activecall').addClass('nocall')
                                .attr('data-sid', '').attr('draggable', false);
                        }

                        if (callTimer[value.agent_hash] !== undefined) {
                            clearInterval(callTimer[value.agent_hash]);
                        }

                        agentBlock.remove();
                        $('#agentsBlock').prepend(agentBlock);
                    });
                    break;
            }
        } else {
            $.ajax({
                type: 'POST',
                url: '/calls',
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    ajax: 'get_call_status',
                    sid: data.sid
                },
                success: function (response) {
                    $('#agentsBlock').html(response.html);
                    $('.time-count').each(function (key, value) {
                        var agent = $(value).attr('data-agent');
                        clearInterval(callTimer[agent]);
                        callTimer[agent] = setInterval(function () {
                            callDuration(agent);
                        }, 1000)
                    });

                }
            });
        }
    });

    socket.on('secondaryCall', data => {
        const localStorage = window.localStorage;
        const ringtoneDevice = localStorage.getItem('ringtoneDevice');
        let secondaryCalls = localStorage.getItem('secondaryCalls');

        if(typeof secondaryCalls !== 'string' || secondaryCalls === null){
            secondaryCalls = {};
        } else {
            secondaryCalls = JSON.parse(secondaryCalls);
        }

        if(data.callStatus === 'ringing'){
            $('#secondaryCall .incomingCall').css('display', 'inline-block');
            $('.secondaryCallerName').text(data.caller);
            $('#secondaryCall').attr('data-secondaryCall-sid', data.callSid).show();
            secondaryCalls[data.callSid] = data;

            if(secondaryAudio !== undefined){
                secondaryAudio.pause();
                secondaryAudio = undefined;
            }

            secondaryAudio = new Audio('/audio/system/secondaryCalls.mp3');
            secondaryAudio.loop = true;

            if(ringtoneDevice !== null && typeof ringtoneDevice === 'string'){
                secondaryAudio.setSinkId(ringtoneDevice);
            }

            secondaryAudio.play();
        } else {
            $('.secondaryCallerName').text('');
            $('#secondaryCall').attr('data-secondaryCall-sid', '').hide();

            if(secondaryCalls[data.callSid] !== undefined){
                delete secondaryCalls[data.callSid];
            }

            if(secondaryAudio !== undefined){
                secondaryAudio.pause();
                secondaryAudio = undefined;
            }

            if(Object.keys(secondaryCalls).length > 0){
                const nextSecondaryCall = secondaryCalls[Object.keys(secondaryCalls)[0]];
                $('.secondaryCallerName').text(nextSecondaryCall.caller);
                $('#secondaryCall').attr('data-secondaryCall-sid', nextSecondaryCall.callSid).show();

                secondaryAudio = new Audio('/audio/system/secondaryCalls.mp3');
                secondaryAudio.loop = true;
                secondaryAudio.play();
            } else {
                $('.secondaryCallerName').text('');
                $('#secondaryCall').attr('data-secondaryCall-sid', '').hide();
            }
        }

        secondaryCalls = JSON.stringify(secondaryCalls);
        localStorage.setItem('secondaryCalls', secondaryCalls);
    });

    $('.rejectSecondaryCall').click(() => {
        const localStorage = window.localStorage;
        const currectCallSid = $('#secondaryCall').attr('data-secondaryCall-sid');
        let secondaryCalls = localStorage.getItem('secondaryCalls');

        if(typeof secondaryCalls !== 'string' || secondaryCalls === null){
            secondaryCalls = {};
        } else {
            secondaryCalls = JSON.parse(secondaryCalls);
        }

        if(secondaryCalls[currectCallSid] !== undefined){
            delete secondaryCalls[currectCallSid];

            if(secondaryAudio !== undefined){
                secondaryAudio.pause();
                secondaryAudio = undefined;
            }
        }

        if(Object.keys(secondaryCalls).length > 0){
            const nextSecondaryCall = secondaryCalls[Object.keys(secondaryCalls)[0]];
            $('.secondaryCallerName').text(nextSecondaryCall.caller);
            $('#secondaryCall').attr('data-secondaryCall-sid', nextSecondaryCall.callSid).show();

            secondaryAudio = new Audio('/audio/system/secondaryCalls.mp3');
            secondaryAudio.loop = true;
            secondaryAudio.play();
        } else {
            $('.secondaryCallerName').text('');
            $('#secondaryCall').attr('data-secondaryCall-sid', '').hide();
        }

        secondaryCalls = JSON.stringify(secondaryCalls);
        localStorage.setItem('secondaryCalls', secondaryCalls);
    });

    socket.on('newCall', function (data) {
        $('#currentCallId').val(data.call_id);
        if(data.callSid !== undefined){
            if(currentCalls[data.callSid] == undefined){
                currentCalls[data.callSid] = {id: data.call_id};
            } else {
                currentCalls[data.callSid].id = data.call_id;
            }

            currentCallSid = data.callSid;
        }
    });

    socket.on('logout', function () {
        swal({
            type: 'warning',
            title: 'Warning',
            text: 'Your session has expired. Please log in again'
        }).then(function (value) {
            window.location.reload();
        });
    });

    socket.on('callOnHold', function (data) {
        if(data.action === 'add'){
            $.ajax({
                type: 'POST',
                url: '/twilio/getHolder',
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    holder: data.userOnHold
                },
                success: function (response) {
                    var userBlock = callOnHoldBlock.replace(/{USER}/gi, response.name);
                    var idBlock = userBlock.replace(/{CALL_ID}/gi, data.call_id);
                    var finishBlock = idBlock.replace(/{EXT}/gi, (response.phone !== undefined) ? response.phone : data.extension);
                    $('.callOnHoldWrapper').prepend(finishBlock);

                    holdTimer[data.call_id] = setInterval(function(){
                        holdDuration(data.call_id);
                    }, 1000)
                }
            });
        } else {
            $('.callOnHold[data-call="'+data.call_id+'"]').remove();
            clearInterval(holdTimer[data.call_id]);
        }

        var callsCount = $('.callOnHoldWrapper .callOnHold').length;
        if(callsCount > 0){
            $('.callOnHoldBlock .title').addClass('activeHoldHeader');
            $('.callOnHoldBlock').accordion('open', 0);
            $('#holdCount').text(callsCount);
        } else {
            $('.callOnHoldBlock .title').removeClass('activeHoldHeader');
            $('#holdCount').text('no');
        }
    });

    socket.on('resetSession', function () {
        currentSession = 0;
        $('#sessionProgress').progress('reset');
        clearInterval(sessionTimerId);

        sessionTimerId = setInterval(function () {
            sessionTimer();
        }, 60*1000);

        var days =  Math.floor( maxSession / 24 / 60);
        var hours = Math.floor( maxSession / 60 % 24);
        var minutes = maxSession % 60;
        $('#sessionProgress').find('.label').text( days + ' days ' + hours + ' hours ' + minutes + ' minutes');

    });

    socket.on('logoutRequest', function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/agents/logout',
            success: function (message) {
                swal({
                    type: 'warning',
                    title: 'Warning',
                    text: 'You have been logged out because a successful login attempt was made from another computer.'
                }).then(function () {
                    // $('#logout-form').submit();
                    window.location.reload();
                });
            }
        });
    });

    socket.on('newFax', function (data) {
        var faxInfo = data;
        console.log(faxInfo);
        var finalBlock = faxNotificationBlock.replace(/{NUMBER}/gi, faxInfo.fax.from);

        if($('#notificationBlock').length == 0){
            $('body').append(notificationBlockWtraper);
        }
        $('#notificationBlock').append(finalBlock);
        var audio = new Audio('../audio/system/newMsg.mp3');
        chatNotificationAudio.play();
        if(!isIe){
            if(Notification.permission === 'granted') {
                var notification = new Notification("You have new fax from " + faxInfo.fax.from, {
                    tag: "ache-mail",
                    body: "You have new fax from " + faxInfo.fax.from
                });
            }
        }

        if($('.notification').length >= 2 && $('#hideAllNotification').length == 0){
            $('#notificationBlock').prepend(hideAllBlock);
        }
        if($('.notification').length > 3){
            $('.notification').last().hide().addClass('hidden');
        } else {
            notifier = setTimeout(notificationTimer, 5000);
            notificationTimeout.push(notifier);
        }
    });

    if(window.location.pathname === '/profile'){
        socket.on('newPrompt', function (data) {
            var idBlock = newPrompt.replace(/{ID}/gi, data.fileId);
            var finishBlock = idBlock.replace(/{NAME}/gi, data.name);
            var ttt = $('#promptSelect').prepend(finishBlock).val(data.fileId);
            $('.voicemail-prompt').text(data.name);
        });
    }
    // hide all notification
    $('body').on('click', '#hideAllNotification' ,function () {
        $('#notificationBlock').remove();
        $.each(notificationTimeout, function (key, value) {
            clearTimeout(value);
        });

    });
    // format time function
    function formatTime(data) {
        var date = new Date(data);
        if(date.getHours() < 10){
            var hours = '0' + date.getHours();
        } else {
            var hours =  date.getHours();
        }

        if(date.getMinutes() < 10){
            var minutes = '0' + date.getMinutes();
        } else {
            var minutes = date.getMinutes();
        }
        var outputDate = hours + ":" + minutes;

        return outputDate;
    }
    // format date function
    function formatDate(data){
        var date = new Date(data);
        var currentDate = new Date();
        var yesterday = new Date();
        yesterday.setDate(currentDate.getDate()-1);

        if(currentDate.getDate() == date.getDate() && currentDate.getMonth() == currentDate.getMonth()
            && currentDate.getFullYear() == currentDate.getFullYear()){
            return 'Today';
        }

        if(yesterday.getDate() == date.getDate() && yesterday.getMonth() == date.getMonth()
            && yesterday.getFullYear() == date.getFullYear()){
            return 'Yesterday'
        }

        if(date.getDate() < 10){
            var day = '0' + date.getDate();
        } else {
            var day = date.getDate();
        }

        if(date.getUTCMonth()<9){
             var month = date.getUTCMonth()+1;
             month = '0'+month;
        } else {
            var month = date.getUTCMonth()+1;
        }

        var year = date.getFullYear();
        var fullDate = month+'/'+day+'/'+year;

        return fullDate;
    }
    // upload files function
    function uploadFile(file, area) {
        if(area === undefined){
            area = 'chat'
        }
        var data = new FormData();
        data.append('file', file[0]);
        data.append('authId', $('#authId').val());
        if(area == 'chat'){
            data.append('toId', $('#toId').val());
            data.append('chatHash', $('#chatForm').attr('data-chat-hash'));
        }
        if(area == 'group'){
            data.append('groupHash', $('#sendGroupMsgBtn').attr('data-group-room'));
        }
        data.append('chatTarget', area);

        $.ajax({
            type: 'POST',
            url: '/chat/file',
            contentType: false,
            processData: false,
            data:data,
            success: function (data) {
                $('.message').transition('fade');
                $('.message').remove();
                switch (data.status){
                    case 'success':
                        var colorBlock = alertBlock.replace(/{COLOR}/gi,'green');
                        var status = colorBlock.replace(/{MESSAGE}/gi, data.response);
                        $('#chatForm .field').prepend(status);
                        break;
                    case 'validatorError':
                        var message = '';
                        $.each(data.response.file, function (index, value) {
                            message += '<span style="display: block">'+value+'</span>'
                        });
                        var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
                        var status = colorBlock.replace(/{MESSAGE}/gi, message);
                        $('#chatForm .field').prepend(status);
                        break;
                    case 'error':
                        var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
                        var status = colorBlock.replace(/{MESSAGE}/gi, data.response);
                        $('#chatForm .field').prepend(status);
                        break;
                }

                timeout = setTimeout(hideMessage, 2000);
            },
            error: function () {
                var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
                var status = colorBlock.replace(/{MESSAGE}/gi, 'Something was wrong. Refresh this page!');
                $('#chatForm .field').prepend(status);
                timeout = setTimeout(hideMessage, 2000);
            }
        });
    }
    //system notification close
    $('#chat-tab').on('click', '.message .close', function() {
        $(this).closest('.message').transition('fade');
    });
    //hide message
    function hideMessage () {
        $('.message').transition('fade');
        $('.message').remove();
    }

    $('#chat-tab').on('mouseover', '.message', function () {
        clearTimeout(timeout);
    });
    // message
    function prependMessage(response, group) {
        testGroup = group;
        var path = response.message.publicPath;
        var imgPath = response.message.imgPath;
        var audioPath = response.message.audioPath;
        delete response.message.publicPath;
        delete response.message.imgPath;
        delete response.message.audioPath;

        $.each(response.message, function (key, value){
            var date = formatTime(value.created_at);
            var image = '';
            var dateForCompare = formatDate(value.created_at);
            var unread = '';

            if($('#authId').val() == value.hashFrom){
                var messageBlock = messageBlockOut;
                var miniChatClass = 'right-chat';
                var name = value.nameFrom;
                image = path+value.avatarFrom;


                switch (value.onlineCodeFrom) {
                    case 'available':
                        var onlineStatusClass = 'chat-online-status';
                    break;
                    case 'away':
                        var onlineStatusClass = 'chat-away-status';
                    break;
                    case 'offline':
                        var onlineStatusClass = 'chat-offline-status';
                    break;
                }
            } else {
                var messageBlock = messageBlockIn;
                var miniChatClass = 'left-chat';

                if(group == '#group-chat-area'){
                    onlineCode = (value.onlineCodeFrom == null) ? value.onlineCodeTo : value.onlineCodeFrom;
                    value.hashFrom = (value.hashFrom == null) ? value.hashTo : value.hashFrom;
                    image = path+value.avatarTo;
                    unread = 'unread unreadGroup';
                    var name = value.nameTo;

                    switch (onlineCode) {
                        case 'available':
                            var onlineStatusClass = 'chat-online-status';
                            break;
                        case 'away':
                            var onlineStatusClass = 'chat-away-status';
                            break;
                        case 'offline':
                            var onlineStatusClass = 'chat-offline-status';
                            break;
                    }
                } else {
                    image = path+value.avatarFrom;
                    unread = 'unread unreadChat';
                    var name = value.nameFrom;

                    switch (value.onlineCodeFrom) {
                        case 'available':
                            var onlineStatusClass = 'chat-online-status';
                            break;
                        case 'away':
                            var onlineStatusClass = 'chat-away-status';
                            break;
                        case 'offline':
                            var onlineStatusClass = 'chat-offline-status';
                            break;
                    }
                }
            }

            if(value.message == null && value.file_id != null){
                var mediaBlock;
                var media;
                var miniMedia;

                switch (value.extension){
                    case 'jpg':
                        mediaBlock = imgBlock;
                        media = imgPath;
                        miniMedia = 'Image FIle';
                        miniBlock = imgBlockMini;
                        var mediaContent = media+value.file_name+'.'+value.extension;
                        break;
                    case 'jpeg':
                        mediaBlock = imgBlock;
                        media = imgPath;
                        miniMedia = 'Image FIle';
                        miniBlock = imgBlockMini;
                        var mediaContent = media+value.file_name+'.'+value.extension;
                        break;
                    case 'png':
                        mediaBlock = imgBlock;
                        media = imgPath;
                        miniMedia = 'Image FIle';
                        miniBlock = imgBlockMini;
                        var mediaContent = media+value.file_name+'.'+value.extension;
                        break;
                    case 'mp3':
                        mediaBlock = audioBlock;
                        media = audioPath;
                        miniMedia = 'Audio FIle';
                        miniBlock = audioBlock;
                        var mediaContent = value.file_name;
                        break;
                    case 'wav':
                        mediaBlock = audioBlock;
                        media = audioPath;
                        miniMedia = 'Audio FIle';
                        miniBlock = audioBlock;
                        var mediaContent = value.file_name;
                        break;
                }

                var mediaMsg = mediaBlock.replace(/{MEDIA}/gi, mediaContent);
                var messageContent = mediaMsg.replace(/{FILENAME}/gi, value.real_name);
                var miniMediaMsg = miniBlock.replace(/{MEDIA}/gi, miniMedia);
                var miniMessageContent = miniMediaMsg.replace(/{FILENAME}/gi, miniMedia);
            } else {
                messageContent = value.message;
                var miniMessageContent = value.message;
            }
            var messageRead = messageBlock.replace(/{UNREAD}/gi, (value.read == 0) ? unread : '');
            var message = messageRead.replace(/{MSG}/gi, messageContent);
            var messageId = message.replace(/{ID}/gi, value.id);
            var imgMessage = messageId.replace(/{IMG}/gi, image);
            var nameMessage = imgMessage.replace(/{NAME}/gi, name);
            var onlineMessage = nameMessage.replace(/{ONLINE_STATUS}/gi, onlineStatusClass);
            var hashMessage = onlineMessage.replace(/{HASH}/gi, value.hashFrom);
            var finishMessage = hashMessage.replace(/{TIME}/gi, date);
            finished = finishMessage;

            if(prevDate != dateForCompare) {
                $(group).prepend("<p class='ui center feed chat-date'>" + dateForCompare + "</p>");
            }
            if($(group + ' .chat-date').length < 1){
                $(group).prepend(finishMessage);
            } else {
                $(group+' .chat-date').first().after(finishMessage);
            }
            prevDate = dateForCompare;
        });
    }
    // notification timer
    function notificationTimer() {
        var notification = $('.notification').not('.animating').first();
        notification.transition('fade', 750);
        setTimeout(function () {
            notification.remove();
            if($('.notification').length == 0){
                $('#notificationBlock').remove();
            }

            if($('.notification').length < 2 && $('#hideAllNotification').length > 0){
                $('#hideAllNotification').remove();
            }

            if($('.notification.hidden').length > 0 && $('.notification').not('.hidden').length < 3){
                $('.notification.hidden').first().show().removeClass('hidden');
                notifier = setTimeout(notificationTimer, 5000);
                notificationTimeout.push(notifier);
            }
        }, 750)
    }
    //read msg
    $('body').on('mouseover', function () {
        var unreadedMsg = $('.unread');
        var messageId = [];
        messages = '';

        if($('#chat-tab').hasClass('active')){
            messages = '.unreadChat';
            readTarget = 'chat';
            readCount = 'data-user-id='
        }

        if($('#group-tab').hasClass('active')){
            messages = '.unreadGroup';
            readTarget = 'group';
            readCount = 'data-group-hash='
        }

        if(unreadedMsg.length != 0 && !ajaxRun && messages != ''){
            $(messages).each(function () {
                messageId.push($(this).attr('data-message-id'));
            });
            ajaxRun = true;
            $.ajax({
                type: 'POST',
                url: '/chat',
                data: {
                    ajax: 'read_messages',
                    message: messageId,
                    userId: $('#toId').val(),
                    authId: $('#authId').val(),
                    readTarget: readTarget,
                    groupHash: (readTarget == 'group') ? $('#sendGroupMsgBtn').attr('data-group-room') : -1

                },
                success: function (response) {
                    if(response.status == 'success'){
                        $(messages).each(function () {
                            $(this).removeClass('unread').removeClass(messages);
                        });

                        if(response.unreadMsg == 0){
                            $('['+readCount+'"'+response.user_id+'"] .unreadedCount').remove();
                        } else {
                            var unreadCount = response.unreadMsg[0]['unread'];
                            $('['+readCount+'"'+response.user_id+'"] .unreadedCount').text(unreadCount);
                        }

                        if(readTarget = 'chat'){
                            if(response.unreadAll == 0){
                                $('.unreadedCountAll').remove();
                            } else {
                                var unreadCountAll = response.unreadAll;
                                $('.unreadedCountAll').text(unreadCountAll);
                            }
                        }

                    } else {
                        var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
                        var status = colorBlock.replace(/{MESSAGE}/gi, response.message);
                        $('#chatForm .field').prepend(status);
                    }
                },
                complete: function () {
                    ajaxRun = false;
                }
            })
        }
    });

    $('#lastChatMessage').click(function () {
      const chatHash = $(this).attr('data-chat');
      $(`.chat_btn[data-chat-id="${chatHash}"]`).click();
    });

//    GROUPS

    $('.groupChatSelect').click(function () {
        var groupHash = $(this).attr('data-group-hash');
        var authId = $('#groupAuthId').val();

        var self = $(this);

        $.ajax({
            type: 'POST',
            url: '/chat',
            data: {
                ajax: 'get_groups_message',
                _token: $('meta[name="csrf-token"]').attr('content'),
                authId: authId,
                groupHash: groupHash
            },
            success: function (response) {
                var authId = $('#authId').val();
                $('#sendGroupMsgBtn').attr('data-group-room', groupHash);
                socket.emit('switchRoom', groupHash, authId);
                $('#group-chat-area').html("");
                if(!$('#group-tab').hasClass('active')){
                    $('.main-tab.active, .tab-link.active').removeClass('active');
                    $('#group-tab, .group-tab-link').addClass('active');
                }

                if($('#groupEmptyMsg').length > 0){
                    $('#groupEmptyMsg').remove();
                }
                switch (response.status){
                    case 'empty':
                        $('#group-chat-area').html("<p class='ui center aligned grid' id='groupEmptyMsg' style='margin-top: 20px'>You don't have messages in this group</p>");
                        break;
                    case 'message':
                        if($('.groupPagination').length > 0){
                            $('.groupPagination').remove();
                        }
                        $('#groupChatForm').append(response.buttons);
                        prependMessage(response, '#group-chat-area');
                        // chatRoom(groupHash);
                        var offset = $('#group-chat-area>.ui').last()[0].offsetTop;
                        var height = $('#group-chat-area>.ui').last().height();
                        $('#group-chat-area').animate({ scrollTop: offset+height }, 0);
                        // $('#chatForm').attr('data-chat-hash', chat_hash);
                        break;
                    case 'error':
                        break;
                    case 'success':
                        self.attr('data-chat-id', response.message);
                        $('#chat-area').html("<p class='ui center aligned grid' id='emptyMsg'>You don't have messages with this user</p>");
                        chatRoom(response.message);
                        break;
                    default:
                        break;
                }
            }
        })
    });

    $('#sendGroupMsgBtn').click(function () {
        if($('#groupChatMsgInput').val().length>0){
            var message = $('#groupChatMsgInput').val();
            var room = $(this).attr('data-group-room');
            $.ajax({
                type: 'POST',
                url: '/groupMessage',
                data:{
                    msg: message,
                    groupHash: room
                },
                success: function (data) {
                    if(data.status === 'error'){
                        var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
                        var status = colorBlock.replace(/{MESSAGE}/gi, data.message);

                        $('#chatForm .field').prepend(status);
                        timeout = setTimeout(hideMessage, 2000);
                    }
                }
            });
            // socket.emit('groupMessage', message, room);
            $('#groupChatMsgInput').val('');
            $('#sendGroupMsgBtn').addClass('disabledBtn');
        } else {
            var colorBlock = alertBlock.replace(/{COLOR}/gi, 'red');
            var status = colorBlock.replace(/{MESSAGE}/gi, 'You can not write empty message!');
            $('#groupChatForm .field').prepend(status);
        }
    });

    $('#searchAgentInput').keydown(function (e) {
        if (e.keyCode == 13) {
            $.ajax({
                type: 'POST',
                url: '/agents',
                data: {
                    ajax: 'search_agents',
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: $('#searchAgentInput').val()
                },
                success: function (response) {
                    $('#agentsBlock').html('');
                    if (response.status === 'success') {
                        $.each(response.agents, function (key, value) {
                            switch (value.code) {
                                case 'available':
                                    var onlineStatusBlock = onlineBlock;
                                    break;
                                case 'offline':
                                    var onlineStatusBlock = oflineBlock;
                                    break;
                                case 'away':
                                    var onlineStatusBlock = awayBlock;
                                    break;
                            }

                            if (value.avatar_name.length !== 0) {
                                var avatar = response.avatar_path + value.avatar_name;
                            } else {
                                var avatar = response.no_image;
                            }

                            var onlineFinishBlock = agentBlock.replace(/{ONLINE_BLOCK}/gi, onlineStatusBlock);
                            var imageBlock = onlineFinishBlock.replace(/{IMAGE}/gi, avatar);
                            var idBlock = imageBlock.replace(/{ID}/gi, value.id);
                            var nameBlock = idBlock.replace(/{NAME_BLOCK}/gi, value.first_name + ' ' + value.last_name);
                            var chatHash = nameBlock.replace(/{CHAT_HASH}/gi, value.chat_hash);
                            var webUsername = chatHash.replace(/{AGENT_NAME}/gi, value.web_username);
                            var agentHahs = webUsername.replace(/{AGENT_HASH}/gi, value.agent_hash);

                            $('#agentsBlock').append(agentHahs);
                        });
                    }

                    if (response.status === 'empty') {
                        $('#agentsBlock').html('<p style="text-align: center">No such user found</p>');
                    }
                }
            });
        }
    });

    function holdDuration(callSid) {
        var callSeconds = $('.callOnHold[data-call="'+callSid+'"]').attr('data-hold-second');
        var time = parseInt(callSeconds)+1;
        var minutes = Math.floor(time / 60);
        var sec = time - minutes * 60;
        var hours = Math.floor(time / 3600);
        $('.callOnHold[data-call="'+callSid+'"]').attr('data-hold-second', time);

        var formatHour = (hours/10 < 1) ? '0'+hours : hours;
        var formatMinute = (minutes/10 < 1) ? '0'+minutes : minutes;
        var formatSec = (sec/10 < 1) ? '0'+sec : sec;
        var newTime = formatHour + ':' + formatMinute + ':' + formatSec;
        $('.callOnHold[data-call="'+callSid+'"] .holdDuration').text(newTime);
    }

    function callDuration(agentHash) {
        var callSeconds = $('.time-count[data-agent="'+agentHash+'"]').attr('data-seconds');
        var time = parseInt(callSeconds)+1;
        var minutes = Math.floor(time / 60);
        var sec = time - minutes * 60;
        var hours = Math.floor(time / 3600);
        $('.time-count[data-agent="'+agentHash+'"]').attr('data-seconds', time);

        var formatHour = (hours/10 < 1) ? '0'+hours : hours;
        var formatMinute = (minutes/10 < 1) ? '0'+minutes : minutes;
        var formatSec = (sec/10 < 1) ? '0'+sec : sec;
        var newTime = formatHour + ':' + formatMinute + ':' + formatSec;
        $('.time-count[data-agent="'+agentHash+'"] .popupTime').text(newTime);
    }

    function sessionTimer(){
        currentSession++;
        var sessionRemain = maxSession - currentSession;
        var days =  Math.floor( sessionRemain / 24 / 60);
        var hours = Math.floor( sessionRemain / 60 % 24);
        var minutes = sessionRemain % 60;
        $('#sessionProgress').progress('increment');

        if(sessionRemain === 0){
            clearInterval(sessionTimerId);
            $('#sessionProgress').find('.label').text('Session expired');

            swal({
                type: 'warning',
                title: 'Warning',
                text: 'Your session has expired. Please log in again'
            }).then(function (value) {
                window.location.reload();
            });
        } else {
            $('#sessionProgress').find('.label').text( days + ' days ' + hours + ' hours ' + minutes + ' minutes');
        }
    }
});

var number;
var currentCalls = {};
var currentCallSid;
var checkToErrorCalls = {};
var screenWidth = $(window).width();
let pcAcceptedCall;
var callBlock = '<div class="info mobile hidden callInfoBlock" data-call-sid="{SID}">' +
                    '<div class="ui horizontal list call-div">' +
                        '<div class="item callInfo" style="display:none;">' +
                            '<div class="call-info">' +
                                '<i class="fas fa-phone fa-flip-horizontal icon" style="margin-top: 10px;"></i>' +
                                '<div class="content">' +
                                    '<div class="ui sub header callName"></div>' +
                                        'inbound on call' +
                                        '<span class="durationCall" style="font-size: 11px;color: #e7e1e1;font-weight: 400"></span>' +
                                    '</div>' +
                                '<div>' +
                            '</div>' +
                            '<div class="call-contact" data-contact-id="">' +
                                '<a role="button">' +
                                    '<i class="far fa-address-card"></i>' +
                                '</a>' +
                            '</div>' +
                        '</div>' +
                        '<div class="right item callInfo" style="margin-left: 0; display: none">' +
                            '<ul>' +
                                '<li class="end-call">' +
                                    '<a class="reject_current_call" role="button">' +
                                        '<img src="/images/end-call.svg">' +
                                    '</a>' +
                                '</li>' +
                                '<li class="pause holdCall">' +
                                    '<a href="#">' +
                                        '<img src="/images/pause.svg">' +
                                    '</a>' +
                                '</li>' +
                            '</ul>' +
                        '</div>' +
                    '<div class="item incomingCall" style="display: none">' +
                        '<div class="content">' +
                            '<div class="ui sub header incomingCallName"></div>' +
                                '<div class="incomingExt"></div>' +
                            '</div>' +
                        '</div>' +
                        '<span class="dropCall" style="display: none; position: absolute; top: 22px; left: 20px;">' +
                            '<i class="fas fa-phone fa-flip-horizontal"></i> Drop your call here.' +
                        '</span>' +
                        '<div class="right item acceptIncomingCall" style="margin-left: 0">' +
                            '<ul>' +
                                '<li class="accept-call">' +
                                    '<a class="acceptIncomingCall" role="button">' +
                                        '<i class="fas fa-phone fa-flip-horizontal"></i>' +
                                    '</a>' +
                                '</li>' +
                            '</ul>' +
                        '</div>' +
                    '</div>' +
                    '<p>Status: Available...</p>' +
                '</div>';

$(function(){
    var connection, timer, callerNumber, incomingPhone, incomingSid;
    const localStorage = window.localStorage;
    let isShift = false;
    localStorage.setItem('keypadDigit', false);

    initDevice();

    $('body').on('click', '#accept_call, .acceptIncomingCall', function () {
        acceptCall();
    });

    $('body').keydown(function (e) {
        if(e.keyCode === 32 && connection !== undefined){
            e.preventDefault();
            acceptCall();
        } else if(e.keyCode === 35){
            const sid = $('.callInfoBlock').first().attr('data-call-sid');

            if(sid !== undefined){
                e.preventDefault(sid);
                hangup(sid);
            }
        }
    });

    $('body').on('click', '.reject_current_call', function () {
        const sid = $(this).parents('.callInfoBlock').attr('data-call-sid');

        if($(this)[0].hasAttribute('data-sip')){
            $.ajax({
                url: '/twilio/sip/hangSipCall',
                data: {
                    sid:sid
                },
                type: 'post',
                success: function (response) {
                    console.log(response)
                }
            });
        } else {
            hangup(sid);
        }
    });

    $('#reject_call').click(function () {
        $('#redirectSelect option').remove();
        let callSid = null;

        if($(this).parents('#callingpopup').hasClass('isSip')){
            callSid = $(this).parents('#callingpopup').attr('data-call-sid');
        } else if(connection !== undefined){
            callSid = connection.parameters.CallSid;
        }

        if(callSid !== null){
            $.ajax({
                url: '/agents',
                data: {
                    ajax: 'get_redirect_agents'
                },
                type: 'POST',
                success: function (data) {
                    $.each(data, function (key, value) {
                        var option = '<option value="'+value.agent_hash+'">'+value.first_name + ' ' + value.last_name + '</option>';
                        $('#redirectSelect').append(option);
                    });
                    $('#redirectCallPopup').modal({
                        closable  : false,
                        onDeny    : function(){
                            window.location.href = '#callingpopup';
                        },
                        onApprove : function() {
                            var redirectTo =  $('#redirectSelect').val();
                            var error = false;

                            $.ajax({
                                url: '/twilio/redirectCall',
                                async: false,
                                data: {
                                    sid: callSid,
                                    agentHash: redirectTo
                                },
                                type: 'post',
                                success: function (data) {
                                    if(data.status !== 'success'){
                                        swal({
                                            type: 'error',
                                            title: 'Error',
                                            text: data.message
                                        });

                                        error = true;
                                    } else {
                                        $('#redirectCallPopup').modal('hide');
                                        $('.call-div .incomingCall').hide();
                                        connection = undefined;
                                    }
                                }
                            });

                            if(error){
                                return false;
                            }
                        }
                    }).modal('show');
                }
            });
        }
    });

    $('#voicemailCallTrigger').click(function(){
        if($(this).parents('#callingpopup').hasClass('isSip')){
            $.ajax({
                url: '/twilio/sip/voicemail',
                data: {
                    sid : $(this).parents('#callingpopup').attr('data-call-sid'),
                    id :  $(this).parents('#callingpopup').attr('data-call-id')
                },
                type: 'POST',
                success: function (data) {
                    window.location.href = '#';
                    $('#callerId').text('');
                    $('#extCallId').text('');
                    $('.callName').text('');
                    $('.durationCall').text('');
                    $('.callInfo').hide();
                    $('.dropCall').show();
                    $('.call-div .incomingCall').hide();
                }
            });
        } else {
            if(connection !== undefined) {
                connection.reject();
                connection.disconnect();
                window.location.href = '#';
                $('#callerId').text('');
                $('#extCallId').text('');
                $('.callName').text('');
                $('.durationCall').text('');
                $('.callInfo').hide();
                $('.dropCall').show();
                $('.call-div .incomingCall').hide();
                socket.emit('endCall');

                if(timer !== undefined){
                    clearInterval(timer);
                }
            } else {
                console.log('Something was wrong');
            }
        }
    });

    // Bind button to make call
    $('#newCall').click(function () {
        const callTo = $('#textclear').val();
        makeCall(callTo, number);
    });

    $('#textclear').keydown((e) => {
        if (e.keyCode == 13) {
            e.preventDefault();
            const callTo = $(e.target).val();
            makeCall(callTo, number);
        }
    });
    $('.call-icon').click(function (e) {
        if(connection === undefined && !$(this).hasClass('in-call')){
            var callTo = $('#textclear').val();
            var callContact = {
                name: 'Outgoing call',
                number: callTo,
                image: './images/dave-bledsoe.jpg',
                desc: 'Publicis Nurun'
            };
            showUserInfo(callContact);
            makeCall(callTo, number);
        } else {
            if($(this).hasClass('in-call')) {
                connection.reject();
                connection.disconnect();
            }
            e.stopPropagation();
        }
    });

    $('.voiceMailCall').click(function () {
        var callTo = $(this).attr('data-voice-number');
        makeCall(callTo, number);
    });

    $('#voicemailTable').on('click', '.voiceMailCall', function () {
        var callTo = $(this).attr('data-voice-number');
        makeCall(callTo, number);
    });

    $('#viewcontact').on('click', '#contactCall', function () {
        var callTo = $(this).attr('data-number');
        makeCall(callTo, number);
    });

    $('#agentsBlock, #mobileAgent').on('click', '.agent_call', function () {
        var callTo = $(this).attr('data-agent');
        makeCall(callTo, agentName);
    });

    $('.callRecent').click(function () {
        var callTo = $(this).attr('data-call-to');

        if(callTo.indexOf('client:') !== -1){
            makeCall(callTo, agentName);
        } else {
            makeCall(callTo, number);
        }
    });

    $('.number-dig').click(function (e) {
        if($('.pad').hasClass('inCall')) {
            var digit = $(this).attr('name');
            if (connection !== undefined) {
                connection.sendDigits(digit);
            }
        }
    });

    $('#numKeypad').click(function(e){
        $(this).toggleClass('active');
        localStorage.setItem('keypadDigit', $(this).hasClass('active'));
    });

    $('body').keydown(function (e) {
        const isKeypadOn = (localStorage.getItem('keypadDigit') === 'true');
        const keyCodes =  {
            48: '0', 49: '1', 50: '2', 51: '3', 52: '4', 53: '5', 54: '6', 55: '7', 56: '8', 57: '9',
            96: '0', 97: '1', 98: '2', 99: '3', 100: '4', 101: '5', 102: '6', 103: '7', 104: '8', 105: '9', 'pound': '#', 'asterisk': '*'
        };

        if(e.keyCode === 16){
            isShift = true;

            return false;
        }

        if(isKeypadOn && connection !== undefined){
            let key = keyCodes[e.keyCode];

            if(isShift){
                if(key === 3){
                    key = keyCodes['pound'];
                }

                if(key === 8){
                    key = keyCodes['asterisk'];
                }

                isShift = false;
            }

            connection.sendDigits(key);
        }
    });

    $('#callsBlockWrapper').on('dragenter', '.callInfoBlock', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).find('.call-div').find('.callInfo').hide();
    });

    $('#callsBlockWrapper').on('dragover', '.callInfoBlock', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $('#callsBlockWrapper').on('dragend', '.callInfoBlock', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $('#callsBlockWrapper').on('drop', '.callInfoBlock', function (e) {
        e.dataTransfer = e.originalEvent.dataTransfer;
        const sid = e.dataTransfer.getData('sid');

        $.ajax({
            url: '/twilio/redirectCall',
            data: {
                sid:sid
            },
            type: 'post',
            success: function (data) {
                if(data.status !== 'success'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: data.message
                    });
                } else {
                    window.localStorage.setItem('redirectId', data.callId);
                }
            }
        });
    });

    $('#agentsBlock').on('dragenter', '.agentCallBlock', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).find('.call-div').find('.callInfo').hide();
    });

    $('#agentsBlock').on('dragover', '.agentCallBlock', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $('#agentsBlock').on('dragend', '.agentCallBlock', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $('#agentsBlock').on('drop', '.agentCallBlock', function (e) {
        e.dataTransfer = e.originalEvent.dataTransfer;
        var sid = e.dataTransfer.getData('sid');
        var agentHash = $(this).find('.chat_btn').attr('data-user-id');

        $.ajax({
            url: '/twilio/redirectCall',
            data: {
                sid: sid,
                agentHash: agentHash
            },
            type: 'post',
            success: function (data) {
                if(data.status !== 'success'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: data.message
                    });
                }
            }
        });
    });

    $('#agentsBlock').on('dragstart', '.agentCallBlock.incall', function (e) {
        e.dataTransfer = e.originalEvent.dataTransfer;
        e.dataTransfer.setData('sid', $(this).attr('data-sid'))
    });

    $('.callOnHoldWrapper').on('dragstart', '.callOnHold', function (e) {
        e.dataTransfer = e.originalEvent.dataTransfer;
        e.dataTransfer.setData('sid', $(this).attr('data-call'))
    });

    $('#callsBlockWrapper').on('click', '.holdCall', function () {
        const call = $(this).parents('.callInfoBlock').attr('data-call-sid');

        let callId = $('#currentCallId').val();


        if (!callId) {
            callId = currentCalls[call].id;
        }

        currentCalls[call].holded = true;

        $.ajax({
            url: '/twilio/holdCall',
            data: {
                callSid: call,
                callId: callId
            },
            type: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('#recordCall').click(function () {
        var self = $(this);
        var filename = $('#filename').val();
        self.addClass('loading').prop('disabled', true);
        $.ajax({
            url: '/twilio/recordPrompt',
            type: 'POST',
            data: {
                filename: filename
            },
            success: function (data) {
                self.removeClass('loading').prop('disabled', false);
                $('#filename').val('');
            }
        });
    });

    $('.acceptSecondaryCall').click(() => {
        const callSid = $('#secondaryCall').attr('data-secondaryCall-sid');

        $.ajax({
            url: '/twilio/redirectCall',
            data: {
                sid:callSid
            },
            type: 'post',
            success: data => {
                if(data.status !== 'success'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: data.message
                    });
                }
            }
        });
    });

    $('#ringtoneDeviceTest').click((e) => {
        e.preventDefault();
        let speakerId = undefined;
        const speaker = Twilio.Device.audio.ringtoneDevices.get();
        const deviceId = $('#ringtoneDevice').val();

        speaker.forEach(function(spkDev) {
            speakerId = spkDev.deviceId;
        });
        Twilio.Device.audio.ringtoneDevices.set(deviceId).then(() => {
            Twilio.Device.audio.ringtoneDevices.test().then(() => {
                Twilio.Device.audio.ringtoneDevices.set(speakerId);
            });
        });
    });

    $('#speakerTest').click((e) => {
        e.preventDefault();
        let speakerId = undefined;
        const speaker = Twilio.Device.audio.speakerDevices.get();
        const deviceId = $('#callDevice').val();

        speaker.forEach(function(spkDev) {
            speakerId = spkDev.deviceId;
        });
        Twilio.Device.audio.speakerDevices.set(deviceId).then(() => {
            Twilio.Device.audio.speakerDevices.test().then(() => {
                Twilio.Device.audio.speakerDevices.set(speakerId);
            });
        });
    });

    $('#saveDevices').click((e) => {
        e.preventDefault();
        const localStorage = window.localStorage;
        const ringtoneDevice = $('#ringtoneDevice').val();
        const callDevice = $('#callDevice').val();

        Twilio.Device.audio.ringtoneDevices.set(ringtoneDevice).then(() => {
            localStorage.setItem('ringtoneDevice', ringtoneDevice);
        }).catch((e) => {
            swal({
                title: "Error",
                text: 'Incorrect ringtone devices',
                type: 'error'
            });
        });
        Twilio.Device.audio.speakerDevices.set(callDevice).then(() => {
            localStorage.setItem('callDevice', callDevice);
        }).catch((e) => {
            swal({
                title: "Error",
                text: 'Incorrect speaker devices',
                type: 'error'
            });
        });

        window.location.href = '#';

        swal({
            title: "Success",
            text: 'You successfully configurated your devices',
            type: 'success'
        })
    });

    function hangup(callSid) {
        if(pcAcceptedCall !== undefined && pcAcceptedCall.sid === callSid){
            $('#incoming_call').hide();
            $('#callerId').text('');
            $('#extCallId').text('');
            $('[data-call-sid="'+callSid+'"] .callName').text('');
            $('[data-call-sid="'+callSid+'"] .durationCall').text('');
            $('[data-call-sid="'+callSid+'"] .callInfo').hide();
            $('[data-call-sid="'+callSid+'"] .dropCall').show();
            $('[data-call-sid="'+callSid+'"] .call-div .incomingCall').hide();

            if(screenWidth > 1200){
                $('[data-call-sid="'+callSid+'"] .acceptIncomingCall').css('display', 'inline-block');
            } else {
                $('[data-call-sid="'+callSid+'"] .acceptIncomingCall').css('display', 'block');
            }

            socket.emit('pcEndCall', pcAcceptedCall);

            if(timer !== undefined){
                clearInterval(timer);
            }

            if(Object.keys(currentCalls).length > 1){
                $('[data-call-sid="'+callSid+'"]').remove();
            }

            pcAcceptedCall = undefined;

            delete currentCalls[callSid];
        } else {
            const currentCall = currentCalls[callSid].sid;
            if(currentCall !== undefined) {
                currentCall.reject();
                currentCall.disconnect();
                $('#incoming_call').hide();
                $('#callerId').text('');
                $('#extCallId').text('');
                $('[data-call-sid="'+callSid+'"] .callName').text('');
                $('[data-call-sid="'+callSid+'"] .durationCall').text('');
                $('[data-call-sid="'+callSid+'"] .callInfo').hide();
                $('[data-call-sid="'+callSid+'"] .dropCall').show();
                $('[data-call-sid="'+callSid+'"] .call-div .incomingCall').hide();

                if(screenWidth > 1200){
                    $('[data-call-sid="'+callSid+'"] .acceptIncomingCall').css('display', 'inline-block');
                } else {
                    $('[data-call-sid="'+callSid+'"] .acceptIncomingCall').css('display', 'block');
                }

                if(timer !== undefined){
                    console.log(timer);
                    clearInterval(timer);
                }

                if(Object.keys(currentCalls).length > 1){
                    $('[data-call-sid="'+currentCall+'"]').remove();
                }
                delete currentCalls[currentCall];
            } else {
                console.log('Something was wrong');
            }
        }

    }

    function acceptCall() {
        if (connection !== undefined) {
            connection.on('accept', function (conn) {
                $('[data-call-sid="'+incomingSid+'"] .callName').text(callerNumber);
                $('#connectMicro').hide();
                callerNumber = undefined;
                sec = 0;
                min = 0;

                if (window.location.pathname === '/dashboard') {
                    $('[data-call-sid="'+incomingSid+'"] .callInfoBlock').show();

                    if (screenWidth > 1200) {
                        $('[data-call-sid="'+incomingSid+'"] .callInfo').css('display', 'inline-block');
                    } else {
                        $('[data-call-sid="'+incomingSid+'"] .callInfo').css('display', 'block');
                    }

                    $('[data-call-sid="'+incomingSid+'"] .acceptIncomingCall').hide();
                    $('[data-call-sid="'+incomingSid+'"] .dropCall').hide();
                    $('[data-call-sid="'+incomingSid+'"] .call-div .incomingCall').hide();
                } else {
                    $(".currentCallPopup").show();
                    $('#keypadPopup').click();
                }

                currentCallSid = incomingSid;
            });

            connection.on('error', function (error) {
                $('#connectMicro').hide()
                connection.reject();
                connection.disconnect();
            });

            connection.on('disconnect', function(conn) {
                $('#connectMicro').hide();
                conn.reject();
            });

            connection.on('cancel', function(conn) {
                $('#connectMicro').hide();
                connection.reject();
                connection.disconnect();
            });

            connection.on('reject', function(conn) {
                $('#connectMicro').hide();
                connection.reject();
                connection.disconnect();
            });

            window.location.href = '#';

            if($(this).hasClass('acceptIncomingCall')){
                incomingSid = $(this).parents('.callInfoBlock').attr('data-call-sid');
            }

            currentCalls[incomingSid] = {
                sid: connection,
                id: $('#currentCallId').val()
            };

            checkToErrorCalls[incomingSid] = connection;
            socket.emit('endCall');

            if(Object.keys(currentCalls).length > 1){
                $.ajax({
                    url: '/twilio/holdCall',
                    data: {
                        callSid: currentCalls[currentCallSid].sid.parameters.CallSid,
                        callId: currentCalls[currentCallSid].id
                    },
                    type: 'post',
                    success: function (data) {
                        $('#connectMicro').show();
                        connection.accept();
                    }
                });
            } else {
                $('#connectMicro').show();
                connection.accept();
            }
        } else {
            console.log('Something was wrong');
        }
    }

    function initDevice() {
        $.ajax({
            url: '/twilio/clientToken',
            data: {
                userName:agentName
            },
            type: 'GET',
            success: function (data) {
                if(data.status === 'error'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        html: data.message
                    });

                    return false;
                }
                number = data.number;
                //* Initial twilio device
                Twilio.Device.setup(data.token, {
                    sounds: {
                        incoming: data.ringtone
                    },
                    allowIncomingWhileBusy: true,
                    debug: true
                });

                Twilio.Device.ready(function (device) {
                    console.log('device ready');
                });
                Twilio.Device.error(function (error) {
                    if(connection !== undefined && error.code !== 31205) {
                        connection.disconnect();
                        connection = undefined;
                    }

                    if(error.code === 31000){
                        swal({
                            title: "Network error!",
                            text: 'We reject your call! Press ok to recall this number',
                            type: 'error',
                            showLoaderOnConfirm: true,
                            confirmButtonText: 'Ok'
                        }).then(function (value) {
                            if(value){
                                makeCall(incomingPhone, number);
                            }
                        });
                    }

                    $.ajax({
                        type: 'POST',
                        url: '/log/console',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            code: error.code,
                            message: error.message
                        }
                    });

                    console.error('Something was wrong! ' + error.message);
                });
                // Twilio.Device.offline(device => {
                //     $.ajax({
                //         url: '/twilio/clientToken',
                //         data: {
                //             userName: agentName
                //         },
                //         type: 'GET',
                //         success: function (data) {
                //             if (data.status === 'error') {
                //                 swal({
                //                     type: 'error',
                //                     title: 'Error',
                //                     html: data.message
                //                 });
                //
                //                 return false;
                //             }
                //             console.log(data.token);
                //             number = data.number;
                //             //* Initial twilio device
                //             Twilio.Device.setup(data.token);
                //         }
                //     });
                // });
                Twilio.Device.incoming(function (conn) {
                    connection = conn;
                    incomingSid = conn.parameters.CallSid;

                    $.ajax({
                        url: '/twilio/getCaller',
                        data: {
                            connection: conn.parameters
                        },
                        type: 'POST',
                        success: function (data) {
                            callerNumber = data.caller;
                            incomingPhone = data.caller;
                            const redirectId = window.localStorage.getItem('redirectId');

                            if(data.callId !== undefined && parseInt(data.callId) === parseInt(redirectId)) {
                                window.localStorage.removeItem('redirectId');
                                $('#accept_call').click();
                            } else {
                                if(Object.keys(currentCalls).length !== 0) {
                                    var callSidBlock = callBlock.replace(/{SID}/gi, incomingSid);
                                    $('#callsBlockWrapper').append(callSidBlock);
                                } else {
                                    $('.callInfoBlock').attr('data-call-sid', incomingSid);
                                }

                                if (data.callerId) {
                                    $('[data-call-sid="' + conn.parameters.CallSid + '"] .call-contact').attr('data-contact-id', data.callerId);
                                    $('[data-call-sid="' + conn.parameters.CallSid + '"] .call-contact').show();
                                } else {
                                    $('[data-call-sid="' + conn.parameters.CallSid + '"] .call-contact').hide();
                                }
                                $('#callerId').text(data.caller);
                                $('#callAvatar').attr('src', data.avatar);
                                window.location.href = '#callingpopup';
                                $('.pad').addClass('inCall');

                                $('[data-call-sid="'+conn.parameters.CallSid+'"] .dropCall').hide();
                                if(screenWidth > 1200){
                                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-div .incomingCall').css('display', 'inline-block');
                                } else {
                                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-div .incomingCall').css('display', 'block');
                                }

                                $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-div .incomingCall .incomingCallName').text(data.caller);

                                if (data.extension !== 'calling...') {
                                    $('#extCallId').text('Ext: ' + data.extension);
                                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-div .incomingCall .incomingExt').text('Ext: ' + data.extension);
                                    callerNumber += ', ' + data.extension;
                                } else {
                                    if(data.phone !== undefined || data.phone !== null){
                                        $('#extCallId').text(data.phone);
                                        $('[data-call-sid="' + conn.parameters.CallSid + '"] .call-div .incomingCall .incomingExt').text(data.phone);
                                    } else {
                                        $('#extCallId').text(data.extension);
                                    }
                                }
                            }
                        }
                    });
                });
                Twilio.Device.connect(function (conn) {
                    connection = conn;
                    $('.callInfoBlock').attr('data-call-sid', conn.parameters.CallSid);

                    if(currentCalls[conn.parameters.CallSid] === undefined) {
                        currentCalls[conn.parameters.CallSid] = {
                            sid: conn,
                            id: $('#currentCallId').val()
                        };
                    } else {
                        currentCalls[conn.parameters.CallSid].sid = conn;
                    }

                    timer = setInterval(function(){
                        callDuration()
                    }, 1000);

                    $('.pad').addClass('inCall');
                });
                Twilio.Device.disconnect(function (conn) {
                    if(timer !== undefined){
                        clearInterval(timer);
                    }
                    socket.emit('endCall');
                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .callName').text('');
                    $('#extCallId').text('');
                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .durationCall').text('');
                    $('.pad').removeClass('inCall');

                    if(screenWidth > 1200){
                        $('[data-call-sid="'+conn.parameters.CallSid+'"]  .acceptIncomingCall').css('display', 'inline-block');
                    } else {
                        $('[data-call-sid="'+conn.parameters.CallSid+'"]  .acceptIncomingCall').css('display', 'block');
                    }

                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-icon').removeClass('in-call');
                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-change').removeClass('in-call');
                    $('#callerId').text('');
                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .callInfo').hide();
                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .dropCall').show();
                    $('#redirectCallPopup').modal('hide');
                    $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-div .incomingCall').hide();
                    $(".currentCallPopup").hide();

                    if(connection.parameters.CallSid === conn.parameters.CallSid){
                        connection = undefined;
                    }

                    if(conn.parameters.CallSid === incomingSid){
                        incomingSid = undefined;
                    }

                    if(Object.keys(currentCalls).length > 1 ||
                        (callerNumber !== undefined && currentCalls[conn.parameters.CallSid].holded)) {
                        $('[data-call-sid="'+conn.parameters.CallSid+'"]').remove();
                    }

                    conn.disconnect();
                    conn.reject();

                    delete currentCalls[conn.parameters.CallSid];
                });
                Twilio.Device.cancel(function(conn) {
                    socket.emit('endCall');
                    setTimeout(function () {
                        window.location.href = '#';
                        if(pcAcceptedCall === undefined ||
                            (pcAcceptedCall !== undefined && conn.parameters.CallSid !== pcAcceptedCall.sid)){
                            connection = undefined;
                            incomingSid = undefined;
                            $('.pad').removeClass('inCall');

                            $('.call-icon').removeClass('in-call');
                            $('.call-change').removeClass('in-call');
                            $('#callerId').text('');
                            $('[data-call-sid="'+conn.parameters.CallSid+'"] .callName').text('');
                            $('#extCallId').text('');
                            $('[data-call-sid="'+conn.parameters.CallSid+'"] .durationCall').text('');
                            $('[data-call-sid="'+conn.parameters.CallSid+'"] .callInfo').hide();
                            $('[data-call-sid="'+conn.parameters.CallSid+'"] .dropCall').show();
                            $('#redirectCallPopup').modal('hide');
                            $('[data-call-sid="'+conn.parameters.CallSid+'"] .call-div .incomingCall').hide();
                            $(".currentCallPopup").hide();

                            if(screenWidth > 1200){
                                $('[data-call-sid="'+conn.parameters.CallSid+'"] .acceptIncomingCall').css('display', 'inline-block');
                            } else {
                                $('[data-call-sid="'+conn.parameters.CallSid+'"] .acceptIncomingCall').css('display', 'block');
                            }

                            if(timer !== undefined){
                                clearInterval(timer);
                            }

                            if(connection !== undefined && connection.parameters.CallSid === conn.parameters.CallSid){
                                connection = undefined;
                            }

                            if(conn.parameters.CallSid === incomingSid){
                                incomingSid = undefined;
                            }

                            if(Object.keys(currentCalls).length > 1){
                                $('[data-call-sid="'+conn.parameters.CallSid+'"]').remove();
                            }

                            conn.disconnect();
                            conn.reject();

                            delete currentCalls[conn.parameters.CallSid];
                        }
                    }, 1000);
                });
                Twilio.Device.on('ready', async () => {
                    const localStorage = window.localStorage;
                    const ringtoneDeviceId = localStorage.getItem('ringtoneDevice');
                    const callDeviceId = localStorage.getItem('callDevice');

                    if(ringtoneDeviceId !== null){
                        await Twilio.Device.audio.ringtoneDevices.set(ringtoneDeviceId).catch((error) => {
                            console.log(error);
                        });
                    }

                    if(callDeviceId !== null){
                        await Twilio.Device.audio.speakerDevices.set(callDeviceId).catch((error) => {
                            console.log(error);
                        });
                    }
                    Twilio.Device.audio.availableOutputDevices.forEach((outputDevice, id) => {
                        $('#ringtoneDevice').append('<option value="'+id+'">'+outputDevice.label+'</option>');
                        $('#callDevice').append('<option value="'+id+'">'+outputDevice.label+'</option>');
                        const speakerDevices = Twilio.Device.audio.speakerDevices.get();
                        const ringtoneDevices = Twilio.Device.audio.ringtoneDevices.get();

                        speakerDevices.forEach((spkDev) => {
                            if (spkDev.deviceId === id) {
                                $('#callDevice option[value="' + id + '"]').attr('selected', 'selected');
                            }
                        });

                        ringtoneDevices.forEach((rngDev) => {
                            if (rngDev.deviceId === id) {
                                $('#ringtoneDevice option[value="' + id + '"]').attr('selected', 'selected');
                            }
                        });
                    });

                    // setInterval(() => {
                    //     $.ajax({
                    //         url: '/twilio/clientToken',
                    //         data: {
                    //             userName: agentName
                    //         },
                    //         type: 'GET',
                    //         success: function (data) {
                    //             if (data.status === 'error') {
                    //                 swal({
                    //                     type: 'error',
                    //                     title: 'Error',
                    //                     html: data.message
                    //                 });
                    //
                    //                 return false;
                    //             }
                    //
                    //             number = data.number;
                    //             Twilio.Device.setup(data.token);
                    //         }
                    //     });
                    // }, 60000);
                });
            }
        });
    }

    socket.on('pcCall', (data) => {
        if (data.action === 'accept') {
            pcAcceptedCall = data;
            currentCallSid = data.sid;
            let url = '/twilio/getCaller';
            let requestData = {
                connection: {
                    CallSid: currentCallSid,
                    From: data.number,
                    To: 'sip'
                }
            };

            if (data.isOutgoing !== undefined && data.isOutgoing !== false) {
                url = '/twilio/getCallerTo';
                requestData = {
                    callTo: data.number
                }
            }

            if (data.number !== undefined) {
                $.ajax({
                    url: url,
                    data: requestData,
                    type: 'POST',
                    success: function (response) {
                        let callKeys = Object.keys(currentCalls);
                        let attrCallSid = $('.callInfoBlock').attr('data-call-sid');
                        let hasCall = false;

                        for (let callKey of callKeys) {
                            if (callKey == attrCallSid) {
                                hasCall = true;
                            }
                        }

                        if (Object.keys(currentCalls).length !== 0 && !hasCall) {
                            const callSidBlock = callBlock.replace(/{SID}/gi, data.sid);
                            $('#callsBlockWrapper').append(callSidBlock);
                        } else {
                            $('.callInfoBlock').attr('data-call-sid', data.sid);
                        }

                        $('[data-call-sid="' + data.sid + '"] .dropCall').hide();
                        $('[data-call-sid="' + data.sid + '"] .reject_current_call').attr('data-sip', true);
                        $('[data-call-sid="' + data.sid + '"] .callName').text(response.caller);
                        $('[data-call-sid="' + data.sid + '"] .callInfoBlock').show();
                        if(screenWidth > 1200){
                            $('[data-call-sid="'+data.sid+'"] .callInfo').css('display', 'inline-block');
                        } else {
                            $('[data-call-sid="'+data.sid+'"] .callInfo').css('display', 'block');
                        }

                        $('[data-call-sid="'+data.sid+'"] .acceptIncomingCall').hide();
                        $('[data-call-sid="'+data.sid+'"] .call-div .incomingCall').hide();

                        $('[data-call-sid="' +data.sid+ '"] .call-contact').attr('data-contact-id', response.callerId);
                        $('#call_info .call-contact').attr('data-contact-id', response.callerId);
                        $('#call_info .call-contact').attr('data-contact-number', data.number);

                        currentCalls[data.sid] = {
                            sid: data.sid,
                            id: data.callId
                        };
                    }
                });
            } else {
                if (Object.keys(currentCalls).length !== 0) {
                    const callSidBlock = callBlock.replace(/{SID}/gi, data.sid);
                    $('#callsBlockWrapper').append(callSidBlock);
                } else {
                    $('.callInfoBlock').attr('data-call-sid', data.sid);
                }
                $('[data-call-sid="' + data.sid + '"] .dropCall').hide();
                $('[data-call-sid="'+data.sid+'"] .callName').text((callerNumber !== undefined) ? callerNumber : data.number);
                $('[data-call-sid="'+data.sid+'"] .callInfoBlock').show();

                $('#call_info .call-contact').attr('data-contact-number', (callerNumber !== undefined) ? callerNumber : data.number);
                $('[data-call-sid="' +data.sid+ '"] .call-contact').attr('data-contact-id', data.callerId);
                $('#call_info .call-contact').attr('data-contact-id', data.callerId);

                if(screenWidth > 1200){
                    $('[data-call-sid="'+data.sid+'"] .callInfo').css('display', 'inline-block');
                } else {
                    $('[data-call-sid="'+data.sid+'"] .callInfo').css('display', 'block');
                }

                $('[data-call-sid="'+data.sid+'"] .acceptIncomingCall').hide();
                $('[data-call-sid="'+data.sid+'"] .call-div .incomingCall').hide();

                currentCalls[data.sid] = {
                    sid: data.sid,
                    id: data.callId
                };
            }
            window.location.href = '#';
            $('#callingpopup').removeClass('isSip');
        } else if (data.action === 'cancel' || data.action === 'completed'){
            if(timer !== undefined){
                clearInterval(timer);
            }

            $('[data-call-sid="' + data.sid + '"] .reject_current_call').removeAttr('data-sip');
            $('[data-call-sid="'+data.sid+'"] .callName').text('');
            $('#extCallId').text('');
            $('[data-call-sid="'+data.sid+'"] .durationCall').text('');
            $('.pad').removeClass('inCall');

            if(screenWidth > 1200){
                $('[data-call-sid="'+data.sid+'"]  .acceptIncomingCall').css('display', 'inline-block');
            } else {
                $('[data-call-sid="'+data.sid+'"]  .acceptIncomingCall').css('display', 'block');
            }

            $('[data-call-sid="' +data.sid+ '"] .call-contact').attr('data-contact-id', data.callerId);
            $('#call_info .call-contact').attr('data-contact-id', data.callerId);

            $('[data-call-sid="'+data.sid+'"] .call-icon').removeClass('in-call');
            $('[data-call-sid="'+data.sid+'"] .call-change').removeClass('in-call');
            $('#callerId').text('');
            $('[data-call-sid="'+data.sid+'"] .callInfo').hide();
            $('[data-call-sid="'+data.sid+'"] .dropCall').show();
            $('#redirectCallPopup').modal('hide');
            $('[data-call-sid="'+data.sid+'"] .call-div .incomingCall').hide();
            $(".currentCallPopup").hide();

            /*if (Object.keys(currentCalls).length > 1) {
                $('[data-call-sid="'+data.sid+'"]').remove();
            }*/

            pcAcceptedCall = undefined;

            if (currentCalls[data.sid] && currentCalls[data.sid].holded == undefined) {
                delete currentCalls[data.sid];
            }

            window.location.href = '#';
            $('#callingpopup').removeClass('isSip');
        } else if(data.action === 'ringing'){
            $.ajax({
                url: '/twilio/getCaller',
                data: {
                    connection: {
                        CallSid: data.sid,
                        From: data.number,
                        To: 'sip'
                    }
                },
                type: 'POST',
                success: function (response) {
                    $('#callerId').text(response.caller);
                    $('#callAvatar').attr('src', response.avatar);
                    $('#call_info .call-contact').attr('data-contact-id', data.callerId);
                    window.location.href = '#callingpopup';
                    $('#callingpopup').addClass('isSip').attr('data-call-sid', data.sid).attr('data-call-id', data.callId);
                    $('[data-call-sid="' +data.sid+ '"] .call-contact').attr('data-contact-id', data.callerId);
                }
            });

        }
    });

    $('.callInfoBlock').on('click', '.call-contact', function () {
        var id = $(this).attr('data-contact-id');

        $.ajax({
            type: 'POST',
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                ajax: 'get_contact',
                view: 'view'
            },
            success: function (response) {
                if (response.status === 'success'){
                    $('#viewcontact').html(response.html);
                    window.location.href = '#viewcontact';
                } else {
                    $('#contactForm input[name="phone"]').val($('#call_info .call-contact').attr('data-contact-number'));
                    window.location.href = "#addcontact";
                }
            }
        });
    });
});

function callDuration(){
    var minView;
    var secView;
    if(sec == 60){
        min++;
        sec = 0;
    }
    secView = sec;
    if(sec<10) secView = '0'+sec;
    minView = min;
    if(min<10) minView = '0'+min;
    $('.durationCall').text(minView+' : '+secView);
    sec++;
}

function makeCall(callTo, number) {
    var params = {
        To: callTo,
        From: number
    };

    if(callTo !== ''){
        $('.call-icon').addClass('in-call');
        $('.call-change').addClass('in-call');
        console.log('Calling ' + params.To + '...');
        Twilio.Device.connect(params);

        $.ajax({
            url: '/twilio/getCallerTo',
            data: {
                callTo: callTo
            },
            type: 'POST',
            success: function (data) {
                if (data.callerId) {
                    $('.call-contact').attr('data-contact-id', data.callerId);
                    $('#call_info .call-contact').attr('data-contact-id', data.callerId);
                    $('.call-contact').show();
                } else {
                    $('.call-contact').hide();
                }
                $('.callName').text(data.caller);
                $('#incoming_call').hide();
                $('.callInfoBlock').show();

                if(screenWidth > 1200){
                    $('.callInfo').css('display', 'inline-block');
                } else {
                    $('.callInfo').css('display', 'block');
                }

                $('.dropCall').hide();
                $('.acceptIncomingCall').hide();
            }
        });

        sec = 0;
        min = 0;
    }
}

$(window).resize(function () {
    screenWidth = $(window).width();
});

function hideCallBlock() {
    window.location.href = '#';
    $('#callerId').text('');
    $('#extCallId').text('');
    $('.callName').text('');
    $('.durationCall').text('');
    $('.callInfo').hide();
    $('.dropCall').show();
    $('.call-div .incomingCall').hide();
    $('.acceptIncomingCall').show();
    $('.accept-call').show();
}

$(document).ready(function () {
    var whiteListTable = $('#whiteListTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        ajax: {
            url: '/numbers/whiteList',
            type:'POST',
            data: function(d) {
                d._token = $('meta[name="csrf-token"]').attr('content');
                d.ajax = 'get_table'
            }
        },
        language: {
            zeroRecords:    "No data available"
        },
        columns: [
            {
                data:'number'
            },
            {
                data:'action',
                className: 'center aligned collapsing'
            }
        ]
    });


    $('#addNumberToWhiteList').click(function () {
        var phoneNumber = $('#whiteListNumber').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/numbers/whiteList',
            data: {
                ajax: 'new_number',
                phone: phoneNumber
            },
            success: function (response) {
                if(response.status === 'error'){
                    $('#whiteListNumber').parents('.form').append(
                        '<div class="ui error message" style="display: block; margin-bottom: 1em">' +
                            '<p>'+response.errors+'</p>' +
                        '</div>'
                    );
                } else {
                    whiteListTable.draw();
                }
            }
        });
    });

    $('#whiteListTable').on('click', '.remove_whitelist_number', function () {
       var id = $(this).attr('data-id');

       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: '/numbers/whiteList',
           type: 'POST',
           data: {
               ajax: 'remove_number',
               id: id
           },
           success: function (response) {
               if(response.status === 'error'){
                   swal({
                       type: 'error',
                       title: 'Error',
                       text: 'Invalid number'
                   });
               } else {
                   swal({
                       type: 'success',
                       title: 'Success',
                       text: 'You have successfully removed this number!'
                   });

                   whiteListTable.draw();
               }
           }
       })
    });
});
$(document).ready(function () {
    var queueTable = $('#queueTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: false,
        ajax: {
            url: '/queue/get',
            type:'POST',
            data: function(d) {
                d._token = $('meta[name="csrf-token"]').attr('content');
            }
        },
        language: {
            zeroRecords:    "No data available",

        },
        columns: [
            {
                data:'time'
            },
            {
                data:'caller'
            },
            {
                data:'name'
            },
            {
                data:'priority'
            },
            {
                data:'action',
                className: 'action-td'
            }
        ],
        "createdRow": function(row, data) {
            $(row).addClass('queueRow');
        },
        "drawCallback" : function (settings) {
            if($('#queueTable .queueRow').length > 0){
                $('#queueIndecator').addClass('inQueue')
            } else {
                $('#queueIndecator').removeClass('inQueue');
            }
        }
    });

    $('#queueTable').on('click', '.queueCall', function(){
        var callId = $(this).attr('data-call-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/twilio/dequeue',
            data: {
                callId: callId
            },
            success: function (message) {
                console.log(message);
            }
        });
    });

    socket.on('updateQueue', function (data) {
        queueTable.draw();
    });
});
$(document).ready(function () {
    var voicemailTable = $('#recordsTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: true,
        pageLength: 10,
        ajax: {
            url: '/records/getRecords',
            type:'POST',
            data: function(d) {
                d._token = $('meta[name="csrf-token"]').attr('content');
            }
        },
        language: {
            zeroRecords:    "No data available",
        },
        columns: [
            {
                data:'checkBox'
            },
            {
                data:'date'
            },
            {
                data:'caller',
                className: 'caller'
            },
            {
                data:'call_to',
                className: 'call_to'
            },
            {
                data:'duration'
            },
            {
                data:'action',
                className: 'action-td'
            },
        ]
    });

    var selectedRecords = [];
    var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', $('.active-song').attr('data-src'));

    var tl = new TimelineMax();
    tl.to('.player__albumImg', 3, {
        rotation: '360deg',
        repeat: -1,
        ease: Power0.easeNone
    }, '-=0.2');
    tl.pause();

    $('.player__play').click(function () {
        if ($('.player').hasClass('play')) {
            $('.player').removeClass('play');
            audioElement.pause();
            TweenMax.to('.player__albumImg', 0.2, {
                scale: 1,
                ease: Power0.easeNone
            });
            tl.pause();
        } else {
            $('.player').addClass('play');
            audioElement.play();
            TweenMax.to('.player__albumImg', 0.2, {
                scale: 1.1,
                ease: Power0.easeNone
            });
            tl.resume();
        }
    });

    $('.play-file').click(function () {
        var src = $(this).attr('data-sound');
        $('.active-song').attr('data-src', src);
        audioElement.setAttribute('src', src);
        audioElement.play();
        audioElement.addEventListener("timeupdate", function () {
            var duration = this.duration;
            var currentTime = this.currentTime;
            var percentage = (currentTime / duration) * 100;
            playhead.style.width = percentage + '%';
        });
    });


    var playhead = document.getElementById("playhead");
    audioElement.addEventListener("timeupdate", function () {
        var duration = this.duration;
        var currentTime = this.currentTime;
        var percentage = (currentTime / duration) * 100;
        playhead.style.width = percentage * 4 + 'px';
    });

    function updateInfo() {
        $('.player__author').text($('.active-song').attr('data-author'));
        $('.player__song').text($('.active-song').attr('data-song'));
    }
    updateInfo();

    $('.player__next').click(function () {
        if ($('.player .player__albumImg.active-song').is(':last-child')) {
            $('.player__albumImg.active-song').removeClass('active-song');
            $('.player .player__albumImg:first-child').addClass('active-song');
            audioElement.addEventListener("timeupdate", function () {
                var duration = this.duration;
                var currentTime = this.currentTime;
                var percentage = (currentTime / duration) * 100;
                playhead.style.width = percentage * 4 + 'px';
            });
        } else {
            $('.player__albumImg.active-song').removeClass('active-song').next().addClass('active-song');
            audioElement.addEventListener("timeupdate", function () {
                var duration = this.duration;
                var currentTime = this.currentTime;
                var percentage = (currentTime / duration) * 100;
                playhead.style.width = percentage + '%';
            });
        }
        updateInfo();
        audioElement.setAttribute('src', $('.active-song').attr('data-src'));
        audioElement.play();
    });

    $('.player__prev').click(function () {
        if ($('.player .player__albumImg.active-song').is(':first-child')) {
            $('.player__albumImg.active-song').removeClass('active-song');
            $('.player .player__albumImg:last-child').addClass('active-song');
            audioElement.addEventListener("timeupdate", function () {
                var duration = this.duration;
                var currentTime = this.currentTime;
                var percentage = (currentTime / duration) * 100;
                playhead.style.width = percentage * 4 + 'px';
            });
        } else {
            $('.player__albumImg.active-song').removeClass('active-song').prev().addClass('active-song');
            audioElement.addEventListener("timeupdate", function () {
                var duration = this.duration;
                var currentTime = this.currentTime;
                var percentage = (currentTime / duration) * 100;
                playhead.style.width = percentage + 'px';
            });
        }
        updateInfo();
        audioElement.setAttribute('src', $('.active-song').attr('data-src'));
        audioElement.play();
    });

    $('#recordsTable').on('click', '.recordDel', function () {
        var self = $(this);
        var alertMessage = '';
        if(selectedRecords.length === 0){
            voiceId = self.attr('data-voice-id');
            alertMessage = 'This will remove this record from your list'
        } else {
            voiceId = selectedRecords;
            alertMessage = 'This will remove selected records from your list'
        }

        swal({
            title: "Are you sure?",
            text: alertMessage,
            type: 'warning',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Ok'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/records/delete',
                    data: {
                        voiceId: voiceId
                    },
                    success: function (message) {
                        swal({
                            type: 'success',
                            title: 'Success',
                            text: 'You have successfully removed this records'
                        });
                        // self.parents('tr').remove();
                        voicemailTable.draw();
                        $('#selectAllRecords').prop('checked', false);
                    },
                    error: function (message) {
                        if(message.status == 400) {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Something was wrong'
                            });
                        }
                    }
                });
            }
        });
    });

    $('#recordsTable').on('change', '.selectRecords', function () {
        var self = $(this);
        if(self.prop('checked')){
            selectedRecords.push(self.val());
            console.log(selectedRecords);
        } else {
            var index = selectedRecords.indexOf(self.val());
            delete selectedRecords[index];
            selectedRecords = selectedRecords.filter(function(val){return val});
        }
    });

    $('#selectAllRecords').on('change', function() {
        const checked = $(this).prop('checked');

        $('#recordsTable tbody input[type="checkbox"]').each(function (key, value) {
            const element = $(value);
            element.prop('checked', checked);
            if(checked){
                if(selectedRecords.indexOf(element.val()) === -1){
                    selectedRecords.push(element.val());
                }
            } else {
                const index = selectedRecords.indexOf(element.val());
                delete selectedRecords[index];
                selectedRecords = selectedRecords.filter(function(val){return val});
            }
        })
    });

    $('#recordsTable').on('page.dt', function () {
        selectedRecords = [];
        $('#selectAllRecords').prop('checked', false);
    });

    $('#setDisturbMode').change(function (e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/agents',
            data: {
                ajax: 'set_disturb_mode'
            },
            success: function (response) {
                console.log(response);
            }
        });
    });

    $('#setVoipMode').change((e) => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/agents',
            data: {
                ajax: 'set_voip_mode'
            },
            success: function (response) {
                if(response.status === 'error'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: response.message
                    });

                    $(e.target).prop('checked', false);
                }
            }
        });
    });
});

let selectedVoiceMails = [];
var voicemailTable = $('#voicemailTable').DataTable({
    processing: true,
    serverSide: true,
    searching: false,
    lengthChange: false,
    info: false,
    ordering: false,
    paging: true,
    pageLength: 10,
    ajax: {
        url: '/voicemail/get',
        type:'POST',
        data: function(d) {
            d._token = $('meta[name="csrf-token"]').attr('content');
        }
    },
    language: {
        zeroRecords:    "No data available",

    },
    columns: [
        {
            data:'checkBox'
        },
        {
            data:'date'
        },
        {
            data:'caller',
            className: 'caller'
        },
        {
            data:'duration'
        },
        {
            data:'action',
            className: 'action-td'
        }
    ]
});

$(document).ready(function () {
    $('#voicemailTable').on('click', '.voiceMailDel', function () {
        var self = $(this);
        if(selectedVoiceMails.length === 0){
            voiceId = self.attr('data-voice-id');
            alertMessage = 'This will remove this voice mail from your list'
        } else {
            voiceId = selectedVoiceMails;
            alertMessage = 'This will remove selected voice mails from your list'
        }

        swal({
            title: "Are you sure?",
            text: alertMessage,
            type: 'warning',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Ok'})
            .then(function(result) {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/voicemail/delete',
                        data: {
                            voiceId: voiceId
                        },
                        success: function (message) {
                            swal({
                                type: 'success',
                                title: 'Success',
                                text: 'You have successfully removed this voicemail'
                            });
                            self.parents('tr').remove();
                            voicemailTable.draw();
                            selectedVoiceMails = [];
                            $('#selectAllVoicemail').prop('checked', false);
                        },
                        error: function (message) {
                            if(message.status == 400)
                            {
                                swal({
                                    type: 'error',
                                    title: 'Error',
                                    text: 'Something was wrong'
                                });
                            }
                        }
                    });
                }
            });
    });

    $('#selectAllVoicemail').on('change', function() {
        const checked = $(this).prop('checked');

        $('#voicemailTable tbody input[type="checkbox"]').each(function (key, value) {
            const element = $(value);
            element.prop('checked', checked);
            if(checked){
                if(selectedVoiceMails.indexOf(element.val()) === -1){
                    selectedVoiceMails.push(element.val());
                }
            } else {
                const index = selectedVoiceMails.indexOf(element.val());
                delete selectedVoiceMails[index];
                selectedVoiceMails = selectedVoiceMails.filter(function(val){return val});
            }
        })
    });

    $('#voicemailTable').on('page.dt', function () {
        selectedVoiceMails = [];
        $('#selectAllVoicemail').prop('checked', false);
    });

    $('#voicemailTable').on('change', 'tbody input[type="checkbox"]', function () {
        const self = $(this);

        if(self.prop('checked')){
            selectedVoiceMails.push(self.val());
        } else {
            const index = selectedVoiceMails.indexOf(self.val());
            delete selectedVoiceMails[index];
            selectedVoiceMails = selectedVoiceMails.filter(function(val){return val});
        }
    });

    $('#voicemailTable').on('click', '.getTranscription', function () {
        const voiceId = $(this).attr('data-voice-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/voicemail',
            data: {
                id: voiceId,
                ajax: 'get_transcription'
            },
            success: function (response) {
                if(response.status === 'success'){
                    $('#transcriptionText').text(response.transcription);
                    window.location.href = '#voiceTranscription'
                } else {
                    swal({
                        type: 'error',
                        title: 'Something went wrong',
                        text: response.message
                    });
                }
            }
        });
    });
});

$(document).ready(function () {
    var reportTable;
    var defaultColumns = [
        {
            data:'from',
            className: 'left aligned collapsing'
        },
        {
            data:'to',
            className: 'left aligned collapsing'
        },
        {
            data:'duration',
            className: 'left aligned collapsing'
        },
        {
            data:'talktime',
            className: 'left aligned collapsing'
        },
        {
            data:'status',
            className: 'left aligned collapsing'
        },
        {
            data:'date',
            className: 'left aligned collapsing'
        },
        {
            data:'time',
            className: 'left aligned collapsing'
        }
    ];
    var columns = defaultColumns;
    var head = ' <th class="left aligned collapsing {COLUMN} wide" id="fromColumn">'+
                    '<label>{NAME}</label>' +
                '</th>';

    $('#runReport').click(function () {
        if(reportTable !== undefined){
            reportTable.destroy();
            $('#cdrTable tbody tr').remove();
        }

        var sourceFilter = $('#sourceNumber').prop('checked');
        var destFilter = $('#destNumber').prop('checked');
        var statusFilter = $('#statusNumber').prop('checked');
        var dateFilter = $('#dateColumn').prop('checked');
        var durationFilter = $('#durationColumn').prop('checked');
        var talktimeFilter = $('#talktimeColumn').prop('checked');
        $('#cdrTable thead th').remove();

        if(sourceFilter || destFilter || statusFilter || dateFilter || durationFilter || talktimeFilter){
            var columnFilter = [];

            if(sourceFilter){
                columnFilter.push({
                    data:'from',
                    className: 'left aligned collapsing'
                });
                var classHead = head.replace(/{COLUMN}/gi, 'three');
                var titleHead = classHead.replace(/{NAME}/gi, 'From');
                $('#cdrTable thead tr').append(titleHead);
            }

            if(destFilter){
                columnFilter.push({
                    data:'to',
                    className: 'left aligned collapsing'
                });
                var classHead = head.replace(/{COLUMN}/gi, 'three');
                var titleHead = classHead.replace(/{NAME}/gi, 'To');
                $('#cdrTable thead tr').append(titleHead);
            }

            if(durationFilter){
                columnFilter.push({
                    data:'duration',
                    className: 'left aligned collapsing'
                });
                var classHead = head.replace(/{COLUMN}/gi, 'two');
                var titleHead = classHead.replace(/{NAME}/gi, 'Duration');
                $('#cdrTable thead tr').append(titleHead);
            }

            if(talktimeFilter){
                columnFilter.push({
                    data:'talktime',
                    className: 'left aligned collapsing'
                });
                var classHead = head.replace(/{COLUMN}/gi, 'two');
                var titleHead = classHead.replace(/{NAME}/gi, 'Talktime');
                $('#cdrTable thead tr').append(titleHead);
            }

            if(statusFilter){
                columnFilter.push({
                    data:'status',
                    className: 'left aligned collapsing'
                });
                var classHead = head.replace(/{COLUMN}/gi, 'two');
                var titleHead = classHead.replace(/{NAME}/gi, 'Status');
                $('#cdrTable thead tr').append(titleHead);
            }

            if(dateFilter){
                columnFilter.push({
                    data:'date',
                    className: 'left aligned collapsing'
                }, {
                    data:'time',
                    className: 'left aligned collapsing'
                });
                var classHead = head.replace(/{COLUMN}/gi, 'two');
                var titleHead = classHead.replace(/{NAME}/gi, 'Date');
                $('#cdrTable thead tr').append(titleHead);
                var classHead = head.replace(/{COLUMN}/gi, 'two');
                var titleHead = classHead.replace(/{NAME}/gi, 'Time');
                $('#cdrTable thead tr').append(titleHead);
            }

            columns = columnFilter;
        } else {
            var classHead = head.replace(/{COLUMN}/gi, 'three');
            var titleHead = classHead.replace(/{NAME}/gi, 'From');
            $('#cdrTable thead tr').append(titleHead);

            var classHead = head.replace(/{COLUMN}/gi, 'three');
            var titleHead = classHead.replace(/{NAME}/gi, 'To');
            $('#cdrTable thead tr').append(titleHead);

            var classHead = head.replace(/{COLUMN}/gi, 'two');
            var titleHead = classHead.replace(/{NAME}/gi, 'Duration');
            $('#cdrTable thead tr').append(titleHead);

            var classHead = head.replace(/{COLUMN}/gi, 'two');
            var titleHead = classHead.replace(/{NAME}/gi, 'Talktime');
            $('#cdrTable thead tr').append(titleHead);

            var classHead = head.replace(/{COLUMN}/gi, 'two');
            var titleHead = classHead.replace(/{NAME}/gi, 'Status');
            $('#cdrTable thead tr').append(titleHead);

            var classHead = head.replace(/{COLUMN}/gi, 'two');
            var titleHead = classHead.replace(/{NAME}/gi, 'Date');
            $('#cdrTable thead tr').append(titleHead);

            var classHead = head.replace(/{COLUMN}/gi, 'two');
            var titleHead = classHead.replace(/{NAME}/gi, 'Time');
            $('#cdrTable thead tr').append(titleHead);
            columns = defaultColumns;
        }

        reportTable = $('#cdrTable').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            info: false,
            ordering: false,
            paging: true,
            pageLength: 20,
            responsive: true,
            ajax: {
                url: '/agents',
                type: 'POST',
                data: function (d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                    d.ajax = 'agent_report';
                    d.incomingFilter = $('#inboundCall').prop('checked');
                    d.outgoingFilter = $('#outboundCall').prop('checked');
                    d.queueFilter = $('#queueCall').prop('checked');
                    d.conferenceFilter = $('#conferenceCall').prop('checked');
                    d.interOfficeFilter = $('#interofficeCall').prop('checked');
                    d.startAt = $('#startAtFilter').val();
                    d.endAt = $('#endAtFilter').val();
                }
            },
            columns: columns,
            "createdRow": function(row, data) {
                switch (data.code) {
                    case 'incoming':
                        $(row).css('background-color', '#c7d9ff');
                        $(row).find('td i').addClass('icon long arrow alternate down');
                        break;
                    case 'outgoing':
                        $(row).css('background-color', '#cfffaf');
                        $(row).find('td i').addClass('icon long arrow alternate up');
                        break;
                    case 'queue':
                        $(row).css('background-color', '#f9ecbf');
                        $(row).find('td i').addClass('icon random');
                        break;
                    case 'clients':
                        $(row).css('background-color', '#dfbcff');
                        $(row).find('td i').addClass('icon ellipsis horizontal');
                        break;
                    case 'conference':
                        $(row).css('background-color', '#f9cc8a');
                        $(row).find('td i').addClass('icon retweet');
                        break;
                }
            }
        });
    });
});

const ccMaiBlock = '<div class="field mailField">' +
    '                    <div class="ui icon input">' +
    '                        <input type="email" placeholder="Email" name="emails[]">' +
    '                        <i class="red inverted circular minus link icon removeCcMails"></i>' +
    '                    </div>' +
    '                </div>';

$(document).ready(function () {
    $('#saveProfile').click(function () {
        var form = document.forms.agentForm;
        var formData = new FormData(form);
        $('.error').remove();

        $.ajax({
           type: 'POST',
           contentType: false,
           processData: false,
           url: '/profile',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: formData,
           success: function (response) {
                if(response.status === 'error'){
                    $.each(response.errors, function (key, value) {
                        var errorBlock = $('input[name="'+key+'"], select[name="'+key+'"]').parent('.field')
                            .append('<div class="ui error message" style="display: block; margin-bottom: 1em">' +
                                        '<p>'+value[0]+'</p>' +
                                    '</div>');
                    });
                }

                if(response.status === 'vociemailError'){
                    $.each(response.errors, function (key, value) {
                        var errorBlock = $('input[name="voicemail['+key+']"], select[name="voicemail['+key+']"]').parent('.field, .checkbox')
                            .append('<div class="ui error message" style="display: block; margin-bottom: 1em">' +
                                        '<p>'+value[0]+'</p>' +
                                    '</div>');
                    });
                }

                if(response.status === 'success'){
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully updated personal information.a'
                    });

                    if(response.data['avatar'] !== undefined){
                        $('.profileImage').attr('src', response.data['avatar']);
                    }

                    if(response.data['ringtone'] !== undefined){
                        $('.ringtone').text(response.data['ringtone']);
                    }

                    if(response.data['prompt'] !== undefined){
                        $('.voicemail-prompt').text(response.data['prompt']);
                    }
                }
                if(response.status === 'systemError'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
           }
        });
    });

    $('#showCCPopup').click(() => {
        $.ajax({
            type: 'POST',
            data: {
                ajax: 'get_cc_emails'
            },
            url: '/agents',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                $('#ccForm .fields').html(response.html);
                $("#ccMailsModal").modal('show');
            }
        });
    });

    $('#moreCcMails').click(() => {
        $('#ccMailsModal form .fields').append(ccMaiBlock);
    });

    $('body').on('click', '.removeCcMails', function (e) {
        if(this.hasAttribute('data-id')){
            const id = $(this).attr('data-id');

            $.ajax({
                type: 'POST',
                url: '/agents',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    ajax: 'remove_cc_email'
                },
                success: (response) => {
                    if(response.status === 'success'){
                        $(this).parents('.mailField').remove();
                        if(response.count > 0){
                            $('#showCCPopup').text(`You have ${response.count} CC emails.`);
                        } else {
                            $('#showCCPopup').text('Add CC emails');
                        }

                        if($('.mailField').length === 0){
                            $('#ccMailsModal form .fields').append(ccMaiBlock);
                        }
                    } else {
                        swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Incorrect Email'
                        })
                    }
                }
            });
        } else {
            if($('.mailField').length > 1){
                $(this).parents('.mailField').remove();
            }
        }

    });

    $('#saveCcMails').click(function (e) {
        e.stopPropagation();
        const form = document.forms.ccForm;
        const formData = new FormData(form);
        formData.append('ajax', 'add_cc_mails');

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            url: '/agents',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: (response) => {
                if(response.status === 'success'){
                    if(response.count > 0){
                        $('#showCCPopup').text(`You have ${response.count} CC emails.`)
                    }

                    $("#ccMailsModal").modal('hide');
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Incorrect input data'
                    })
                }
            }
        });
    });

    $('#cancel').click(() => {
       window.location.href = '#';
    });
});

$(document).ready(function () {
    var notesTable = $('#notesTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: false,
        ajax: {
            url: '/notes',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(d) {
                d.ajax = 'get_all_notes'
            }
        },
        language: {
            zeroRecords:    "No data available",

        },
        columns: [
            {
                data:'title'
            },
            {
                data: 'remove',
                className: 'center aligned collapsing'
            }
        ]
    });

    $('.add-note-btn').click(function () {
        $('#notepopup #addNoteTitle').val('');
        $('#notepopup #addNoteText').val('');
        $('#notepopup #addNoteId').prop('disabled', true).val('');
        window.location.href = '#notepopup';
    });

    $('#addNote').click(function () {
        var form = document.forms.addNoteForm;
        var formData = new FormData(form);
        formData.append('ajax', 'create');
        $('#addNoteForm .error').remove();

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            url: '/notes',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if (response.status === 'error') {
                    $.each(response.errors, function (key, value) {
                        var errorBlock = $('input[name="'+key+'"], textarea[name="'+key+'"]').parent('.field')
                            .append('<div class="ui error message" style="display: block; margin-bottom: 1em; width: 95%;">' +
                                '<p style="margin: 0">'+value[0]+'</p>' +
                                '</div>');
                    });
                } else {
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully updated your note list'
                    });
                    $('#noteList').html(response.html);
                    window.location.href = '#';
                }
            }
        });
    });

    $('#noteList, #notesTable').on('click', '.viewNoteInfo' ,function () {
        var id = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/notes',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                ajax: 'get_note'
            },
            success: function (response) {
                if(response.status === 'success'){
                    $('#viewnote #noteTitle').text(response.note.title);
                    $('#viewnote #noteText').text(response.note.text);
                    window.location.href = '#viewnote';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    $('#viewAllNotes').click(function () {
        notesTable.draw();
        window.location.href = '#allnotes'
    });

    $('#notesTable').on('click', '.remove_note', function () {
        var id = $(this).attr('data-id');

        swal({
            title: "Are you sure?",
            text: 'This will remove this note from your list',
            type: 'warning',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Ok'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '/notes',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        ajax: 'remove_note'
                    },
                    success: function (response) {
                        if(response.status === 'success'){
                            swal({
                                type: 'success',
                                title: 'Success',
                                text: 'You have successfully removed this note'
                            });
                            $('#noteList').html(response.html);
                            notesTable.draw();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Something was wrong'
                            });
                        }
                    }
                });
            }
        });
    });

    $('#notesTable').on('click', '.edit_note', function () {
        var id = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/notes',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                ajax: 'get_note'
            },
            success: function (response) {
                if(response.status === 'success'){
                    $('#notepopup #addNoteTitle').val(response.note.title);
                    $('#notepopup #addNoteText').val(response.note.text);
                    $('#notepopup #addNoteId').prop('disabled', false).val(response.note.id);
                    window.location.href = '#notepopup';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });
});

$(document).ready(function () {
    var faxTable = $('#faxTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: false,
        ajax: {
            url: '/fax',
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(d) {
                d.ajax = 'get_incoming_faxes'
            }
        },
        language: {
            zeroRecords:    "No data available",

        },
        columns: [
            {
                data:'date'
            },
            {
                data:'from',
                className: 'faxFrom'
            },
            {
                data:'pages'
            },
            {
                data:'status'
            },
            {
                data:'action'
            }
        ]
    });


    var faxOutgoingTable = $('#faxOutgoingTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: false,
        ajax: {
            url: '/fax',
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(d) {
                d.ajax = 'get_outgoing_faxes'
            }
        },
        language: {
            zeroRecords:    "No data available",

        },
        columns: [
            {
                data:'date'
            },
            {
                data:'from',
                className: 'faxFrom'
            },
            {
                data:'pages'
            },
            {
                data:'status'
            },
            {
                data:'action'
            }
        ]
    });

    $("#sendFaxForm input:text, #fileName").click(function () {
        $(this).parent().find("input:file").click();
    });


    $('#sendFaxForm input:file').on('change', function (e) {
        let name = e.target.files[0].name + ' (' + (e.target.files[0].size / 1000).toFixed(1) + 'Kb)';
        $('input:text', $(e.target).parent()).val(name);
    });

    $('.js-masked-phone').mask('+1 (999) 999-9999');
    $('.js-masked-phone-ext').mask('+1 (999) 999-9999? x99999');

    $('body').on('click', '#sendFaxBtn', function () {
        var form = document.forms.sendFaxForm;

        var formData = new FormData(form);

        formData.append('ajax', 'send');

        $('#sendFaxForm .error').remove();

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            url: '/fax',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if(response.status === 'validError'){
                    $.each(response.errors, function (key, value) {
                        var errorBlock = $('#sendFaxForm input[name="' + key + '"], #sendFaxForm select[name="' + key + '"]').parents('.field')
                            .append('<div class="ui error message" style="display: block; margin-bottom: 1em; width: 100%;">' +
                                '<p style="margin: 0">' + value[0] + '</p>' +
                                '</div>');
                    })
                } else if(response.status === 'success'){
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully sent fax'
                    });
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            }
        });
    });

    $('#faxTable').on('click', '.removeFax', function () {
       var id = $(this).attr('data-id');

        swal({
            title: "Are you sure?",
            text: 'This will remove this contact from your list',
            type: 'warning',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Ok'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '/fax',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        ajax: 'remove'
                    },
                    success: function (response) {
                        if(response.status === 'success'){
                            swal({
                                type: 'success',
                                title: 'Success',
                                text: 'You have successfully removed this note'
                            });

                            faxTable.draw();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Something was wrong'
                            });
                        }
                    }
                });
            }
        });
    });

    $('#faxTable').on('click', '.reply', function () {
        var phone = $(this).parents('tr').find('.faxFrom').text();
        $.tab('change tab', 'three3');
        $('.fax.menu .item.active').removeClass('active');
        $('.fax.menu .item[data-tab="three3"]').addClass('active');
        $('#faxTo').val(phone);
    });
});
jQuery(document).ready(function(){
    jQuery('#head .ui .menu .item').on('click', function() {
        jQuery('#head .ui .menu .item').removeClass('active');
        jQuery(this).addClass('active');
    });
});


// --------------------------------------------------------------------------------------------------------------------------------
$("#mykey, #keypadPopup").click(function () {
    console.log(1);
    $(".pad").show("slow");
});

$('.number-dig').click(function(){
    //add animation
    addAnimationToButton(this);
    //add number
    if(!$('.pad').hasClass('inCall')){
        var currentValue = $('.phoneString input').val();
        var valueToAppend = $(this).attr('name');
        $('.phoneString input').val(currentValue + valueToAppend);

        // checkNumber();
    }

});


var timeoutTimer = true;
var timeCounter = 0;
var timeCounterCounting = true;

$('.action-dig').click(function(){
    //add animation
    addAnimationToButton(this);
    if($(this).hasClass('goBack')){
        var currentValue = $('.phoneString input').val();
        var newValue = currentValue.substring(0, currentValue.length - 1);
        $('.phoneString input').val(newValue);
        // checkNumber();
    }else if($(this).hasClass('call')){
        if($('.call-pad').hasClass('in-call')){
            setTimeout(function(){
                setToInCall();
            }, 500);
            timeCounterCounting = false;
            timeCounter = 0;
            hangUpCall();
            $('.pulsate').toggleClass('active-call');
            $('#reject_current_call').click();
            $('.phoneString input').val('');
            // checkNumber();
        }
    }else{

    }
});

var timeCounterLoop = function(){

    if(timeCounterCounting){
        setTimeout(function(){
            var timeStringSeconds = '';
            var minutes = Math.floor(timeCounter/60.0);
            var seconds = timeCounter%60;
            if(minutes < 10){
                minutes = '0' + minutes;
            }
            if(seconds < 10){
                seconds = '0' + seconds;
            }
            $('.ca-status').text(minutes + ':' + seconds);

            timeCounter += 1;

            timeCounterLoop();
        }, 2000);
    }
};

var setToInCall = function(){
    $('.call-pad').toggleClass('in-call');
    $('.call-icon').toggleClass('in-call');
    $('.call-change').toggleClass('in-call');
    $('.ca-avatar').toggleClass('in-call');
};

var dots = 0;
var looper = function(){
    if(timeoutTimer){

        setTimeout(function(){
            if(dots > 3){
                dots = 0;
            }
            var dotsString = '';
            for(var i = 0; i < dots; i++){
                dotsString += '.';
            }
            $('.ca-status').attr('data-dots',dotsString);
            dots += 1;

            looper();
        }, 500);
    }
};

var hangUpCall = function(){
    timeoutTimer = false;
};

var addAnimationToButton = function(thisButton){
    //add animation
    $(thisButton).removeClass('clicked');
    var _this = thisButton;
    setTimeout(function(){
        $(_this).addClass('clicked');
    },1);
};


var showUserInfo = function(userInfo){
    $('.avatar').attr('style', "background-image: url("+userInfo.image+")");
    if(!$('.contact').hasClass('showContact')){
        $('.contact').addClass('showContact');
    }
    $('.contact-name').text(userInfo.name);
    $('.contact-position').text(userInfo.desc);
    var matchedNumbers = $('.phoneString input').val();
    var remainingNumbers = userInfo.number.substring(matchedNumbers.length);
    $('.contact-number').html("<span>"+matchedNumbers+"</span>" + remainingNumbers);

    //update call elements
    $('.ca-avatar').attr('style', 'background-image: url('+userInfo.image+')');
    $('.ca-name').text(userInfo.name);
    $('.ca-number').text(userInfo.number);

};

var hideUserInfo = function(){
    $('.contact').removeClass('showContact');
};


// ------------------------------------------------------------------------------------------------------------
$("#mykey").click(function(e){
    $(".pad").show();
    e.stopPropagation();
});
$("body").on('click', '#keypadPopup', function (e) {
    $(".pad").show();
    e.stopPropagation();
});
$("body").on('click', '#closeKey', function (e) {
    $(".pad").hide();
    e.stopPropagation();
});

$(".pad").click(function(e){
    e.stopPropagation();
});

$(document).keydown(function(e){
    if(e.keyCode === 27){
        $(".pad").hide();
    }
});
$('#closeKey').click(function () {
    $(".pad").hide();
});
function clearText()
{
    document.getElementById('textclear').value = "";
}

// ------------------------------------------------------------------------------------------------------------


$(document).ready(function () {
    const loader = '<div class="ui active centered text inline loader" id="contactLoader">Searching</div>';

   $('.contactAvatar').change(function () {
       readURL(this, $('#profileImage'))
   });

    $('#saveContact').click(function () {
        var form = document.forms.contactForm;
        var formData = new FormData(form);
        formData.append('ajax', 'create');
        $('#contactForm .error').remove();

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if (response.status === 'validError') {
                    $.each(response.errors, function (key, value) {
                        if(key === 'avatar'){
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Wrong image'
                            });
                        } else {
                            var errorBlock = $('input[name="'+key+'"], select[name="'+key+'"]').parent('.field')
                                .append('<div class="ui error message" style="display: block; margin-bottom: 1em; width: 95%;">' +
                                    '<p style="margin: 0">'+value[0]+'</p>' +
                                    '</div>');
                        }
                    });
                } else if (response.status === 'error') {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                } else {
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully added new contact'
                    });
                    $('#contactBlock').html(response.html);
                    window.location.href = '#';
                }
            }
        });
    });

    $('#contactBlock').on('click', '.show-contact', function () {
       var id = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                ajax: 'get_contact',
                view: 'view'
            },
            success: function (response) {
                if(response.status === 'success'){
                    $('#viewcontact').html(response.html);
                    window.location.href = '#viewcontact';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    $('#viewcontact').on('click', '#editProfile', function () {
        var id = $('#viewcontact #contactId').val();

        $.ajax({
            type: 'POST',
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                ajax: 'get_contact',
                view: 'edit'
            },
            success: function (response) {
                if(response.status === 'success'){
                    $('#editcontact').html(response.html);
                    window.location.href = '#editcontact';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    $('#editcontact').on('click', '#updateContact', function () {
        var form = document.forms.editContactForm;
        var formData = new FormData(form);
        formData.append('ajax', 'update');
        formData.append('id', $(this).attr('data-id'));
        $('#editContactForm .error').remove();

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if(response.status === 'success'){
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully updated this contact'
                    });
                    $('#contactBlock').html(response.html);
                    window.location.href = '#';
                } else if (response.status === 'validError') {
                    $.each(response.errors, function (key, value) {
                        if (key === 'avatar') {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Wrong image'
                            });
                        } else if (key === 'id') {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Wrong contact'
                            });
                        } else {
                            var errorBlock = $('input[name="' + key + '"], select[name="' + key + '"]').parent('.field')
                                .append('<div class="ui error message" style="display: block; margin-bottom: 1em; width: 95%;">' +
                                    '<p style="margin: 0">' + value[0] + '</p>' +
                                    '</div>');
                        }
                    })
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    $('#viewcontact').on('click', '#deleteContact', function () {
        var id = $('#viewcontact #contactId').val();

        swal({
            title: "Are you sure?",
            text: 'This will remove this contact from your list',
            type: 'warning',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Ok'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '/contacts',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        ajax: 'remove'
                    },
                    success: function (response) {
                        if(response.status === 'success'){
                            $('#contactBlock').html(response.html);
                            window.location.href = '#';
                            swal({
                                type: 'success',
                                title: 'Success',
                                text: 'You have successfully removed this contact'
                            });
                        } else {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Something was wrong'
                            });
                        }
                    }
                });
            }}
        );
    });

    $('#viewcontact').on('click', '#contactMail', function () {
        var id = $('#viewcontact #contactId').val();

        Swal({
            title: 'Message',
            input: 'textarea',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Send'
        }).then(function (value) {
            if(value.dismiss !== 'cancel'){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/contacts',
                    data: {
                        ajax: 'mail',
                        text: value.value,
                        id: id
                    },
                    success: function (response) {
                        if(response.status === 'success'){
                            swal({
                                type: 'success',
                                title: 'Success',
                                text: 'You have successfully sent email'
                            });
                        } else {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    }
                });
            }
        });
    });

    $('#editcontact').on('click', '.name', function () {
       $('#editContactAvatar').click();
    });

    $('#editcontact').on('change', '#editContactAvatar', function () {
        if($('#editcontact .name span').length > 0){
            $('#editcontact .name').html('<img src="" alt="">');
        }

        readURL(this, $('#editcontact .name img'));
    });

    $('#contactFileDrag').click(() => {
       $('#contactFileInput').click();
    });

    $('#contactFileInput').change(function(e) {
        if(this.files.length) {
            readImportFile(this.files[0]);
        }
    });

    $('#contactFileDrag').on('dragover', function (e) {
        e.preventDefault();
        $(this).addClass('hover');
    });

    $('#contactFileDrag').on('dragleave', function (e) {
        e.preventDefault();
        $(this).removeClass('hover');
    });

    $('#contactFileDrag').on('drop', function (e) {
        e.preventDefault();
        $(this).removeClass('hover');
        const file =  e.originalEvent.dataTransfer.files[0];
        readImportFile(file);
    });

    $('#importPrivateContacts').click(function() {
        const form = document.forms.contactsImportData;
        const formData = new FormData(form);
        formData.append('ajax', 'save_import_data');

        importData(formData);
    });

    $('#importPublicContacts').click(function() {
        const form = document.forms.contactsImportData;
        const formData = new FormData(form);
        formData.append('ajax', 'save_import_data');
        formData.append('is_public', true);

        importData(formData);
    });

    $('body').on('click', '#downloadInvalidContacts', () => {
        const form = document.forms.contactsImportData;
        const formData = new FormData(form);
        formData.append('ajax', 'invalid_data_link');

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if(response.status === 'success'){
                    window.open(response.url, '_blank');
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: "You doesn't have incorrect fields"
                    });
                }
            }
        })
    });

    $('#contactSearch').keyup(function () {
        const value = $(this).val();

        if($('#contactBlock .loader').length === 0){
            $('#contactBlock').html(loader);
        }

        $.ajax({
            type: 'POST',
            url: '/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                ajax: 'search',
                search: value
            },
            success: function (response) {
                if(response.status === 'success'){
                    $('#contactBlock').html(response.html);
                }
            }
        })
    });

    //ADD CONTACT NOTE

    $('#viewcontact').on('click', '#addNote', function() {
        var dataId = $('#contactId').val();

        $('#saveNote').attr('data-id', dataId);
    });

    $('#addContactNote').on('click', '#saveNote', function () {
        var contactId = $(this).attr('data-id');
        var noteText = $(this).parent().find('textarea').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post(
            '/addContactNote',
            {
                contactId: contactId,
                noteText: noteText
            },
            function(response) {
                if (response.status == 'success') {
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully added new note'
                    });

                    window.location.href = '#';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: response.errors.noteText
                    });
                }
            }
        )
    });

    //VIEW CONTACT NOTES TABLE

    var contactNotesTable = $('#contactNotesTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: false,
        ajax: {
            url: '/showContactNotes',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(data) {
                var contactId = $('#contactId').val();

                data.contactId = contactId;
            }
        },
        language: {
            zeroRecords: "No data available",
        },
        columns: [
            {
                data: 'text'
            },
            {
                data: 'date'
            },
            {
                data: 'actions',
                className: 'center aligned collapsing'
            }
        ]
    });

    $('#viewcontact').on('click', '#showContactNotes', function() {
        contactNotesTable.draw();
    });

    //VIEW CONTACT NOTE

    $('#contactNotesTable').on('click', '.viewNoteInfo', function () {
        var noteId = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/showContactNote',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                noteId: noteId
            },
            success: function (response) {
                if (response.status === 'success') {
                    $('#contactNoteText').text(response.note.note_text);
                    window.location.href = '#viewContactNote';

                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    //EDIT CONTACT NOTE

    $('#contactNotesTable').on('click', '.edit_note', function () {
        var noteId = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/showContactNote',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                noteId: noteId
            },
            success: function (response) {
                if (response.status === 'success') {
                    $('#editContactNote textarea').val(response.note.note_text);
                    $('#saveNoteChanges').attr('data-note-id', response.note.id);
                    window.location.href = '#editContactNote';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    $('#editContactNote').on('click', '#saveNoteChanges', function() {
        var noteId = $('#saveNoteChanges').attr('data-note-id');
        var noteText = $(this).parent().find('textarea').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post(
            '/editContactNote',
            {
                noteId: noteId,
                noteText: noteText
            },
            function(response) {
                if (response.status == 'success') {
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'You have successfully updated your note'
                    });

                    window.location.href = '#';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: response.errors.noteText
                    });
                }
            }
        )
    });

    //DELETE CONTACT NOTE
    $('#contactNotesTable').on('click', '.remove_note', function () {
        var noteId = $(this).attr('data-id');

        swal({
            title: "Are you sure?",
            text: 'This will remove this note from your list',
            type: 'warning',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Ok'
        }).then(function(result) {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post(
                    '/removeContactNote',
                    {
                        noteId: noteId
                    },
                    function (response) {
                        if(response.status === 'success'){
                            swal({
                                type: 'success',
                                title: 'Success',
                                text: 'You have successfully removed this note'
                            });
                            contactNotesTable.draw();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Something was wrong'
                            });
                        }
                    }
                );
            }
        });
    });

    // CONTACTS PAGINATION
    $('body').on('click', '.contact-info .pagination .item', function() {
        var splitHref = $(this).attr('href').split('=');

        var pageNumber = splitHref[1];

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post(
            '/getContactsPage',
            {
                page: pageNumber
            },
            function (response) {
                if(response.status === 'success') {
                    $('#contactBlock').html(response.html);
                    window.location.href = '#';
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Invalid page'
                    });
                }
            }
        );

        return false;
    });

});

function readURL(input, imageBlock) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            imageBlock.attr('src', e.target.result).addClass('uploaded');
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readImportFile(file){
    const formData = new FormData();
    formData.append('file', file);
    formData.append('ajax', 'read_file');
    $('#contactFileDrag i').removeClass('upload').addClass('spinner').addClass('loading');

    $.ajax({
        type: 'POST',
        contentType: false,
        processData: false,
        url: '/contacts',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success: function (response) {
            $('#contactFileDrag i').removeClass('spinner').removeClass('loading').addClass('upload');
            if(response.status === 'success') {
                if (response.html) {
                    $('#contactFileContent .content').html(response.html);
                    window.location.href = '#contactFileContent';
                } else {
                    window.location.href = '#contactLargeExcelFileContent';

                    $('#importPrivateLargeExcelContacts').click(function(e) {
                        importBigData(formData);
                    });

                    $('#importPublicLargeExcelContacts').click(function(e) {
                        formData.append('is_public', true);

                        importBigData(formData);
                    });
                }
            } else {
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Invalid file'
                });
            }
        }
    })
}

function importBigData(formData) {
    $.ajax({
        type: 'POST',
        contentType: false,
        processData: false,
        url: '/readLargeExcelFile',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success: function (response) {
            if(response.status === 'success'){
                swal({
                    type: 'success',
                    title: 'Success',
                    text: 'You have successfully imported new contacts'
                });

                $('#contactBlock').html(response.html);
                window.location.href = '#';
            } else {
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Something was wrong'
                });
            }
        }
    })
}

function importData(formData) {
    $.ajax({
        type: 'POST',
        contentType: false,
        processData: false,
        url: '/contacts',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success: function (response) {
            if(response.status === 'error'){
                swal({
                    title: "Warning.",
                    text: 'You have incorrect values in your data. We will ignore it',
                    type: 'warning',
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    confirmButtonText: 'Import',
                    cancelButtonText: 'Edit data'
                }).then((confirm) => {
                    if(confirm.dismiss){
                        $('#contactFileContent .content').html(response.html);
                    } else {
                        formData.append('skipInvalid', true);
                        importData(formData);
                    }
                })
            } else {
                swal({
                    type: 'success',
                    title: 'Success',
                    text: 'You have successfully imported new contacts'
                });
                $('#contactBlock').html(response.html);
                window.location.href = '#';
            }
        }
    })
}

// CONFERENCE

var conferenceNumberBlock = ' <div class="field removable">' +
    '<i class="plus circle large blue icon addConferenceNumber"></i>' +
    '<i class="minus circle large red icon removeConferenceNumber"></i>' +
    '<input type="text" class="conferenceNumber">' +
    '</div>';
$(document).ready(function () {
    var conferenceTable = $('#conferenceTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthChange: false,
        info: false,
        ordering: false,
        paging: false,
        ajax: {
            url: '/conference',
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(d) {
                d.ajax = 'get_conferences'
            }
        },
        language: {
            zeroRecords:    "No data available",

        },
        columns: [
            {
                data:'name'
            },
            {
                data:'total',
                className: 'center aligned collapsing'
            },
            {
                data:'online',
                className: 'center aligned collapsing'
            },
            {
                data:'join',
                className: 'center aligned collapsing'
            }
        ]
    });

    $('#conferenceAgent').dropdown();

    $('#mobileConference, #mobileMakeConference').click(function () {
        var menu = $('#menu').data("mmenu");
        menu.close();
    });

    $('#conferenceNumbers').on('click', '.addConferenceNumber', function (e) {
        e.stopPropagation();
        $('#conferenceNumbers').append(conferenceNumberBlock);
    });

    $('#conferenceNumbers').on('click', '.removeConferenceNumber', function () {
        $(this).parents('.field').remove();
    });

    $('#addConference').click(function () {
        var self = $(this);
        self.addClass('loading');
        var conferenceName = $('#conferenceName').val();
        var conferenceAgents = $('#conferenceAgent').val();
        var conferenceDigits = $('#conferenceDigits').val();
        var conferenceRemove = $('#deleteAfterEnd').prop('checked');
        var conferenceNumbers = [];

        $('.conferenceNumber').each(function (key, value) {
            if($(value).val() !== '' && $(value).val() !== undefined && $(value).val() !== null){
                conferenceNumbers.push($(value).val());
            }
        });

        $('#createConferenceModel').find('.field').removeClass('error').find('.error.message').remove();

        $.ajax({
            type: 'POST',
            url: '/conference',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                ajax: 'make_conference',
                name: conferenceName,
                agents: conferenceAgents,
                remove: conferenceRemove,
                numbers: conferenceNumbers,
                password: conferenceDigits
            },
            success: function (response) {
                self.removeClass('loading');
                if(response.status === 'success'){
                    conferenceTable.draw();
                    swal({
                        title: "Success",
                        text: 'You have successfully added new conference',
                        type: 'success'
                    });

                    $('#createConferenceModel').modal('hide');
                }

                if(response.status === 'error'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }

                if(response.status === 'validError'){
                    $.each(response.errors, function (key, value) {
                        if(key === 'name'){
                            var errorField = $('#conferenceName');
                        }
                        if(key === 'agents'){
                            var errorField = $('#conferenceAgent');
                        }
                        if(key === 'password'){
                            var errorField = $('#conferenceDigits');
                        }

                        errorField.parents('.field').addClass('error')
                            .append('<div class="ui error message" style="display: block; margin-bottom: 1em"><p>'+value+'</p></div>');
                    });
                }
            }
        })
    });

    $('#conferenceTable').on('click', '.join_conference', function () {
        var conferenceId = $(this).attr('data-conference');
        $('#sendCode').attr('data-conference', conferenceId);

        $.ajax({
            url: '/conference',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                ajax: 'check_activated',
                conferenceId: conferenceId
            },
            type: 'post',
            success: function (response) {
                if (!response.activated) {
                    $('#joinConferenceModal').modal({
                        onApprove: function () {
                            $('#joinConferenceModal').find('.field').removeClass('error').find('.error.message').remove();
                            var conferenceHash = $('#joinCode').val();

                            $.ajax({
                                url: '/conference',
                                async: false,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    ajax: 'join_conference',
                                    conferenceHash: conferenceHash,
                                    conferenceId: conferenceId
                                },
                                type: 'post',
                                success: function (response) {
                                    if(response.status === 'success'){
                                        makeCall('conference:'+response.name, agentName);
                                        $('#joinConferenceModal').modal('hide');
                                    } else {
                                        $('#joinCode').parents('.field').addClass('error')
                                            .append('<div class="ui error message" style="display: block; margin-bottom: 1em">' +
                                                '<p>Incorrect Code</p>' +
                                                '</div>');
                                    }
                                }
                            });
                            return false;
                        }
                    }).modal('show');
                } else {
                    makeCall('conference:'+response.name, agentName);
                    $('#allConferenceModal').modal('hide');
                }
            }
        });
    });

    $('#sendCode').on('click', function () {
        var self = $(this);
        self.addClass('loading');
        var conferenceId = self.attr('data-conference');

        $.ajax({
            type: 'POST',
            url: '/conference',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                ajax: 'resend_code',
                id: conferenceId
            },
            success: function (response) {
                self.removeClass('loading');

                if(response.status === 'success'){
                    conferenceTable.draw();
                    swal({
                        title: "Success",
                        text: 'Join code has been sent to your email',
                        type: 'success'
                    });

                    $('#createConferenceModel').modal('hide');
                }

                if(response.status === 'error'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        })
    });

    $('#conferenceTable').on('click', '.resend_invite', function () {
        var self = $(this);

        var conferenceId = self.attr('data-conference');

        $.ajax({
            url: '/conference',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                ajax: 'resend_invite',
                id: conferenceId
            },
            type: 'post',
            success: function (response) {
                if(response.status === 'success'){
                    swal({
                        title: "Success",
                        text: 'Join code has been resent to conference numbers',
                        type: 'success'
                    });
                }

                if(response.status === 'error'){
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Something was wrong'
                    });
                }
            }
        });
    });

    socket.on('updateConference', function () {
        conferenceTable.draw();
    });

});

