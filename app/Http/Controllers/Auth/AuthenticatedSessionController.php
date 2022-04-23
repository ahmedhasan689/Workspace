<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create($type = 'customer')
    {
        return view('auth.login', compact('type'));

    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        if ($request->type == 'customer') {

            $guardName = 'web';

        } elseif ($request->type == 'owner') {

            $guardName = 'owner';

        }

        if ( Auth::guard($guardName)->attempt([ 'email' => $request->email, 'password' => $request->password])) {

            Session::put('guardName', $guardName);

            if ($request->type == 'customer') {

                return redirect()->intended(RouteServiceProvider::CUSTOMER);

            } elseif ($request->type == 'owner') {

                return redirect()->intended(RouteServiceProvider::OWNER);

            }
        }else{
            toastr()->error('There Is An Error !');
            return redirect()->back();
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard(session('guardName'))->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
