@extends('admin::theme.default.layouts.master')

@section('title') User Form @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') User Form @endslot
        @slot('li_1')  User @endslot
        @slot('li_2') User Form @endslot
    @endcomponent

    <form id="form" enctype="multipart/form-data" class="validation form-horizontal" method="post"
          action="{{ $action }}" novalidate="novalidate" autocomplete="off">

        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-sm-right text-white">
                            <a href="/admin/user" class="btn btn-secondary waves-effect mb-2 mr-2" data-toggle="tooltip" data-placement="top"  title="@lang('admin::common.button_cancel')">
                                <i class="bx bx-undo font-size-16 align-middle"></i>
                            </a>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mb-2 mr-2" data-toggle="tooltip" data-placement="top" title="@lang('admin::common.button_save')">
                                <i class="bx bxs-save font-size-16 align-middle"></i>
                            </button>

                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create new User</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <div class="row">


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="user-name">Username</label>
                                        <input id="user-name" name="username" type="text" class="form-control" value="{{ $username ?? '' }}">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="user-firstname">First Name</label>
                                        <input id="user-firstname" name="firstname" type="text" class="form-control" value="{{ $firstname ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="user-email">Email</label>
                                        <input id="user-email" name="email" type="email" class="form-control" value="{{ $email ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="user-password">Password</label>
                                        <input id="user-password" name="password" type="password" class="form-control" value="">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Status</label>
                                        <div class="custom-control custom-switch mt-2" dir="ltr">
                                            <input type="checkbox" name="status"
                                                   {{ isset($status) && $status ? 'status' : '' }}
                                                   class="custom-control-input" id="front-page-status"
                                                   value="1">
                                            <label class="custom-control-label" for="front-page-status"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="user-lastname">Last Name</label>
                                        <input id="user-lastname" name="lastname" type="text" class="form-control" value="{{ $lastname ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="user-group" class="control-label">User Group</label>
                                        <select id="user-group" class="form-control select2" name="group_id">
                                            <option value="0">@lang('admin::common.text_select')</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="user-password-confirm">Password Confirm</label>--}}
{{--                                        <input id="user-password-confirm" name="password_confirm" type="password" class="form-control" value="">--}}
{{--                                    </div>--}}
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-image">Image</label>

                                        {{--                                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">--}}
                                        {{--                                                <img src="{{ $thumb ?? '' }}" width="100px" height="100px" alt="" title="" data-placeholder="{{ $placeholder ?? '' }}" />--}}
                                        {{--                                            </a>--}}
                                        {{--                                            <input type="hidden" name="image" value="{{ $image ?? '' }}" id="input-image" />--}}


                                        <input type="file" name="image" value="{{ $image ?? '' }}" id="input-image" accept="image/png, image/jpeg">


                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary mr-1 waves-effect waves-light" type="submit"><i class="bx bx-check mr-2"></i>@lang('admin::common.button_save')</button>
                                        <button class="btn btn-warning mr-1 waves-effect waves-light" type="reset"><i class="bx bx-reset mr-2"></i>@lang('admin::common.button_reset')</button>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                    </div>
                </div>








            </div>
        </div><!-- end row -->
    </form>
@endsection

