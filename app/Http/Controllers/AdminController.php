<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException as QueryException;
use Redirect;
use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AdminController extends Controller
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
        $auth_id = Auth()->user()->id;

        $company_id = DB::table('company')->select('id')->where('users_id', $auth_id)->first();

        $db_user = DB::table('users')->select(
            'id',
            'name',
            'email',
            'email_verified_at',
            'mobile',
            'street',
            'state',
            'city',
            'postal',
            'created_at',
            'updated_at'
        )->where('comp_id', $company_id->id)->get();

        return view('admin_management', [
            'db_user' => $db_user,
        ]);
    }

    public function create()
    {
        return view('admin_management_create');
    }

    public function store(Request $req)
    {
        $auth_id = Auth()->user()->id;

        $company_id = DB::table('company')->select('id')->where('users_id', $auth_id)->first();
        //TODO: send email for verification
        try {
            $user_id = DB::table('users')->insertGetId([
                'comp_id' => $company_id->id,
                'name' => $req['fullName'],
                'email' => $req['eMail'],
                'password' => 'test',
                'mobile' => $req['phone'],
                'street' => $req['street'],
                'state' => $req['fullName'],
                'city' => $req['city'],
                'postal' => $req['postal'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $user = User::find($user_id);
            $user->assignRole('admin');

            Session::flash('success', "New Admin has been added!");
            return Redirect::back();
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                Session::flash('error', "The email has been exist!");
                return Redirect::back();
            }
        }
    }

    public function update(Request $req)
    {
        //TODO: create edit page
    }
}
