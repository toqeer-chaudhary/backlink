<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utills\APP_CONSTS;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/project';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if (auth()->user()->status == APP_CONSTS::YES) { // if user status is inactive
            if (auth()->user()->is_admin == APP_CONSTS::YES) {
                return redirect()->route("admin");
            } else {
                return redirect()->route("project.index");
            }
        } else { // if not active
            $this->guard()->logout();
            return redirect()->route("login")
                ->with("failure", "Your are temporarily blocked");
        }
    }

}
