@extends('admin::theme.default.layouts.master')

@section('title') Log @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Log @endslot
        @slot('li_1')  System @endslot
        @slot('li_2') Log @endslot
    @endcomponent

    <div class="row">
        <div class="card card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-sm-right text-white">
                        <a href="/admin/log/download" class="btn btn-primary waves-effect waves-light mb-2 mr-2">
                            <i class="bx bxs-download font-size-16 align-middle mr-2"></i> @lang('common.button_download')
                        </a>
                        <a href="/admin/log/clear" class="btn btn-danger waves-effect waves-light mb-2 mr-2">
                            <i class="bx bxs-trash font-size-16 align-middle mr-2"></i> @lang('common.button_clear')
                        </a>
                    </div>
                </div><!-- end col-->
            </div>
            <h3 class="card-title mt-0"><i class="bx bx-file"></i> laravel.log</h3>
            <p class="card-text">
                <textarea class="form-control" wrap="hard" rows="36" readonly disabled>{{ $log }}</textarea>
            </p>
        </div>
    </div>
@endsection
