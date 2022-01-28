@extends('admin::theme.default.layouts.master')

@section('title') Settings @endsection

@section('content')

    @component('admin::theme.default.common.breadcrumb')
        @slot('title') Settings @endslot
        @slot('li_1')  System @endslot
        @slot('li_2') Settings @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Settings</h4>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-app" role="tab" aria-selected="false">
                                App
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-mail" role="tab" aria-selected="true">
                                Mail
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-logging" role="tab" aria-selected="true">
                                Logging
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-filesystems" role="tab" aria-selected="true">
                                Filesystems
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-twilio" role="tab" aria-selected="true">
                                Twilio
                            </a>
                        </li>
                    </ul>

                    <form class="ui form" method="POST" action="/admin/settings/edit">
                        <!-- Tab panes -->
                        <div class="tab-content p-3">

                            <div class="tab-pane active" id="tab-app" role="tabpanel">
                                <div class="form-group row">
                                    <label for="app-key" class="col-md-2 col-form-label">Key</label>
                                    <div class="col-md-10">
                                        <input class="form-control bg-light" type="text" name="app[key]" value="{{ $app['key'] }}" id="app-key" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app-name" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="app[name]" value="{{ $app['name'] }}" id="app-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app-url" class="col-md-2 col-form-label">Url</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="app[url]" value="{{ $app['url'] }}" id="app-url">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="app-env" class="col-md-2 col-form-label">Env</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="app[env]" value="{{ $app['env'] }}" id="app-env">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="app-locale" class="col-md-2 col-form-label">Locale</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="app[locale]" value="{{ $app['locale'] }}" id="app-locale">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="app-timezone" class="col-md-2 col-form-label">Timezone</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="app[timezone]" value="{{ $app['timezone'] }}" id="app-timezone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Debug</label>
                                    <div class="custom-control custom-switch" dir="ltr">
                                        <input type="checkbox" name="app[debug]" class="custom-control-input" id="app-debug"
                                               value="true" {{ $app['debug'] ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="app-debug"></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle mr-2"></i> Save
                                </button>
                            </div>

                            <div class="tab-pane" id="tab-mail" role="tabpanel">
                                <div class="form-group row">
                                    <label for="mail-default" class="col-md-2 col-form-label">Driver</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="mail[default]" id="mail-default">
                                            <option value="smtp" {{ $mail['default'] === 'smtp' ? 'selected' : '' }}>smtp</option>
                                            <option value="sendmail" {{ $mail['default'] === 'sendmail' ? 'selected' : '' }}>sendmail</option>
                                            <option value="mailgun" {{ $mail['default'] === 'mailgun' ? 'selected' : '' }}>mailgun</option>
                                            <option value="mandrill" {{ $mail['default'] === 'mandrill' ? 'selected' : '' }}>mandrill</option>
                                            <option value="ses" {{ $mail['default'] === 'ses' ? 'selected' : '' }}>ses</option>
                                            <option value="sparkpost" {{ $mail['default'] === 'sparkpost' ? 'selected' : '' }}>sparkpost</option>
                                            <option value="log" {{ $mail['default'] === 'log' ? 'selected' : '' }}>log</option>
                                            <option value="array" {{ $mail['default'] === 'array' ? 'selected' : '' }}>array</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-host" class="col-md-2 col-form-label">Hostname</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[mailers][mail[default]][host]" value="{{ $mail['mailers'][$mail['default']]['host'] }}" id="mail-host">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-username" class="col-md-2 col-form-label">Username</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[mailers][mail[default]][username]" value="{{ $mail['mailers'][$mail['default']]['username'] }}" id="mail-username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-password" class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[mailers][mail[default]][password]" value="{{ $mail['mailers'][$mail['default']]['password'] }}" id="mail-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-port" class="col-md-2 col-form-label">Port</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[mailers][mail[default]][port]" value="{{ $mail['mailers'][$mail['default']]['port'] }}" id="mail-port">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-encryption" class="col-md-2 col-form-label">Encryption</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[mailers][mail[default]][encryption]" value="{{ $mail['mailers'][$mail['default']]['encryption'] }}" id="mail-encryption">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-timeout" class="col-md-2 col-form-label">Timeout</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[mailers][mail[default]][timeout]" value="{{ $mail['mailers'][$mail['default']]['timeout'] }}" id="mail-timeout">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-name" class="col-md-2 col-form-label">From Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[form][name]" value="{{ $mail['from']['name'] }}" id="mail-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail-address" class="col-md-2 col-form-label">From Address</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mail[form][address]" value="{{ $mail['from']['address'] }}" id="mail-address">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle mr-2"></i> Save
                                </button>
                            </div>

                            <div class="tab-pane" id="tab-logging" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column  nav-pills" role="tablist">
                                            <a class="nav-link mb-2 {{ $logging['default'] === 'stack' ? 'active' : '' }}" id="v-pills-logging-stack" data-toggle="pill" href="#v-pills-logging-stack-tab" role="tab"
                                               aria-selected="{{ $logging['default'] === 'stack' ? 'true' : 'false' }}">Stack</a>
                                            <a class="nav-link mb-2 {{ $logging['default'] === 'single' ? 'active' : '' }}" id="v-pills-logging-single" data-toggle="pill" href="#v-pills-logging-single-tab" role="tab"
                                               aria-selected="{{ $logging['default'] === 'single' ? 'true' : 'false' }}">Single</a>
                                            <a class="nav-link mb-2 {{ $logging['default'] === 'daily' ? 'active' : '' }}" id="v-pills-logging-daily" data-toggle="pill" href="#v-pills-logging-daily-tab" role="tab"
                                               aria-selected="{{ $logging['default'] === 'daily' ? 'true' : 'false' }}">Saily</a>
                                            <a class="nav-link mb-2 {{ $logging['default'] === 'syslog' ? 'active' : '' }}" id="v-pills-logging-syslog" data-toggle="pill" href="#v-pills-logging-syslog-tab" role="tab"
                                               aria-selected="{{ $logging['default'] === 'syslog' ? 'true' : 'false' }}">Syslog</a>
                                            <a class="nav-link mb-2 {{ $logging['default'] === 'errorlog' ? 'active' : '' }}" id="v-pills-logging-syslog" data-toggle="pill" href="#v-pills-logging-errorlog-tab" role="tab"
                                               aria-selected="{{ $logging['default'] === 'errorlog' ? 'true' : 'false' }}">Errorlog</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0">
                                            {{-- Stack tab begin --}}
                                            <div class="tab-pane fade {{ $logging['default'] === 'stack' ? 'show active' : '' }}" id="v-pills-logging-stack-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="logging-stack-channels" class="col-md-2 col-form-label">Channels</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][stack][channels]" value="{{ $logging['channels']['stack']['channels'][0] }}" id="logging-stack-channels">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Ignore Exceptions</label>
                                                    <div class="custom-control custom-switch" dir="ltr">
                                                        <input type="checkbox" name="logging[channels][stack][ignore_exceptions]" class="custom-control-input" id="logging-stack-ignore_exceptions"
                                                               value="true" {{ $logging['channels']['stack']['ignore_exceptions'] === 'stack'? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="logging-stack-ignore_exceptions"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Stack tab end --}}

                                            {{-- Single tab begin --}}
                                            <div class="tab-pane fade {{ $logging['default'] === 'single' ? 'show active' : '' }}" id="v-pills-logging-single-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="logging-single-path" class="col-md-2 col-form-label">Path</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][single][path]" value="{{ $logging['channels']['single']['path'] }}" id="logging-single-path">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="logging-single-level" class="col-md-2 col-form-label">Level</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][single][level]" value="{{ $logging['channels']['single']['level'] }}" id="logging-single-level">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Single tab end --}}

                                            {{-- Daily tab begin --}}
                                            <div class="tab-pane fade {{ $logging['default'] === 'daily' ? 'show active' : '' }}" id="v-pills-logging-daily-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="logging-daily-path" class="col-md-2 col-form-label">Path</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][daily][path]" value="{{ $logging['channels']['daily']['path'] }}" id="logging-daily-path">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="logging-daily-level" class="col-md-2 col-form-label">Level</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][daily][level]" value="{{ $logging['channels']['daily']['level'] }}" id="logging-daily-level">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="logging-daily-days" class="col-md-2 col-form-label">Days</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][daily][days]" value="{{ $logging['channels']['daily']['days'] }}" id="logging-daily-days">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Daily tab end --}}

                                            {{-- Syslog tab begin --}}
                                            <div class="tab-pane fade {{ $logging['default'] === 'syslog' ? 'show active' : '' }}" id="v-pills-logging-syslog-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="logging-syslog-level" class="col-md-2 col-form-label">Level</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][syslog][level]" value="{{ $logging['channels']['syslog']['level'] }}" id="logging-syslog-level">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ErrorLog tab end --}}

                                            {{-- ErrorLog tab begin --}}
                                            <div class="tab-pane fade {{ $logging['default'] === 'errorlog' ? 'show active' : '' }}" id="v-pills-logging-errorlog-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="logging-errorlog-level" class="col-md-2 col-form-label">Level</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="logging[channels][errorlog][level]" value="{{ $logging['channels']['errorlog']['level'] }}" id="logging-errorlog-level">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ErrorLog tab end --}}

                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                <i class="bx bx-save font-size-16 align-middle mr-2"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="tab-filesystems" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" role="tablist">
                                            <a class="nav-link mb-2 active" id="v-pills-filesystems-default" data-toggle="pill" href="#v-pills-filesystems-default-tab" role="tab"
                                               aria-selected="true">Default</a>
                                            <a class="nav-link mb-2" id="v-pills-filesystems-cloud" data-toggle="pill" href="#v-pills-filesystems-cloud-tab" role="tab"
                                               aria-selected="false">Cloud</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0">
                                            {{-- Filesystems default tab begin --}}
                                            <div class="tab-pane fade show active" id="v-pills-filesystems-default-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="filesystems-default" class="col-md-2 col-form-label">Default</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[default]" value="{{ $filesystems['default'] }}" id="filesystems-default">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-local-driver" class="col-md-2 col-form-label">Local Driver</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][local][driver]" value="{{ $filesystems['disks']['local']['driver'] }}" id="filesystems-local-driver">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-local-root" class="col-md-2 col-form-label">Local Root</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][local][root]" value="{{ $filesystems['disks']['local']['root'] }}" id="filesystems-local-root">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-public-driver" class="col-md-2 col-form-label">Public Driver</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][public][driver]" value="{{ $filesystems['disks']['public']['driver'] }}" id="filesystems-public-driver">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-public-root" class="col-md-2 col-form-label">Public Root</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][public][root]" value="{{ $filesystems['disks']['public']['root'] }}" id="filesystems-public-root">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-public-url" class="col-md-2 col-form-label">Public Url</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][public][url]" value="{{ $filesystems['disks']['public']['url'] }}" id="filesystems-public-url">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-public-visibility" class="col-md-2 col-form-label">Visibility</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][public][visibility]" value="{{ $filesystems['disks']['public']['visibility'] }}" id="filesystems-public-visibility">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Filesystems default tab end --}}

                                            <div class="tab-pane fade" id="v-pills-filesystems-cloud-tab" role="tabpanel">
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud" class="col-md-2 col-form-label">Cloud</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[cloud]" value="{{ $filesystems['cloud'] }}" id="filesystems-cloud">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-driver" class="col-md-2 col-form-label">Cloud Driver</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][driver]" value="{{ $filesystems['disks'][$filesystems['cloud']]['driver'] }}" id="filesystems-cloud-driver">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-key" class="col-md-2 col-form-label">Cloud Key</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][key]" value="{{ $filesystems['disks'][$filesystems['cloud']]['key'] }}" id="filesystems-cloud-key">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-secret" class="col-md-2 col-form-label">Cloud Secret</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][secret]" value="{{ $filesystems['disks'][$filesystems['cloud']]['secret'] }}" id="filesystems-cloud-secret">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-region" class="col-md-2 col-form-label">Cloud Region</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][region]" value="{{ $filesystems['disks'][$filesystems['cloud']]['region'] }}" id="filesystems-cloud-region">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-bucket" class="col-md-2 col-form-label">Cloud Bucket</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][bucket]" value="{{ $filesystems['disks'][$filesystems['cloud']]['bucket'] }}" id="filesystems-cloud-bucket">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-url" class="col-md-2 col-form-label">Cloud Url</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][url]" value="{{ $filesystems['disks'][$filesystems['cloud']]['url'] }}" id="filesystems-cloud-url">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="filesystems-cloud-endpoint" class="col-md-2 col-form-label">Cloud Endpoint</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="filesystems[disks][cloud][endpoint]" value="{{ $filesystems['disks'][$filesystems['cloud']]['endpoint'] }}" id="filesystems-cloud-endpoint">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bx-save font-size-16 align-middle mr-2"></i> Save
                                    </button>
                                </div>
                            </div>


                            <div class="tab-pane" id="tab-twilio" role="tabpanel">
                                <div class="form-group row">
                                    <label for="twilio-account_sid" class="col-md-2 col-form-label">Account sid</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="twilio[account_sid]" value="{{ $twilio['keys']['account_sid'] }}" id="twilio-account_sid">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twilio-auth_token" class="col-md-2 col-form-label">Auth Token</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="twilio[auth_token]" value="{{ $twilio['keys']['auth_token'] }}" id="twilio-auth_token">
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label for="twilio-app_sid" class="col-md-2 col-form-label">App sid</label>--}}
{{--                                    <div class="col-md-10">--}}
{{--                                        <input class="form-control" type="text" name="twilio[app_sid]" value="{{ $twilio['app_sid'] }}" id="twilio-app_sid">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle mr-2"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

