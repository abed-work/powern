<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PagesController extends Controller
{
    public function index(){
        $featuredCategories = Category::all();
        return view('pages.welcome',[
            'featuredCategories'=>$featuredCategories
        ]);
    }
}
