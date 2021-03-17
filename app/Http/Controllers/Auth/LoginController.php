<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // TODO: maybe put the redirect back to login screen here
        // $db_user = DB::table('users AS u')
        //     ->leftJoin('model_has_roles AS mhr', 'mhr.model_id', 'u.id')
        //     ->leftJoin('roles AS r', 'r.id', 'mhr.role_id')
        //     ->where('u.email', $request['email'])
        //     ->where('r.name', 'admin')
        //     ->orWhere('r.name', 'developer')
        //     ->first();
        // // dd($db_user);
        // if (!isset($db_user) && empty($db_user)) {
        //     return redirect()->to(route('login'));
        // }

        $this->middleware('guest')->except('logout');
    }

    public function attemptLogin(Request $request)
    {
        $db_user = DB::table('users AS u')
            ->leftJoin('model_has_roles AS mhr', 'mhr.model_id', 'u.id')
            ->leftJoin('roles AS r', 'r.id', 'mhr.role_id')
            ->where('u.email', $request['email'])
            ->whereIn('r.name', ['admin', 'developer'])
            ->first();

        if (isset($db_user) && !empty($db_user)) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('dashboard');
            }
        } else {
            return redirect()->to(route('login'));
        }
    }
}
