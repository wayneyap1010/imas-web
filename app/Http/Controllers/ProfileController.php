<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Hash;
use Redirect;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $db_user = Auth::user();

        $db_company = DB::table('company')->where('id', $db_user['comp_id'])->first();

        return view('profile', [
            'db_user' => $db_user,
            'db_company' => $db_company,
        ]);
    }

    public function update(Request $req)
    {
        if (isset($req['password'])) {
            if ($req['password'] == $req['reenter_password']) {
                $update_data = [
                    'mobile' => $req['mobile'],
                    'password' => Hash::make($req['password']),
                    'street' => $req['street'],
                    'city' => $req['city'],
                    'state' => $req['state'],
                    'postal' => $req['postal'],
                ];

                Session::flash('success', "Updated!");
            } elseif ($req['password'] != $req['reenter_password']) {
                $update_data = [
                    'mobile' => $req['mobile'],
                    'street' => $req['street'],
                    'city' => $req['city'],
                    'state' => $req['state'],
                    'postal' => $req['postal'],
                ];

                Session::flash('error', "Password not match!");
            }
        } else {
            $update_data = [
                'mobile' => $req['mobile'],
                'street' => $req['street'],
                'city' => $req['city'],
                'state' => $req['state'],
                'postal' => $req['postal'],
            ];

            Session::flash('success', "Updated!");
        }

        DB::table('users')->where('id', $req['user_id'])->update($update_data);
        return Redirect::back();
    }
}
