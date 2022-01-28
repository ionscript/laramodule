@extends('admin::theme.default.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Add Queue @endslot
        @slot('li_1')  Calls @endslot
        @slot('li_2') Add Queue @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-10">
                    <h4 class="card-title mb-4">Queue Adding Steps</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                <div class="col-lg-2">
                    <div class="text-sm-right text-white">
                        <a href="/admin/queue/view" class="btn btn-secondary waves-effect mb-2 mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel">
                            <i class="bx bx-undo font-size-16 align-middle"></i>
                        </a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light mb-2 mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save">
                            <i class="bx bxs-save font-size-16 align-middle"></i>
                        </button>

                    </div>
                </div>
            </div>
            <div id="progrss-wizard" class="twitter-bs-wizard">
                <!-- Wizard nav -->
            {{--                <div class="card">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <ul class="twitter-bs-wizard-nav nav-justified nav nav-pills">--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a href="#queue-add-details-tab" class="nav-link active text-center"--}}
            {{--                                   data-toggle="tab">--}}
            {{--                                    <span class="step-number mt-2 mb-2">01</span>--}}
            {{--                                    <p class="mb-0">Queue Details</p>--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a href="#queue-add-announcement_prompts-tab" class="nav-link text-center" data-toggle="tab">--}}
            {{--                                    <div class="title">--}}
            {{--                                        <span class="step-number mt-2 mb-2">02</span>--}}
            {{--                                        <p class="mb-0">Announcement prompts</p>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a href="#queue-add-agents-tab" class="nav-link text-center" data-toggle="tab">--}}
            {{--                                    <span class="step-number mt-2 mb-2">3</span>--}}
            {{--                                    <p class="mb-0">Agents</p>--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a href="#progress-confirm-detail" class="nav-link text-center" data-toggle="tab">--}}
            {{--                                    <span class="step-number mt-2 mb-2">04</span>--}}
            {{--                                    <p class="mb-0">Confirm Detail</p>--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}

            {{--                        <div id="bar" class="progress mt-4">--}}
            {{--                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"--}}
            {{--                                 role="progressbar" style="width: 25%;"></div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- Wizard nav end -->

                <form class="ui form" method="POST" action="{{ isset($action) ? $action : '/admin/queue/add' }}">
                    <div class="tab-content twitter-bs-wizard-tab-content">
                        <!-- Queue Details pane -->
                        {{--                        <div class="tab-pane active" id="queue-add-details-tab">--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="queue-add-name">Queue Name</label>
                                            <input class="form-control" type="text" name="name" id="queue-add-name" value="{{ isset($name) ? $name : '' }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-max_holders">Max.Holders</label>
                                            <select class="form-control" id="queue-add-max_holders" name="max_holders">
                                                <option value="50" {{ isset($max_holders) && $max_holders == 50 ? 'selected' : '' }}>50</option>
                                                <option value="100" {{ isset($max_holders) && $max_holders == 100 ? 'selected' : '' }}>100</option>
                                                <option value="150" {{ isset($max_holders) && $max_holders == 150 ? 'selected' : '' }}>150</option>
                                                <option value="200" {{ isset($max_holders) && $max_holders == 200 ? 'selected' : '' }}>200</option>
                                                <option value="-1" {{ isset($max_holders) && $max_holders == -1 ? 'selected' : '' }}>unlimited</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-timeout_type">Queue Time Limit</label>
                                            <select class="form-control" id="queue-add-timeout_type" name="queue_timeout_type">
                                                @foreach($statuses['queue_timeout_types'] as $id => $value)
                                                    <option value="{{ $id }}" data-code="{{ $value['code'] }}" {{ isset($queue_timeout_type_id) && $queue_timeout_type_id == $id ? 'selected' : '' }}>{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-queue_timeout_value">Queue Time Limit Value</label>
                                            <input class="form-control" type="text" name="queue_timeout_value"
                                                   id="queue-add-queue_timeout_value">
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-queue_agents_priority_type">Queue Agents Priority</label>
                                            <select class="form-control" id="queue-add-queue_agents_priority_type" name="queue_agents_priority_type">
                                                @foreach($statuses['queue_agents_priority_types'] as $id => $type)
                                                    <option value="{{ $id }}" data-code="{{ $type['code'] }}" {{ isset($queue_agents_priority_type) && $queue_agents_priority_type == $id ? 'selected' : '' }}>{{ $type['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="queue-add-announce_hold_time">Announce Hold Time</label>
                                            <select class="form-control" name="announce_hold_time" id="queue-add-announce_hold_time">
                                                <option value="1" {{ isset($announce_hold_time) && $announce_hold_time === '1' ? 'checked' : '' }}>Yes</option>
                                                <option value="0" {{ isset($announce_hold_time) && $announce_hold_time === '0' ? 'checked' : '' }}>No</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-announce_frequency">Announce Frequency</label>
                                            <select class="form-control" id="queue-add-announce_frequency" name="announce_frequency">
                                                @foreach($statuses['announce_frequency'] as $seconds)
                                                    <option value="{{ $seconds }}" {{ isset($announce_frequency) && $announce_frequency == $seconds ? 'selected' : '' }}>{{ $seconds . ' Seconds' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-priority">Queue Priority</label>
                                            <select class="form-control" id="queue-add-priority" name="priority">
                                                @foreach($statuses['priority'] as $id => $item)
                                                    <option value="{{ $id }}" {{ isset($priority) && $priority == $id ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-queue_calls_destination">Calls Destination</label>
                                            <select class="form-control" id="queue-add-queue_calls_destination" name="queue_calls_destination">
                                                @foreach($statuses['queue_calls_destination'] as $id => $item)
                                                    <option value="{{ $id }}" {{ isset($queue_calls_destination) && $queue_calls_destination == $id ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-ring_all_phones">Ring All Phones</label>
                                            <select class="form-control" id="queue-add-ring_all_phones" name="ring_all_phones">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
                    <!-- Queue Details pane end -->

                        <!-- Announcement Prompts pane -->
                        {{--                        <div class="tab-pane" id="queue-add-announcement_prompts-tab">--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="queue-add-prompt-audio_intro">Audio Intro...</label>
                                            <select class="form-control" id="queue-add-prompt-audio_intro" name="audio_intro">
                                                <option value="-1">No</option>
                                            </select>
                                            {{--                                                <input class="form-control" type="text" name="audio_intro"--}}
                                            {{--                                                       id="queue-add-prompt-audio_intro">--}}
                                        </div>

                                        <div class="mb-4">
                                            <label for="queue-add-prompt-you_are_first">You are first...</label>
                                            <input class="form-control" type="text" name=""
                                                   id="queue-add-prompt-audio_intro">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="queue-add-prompt-hold_time">Est. Hold Time...</label>
                                            <input class="form-control" type="text" name=""
                                                   id="queue-add-prompt-hold_time">
                                        </div>
                                        <div class="mb-4">
                                            <label for="queue-add-prompt-thank_you">Thank you...</label>
                                            <input class="form-control" type="text" name=""
                                                   id="queue-add-prompt-thank_you">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{--                        </div>--}}
                    <!-- Announcement Prompts pane end -->

                        <!-- Agents pane -->
                        <div class="tab-pane" id="queue-add-agents-tab">

                        </div>
                        <!-- Agents pane end -->
                        <div class="form-group">
                            <button class="btn btn-primary mr-1 waves-effect waves-light" type="submit"><i class="bx bx-check mr-2"></i>Save</button>
                            <button class="btn btn-warning mr-1 waves-effect waves-light" type="reset"><i class="bx bx-reset mr-2"></i>Reset</button>
                        </div>
                    </div>
                </form>

                {{--                <div class="card">--}}
                {{--                    <div class="card-body">--}}
                {{--                        <ul class="pager wizard twitter-bs-wizard-pager-link">--}}
                {{--                            <li class="previous disabled"><a href="#">Previous</a></li>--}}
                {{--                            <li class="next"><a href="#">Next</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection



