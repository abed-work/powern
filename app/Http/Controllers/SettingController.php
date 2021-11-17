<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{
    public function update(Request $request){
        $skip=true;
        // Skip the first iteration (_token)
        foreach($request->all() as $key=>$value){
            if (!$skip){
                $setting = DB::table('settings')
                            ->where('key', $key)
                            ->update(['value'=>$value]);
            }
            $skip=false;
        }
        return redirect()
                ->route('dashboard.setting')
                ->with('success','Settings have been saved!');
    }
}
