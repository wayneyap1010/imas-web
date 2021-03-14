<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClockController extends Controller
{
    public function inOut()
    {
        /*
        ---- data from request
        {
            "longitude":-122.0537683,
            "latitude":37.4013667,
            "timestamp":1615016455000,
            "accuracy":20.0,
            "altitude":0.0,
            "heading":0.0,
            "speed":0.0,
            "speed_accuracy":0.0,
            "is_mocked":false,
            "mobile_date":"2021-03-06",
            "mobile_time":"15:40"
            "house_no":20,
            "street":20,
            "country":"Malaysia",
            "postal_code":13700,
            "state":"Pulau Pinang",
            "city":"Seberang Jaya",
            "area":"Taman Sutera",
            "street_name":Lorong Sutera 4,
            "email":support@windtersoft.com,
        }
        */

        $db_user = DB::table('users')
            ->select('id')
            ->where('email', request('email'))
            ->first();

        $db_attd = DB::table('attendances')
            ->where('user_id', $db_user->id)
            ->where('mobile_date', request('mobile_date'))
            ->where('clock', request('clock_status'))
            ->first();

        if (!isset($db_attd) && empty($db_attd)) {

            $db_exist_in = DB::table('attendances')
                ->where('user_id', $db_user->id)
                ->where('mobile_date', request('mobile_date'))
                ->where('clock', 'in')
                ->first();

            if (!isset($db_exist_in) && empty($db_exist_in) && request('clock_status') == 'out') {
                return response()->json([
                    'success' => false,
                    'type' => 'error',
                    'msg' => 'Please clock in first',
                ]);
            } else {
                $db_attd = DB::table('attendances')->insert([
                    'user_id' => $db_user->id,
                    'clock' => request('clock_status'),
                    'mobile_date' => request('mobile_date'),
                    'mobile_time' => request('mobile_time'),
                    'longitude' => request('longitude'),
                    'latitude' => request('latitude'),
                    'timestamp' => request('timestamp'),
                    'accuracy' => request('accuracy'),
                    'altitude' => request('altitude'),
                    'heading' => request('heading'),
                    'speed' => request('speed'),
                    'speed_accuracy' => request('speed_accuracy'),
                    'is_mocked' => request('is_mocked'),
                    'house_no' => request('house_no'),
                    'street' => request('street'),
                    'country' => request('country'),
                    'postal_code' => request('postal_code'),
                    'state' => request('state'),
                    'city' => request('city'),
                    'area' => request('area'),
                    'street_name' => request('street_name'),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return response()->json([
                    'success' => true,
                    'type' => 'success',
                    'msg' => 'Clock ' . request('clock_status') . ' success',
                ]);
            }
        } elseif (isset($db_attd) && !empty($db_attd)) {
            return response()->json([
                'success' => false,
                'type' => 'error',
                'msg' => 'Clock ' . request('clock_status') . ' existed',
            ]);
        }
    }

    public function monthlyAttendances()
    {
        $db_user = DB::table('users')
            ->select('id')
            ->where('email', request('email'))
            ->first();


        if (isset($db_user) && !empty($db_user)) {
            $db_attd = DB::table('attendances')
                ->select('clock', 'mobile_date', 'mobile_time')
                ->where('user_id', $db_user->id)
                ->orderBy('id', 'DESC')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $db_attd,
                'email' => request('email'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => '',
                'email' => request('email'),
            ]);
        }
    }
}
