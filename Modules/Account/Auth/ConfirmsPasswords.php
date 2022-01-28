<?php

declare(strict_types=1);

namespace Modules\Account\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait ConfirmsPasswords
{
    use RedirectsUsers;

    public function showConfirmForm()
    {
        return $this->template('auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $this->resetPasswordConfirmationTimeout($request);

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('account.auth.password_confirmed_at', time());
    }

    protected function rules()
    {
        return [
            'password' => 'required|password',
        ];
    }

    protected function validationErrorMessages()
    {
        return [];
    }
}
