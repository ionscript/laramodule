@extends('admin::theme.default.layouts.master')

@section('title') Calls @endsection




@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Phone Numbers @endslot
        @slot('li_1')  Calls @endslot
        @slot('li_2') Phone Numbers @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Showing {{ count($items) }} Phone Numbers</h4>

                    <div class="table-responsive">

                        <table class="table table-centered table-nowrap table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 70px;">#</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Phone Number Type</th>
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
                                        <h5 class="font-size-14 mb-1 text-dark">{{ $item->number }}</h5>
                                    </td>
                                    <td>
                                        <div class="badge badge-soft-primary font-size-11 m-1">
                                            {{ $number_types[$item->number_type_id]['name'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/phoneNumbers/delete?id={{ $item->id }}" data-toggle="tooltip"
                                                   data-placement="top" title="Delete"><i class="bx bx-trash"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
