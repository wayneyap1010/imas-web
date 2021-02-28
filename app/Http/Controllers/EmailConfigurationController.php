<?php

namespace App\Http\Controllers;

use App\EmailConfiguration;
use Illuminate\Http\Request;
use Session;
use Redirect;

class EmailConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $db_email_config = EmailConfiguration::first();

        return view('email_configuration', [
            'db_email_config' => $db_email_config,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $emailConfiguration = new EmailConfiguration();

        // $emailConfiguration->smtp_server = $request['mailHost'];
        // $emailConfiguration->smtp_port = $request['mailPort'];
        // $emailConfiguration->email_account = $request['mailUsername'];
        // $emailConfiguration->email_password = $request['mailPassword'];
        // $emailConfiguration->save();

        \App\EmailConfiguration::updateOrCreate([
            'id' => 1,
        ], [
            'smtp_server' => $request['mailHost'],
            'smtp_port' => $request['mailPort'],
            'email_account' => $request['mailUsername'],
            'email_password' => $request['mailPassword'],
        ]);

        Session::flash('success', "Email configuration saved!");
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailConfiguration  $emailConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show(EmailConfiguration $emailConfiguration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailConfiguration  $emailConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailConfiguration $emailConfiguration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailConfiguration  $emailConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailConfiguration $emailConfiguration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailConfiguration  $emailConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailConfiguration $emailConfiguration)
    {
        //
    }
}
