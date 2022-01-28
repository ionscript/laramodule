@extends('admin::theme.default.layouts.master')

@section('title') Dashboard @endsection

@section('content')

   @component('admin::theme.default.common.breadcrumb')
         @slot('title') Dashboard @endslot
         @slot('li_1')  Default @endslot
         @slot('li_2') Template @endslot
     @endcomponent

@endsection