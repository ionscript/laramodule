@extends('admin::theme.default.layouts.master')

@section('title') Page List @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Page List @endslot
        @slot('li_1')  Page @endslot
        @slot('li_2') Page List @endslot
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
                                <a href="/admin/page/add" class="btn btn-success waves-effect waves-light mb-2 mr-2">
                                    <i class="bx bx-plus font-size-16 align-middle mr-2"></i> Add New Page
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 70px;">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Viewed</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($pages->total())
                            @foreach($pages as $page)
                            <tr>
                                <td>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle">
                                            {{ $page->id }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 mb-1 text-dark">{{ $page->title }}</h5>
                                </td>
                                <td>
                                    <div class="badge badge-soft-primary font-size-11 m-1">
                                        {{ $page->status }}
                                    </div>
                                </td>
                                <td>
                                    {{ $page->viewed }}
                                </td>
                                <td>
                                    <ul class="list-inline font-size-20 contact-links mb-0">
                                        <li class="list-inline-item px-2">
                                            <a href="/admin/page/edit?id={{ $page->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <a href="/admin/page/delete?id={{ $page->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">No results!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $pages->links() }}
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-6 text-left">{{ $pages->links() }}</div>
                            <div class="col-lg-6 text-right">Showing {{ ($pages->currentPage() - 1) * $pages->perPage() }} to {{ $pages->total() ? $pages->currentPage() * $pages->perPage() : 0 }} of {{ $pages->total() }} ({{ $pages->total() ? $pages->lastPage() : 0 }} Pages)</div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
