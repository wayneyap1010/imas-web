<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use PDO;

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

        if ($request['submit'] == 'export') {
            $fileName = date('Ymh_Hms') . 'IMAS_report.csv';

            $db_attds = DB::table('attendances as a')
                ->select('a.*', 'u.name', 'u.email')
                ->leftJoin('users as u', 'u.id', 'a.user_id')
                ->where('u.comp_id', Auth::user()->comp_id)
                ->whereBetween('a.mobile_date', [$date_from, $date_to])
                ->get();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array(
                'Date',
                'User Time',
                'System Time',
                'Clock',
                'Name',
                'Email',
                'Area',
                'City',
                'State',
                'Country',
            );

            $callback = function () use ($db_attds, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($db_attds as $a) {
                    $row['mobile_date'] = $a->mobile_date;
                    $row['mobile_time'] = $a->mobile_time;
                    $row['created_at'] = explode(' ', $a->created_at)[1];
                    $row['clock'] = $a->clock;
                    $row['name'] = $a->name;
                    $row['email'] = $a->email;
                    $row['area'] = $a->area;
                    $row['city'] = $a->city;
                    $row['state'] = $a->state;
                    $row['country'] = $a->country;

                    fputcsv($file, array(
                        $row['mobile_date'],
                        $row['mobile_time'],
                        $row['created_at'],
                        $row['clock'],
                        $row['name'],
                        $row['email'],
                        $row['area'],
                        $row['city'],
                        $row['state'],
                        $row['country'],
                    ));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } else {
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

    public function export()
    {
    }
}
