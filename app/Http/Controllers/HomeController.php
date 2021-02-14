<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
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
        // Role::create(['name' => 'developer']);
        // Auth()->user()->assignRole('developer');

        $dim = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $dim; $i++) {
            $arrDim[] = $i;
        }

        $chartArr = array(
            'chart' => ['labels' => $arrDim],
            'datasets' => [
                ['name' => 'Present', 'values' =>     [6, 5, 0, 0, 6, 3, 6, 6, 6, 0, 0, 4, 6, 6, 6, 0, 0, 6, 1, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]],
                ['name' => 'Not Present', 'values' => [0, 1, 6, 6, 0, 3, 0, 0, 0, 6, 6, 2, 0, 0, 0, 6, 6, 0, 5, 0, 0, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6]],
            ]
        );
        $jsonChartData = json_encode($chartArr);

        return view('home', [
            'chartData' => $jsonChartData,
        ]);
    }
}
