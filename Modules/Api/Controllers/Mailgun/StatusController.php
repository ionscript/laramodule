<?php

declare(strict_types=1);

namespace Modules\Api\Controllers\Mailgun;

use Illuminate\Http\Request;
use Modules\Api\Controllers\Controller;


class StatusController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
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
