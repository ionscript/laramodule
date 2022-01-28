@extends('admin::theme.default.layouts.master')

@section('title') Schedule Form @endsection

@section('content')
    <div class="ui bottom scheduler attached tab segment active" id="firstb">
        <div class="ui styled">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header"><label>Add New Schedule <i style="font-size: 13px;" class="inline question circle icon link" data-html="<b>Add New Schedule</b></br>Schedules are blocks of time. You create these blocks here and then use them inside your Call Menu. This allows your Call Menu to be dynamic based on time of day, week, or year. <br/>For example, you might create a Weekday Schedule called 'BizHours' and define this schedule as Mon-Fri 8am-5pm </br>As another example, you might create a Calendar Schedule called 'Holiday' (by changing the Type dropdown to 'Calendar') and define this schedule as 12/31 @ 8AM to 1/1 @ 5PM <br/>Then, to use a schedule, you would go into your Call Menu and add a new Call Sequence called 'Go to Submenu/ext. by schedule'. In the dropdown called 'Go to' you would choose the Submenu you wish to go to and in the drop-down called 'during' you would choose either your new schedule of 'BizHours' or 'Holiday'.<br/><font color='#0364C4'>Disable rollover help in Options tab, under settings.</font>"></i></label></h4>
                    </div>
                </div>
            </div>
            <div class="content active">
                <table  class="ui single line table table-hover" style="border: 0;white-space: unset;">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-toggle="true" class="left aligned collapsing four wide">
                            <div class="ui input-name form">
                                <div class="field name_block name_field">
                                    <label>Name</label>
                                    <input type="text" name="name" id="schedulerName">
                                    @if ($errors->has('name'))
                                        <div class="ui error message" style="display: block; margin-bottom: 1em">
                                            <p>{{ $errors->first('name') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="left aligned collapsing four wide">
                            <div class="ui input-description form">
                                <div class="field description_block description_field">
                                    <label>Description</label>
                                    <input type="text" name="description" id="schedulerDescription">
                                </div>
                            </div>
                        </td>
                        <td class="type left aligned collapsing four wide">
                            <label>Type</label>
                            <select class="ui dropdown" id="typeSelect">
                                @foreach(config('time.scheduleTypes') as $type)
                                    <option value="{{$type}}">{{ucfirst($type)}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td data-hide="all" class="timers left aligned collapsing three wide">
                            <label>Day Range</label>
                            <select class="ui dropdown start_day_field" name="start_day" id="startDay">
                                @foreach(config('time.weekdays') as $dayNumber => $day)
                                    <option value="{{$dayNumber}}">{{$day}}</option>
                                @endforeach
                            </select>

                            <span class="fa-layers fa-fw  fa-2x" style="top: 5px;">
                                  <i class="fas fa-circle" style="color:#536c8e"></i>
                                  <i class="fas fa-arrow-right" style="color:#fff" data-fa-transform="shrink-6"></i>
                            </span>
                            <select class="ui dropdown end_day_field" name="end_day" id="endDay">
                                @foreach(config('time.weekdays') as $dayNumber => $day)
                                    <option value="{{$dayNumber}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </td>
                        <!-- <th data-hide="all" class="left aligned collapsing one wide"></td> -->
                    </tr>
                    <tr>
                        <td colspan="5"><h4>Time Range per day</h4></td>
                    </tr>
                    <tr class="time-range">
                        <td  colspan="5" class="start_at_block end_at_block">
                            <select class="ui dropdown start_at_field" name="start_at_hour" id="start_at_hour">
                                @foreach(config('time.hours') as $hour)
                                    <option value="{{$hour}}">{{$hour}}</option>
                                @endforeach
                            </select>

                            <img class="colon" src="{{asset('images/colon.png')}}" alt="">

                            <select class="ui dropdown start_at_field" id="start_at_min">
                                @foreach(config('time.minutes') as $min)
                                    <option value="{{$min}}">{{$min}}</option>
                                @endforeach
                            </select>

                            <select class="ui dropdown start_at_field" id="start_at_type">
                                <option value="am">am</option>
                                <option value="pm">pm</option>
                            </select>

                            <span class="fa-layers fa-fw  fa-2x" style="top: 5px;">
                                  <i class="fas fa-circle" style="color:#536c8e"></i>
                                  <i class="fas fa-arrow-right" style="color:#fff" data-fa-transform="shrink-6"></i>
                            </span>

                            <select class="ui dropdown end_at_field" id="end_at_hour">
                                @foreach(config('time.hours') as $hour)
                                    <option value="{{$hour}}">{{$hour}}</option>
                                @endforeach
                            </select>

                            <img class="colon" src="{{asset('images/colon.png')}}" alt="">

                            <select class="ui dropdown end_at_field" id="end_at_min">
                                @foreach(config('time.minutes') as $min)
                                    <option value="{{$min}}">{{$min}}</option>
                                @endforeach
                            </select>

                            <select class="ui dropdown end_at_field" id="end_at_type">
                                <option value="am">am</option>
                                <option value="pm">pm</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="text-align: center">
                    <input type="hidden" id="dailyScheduleInput">
                    <button class="ui button" type="button" id="createNewScheduler"
                            style="background-color: #fd5073;color: #fff;border-radius: 0;font-size: 18px;margin: 0 auto">
                        Create New Schedule
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('modals')
    <div id="dailySchedule" class="overlay">
        <div class="popup" style="width: 45%;">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <h3>Customize Daily Schedule</h3>
                <form id="dailyScheduleForm">
                    <div class="ui form">
                        <div class="ui grid" style="margin: 0">
                            @if(isset($dailySchedule))
                                @foreach($dailySchedule as $day)
                                    <div class="sixteen column row" style="padding: 0">
                                        <div class="four wide column middle aligned" style="text-align: center">
                                            <h3>{{config('time.weekdays')[$day->day]}}</h3>
                                        </div>
                                        <div class="eleven wide column right floated">
                                            <div class="row center aligned">
                                                <div class="column">
                                                    <div class="inline fields ui grid" style="margin: 0">
                                                        <div class="column three wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                                            <label>Start At</label>
                                                        </div>
                                                        <div class="column thirteen wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                                            <div class="inline fields" style="margin: 0;">
                                                                <div class="field">
                                                                    <select class="ui dropdown start_at_field" name="day[{{$day->id}}][start_at_hour]">
                                                                        @foreach(config('time.hours') as $hour)
                                                                            @if($day->start_at_hour == $hour)
                                                                                <option value="{{$hour}}" selected>{{$hour}}</option>
                                                                            @else
                                                                                <option value="{{$hour}}">{{$hour}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <img class="colon" src="{{asset('images/colon.png')}}" alt="">
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$day->id}}][start_at_minute]">
                                                                        @foreach(config('time.minutes') as $min)
                                                                            @if($day->start_at_minute == $min)
                                                                                <option value="{{$min}}" selected>{{$min}}</option>
                                                                            @else
                                                                                <option value="{{$min}}">{{$min}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$day->id}}][start_at_type]">
                                                                        @if($day->start_at_type == 'am')
                                                                            <option value="am" selected>am</option>
                                                                            <option value="pm">pm</option>
                                                                        @else
                                                                            <option value="am">am</option>
                                                                            <option value="pm" selected>pm</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row center aligned">
                                                <div class="column">
                                                    <div class="inline fields ui grid" style="margin: 0">
                                                        <div class="column three wide">
                                                            <label>End At</label>
                                                        </div>
                                                        <div class="column thirteen wide">
                                                            <div class="inline fields" style="margin: 0;">
                                                                <div class="field">
                                                                    <select class="ui dropdown start_at_field" name="day[{{$day->id}}][end_at_hour]">
                                                                        @foreach(config('time.hours') as $hour)
                                                                            @if($day->end_at_hour == $hour)
                                                                                <option value="{{$hour}}" selected>{{$hour}}</option>
                                                                            @else
                                                                                <option value="{{$hour}}">{{$hour}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <img class="colon" src="{{asset('images/colon.png')}}" alt="">
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$day->id}}][end_at_minute]">
                                                                        @foreach(config('time.minutes') as $min)
                                                                            @if($day->end_at_minute == $min)
                                                                                <option value="{{$min}}" selected>{{$min}}</option>
                                                                            @else
                                                                                <option value="{{$min}}">{{$min}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$day->id}}][end_at_type]">
                                                                        @if($day->end_at_type == 'am')
                                                                            <option value="am" selected>am</option>
                                                                            <option value="pm">pm</option>
                                                                        @else
                                                                            <option value="am">am</option>
                                                                            <option value="pm" selected>pm</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sixteen column row" style="padding: 0">
                                        @if(isset($errors) && $errors->has("day.$day->id.end_at"))
                                            <div class="ui error message" style="display: block; margin-bottom: 1em; width: 100%">
                                                <p>{{ $errors->first("day.$day->id.end_at") }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" value="{{$day->day}}" name="day[{{$day->id}}][day]">
                                @endforeach
                            @else
                                @foreach(config('time.weekdays') as $dayCode => $day)
                                    <div class="sixteen column row" style="padding: 0">
                                        <div class="four wide column middle aligned" style="text-align: center">
                                            <h3>{{$day}}</h3>
                                        </div>
                                        <div class="eleven wide column right floated">
                                            <div class="row center aligned">
                                                <div class="column">
                                                    <div class="inline fields ui grid" style="margin: 0">
                                                        <div class="column three wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                                            <label>Start At</label>
                                                        </div>
                                                        <div class="column thirteen wide" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                                            <div class="inline fields" style="margin: 0;">
                                                                <div class="field">
                                                                    <select class="ui dropdown start_at_field" name="day[{{$dayCode}}][start_at_hour]">
                                                                        @foreach(config('time.hours') as $hour)
                                                                            <option value="{{$hour}}">{{$hour}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <img class="colon" src="{{asset('images/colon.png')}}" alt="">
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$dayCode}}][start_at_minute]">
                                                                        @foreach(config('time.minutes') as $min)
                                                                            <option value="{{$min}}">{{$min}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$dayCode}}][start_at_type]">
                                                                        <option value="am" selected>am</option>
                                                                        <option value="pm">pm</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row center aligned">
                                                <div class="column">
                                                    <div class="inline fields ui grid" style="margin: 0">
                                                        <div class="column three wide">
                                                            <label>End At</label>
                                                        </div>
                                                        <div class="column thirteen wide">
                                                            <div class="inline fields" style="margin: 0;">
                                                                <div class="field">
                                                                    <select class="ui dropdown start_at_field" name="day[{{$dayCode}}][end_at_hour]">
                                                                        @foreach(config('time.hours') as $hour)
                                                                            <option value="{{$hour}}">{{$hour}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <img class="colon" src="{{asset('images/colon.png')}}" alt="">
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$dayCode}}][end_at_minute]">
                                                                        @foreach(config('time.minutes') as $min)
                                                                            <option value="{{$min}}">{{$min}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="field">
                                                                    <select class="ui dropdown" name="day[{{$dayCode}}][end_at_type]">
                                                                        <option value="am">am</option>
                                                                        <option value="pm" selected>pm</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <button class="positive fluid ui button" id="{{isset($dailySchedule) ? 'updateDailySchedule' : 'createDailySchedule'}}" type="button">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div id="changeType" class="overlay">
        <div class="popup" style="width: 45%;">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <h3>Change Schedule Type</h3>
                <form id="changeTypeForm">
                    <div class="field ui tab active" data-tab="selectTypeStep" id="changeTypeTab">
                        <div class="ui form">
                            <label>Schedule Type</label>
                            <div class="ui selection dropdown schedule-type">
                                <input type="hidden" id="scheduleType" value="{{$scheduleType ?? -1}}" name="type">
                                <div class="default text">Type</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    @foreach(config('time.scheduleTypes') as $type)
                                        <div class="item" data-value="{{$type}}">
                                            {{ucfirst($type)}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="ui blue right labeled icon button fluid fakeStep" type="button" data-tab="schedulingStep" style="margin-top: 40px">
                                <i class="right arrow icon"></i>
                                Next step
                            </button>
                        </div>
                    </div>
                    <div class="field ui tab"  data-tab="schedulingStep" id="schedulingStepTab">
                    </div>
                    <input type="hidden" name="scheduleId" id="changeTypeId">
                </form>
                <button class="scheduleSteps active" type="button" data-tab="selectTypeStep" style="display: none">
                    Back
                </button>
                <button class="scheduleSteps" type="button" data-tab="schedulingStep" style="display: none">
                    Next
                </button>
            </div>
        </div>
    </div>
@endpush
