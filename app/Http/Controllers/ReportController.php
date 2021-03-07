<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ReportController extends Controller
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
        return view('report');
    }

    public function search(Request $request)
    {
        $daterange = explode(' - ', $request['daterange']);

        $date_from = date('Y-m-d', strtotime($daterange[0]));
        $date_to = date('Y-m-d', strtotime($daterange[1]));
        // dump($date_from);
        // dd($date_to);

        $db_attds = DB::table('attendances as a')
            ->select('a.*', 'u.name', 'u.email')
            ->leftJoin('users as u', 'u.id', 'a.user_id')
            ->where('u.comp_id', Auth::user()->comp_id)
            ->whereBetween('a.mobile_date', [$date_from, $date_to])
            ->get();

        return view('report', [
            'db_attds' => $db_attds,
            'search_date' => $request['daterange'],
        ]);
    }
}
