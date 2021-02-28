<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Session;
use App\Http\Controllers\Mail\SendMailController;
use Illuminate\Support\Str;
use Hash;
use DB;

class ManagementController extends Controller
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

        $db_user = DB::table('users AS u')->select(
            'u.id',
            'u.name',
            'u.email',
            'u.email_verified_at',
            'u.mobile',
            'u.street',
            'u.state',
            'u.city',
            'u.postal',
            'u.created_at',
            'u.updated_at'
        )
            ->leftJoin('model_has_roles AS mhr', 'mhr.model_id', 'u.id')
            ->leftJoin('roles AS r', 'r.id', 'mhr.role_id')
            ->where('r.name', 'employee')
            ->where('u.comp_id', $company_id->id)
            ->get();

        return view('management', [
            'db_user' => $db_user,
        ]);
    }

    public function create()
    {
        return view('management_create');
    }

    public function store(Request $req)
    {
        $sendMail = new SendMailController();
        $auth_id = Auth()->user()->id;

        $company_id = DB::table('company')->select('id')->where('users_id', $auth_id)->first();

        try {
            $random_pass = Str::random(12);
            $hash_pass = Hash::make($random_pass);

            $user_id = DB::table('users')->insertGetId([
                'comp_id' => $company_id->id,
                'name' => $req['fullName'],
                'email' => $req['eMail'],
                'password' => $hash_pass,
                'mobile' => $req['phone'],
                'street' => $req['street'],
                'state' => $req['fullName'],
                'city' => $req['city'],
                'postal' => $req['postal'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $user = User::find($user_id);
            $user->assignRole('employee');

            $data = [$req['fullName'], $random_pass];
            $sendMail->MailQueing('email/employee_create', 'IMAS Email Verification', 'support@imas.com', $req['eMail'], $data, $req['fullName']);

            Session::flash('success', "New Employee added, email sent!");
            return Redirect::back();
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                Session::flash('error', "The email has been exist!");
                return Redirect::back();
            }
        }
    }

    public function edit($management)
    {
        $row_id = $management;

        $db_user = User::where('id', $row_id)->first();

        return view('management_edit', [
            'db_user' => $db_user,
        ]);
    }

    public function update(Request $req, $management)
    {
        $user = User::find($management);

        $user->name = $req['fullName'];
        $user->email = $req['eMail'];
        $user->mobile = $req['phone'];
        $user->street = $req['street'];
        $user->city = $req['city'];
        $user->state = $req['state'];
        $user->postal = $req['postal'];
        $user->updated_at = date('Y-m-d H:i:s');

        $user->save();

        Session::flash('success', "Updated!");
        return Redirect::back();
    }
}
