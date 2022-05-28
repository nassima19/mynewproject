<?php

namespace App\Http\Controllers;

use App\Models\charge;
use App\Models\produit;
use Illuminate\Http\Request;

class DashboaredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $charges = charge::where('statu','A Payée')->get();
        $chargesP = charge::where('statu','Payée')->get();
        $produits = produit::all();
        $Total=0;
        $TotalP=0;
        if($request->session()->has('Total')) 
        $request->session()->forget('Total');
        foreach($charges as $charge){
        $Total += $charge->prix*$charge->qte;
        $request->session()->put('Total',number_format($Total,2,".",""));
}
        if($request->session()->has('TotalP')) 
        $request->session()->forget('TotalP');
        foreach($chargesP as $charge){
            $TotalP += $charge->prix*$charge->qte;
            $request->session()->put('TotalP',number_format($TotalP,2,".",""));
        }
        return view('dashboard.index',compact('charges','produits'));
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
        //
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
        //
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
