<?php

declare(strict_types=1);

namespace Modules\Account\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    public function showRegistrationForm()
    {
        return $this->template('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson() ? new Response('', 201) : redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user) {}
}
