@extends('admin::theme.default.layouts.master')

@section('title') Customer Form @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Customer Form @endslot
        @slot('li_1')  Customer @endslot
        @slot('li_2') Customer Form @endslot
    @endcomponent

    <form id="form" enctype="multipart/form-data" class="validation form-horizontal" method="post"
          action="{{ $action }}" novalidate="novalidate" autocomplete="off">

        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-sm-right text-white">
                            <a href="/admin/customer" class="btn btn-secondary waves-effect mb-2 mr-2" data-toggle="tooltip" data-placement="top"  title="@lang('admin::common.button_cancel')">
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

                            <h4 class="card-title">Personal Info</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <div class="row">


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="customer-name">Username</label>
                                        <input id="customer-name" name="customer[username]" type="text" class="form-control" value="{{ $customer['username'] ?? '' }}">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer-firstname">First Name</label>
                                        <input id="customer-firstname" name="customer[firstname]" type="text" class="form-control" value="{{ $customer['firstname'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer-email">Email</label>
                                        <input id="customer-email" name="customer[email]" type="email" class="form-control" value="{{ $customer['email'] ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="customer-password">Password</label>
                                        <input id="customer-password" name="customer[password]" type="password" class="form-control" value="">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Newsletter</label>
                                        <div class="custom-control custom-switch mt-2" dir="ltr">
                                            <input type="checkbox" name="customer[newsletter]"
                                                   {{ isset($customer['newsletter']) && $customer['newsletter'] ? 'newsletter' : '' }}
                                                   class="custom-control-input" id="customer-newsletter"
                                                   value="1">
                                            <label class="custom-control-label" for="customer-newsletter"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer-lastname">Last Name</label>
                                        <input id="customer-lastname" name="customer[lastname]" type="text" class="form-control" value="{{ $customer['lastname'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer-phone">Phone Number</label>
                                        <input id="customer-phone" name="customer[phone]" type="text" class="form-control" value="{{ $customer['phone'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer-password-confirm">Password Confirm</label>
                                        <input id="customer-password-confirm" name="customer[password_confirm]" type="password" class="form-control" value="">
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




                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Company Info</h4>
                                <p class="card-title-desc">Fill all information below</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="company-name">Company Name</label>
                                            <input id="company-name" name="company[name]" type="text" class="form-control" value="{{ $company['name'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company-firstname">First Name</label>
                                            <input id="company-firstname" name="company[firstname]" type="text" class="form-control" value="{{ $company['firstname'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="company-email">Email</label>
                                            <input id="company-email" name="company[email]" type="email" class="form-control" value="{{ $company['email'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company-lastname">Last Name</label>
                                            <input id="company-lastname" name="company[lastname]" type="text" class="form-control" value="{{ $company['lastname'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="company-phone">Phone Number</label>
                                            <input id="company-phone" name="company[phone]" type="text" class="form-control" value="{{ $company['phone'] ?? '' }}">
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




                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Address</h4>
                                <p class="card-title-desc">Fill all information below</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address-address-1">Address 1</label>
                                            <input id="address-address-1" name="address[address_1]" type="text" class="form-control" value="{{ $address['address_1'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address-address-2">Address 2</label>
                                            <input id="address-address-2" name="address[address_2]" type="text" class="form-control" value="{{ $address['address_2']  ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address-city">City</label>
                                            <input id="address-city" name="address[city]" type="text" class="form-control" value="{{ $address['city'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address-country">Country</label>
                                            <input id="address-country" name="address[country]" type="email" class="form-control" value="{{ $address['country'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address-postcode">Post Code</label>
                                            <input id="address-postcode" name="address[postcode]" type="text" class="form-control" value="{{ $address['postcode'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address-state">Province/State</label>
                                            <input id="address-state" name="address[state]" type="text" class="form-control" value="{{ $address['state'] ?? '' }}">
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

