<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\System;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{App, Artisan, File};
use Modules\Admin\Model\System\Setting;
use Modules\Admin\Controllers\Controller;


class SettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->middleware('auth:admin');
        $this->setting = $setting;
    }

    public function index()
    {
        $data = array_replace_recursive(config()->all(), $this->setting->getSetting('config'));

        $data['cached'] = App::configurationIsCached();

        return $this->template('system.setting', $data);
    }

    public function edit(Request $request)
    {
        $data['app'] = $request->input('app');
        $data['mail'] = $request->input('mail');
        $data['logging'] = $request->input('logging');
        $data['filesystems'] = $request->input('filesystems');
        $data['twilio'] = $request->input('twilio');

        if (!App::configurationIsCached()) {
            Artisan::call('config:cache');
        }

        $data = array_replace_recursive(config()->all(), [
            'app' => $request->input('app'),
            'mail' => $request->input('mail'),
            'logging' => $request->input('logging'),
            'filesystems' => $request->input('filesystems'),
            'twilio' => $request->input('twilio')
        ]);

        File::put(base_path('bootstrap/cache/config.php'), '<?php return ' . var_export($data, true) . ';');

        $this->setting->editSetting('config', $data);

        return redirect(route('setting'));
    }
}
