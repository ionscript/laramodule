@extends('admin::theme.default.layouts.master')

@section('title') Music on Hold Form @endsection

@section('content')
    <div class="ui bottom music-section attached segment" id="firstd" style="border: none">
        <form>
            <div class="ui styled">
                <div class="title active">
                    <div class="ui top attached menu">
                        <div class="left menu">
                            <h4 class="ui header">Add New .mp3 ‘Song’</h4>
                        </div>
                    </div>
                </div>
                <div class="content active">
                    <table class="ui single line table transition visible" style="display: table !important;">
                        <thead>
                        <tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width:100px;border-right: 1px solid #e8e8e8;">
                                <div class="ui form">
                                    <div class="inline field filesBlock">
                                        <label>File Name<i class="inline question circle icon link" data-content="This popup was inserted inline and will be styled"></i></label>
                                        <input id = "fileupload" type = "file" />
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>Playlist<i class="inline question circle icon link" data-content="This popup was inserted inline and will be styled"></i></label>
                                        <select class="ui dropdown" id="playlistSelect" multiple name="playlist">
                                            <option value=""></option>
                                            @foreach($playlists as $playlist)
                                                <option value="{{$playlist->id}}">{{$playlist->playlist_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn">
                <button class="ui button" type="button" id="uploadMusic">Upload</button>
            </div>
        </form>
        <!--starting create a new play list -->
        <form method="POST" action="{{route('admin.holdMusic.playlist.create')}}">
            @csrf
            <div class="ui styled">
                <div class="title active">
                    <div class="ui top attached menu">
                        <div class="left menu">
                            <h4 class="ui header">Create a new Playlist</h4>
                        </div>
                    </div>
                </div>
                <div class="content active">
                    <table class="ui single line table transition visible" style="display: table !important;">
                        <thead>
                        <tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width:100px;border-right: 1px solid #e8e8e8;">
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>Playlist Name<i class="inline question circle icon link" data-content="This popup was inserted inline and will be styled"></i></label>
                                        <input type="text" name="playlist_name" value="{{old('playlist_name') ?? ''}}">
                                        @if($errors->has('playlist_name'))
                                            <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                <p>{{ $errors->first('playlist_name') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>Song Order<i class="inline question circle icon link" data-content="This popup was inserted inline and will be styled"></i></label>
                                        <select class="ui dropdown" name="order_type_id">
                                            @foreach($orderTypes as $orderType)
                                                <option value="{{$orderType->id}}">{{$orderType->type_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('order_type_id'))
                                            <div class="ui error message" style="display: block; margin-bottom: 1em">
                                                <p>{{ $errors->first('order_type_id') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn">
                <button class="ui button" type="submit">Create Playlist</button>
            </div>
        </form>
        <!--end create a new play list -->
    </div>
@endsection
