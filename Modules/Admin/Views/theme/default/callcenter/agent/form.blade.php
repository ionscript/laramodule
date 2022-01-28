@extends('admin::theme.default.layouts.master')

@section('title') Call Center @endsection




@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Agents @endslot
        @slot('li_1')  Call Center @endslot
        @slot('li_2') Agents @endslot
    @endcomponent


    <form id="form" method="POST" action="/admin/agents/register" novalidate="novalidate" autocomplete="off">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-sm-right text-white">
                    <a href="/admin/user" class="btn btn-secondary waves-effect mb-2 mr-2" data-toggle="tooltip"
                       data-placement="top" title="" data-original-title="Cancel">
                        <i class="bx bx-undo font-size-16 align-middle"></i>
                    </a>
                    <button type="submit" class="btn btn-primary waves-effect waves-light mb-2 mr-2" data-toggle="tooltip"
                            data-placement="top" title="" data-original-title="Save">
                        <i class="bx bxs-save font-size-16 align-middle"></i>
                    </button>

                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Personal Information</h4>
                        <p class="card-title-desc">Fill all information fields below</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input id="firstname" name="agent[first_name]" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input id="lastname" name="agent[last_name]" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input id="description" name="agent[description]" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="web-username">Web Username</label>
                                    <input id="web-username" name="agent[web_username]" type="text" class="form-control">
                                    <span class="text-muted">_@abvoice.com</span>
                                </div>

                                <div class="form-group">
                                    <label for="web-password">Web Password</label>
                                    <input id="web-password" name="agent[password]" type="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>TFTI general statistics access</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="agent[statistic_access]" class="custom-control-input"
                                               id="agent-statistic_access"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-statistic_access"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Create Conference</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="agent[conference_permission]" class="custom-control-input"
                                               id="agent-create_conference"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-create_conference"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Transfer All Calls To Mobile</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="agent[transfer_to_mobile_all_calls]"
                                               class="custom-control-input" id="agent-transfer_to_mobile_all_calls"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label"
                                               for="agent-transfer_to_mobile_all_calls"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agent-email">Employee Email</label>
                                    <input id="agent-email" name="agent[email]" class="form-control input-mask"
                                           data-inputmask="'alias': 'email'" im-insert="true">
                                </div>

                                <div class="form-group">
                                    <label for="agent-messenger">Instant Messenger</label>
                                    <input id="agent-messenger" name="agent[messanger]" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="agent-mobile_phone">Employee Mobile</label>
                                    <input id="agent-mobile_phone" name="agent[mobile_phone]" type="number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Send to mobile if offline</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="agent[transfer_to_mobile]" class="custom-control-input"
                                               id="agent-transfer_to_mobile"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-transfer_to_mobile"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="agent-keep_message">Keep Messages</label>

                                    <select id="agent-keep_message" class="form-control" name="agent[keep_message_id]">
                                        <option value="-1" selected>Forever</option>
                                        <option value="1">1 day</option>
                                        <option value="2">1 week</option>
                                        <option value="3">2 week</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Front Office Reports</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="agent[report_access]" class="custom-control-input"
                                               id="agent-report_access"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-report_access"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="agent-input_image">Avatar</label>
                                    <input type="file" name="agent[avatar_name]" value="" id="agent-input_image" accept="image/png, image/jpeg">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Voicemail Settings</h4>
                                <div class="form-group">
                                    <label for="agent-voicemail_email">Web Username</label>
                                    <input id="agent-voicemail_email" name="voicemail[email]" type="text"
                                           class="form-control">
                                    <span class="text-muted">_@abvoice.com</span>
                                </div>

                                <div class="form-group">
                                    <label for="agent-voicemail_greeting">Keep Messages</label>

                                    <select id="agent-voicemail_greeting" class="form-control" name="voicemail[greeting]">
                                        <option value="-1" selected>None</option>
                                        <option value="1">Default</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Voicemail Enabled</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="voicemail[enabled]" class="custom-control-input"
                                               id="agent-voicemail_enabled"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-voicemail_enabled"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email Attachments</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="voicemail[attachments]" class="custom-control-input"
                                               id="agent-voicemail_attachments"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-voicemail_attachments"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Delete When Emailed</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="voicemail[delete_when_emailed]"
                                               class="custom-control-input" id="agent-voicemail_delete_when_emailed"
                                               value="1" checked onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label"
                                               for="agent-voicemail_delete_when_emailed"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Extension</h4>
                                <div class="form-group">
                                    <label for="agent-extension_number">Extension</label>
                                    <input id="agent-extension_number" name="extension[number]" type="number"
                                           class="form-control" placeholder="302">
                                </div>

                                <div class="form-group">
                                    <label for="agent-extension_location">Location</label>
                                    <input id="agent-extension_location" name="extension[location]" type="text"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Private Extension</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="extension[private]" class="custom-control-input"
                                               id="agent-extension_private"
                                               value="0" onchange="$(this).val($(this).prop('checked') ? 1 : 0)">
                                        <label class="custom-control-label" for="agent-extension_private"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="agent-extension_ring_seconds">Ring Seconds</label>
                                    <select id="agent-extension_ring_seconds" class="form-control"
                                            name="extension[ring_seconds]">
                                        <option value="60" selected>60</option>
                                        <option value="50">50</option>
                                        <option value="40">40</option>
                                        <option value="30">30</option>
                                        <option value="20">20</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-primary mr-1 waves-effect waves-light" type="submit"><i
                                class="bx bx-check mr-2"></i>Save
                    </button>
                    <button class="btn btn-warning mr-1 waves-effect waves-light" type="reset"><i
                                class="bx bx-reset mr-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>
    </form>



@endsection
