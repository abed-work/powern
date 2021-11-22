<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;

class PagesController extends Controller
{
    public function index(){
        $featuredCategories = Category::all();
        $dollarRate= Setting::where('key','dollarRate')->first();
        return view('pages.welcome',[
            'featuredCategories'=>$featuredCategories,
            'dollarRate'=>$dollarRate->value
        ]);
    }
}
