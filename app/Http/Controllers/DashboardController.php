<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.admin.index');
    }

    public function category(){
        
        return view('pages.admin.category')->with('categories', Category::with('children')
                    ->whereNull('parent')
                    ->orderBy('name', 'asc')
                    ->get());
                    
    }

    public function product(){
        return view('pages.admin.product',[
            'categories'=>Category::all(),
            'products'=>Product::all()
        ]);
    }

    public function setting(){

        $usd = Currency::where('symbol','USD')->get()->first();
        $lbp = Currency::where('symbol','LBP')->get()->first();
        $tl = Currency::where('symbol','TL')->get()->first();

        return view('pages.admin.setting',[
            'settings'  => Setting::take(3)->get(),
            'USD'       => $usd,
            'LBP'       => $lbp,
            'TL'        => $tl
        ]);

    }

}
