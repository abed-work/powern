<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use DB;

class LiraController extends Controller
{
    //
    public function index(){
        $json = file_get_contents('https://lirarate.org/wp-json/lirarate/v2/rates?currency=LBP&_ver=t2021112210');
        $obj = json_decode($json,True);
        $dollarRateToday = $obj['buy'][count($obj['buy'])-1][1];

        DB::table('settings')
            ->where('key', 'dollarRate') 
            ->limit(1) 
            ->update(array('value' => $dollarRateToday));  
                
    }

}
