<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Auth;

use Illuminate\Http\Request;
use Modules\Account\Auth\RegistersUsers;
use Modules\Account\Controllers\Controller;
use Modules\Account\Model\Account\Customer;
use Modules\Account\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:account');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:customer'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customer'],
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],

        ]);
    }

    protected function create(array $data, Request $request)
    {
        return Customer::create([
            'group_id' => 0,
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ip' => $request->ip(),
            'uuid' => Uuid::uuid4()->toString()
        ]);
    }
}
