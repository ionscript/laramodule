@extends('admin::theme.default.layouts.master')

@section('title') Sms List @endsection

@section('content')
    <div class="ui bottom sms-routes attached segment" id="app" style="border: none">
        <sms-routes></sms-routes>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
