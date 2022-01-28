@extends('admin::theme.default.layouts.master')

@section('title') User Group List @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') User Group List @endslot
        @slot('li_1')  User Group @endslot
        @slot('li_2') User Group List @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-sm-right text-white">
                                <a href="/admin/user/group/add" class="btn btn-success waves-effect waves-light mb-2 mr-2">
                                    <i class="bx bx-plus font-size-16 align-middle mr-2"></i> @lang('admin::common.button_add')
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 70px;">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-1 text-dark">{{ $group->id  }}</h5>
                                    </td>                                    <td>
                                        <h5 class="font-size-14 mb-1 text-dark">{{ $group->name  }}</h5>
                                    </td>
                                    <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/user/group/edit?id={{ $group->id }}" data-toggle="tooltip" data-placement="top" title="@lang('admin::common.button_edit')"><i class="bx bx-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/users/group/delete?id={{ $group->id }}" data-toggle="tooltip" data-placement="top" title="@lang('admin::common.button_delete')"><i class="bx bx-trash"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
