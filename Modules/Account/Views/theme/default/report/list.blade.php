@extends('admin::theme.default.layouts.master')

@section('title') Report List @endsection

@section('content')
    <div class="ui bottom crd-report-tab attached tab segment active" id="foura">
        <form action="{{route('admin.reports.csv')}}" method="post">
            @csrf
            <div class="ui compact">
                <div class="ui button" data-tooltip="Why are my reports not updated instantly?" data-position="right center"><p><b>Note:</b>  Reports are being updated on average every 6 minutes?&nbsp;&nbsp;&nbsp;<i class="fas fa-times-circle"></i></p></div>
            </div>
            <div class="ui styled accordion">

                <div class="title active">
                    <div class="ui top attached menu">
                        <div class="left menu">
                            <h4 class="ui header"><i class="fas fa-plus-square"></i><i class="fas fa-minus-square"></i>create new report</h4>
                        </div>
                    </div>
                </div>
                <div class="content active">
                    <table class="ui celled new-report striped table">
                        <thead>
                        <tr>
                            <th class="left aligned collapsing four wide">
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>Call types <!-- <i class="inline question circle icon link" data-content="This popup was inserted inline and will be styled"></i> -->
                                        </label>
                                    </div>
                                </div>
                            </th>
                            <th class="left aligned collapsing four wide">
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>View columns<!-- <i class="inline question circle icon link" data-content="This popup was inserted inline and will be styled"></i> -->
                                        </label>
                                    </div>
                                </div>
                            </th>
                            <th class="left aligned collapsing three wide"></th>
                            <th class="left aligned collapsing five wide">
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>List Filters<i class="inline question circle icon link" data-html="<b>List Filters</b><br/>List Filters allow you to run reports on specific extensions, phone numbers, or submenus. Additionally, you can use wildcards from these list filters.<br/>List Filters allow you to run reports on specific extensions, phone numbers, or submenus. Additionally, you can use wildcards from these list filters.<br/><b>*</b>: represents any single digit.  For example, entering '700*' in the 'From' or 'To' field  would mean match any extension between 7000 - 7009.<br/>'310-555-****' would mean match any number between 310-555-0000 and 310-555-9999.<br/><b>%</b>: represents 0 or more digits. For example, '01%1' would match any phone numbers beginning with 011, such as 011-55-51212, 011, and 011-55-5555-5555.<br/>Additionally, you can search by submenus in the 'To' input box. For example, you could search for all calls to the'Support' submenu, or to find all calls for  both 'Support' and 'Sales', you can search for 'S*'.<br/><font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i>
                                        </label>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="inbound">
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="incomingFilter" id="incomingFilter" value="true">
                                        <label>Inbound</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="header[number_from]" id="sourceFilter" value="true">
                                        <label>Source Number</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui form">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="totalDurationFilter" id="totalDurationFilter" value="true">
                                            <label>Show Total Duration<i class="inline question circle icon link" data-html="<b>Show Total Duration</b><br/>This option provides the total duration of all calls found by your search, rather than just the duration of the calls that you are viewing on a single page. This is useful if your searches result in multiple pages but you wish to see the total duration of all pages.<br/>Note that this may slow down the amount of time it takes for your search to complete.<font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="ui align form">
                                    <div class="inline field">
                                        <label>From:<i class="inline question circle icon link" data-html="<b>From:</b><br/>Only display calls <br/>from  the number/extension entered.  The From function is not used as a range.<font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                        <input type="text" name="fromFilter" id="fromFilter">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="outbound">
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="outgoingFilter" id="outgoingFilter" value="true">
                                        <label>Outbound</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="header[number_to]" id="destFilter" value="true">
                                        <label>Dest Number</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="noSummary" id="noSummary" value="true">
                                        <label>No CSV Summary</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui align form">
                                    <div class="inline field">
                                        <label>To:<i class="inline question circle icon link" data-html="<b>To:</b><br/>Only display calls to  the number/extension entered.  The To function is not  used as a range.<br/>Note that this may slow down the amount of time it takes for your search to complete.<font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                        <input type="text" name="toFilter" id="toFilter">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="QueueCall">
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="queueFilter" id="queueFilter" value="true">
                                        <label>Queue Call</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="header[status_name]" id="statusFilter" value="true">
                                        <label>Status</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                                <div class="ui align form">
                                    <div class="inline field">
                                        <label>Extension:<i class="inline question circle icon link" data-html="<b>Extension:</b><br/>Only display calls to or from the extension you select.<br/><font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                        <select class="ui dropdown" name="extensionFilter" id="extensionFilter">
                                            <option selected disabled>Select someone</option>
                                            @foreach($agents as $agent)
                                                <option value="{{$agent->id}}">{{$agent->first_name}} {{$agent->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="Interoffice">
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" value="true" name="interOfficeFilter" id="interOfficeFilter">
                                        <label>Interoffice</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="header[date]" id="dateFilter" value="true">
                                        <label>Date</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                                <div class="ui align form">
                                    <div class="inline field">
                                        <label>View Rows:<i class="inline question circle icon link" data-html="<b>View Rows:</b><br/>Define the total number of rows to display per page.<br/><font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                                        <input type="text" id="rows">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="Barge">
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" id="conferenceFilter" value="true">
                                        <label>Conferences</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="header[call_duration]" id="durationFilter" value="true">
                                        <label>Duration</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="inline field">
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="header[talktime]" id="talktimeFilter" value="true">
                                        <label>Talktime</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="ui checkbox">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ui form">
                                    <div class="inline field">

                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="1">
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>Between </label>
                                        <div class="ui calendar" id="startAt">
                                            <div class="ui input right icon">
                                                <i class="calendar outline icon"></i>
                                                <input type="text" name="startAt" id="startAtFilter" placeholder="Start Date" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th colspan="2">
                                <div class="ui form">
                                    <div class="inline field">
                                        <label>and</label>
                                        <div class="ui calendar" id="endAt">
                                            <div class="ui input right icon">
                                                <i class="calendar outline icon"></i>
                                                <input type="text" name="endAt" id="endAtFilter" placeholder="End Date" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th colspan="2">
                                <button class="ui button" type="button" id="acceptFilters">Run Report</button>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="ui call-logs form">
                <div class="inline field">
                    <label>Where do I find my call logs<i class="inline question circle icon link" data-html="<b>Where do I find my call logs</b><br/>You can find your raw call logs, also called 'CDRs' (Call Detail Records) on your local Front Office in this directory:<br/><br/>/var/log/asterisk/cdr-csv<br/>Your CDRs are stored in comma-delimited format, allowing you to easily import them into a database or report-writer of your choosing.<br/><font style='color:#0364C4;font-size:13px;'>Disable rollover help in Options tab, under settings.</font>"></i></label>
                </div>
            </div>
            <div class="ui styled">
                <div class="title" style="padding-bottom: 10px;">
                    <div class="ui top attached menu">
                        <div class="left menu">
                            <h4 class="ui header">Total Calls - <span id="totalCalls">1</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Page Duration - <span id="pageDuration">00:00:11</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="totalDurationBlock">| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Total Duration - <span id="totalDuration"></span></span></h4>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <table class="celled striped table" id="cdrTable">
                        <thead>
                        <tr>
                            <th class="left aligned collapsing three wide" id="fromColumn">
                                <label>From</label>
                            </th>
                            <th class="left aligned collapsing three wide" id="toColumn">
                                <label>To</label>
                            </th>
                            <th class="left aligned collapsing two wide" id="durationColumn">
                                <label> Duration </label>
                            </th>
                            <th class="left aligned collapsing two wide" id="talktimeColumn">
                                <label> Talktime </label>
                            </th>
                            <th class="left aligned collapsing two wide" id="statusColumn">
                                <label> Status </label>
                            </th>
                            <th class="left aligned collapsing two wide" id="dateColumn">
                                <label> Date </label>
                            </th>
                            <th class="left aligned collapsing two wide" id="timeColumn">
                                <label> Time </label>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        {{--<tfoot>--}}
                        {{--<tr><th colspan="7" style="text-align: center;">--}}
                        {{--<div class="ui center pagination menu">--}}
                        {{--<a class="icon item" style="background-color: #eaeaea;border-radius: 100%;">--}}
                        {{--<img src="{{asset('images/arrow-right.svg')}}">--}}
                        {{--</a>--}}
                        {{--<a class="icon item" style="background-color: #eaeaea;border-radius: 100%;">--}}
                        {{--<i class="fas fa-chevron-left"></i>--}}
                        {{--</a>--}}
                        {{--<a class="item">Prev</a>--}}
                        {{--<a class="item count-page">1</a>--}}
                        {{--<a class="item">Next</a>--}}
                        {{--<a class="icon item" style="background-color: #eaeaea;border-radius: 100%;">--}}
                        {{--<i class="fas fa-chevron-right "></i>--}}
                        {{--</a>--}}
                        {{--<a class="icon item" style="background-color: #eaeaea;border-radius: 100%;">--}}
                        {{--<img src="{{asset('images/arrow-left.svg')}}">--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--</th>--}}
                        {{--</tr></tfoot>--}}
                    </table>
                    <div style="text-align: center">
                        <button class="ui button" type="submit" id="createNewScheduler"
                                style="background-color: #fd5073;color: #fff;border-radius: 0;font-size: 18px;margin: 0 auto">
                            Download as CSV
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
