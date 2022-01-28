@extends('admin::theme.default.layouts.master')

@section('title') Page Form @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Page Form @endslot
        @slot('li_1')  Page @endslot
        @slot('li_2') Page Form @endslot
    @endcomponent

    <form id="form" enctype="multipart/form-data" class="validation form-horizontal" method="post"
          action="{{ $action }}" novalidate="novalidate" autocomplete="off">

        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-sm-right text-white">
                            <a href="/admin/page" class="btn btn-secondary waves-effect mb-2 mr-2" data-toggle="tooltip" data-placement="top"  title="@lang('admin::common.button_cancel')">
                                <i class="bx bx-undo font-size-16 align-middle"></i>
                            </a>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mb-2 mr-2" data-toggle="tooltip" data-placement="top" title="@lang('admin::common.button_save')">
                                <i class="bx bxs-save font-size-16 align-middle"></i>
                            </button>

                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="card-title mb-4">Create New Page</h4>
                        <div class="form-group row mb-4">
                            <label for="front-page-title" class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input id="front-page-title" name="title" type="text" class="form-control"
                                       value="{{ $title ?? '' }}"
                                       placeholder="Enter Page Title...">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <textarea name="description" class="summernote">{{ $description ?? 'Hello Summernote' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="front-page-keyword" class="col-form-label col-lg-2">Keyword</label>
                            <div class="col-lg-10">
                                <input id="front-page-keyword" name="keyword" type="text"
                                       value="{{ $keyword ?? '' }}"
                                       placeholder="Enter Page Keyword..." class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="front-page-sort-order" class="col-form-label col-lg-2">Sort Order</label>
                            <div class="col-lg-10">
                                <input id="front-page-sort-order" name="sort_order" type="number"
                                       value="{{ $sort_order ?? 0 }}"
                                       placeholder="Enter Page Sort Order..." class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="front-page-column-order" class="col-form-label col-lg-2">Column Order</label>
                            <div class="col-lg-10">
                                <input id="front-page-column-order" name="column_order" type="number"
                                       value="{{ $column_order ?? 0 }}"
                                       placeholder="Enter Page Column Order..." class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Top</label>
                            <div class="custom-control custom-switch" dir="ltr">
                                <input type="checkbox" name="top"
                                       {{ isset($top) && $top ? 'checked' : '' }}
                                       class="custom-control-input" id="front-page-top"
                                       value="1">
                                <label class="custom-control-label" for="front-page-top"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Bottom</label>
                            <div class="custom-control custom-switch" dir="ltr">
                                <input type="checkbox" name="bottom"
                                       {{ isset($bottom) && $bottom ? 'checked' : '' }}
                                       class="custom-control-input" id="front-page-bottom"
                                       value="1">
                                <label class="custom-control-label" for="front-page-bottom"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Status</label>
                            <div class="custom-control custom-switch" dir="ltr">
                                <input type="checkbox" name="status"
                                       {{ isset($status) && $status ? 'status' : '' }}
                                       class="custom-control-input" id="front-page-status"
                                       value="1">
                                <label class="custom-control-label" for="front-page-status"></label>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary"><i class="bx bxs-save font-size-16 align-middle mr-2"></i> @lang('admin::common.button_save')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
