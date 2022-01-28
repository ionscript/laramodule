@extends('admin::theme.default.layouts.master')

@section('title') Music on Hold List @endsection

@section('content')
    <div class="ui bottom music-section attached segment" id="firstd" style="border: none">
        <p>Welcome to Music On Hold. From here you can manage the .mp3 "songs" played to your callers. You may upload or delete songs from any of your playlists. You can then "play" a playlist in your call menu.</p>
        <div class="ui message holdMessage">
            <p><span>Note 1:</span> Variable bit-rate is not supported. Use constant bit-rate stereo .mp3's of 128kbps.</p>
            <p><span>Note 2:</span> You cannot upload files that are greater than 20MB.</p>
        </div>
        {{--Global playlist--}}
        @if(isset($defaultPlaylist))
            <div class="ui styled scroll-style second-playlist playlistBlock">
                <div class="title">
                    <div class="ui top attached menu">
                        <div class="left menu">
                            <h4 class="ui header">Playlist: ‘{{$defaultPlaylist->playlist_name}}’</h4>
                        </div>
                        <div class="right menu">
                            <h4 class="ui header">System playlist</h4>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <table class="ui single line table playlist-table mobile-layout" style="width: 100%" id="globalPlaylist" data-playlist-id="{{$defaultPlaylist->id}}">
                        <thead>
                        <tr>
                            <th class="left aligned collapsing one wide">
                                <label>Listen </label>
                            </th>
                            <th class="left aligned six wide">
                                <label>File Name</label>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="bottom-section">
                    <button class="ui button" id="applyPlaylistChange">Apply All Changes</button>
                </div>
            </div>
        @endif
    <!-- remove paly list second -->
        @foreach($playlists as $playlist)
            <div class="ui styled scroll-style second-playlist playlistBlock">
                <div class="title">
                    <div class="ui top attached menu">
                        <div class="left menu">
                            <h4 class="ui header">Playlist: ‘{{$playlist->playlist_name}}’</h4>
                        </div>
                        <div class="right menu">
                            <h4 class="ui header">{!! ($playlist->is_default) ? 'Default' : '<u>
                                           <a href="'.route('admin.holdMusic.playlist.setDefault', ['id' => $playlist->id]).'">
                                           Set As Default Playlist</a></u> '!!}  Order:</h4>
                            <select class="ui dropdown orederSelect">
                                @foreach($orderTypes as $orderType)
                                    @if($orderType->id == $playlist->order_type_id)
                                        <option value="{{$orderType->id}}" selected>{{$orderType->type_name}}</option>
                                    @else
                                        <option value="{{$orderType->id}}">{{$orderType->type_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button class="ui button removePlaylist" data-playlist-id="{{$playlist->id}}">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <table class="ui single line table playlist-table mobile-layout" id="playlist-{{$playlist->id}}" data-playlist-id="{{$playlist->id}}">
                        <thead>
                        <tr>
                            <th class="left aligned collapsing one wide">
                                <label>Listen </label>
                            </th>
                            <th class="left aligned collapsing one wide">
                                <div class="ui number form">
                                    <div class="inline field">
                                        <label>Delete</label>
                                    </div>
                                </div>
                            </th>
                            <th class="left aligned six wide">
                                <label>File Name</label>
                            </th>
                            <th class="center aligned one wide">
                                <label>Size</label>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
                @if ($loop->last)
                    <div class="bottom-section">
                        <button class="ui button" id="applyPlaylistChange">Apply All Changes</button>
                    </div>
                @endif
            </div>
    @endforeach

    <!-- remove play list second  -->
    </div>
@endsection