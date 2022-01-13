<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;


class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    function convertCurrency($amount=1,$from_currency="USD",$to_currency="TRY"){
        $apikey = '2d835398367fa2211d89';
      
        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";
      
        // change to the free URL if you're using the free version
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
        $obj = json_decode($json, true);
      
        $val = floatval($obj["$query"]);
      
      
        $total = $val * $amount;
        $numberFormat = number_format($total, 2, '.', '');

        $turkishLira = Currency::where('symbol','TL')->get()->first();
        $turkishLira->value = $numberFormat;
        $turkishLira->save();
    }
    
    public function lebaneseLiraApi(){
        $api = "https://lirarate.org/wp-json/lirarate/v2/rates?currency=LBP&_ver=t202211313";
        $json = json_decode(file_get_contents($api),true);

        $lebaneseRate = $json['buy'][count($json['buy'])-1][1];

        $LBP = Currency::where('symbol','LBP')->get()->first();
        $LBP->value = $lebaneseRate;
        $LBP->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request);

        $lebanesePound  = Currency::findOrFail(1);
        $turkishLira    = Currency::findOrFail(2);
        $usd    = Currency::findOrFail(3);

        $lebanesePound->isActive = 0;
        $turkishLira->isActive = 0;
        $usd->isActive = 0;

        $lebanesePound->save();
        $turkishLira->save();
        $usd->save();

        $curr = Currency::where('symbol',$request->currency)->first();
        $curr->isActive = 1;
        $curr->save();

        if ($request->curren_usd){
            $usd->isActive=1;
            $usd->save();
        }
 


        $lebanesePound  = Currency::findOrFail(1);
        $turkishLira    = Currency::findOrFail(2);

        $lebanesePound->value = $request->LBP_value;
        $turkishLira->value = $request->TL_value;

        $lebanesePound->save();
        $turkishLira->save();

        return redirect()->route('dashboard.setting');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
