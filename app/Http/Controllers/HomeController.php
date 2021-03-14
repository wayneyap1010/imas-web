<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Auth;

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
        // Role::create(['name' => 'company']);
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'employee']);
        // Role::create(['name' => 'developer']);
        // Auth()->user()->assignRole('developer');

        $db_user = DB::table('users')
            ->where('id', Auth()->id())
            ->first();

        // --get total user with role of employee
        $sum_users = DB::table('users AS u')
            ->select(DB::raw('count(id) AS total'))
            ->leftJoin('model_has_roles AS mhr', 'mhr.model_id', 'u.id')
            ->where('u.comp_id', $db_user->comp_id)
            ->where('mhr.role_id', 3)
            ->first();

        $y_data = ceil($sum_users->total / 10) * 10;

        $db_attd = DB::table('users AS u')
            ->select('a.*')
            ->leftJoin('attendances AS a', 'u.id', 'a.user_id')
            ->leftJoin('model_has_roles AS mhr', 'mhr.model_id', 'u.id')
            ->where('u.comp_id', $db_user->comp_id)
            ->where('mhr.role_id', 3)
            ->whereMonth('a.mobile_date', date('m'))
            ->whereYear('a.mobile_date', date('Y'))
            ->get();

        $dim = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $arrDay = [];

        for ($i = 0; $i <= $dim; $i++) {
            $clock_in = 0;
            $clock_out = 0;
            $arrDim[] = $i;

            $arrDay['in'][$i] = 0;
            $arrDay['out'][$i] = 0;
            foreach ($db_attd as $attd) {
                // dump($attd->mobile_date == date('Y-m-' . $i));
                if ($attd->mobile_date == date('Y-m-d', strtotime(date('Y-m-' . $i)))) {
                    if ($attd->clock == 'in') {
                        $clock_in++;
                        $arrDay['in'][$i] = $clock_in;
                    } elseif ($attd->clock == 'out') {
                        $clock_out++;
                        $arrDay['out'][$i] = $clock_out;
                        // dump($attd);
                    }
                }
            }
        }

        $chartArr = array(
            'chart' => ['labels' => $arrDim],
            'datasets' => [
                ['name' => 'Clock In', 'values' => $arrDay['in']],
                ['name' => 'Clock Out', 'values' => $arrDay['out']],
            ]
        );
        $jsonChartData = json_encode($chartArr);

        return view('home', [
            'chartData' => $jsonChartData,
        ]);
    }
}
