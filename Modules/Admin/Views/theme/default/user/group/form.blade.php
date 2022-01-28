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
                            <a href="/admin/user/group" class="btn btn-secondary waves-effect mb-2 mr-2" data-toggle="tooltip" data-placement="top"  title="@lang('admin::common.button_cancel')">
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

                                <h4 class="card-title">Create new User Group</h4>
                                <p class="card-title-desc">Fill all information below</p>

                                <div class="row">


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="user-group-name">Name</label>
                                            <input id="user-group-name" name="name" type="text" class="form-control" value="{{ $name ?? '' }}">
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label>Access</label>
                                                <div class="well well-sm" style="height: 200px; overflow: auto;">
                                                    @foreach($permissions as $permission)
                                                    <div class="checkbox">
                                                        <label class="css-input css-checkbox css-checkbox-sm css-checkbox-primary">
                                                            @if(in_array($permission, $access, true))
                                                            <input type="checkbox" name="permission[access][]" value="{{ $permission }}" checked="checked"/>
                                                            <span></span>
                                                            {{ $permission }}
                                                            @else
                                                            <input type="checkbox" name="permission[access][]" value="{{ $permission }}"/>
                                                            <span></span>
                                                            {{ $permission }}
                                                            @endif
                                                        </label>
                                                    </div>
                                                     @endforeach
                                                </div>
                                                <a style="cursor: pointer" onclick="$(this).parent().find(':checkbox').prop('checked', true);">@lang('admin::common.text_select_all')</a> / <a style="cursor: pointer" onclick="$(this).parent().find(':checkbox').prop('checked', false);">@lang('admin::common.text_unselect_all')</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label>Modify</label>
                                                <div class="well well-sm" style="height: 200px; overflow: auto;">
                                                    @foreach($permissions as $permission)
                                                        <div class="checkbox">
                                                            <label class="css-input css-checkbox css-checkbox-sm css-checkbox-primary">
                                                                @if(in_array($permission, $modify, true))
                                                                    <input type="checkbox" name="permission[access][]" value="{{ $permission }}" checked="checked"/>
                                                                    <span></span>
                                                                    {{ $permission }}
                                                                @else
                                                                    <input type="checkbox" name="permission[access][]" value="{{ $permission }}"/>
                                                                    <span></span>
                                                                    {{ $permission }}
                                                                @endif
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a style="cursor: pointer" onclick="$(this).parent().find(':checkbox').prop('checked', true);">@lang('admin::common.text_select_all')</a> / <a style="cursor: pointer" onclick="$(this).parent().find(':checkbox').prop('checked', false);">@lang('admin::common.text_unselect_all')</a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Permissions</th>
                                                <th style="width: 20px;">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="check-all-access">
                                                        <label class="custom-control-label" for="check-all-access">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th style="width: 20px;">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="check-all-modify">
                                                        <label class="custom-control-label" for="check-all-modify">&nbsp;</label>
                                                    </div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>route</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="check-access-log">
                                                        <label class="custom-control-label" for="check-access-log">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="check-modify-log">
                                                        <label class="custom-control-label" for="check-modify-log">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>



                                            </tbody>
                                        </table>
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

