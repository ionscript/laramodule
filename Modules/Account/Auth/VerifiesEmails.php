<?php

declare(strict_types=1);

namespace Modules\Account\Auth;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


trait VerifiesEmails
{
    use RedirectsUsers;

    protected $user;

    public function show(Request $request)
    {
        $guard = $request->route() ? $request->route()->getPrefix() : '';

        return $request->user($guard)->hasVerifiedEmail() ? redirect($this->redirectPath()) : $this->template('auth.verify');
    }

    public function verify(Request $request)
    {
        $guard = $request->route() ? $request->route()->getPrefix() : '';

        if (! hash_equals((string) $request->route('id'), (string) $request->user($guard)->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user($guard)->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user($guard)->hasVerifiedEmail()) {
            return $request->wantsJson() ? new Response('', 204) : redirect($this->redirectPath());
        }

        if ($request->user($guard)->markEmailAsVerified()) {
            event(new Verified($request->user($guard)));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return $request->wantsJson() ? new Response('', 204) : redirect($this->redirectPath())->with('verified', true);
    }

    protected function verified(Request $request) {}

    public function resend(Request $request)
    {
        $guard = $request->route() ? $request->route()->getPrefix() : '';

        if ($request->user($guard)->hasVerifiedEmail()) {
            return $request->wantsJson() ? new Response('', 204) : redirect($this->redirectPath());
        }

        $request->user($guard)->sendEmailVerificationNotification();

        return $request->wantsJson() ? new Response('', 202) : back()->with('resent', true);
    }
}
