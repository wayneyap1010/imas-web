<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Mail;

class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function MailQueing($template, $subject, $from, $to, $body, $recipient_name)
    {
        // $db_email = DB::table('email_configurations')->first();

        // $transport = (new Swift_SmtpTransport($db_email->smtp_server, $db_email->smtp_port))
        //     ->setUsername($db_email->email_account)
        //     ->setPassword($db_email->email_password);

        // // Create the Mailer using your created Transport
        // $mailer = new Swift_Mailer($transport);

        // // Create a message
        // $message = (new Swift_Message($subject))
        //     ->setFrom($from)
        //     ->setTo($to)
        //     ->setBody($body, 'text/html');

        // // Send the message
        // $result = $mailer->send($message);
        $data = array('data' => $body);
        Mail::send($template, $data, function ($message) use ($subject, $from, $to, $recipient_name) {
            $message->to($to, $recipient_name)->subject($subject);
            $message->from($from, 'IMAS Admin');
        });
    }
}
