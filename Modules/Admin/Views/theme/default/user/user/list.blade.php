@extends('admin::theme.default.layouts.master')

@section('title') User List @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') User List @endslot
        @slot('li_1')  User @endslot
        @slot('li_2') User List @endslot
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
                                <a href="/admin/user/add" class="btn btn-success waves-effect waves-light mb-2 mr-2">
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
                                <th scope="col">Group</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="avatar-xs">
                                            @if($user->image)
                                                <img class="rounded-circle avatar-xs" src="{{ $user->image }}" alt="">
                                            @else
                                                <span class="avatar-title rounded-circle">{{ ucfirst($user->username)[0] }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1 text-dark">{{ $user->firstname  }} {{ $user->lastname  }}</h5>
                                    </td>
                                    <td>
                                        <div class="badge badge-soft-primary font-size-11 m-1">
                                            {{ $user->group }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/user/edit?id={{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item px-2">
                                                <a href="/admin/user/delete?id={{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></a>
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
