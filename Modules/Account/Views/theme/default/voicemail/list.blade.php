@extends('admin::theme.default.layouts.master')

@section('title') Extension List @endsection

@section('content')
    <div class="ui bottom status attached tab active segment">
        <div class="ui styled accordion">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header"><i class="fas fa-plus-square"></i><i class="fas fa-minus-square"></i>Showing
                            <span id="countAgents"></span> Extensions</h4>
                    </div>
                    <div class="right menu">
                        <div class="ui right aligned category search item">
                            <div class="ui transparent icon input">
                                <input class="prompt" type="text" placeholder="Search...">
                                <i class="search link icon"></i>
                            </div>
                            <div class="results"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content active">
                <table id="statusTable" class="single group-info line table" data-page-size="7">
                    <thead>
                    <tr>
                        <th data-toggle="true" class="center aligned collapsing">
                            <label>Ext<i class="fas fa-caret-down"></i></label>
                        </th>
                        <th class="center aligned collapsing two wide">
                            <div class="ui number form">
                                <div class="inline field">
                                    <label>Status<i class="inline question circle icon link" data-html="<b>Status</b><br/>If this extension is associated with a phone device (or a softphone), this column shows the status of the extension. Green means the device is currently registered and working properly; red means the device is offline.<br/><font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                </div>
                            </div>
                        </th>
                        <th data-toggle="true" data-hide="phone, tablet" class="left aligned three wide">
                            <label>User<i class="fas fa-caret-down"></i></label>
                        </th>
                        <th data-toggle="true" data-hide="phone, tablet" class="center aligned two wide">
                            <label>Department<i class="fas fa-caret-down"></i></label>
                        </th>
                        <th class="center aligned three wide">
                            <label>Direct Dial</label>
                        </th>
                        <th data-hide="phone, tablet" class="center aligned two wide">
                            <label>Blast</label>
                        </th>
                        <th data-hide="phone, tablet">
                            <label>Fwd</label>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" id="authId" value="{{Auth::id()}}">
@endsection


