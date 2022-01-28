@extends('admin::theme.default.layouts.master')

@section('title') Call Center @endsection




@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Agents @endslot
        @slot('li_1')  Call Center @endslot
        @slot('li_2') Agents @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4 class="card-title mb-3">Showing {{ count($agents) }} Agents</h4>
                        </div>
                        <div class="col-lg-9 text-right">
                            <a href="/admin/agents/register" class="btn btn-success waves-effect waves-light mb-2 mr-2">
                                <i class="bx bx-plus font-size-16 align-middle mr-2"></i> Add New
                            </a>
                        </div>
                    </div>

                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-agents" role="tab"
                               aria-selected="false">
                                Agents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-extensions" role="tab"
                               aria-selected="true">
                                Non-Agent Extensions
                            </a>
                        </li>
                    </ul>

                    <form class="ui form" method="POST" action="/admin/settings/edit">
                        <!-- Tab panes -->
                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="tab-agents" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="width: 70px;">#</th>
                                            <th scope="col">Agent</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Direct Dial</th>
                                            <th scope="col">Buddy Press</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($agents as $key => $agent)
                                            <tr>
                                                <td>
                                                    <div class="avatar-xs">
                                                        <span class="avatar-title rounded-circle"
                                                              style="{{ $agent->avatar_name[0] === '#' ? 'background-color: ' . $agent->avatar_name : ''}}">
                                                            {{ ucfirst($agent->first_name)[0] . ucfirst($agent->last_name)[0] }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="m-1">
                                                        {{ $agent->first_name . ' ' .  $agent->last_name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="m-1">
                                                        {{ $agent->description }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="m-1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="m-1">
                                                        {{ $agent->mobile_phone }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="mb-0 font-size-20 text-success text-center">
                                                        <i class="bx bx-check-circle"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="list-inline font-size-20 contact-links mb-0">
                                                        <li class="list-inline-item px-2">
                                                            <a href="/admin/user/edit?id=2" data-toggle="tooltip"
                                                               data-placement="top"
                                                               title="Edit" data-original-title="Edit"><i
                                                                        class="bx bx-edit"></i></a>
                                                        </li>
                                                        <li class="list-inline-item px-2">
                                                            <a href="/admin/phoneNumbers/delete?id= $item->id "
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="Delete"><i
                                                                        class="bx bx-trash"></i></a>
                                                        </li>
                                                        <li class="list-inline-item px-2">
                                                            <a href="/admin/phoneNumbers/delete?id= $item->id "
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="Login"><i
                                                                        class="bx bx-log-in-circle"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-extensions" role="tabpanel">
                                asdasdasd
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
