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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // To be   

        $lebanesePound  = Currency::findOrFail(1);
        $turkishLira    = Currency::findOrFail(2);
        $usd    = Currency::findOrFail(3);

        $lebanesePound->isActive = 0;
        $turkishLira->isActive = 0;
        $usd->isActive = 0;

        $lebanesePound->save();
        $turkishLira->save();
        $usd->save();

        if ($request->currencies){
            foreach($request->currencies as $currency){
                $curr = Currency::where('symbol',$currency)->first();
                $curr->isActive = 1;
                $curr->save();
            }
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
