<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($type)
    {
        return view('auth.register', [
            'type' => $type,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        if ($request->type == 'customer') {
            $request->validate([
                'full_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone_number' => ['required', 'numeric', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'city_id' => 1,
            ]);

            event(new Registered($user));

            Session::put('guardName', $request->type);

            Auth::guard('guardName')->login($user);

            return redirect(RouteServiceProvider::CUSTOMER);

        }elseif ($request->type == 'owner'){
            $request->validate([
                'full_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
                'company_name' => ['required', 'string'],
                'phone_number' => ['required', 'numeric', 'unique:owners'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $owner = Owner::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'city_id' => 1,
            ]);

            Session::put('guardName', $request->type);

            event(new Registered($owner));

            Auth::guard(session('guardName'))->login($owner);

            return redirect(RouteServiceProvider::OWNER);
        }

    }
}
