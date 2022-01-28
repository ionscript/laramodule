@extends('application::theme.default.layouts.master')

@section('title') {{ $title }} @endsection

@section('content')


    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <div class="bg-overlay bg-primary"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-5 hero-title">{{ $title }}</h1>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->



    <section class="section">
       <div class="container">
           @component('application::theme.default.common.breadcrumb')
               @slot('title') {{ $title }} @endslot
               @slot('li_1')  Home @endslot
               @slot('li_2')  Page @endslot
           @endcomponent
               <div class="row">
                   {{ $description }}
               </div>
               <!-- end row -->
       </div>
    </section>
       <!-- end container -->


@endsection