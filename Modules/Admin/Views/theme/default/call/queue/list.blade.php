@extends('admin::theme.default.layouts.master')

@section('title') Settings @endsection




@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Queues @endslot
        @slot('li_1')  Calls @endslot
        @slot('li_2') Queues @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Showing {{ count($items) }} Queues</h4>
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="card-title-desc">
                                Below is a list of queues on your server. You may select a queue from the bottom of this page and click "clear" to zero out it's displayed stats (Holding, Hold Time, Completed, etc.) Note: this will only clear this page - historical stats will always be available under the ACD>reports link above.
                            </p>
                        </div>
                        <div class="col-lg-2 text-sm-right text-white">
                            <a href="/admin/queue/add" class="btn btn-success waves-effect waves-light mb-2 mr-2">
                                <i class="bx bx-plus font-size-16 align-middle mr-2"></i> Add New
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-centered table-nowrap table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 70px;">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">TTA SLA</th>
                                <th scope="col">Ext Number</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1 text-dark">{{ $item->name }}</h5>
                                    </td>
                                    <td>
                                        <div class="badge badge-soft-primary font-size-11 m-1">
                                            SLA
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-soft-primary font-size-11 m-1">
                                            Ext-num
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/queue/edit?id={{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/queue/delete?id={{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        {{--                        <table class="table mb-0">--}}
                        {{--                            <thead class="thead-light">--}}
                        {{--                            <tr>--}}
                        {{--                                <th>#</th>--}}
                        {{--                                <th>Name</th>--}}
                        {{--                                <th>Hold</th>--}}
                        {{--                                <th>Hold Time</th>--}}
                        {{--                                <th>TTA SLA</th>--}}
                        {{--                                <th>Ext Number</th>--}}
                        {{--                                <th>Action</th>--}}
                        {{--                            </tr>--}}
                        {{--                            </thead>--}}
                        {{--                            <tbody>--}}
                        {{--                            @foreach($items as $key => $item)--}}
                        {{--                                <tr id="{{ $item->id }}">--}}
                        {{--                                    <th scope="row">{{ $key }}</th>--}}
                        {{--                                    <th>{{ $item->name }}</th>--}}
                        {{--                                    <th>{{ $item->announce_frequency }}</th>--}}
                        {{--                                    <th>n/a</th>--}}
                        {{--                                    <th>SLA</th>--}}
                        {{--                                    <th>Ext num</th>--}}
                        {{--                                    <th><a href="/admin/queue/delete?id={{ $item->id }}"><i class="bx bx-trash-alt"></i></a></th>--}}
                        {{--                                </tr>--}}
                        {{--                            @endforeach--}}
                        {{--                            </tbody>--}}
                        {{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
