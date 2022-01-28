@extends('admin::theme.default.layouts.master')

@section('title') Recording List @endsection

@section('content')
    <div class="ui bottom recording-tab attached tab segment active" id="thirde">
        <p>Welcome to the ACD Recordings section. From this area you can record queue calls and manage queue and saved recordings.</p>
        <div class="ui message">
            <p>Note: this area is not for recording outbound calls or non-queue calls.</p>
        </div>
        <div class="ui styled accordion">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header">Create New Recording</h4>
                    </div>
                </div>
            </div>
            <div class="content active">
                <form method="get">
                    <table class="ui single record line table transition visible" style="display: table !important;">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="ui number form">
                                    <div class="inline field">
                                        <label>Agent</label>
                                        <select class="ui dropdown" name="agent">
                                            @foreach($callCenterAgents as $callCenterAgent)
                                                @if(request('agent') == $callCenterAgent->id)
                                                    <option value="{{$callCenterAgent->id}}" selected>{{$callCenterAgent->first_name}}
                                                        {{$callCenterAgent->last_name}}</option>
                                                @else
                                                    <option value="{{$callCenterAgent->id}}">{{$callCenterAgent->first_name}}
                                                        {{$callCenterAgent->last_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui number form">
                                    <div class="inline field">
                                        <label>Type</label>
                                        <select class="ui dropdown" name="callType">
                                            @foreach($callTypes as $callType)
                                                @if(request('callType') == $callType->id)
                                                    <option value="{{$callType->id}}" selected>{{$callType->name}}</option>
                                                @else
                                                    <option value="{{$callType->id}}">{{$callType->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui number form">
                                    <div class="inline field">
                                        {{--<label>Calls</label>--}}
                                        {{--<select class="ui call-section dropdown">--}}
                                        {{--<option value=""></option>--}}
                                        {{--<option value="1"></option>--}}
                                        {{--</select>--}}
                                        <button class="ui button" type="submit">Filter</button>
                                        <a class="ui button" href="{{route('admin.records.view')}}">Reset Filters</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="ui styled accordion">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header"><i class="fas fa-plus-square"></i><i class="fas fa-minus-square"></i>Server 5739 shows 6 users  and 77 Recordings </h4>
                    </div>
                </div>
            </div>
            <div class="content active scroll-style">
                <table class="single line table fold-table table-mb-syle">
                    <thead>
                    <tr>
                        <th>NAME</th><th>EXTENSION</th><th>RECORDINGS</th><th>RECORD STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr class="view" data-agent="{{$agent->id}}">
                            <td><i class="far fa-plus-square"></i><i class="far fa-minus-square"></i>
                                {{$agent->last_name}}, {{$agent->first_name}}</td>
                            <td class="pcs">{{$agent->id}}</td>
                            <td class="cur recordTd"><span class="recordCount" style="font-weight: inherit; color: inherit; font-size: inherit">{{$agent->countRecords ?? 0}}</span> Recordings</td>
                            <td class="per">not recording</td>
                        </tr>
                        <tr class="fold">
                            <td colspan="7">
                                <div class="fold-content">
                                    <table class="ftable single line table recordingTable" data-agent="{{$agent->id}}"
                                           data-call-type="{{request('callType') ?? -1}}" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Delete</th>
                                            <th>Listen</th>
                                            <th>Call Recording Date & Time</th>
                                            <th>Caller-ID</th>
                                        </tr>
                                        </thead>
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="{{asset('/images/play.png')}}" alt=""></a></td>--}}
                                        {{--<td><a href="#">Fri, Jan 03, 2014 5:52:52pm</a></td>--}}
                                        {{--<td>513-509-5098</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>16.77 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Thu, Jan 02, 2014 2:43:49pm</a></td>--}}
                                        {{--<td>704-595-9920</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>1.45 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Thu, Jan 02, 2014 1:43:19pm</a></td>--}}
                                        {{--<td>918-638-3419</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>1.93 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Tue, Dec 17, 2013 3:15:02pm</a></td>--}}
                                        {{--<td>937-849-9063</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.60 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Mon, Dec 16, 2013 6:33:26pm</a></td>--}}
                                        {{--<td>703-777-3590</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.45 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Mon, Nov 25, 2013 2:45:04pm</a></td>--}}
                                        {{--<td>786-293-4000</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.89 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Mon, Nov 25, 2013 12:51:23pm</a></td>--}}
                                        {{--<td>270-933-0907</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.33 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Tue, Nov 19, 2013 6:43:03pm</a></td>--}}
                                        {{--<td>618-635-2100</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.85 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Thu, Sep 13, 2012 2:44:01pm</a></td>--}}
                                        {{--<td>303</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.15 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>--}}
                                        {{--<div class="ui checkbox">--}}
                                        {{--<input name="example" type="checkbox">--}}
                                        {{--<label></label>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--<td><a href="#"><img src="../assest/images/play.png" alt=""></a></td>--}}
                                        {{--<td><a href="#">Wed, Aug 29, 2012 2:49:09pm</a></td>--}}
                                        {{--<td>937-367-9250</td>--}}
                                        {{--<td>n/a</td>--}}
                                        {{--<td>0.10 MB</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                        {{--<tfoot>--}}
                                        {{--<tr>--}}
                                        {{--<th colspan="7">--}}
                                        {{--<div class="total-size">--}}
                                        {{--<div class="left-section">--}}
                                        {{--<ul>--}}
                                        {{--<li>[<a href="#">delete checked</a>]</li>--}}
                                        {{--<li>[<a href="#">delete all</a>]</li>--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="right-section">--}}
                                        {{--<ul>--}}
                                        {{--<li>Total</li>--}}
                                        {{--<li>1.9 MB</li>--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</th>--}}
                                        {{--</tr>--}}
                                        {{--</tfoot>--}}
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(".fold-table tr.view").on("click", function(){
            $(this).toggleClass("open").next(".fold").toggleClass("open");
        });
    </script>
@endpush

