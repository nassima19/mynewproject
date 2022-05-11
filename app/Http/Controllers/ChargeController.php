<?php

namespace App\Http\Controllers;

use App\Models\charge;
use App\Models\produit;
use App\Models\fournisseur;
use App\Http\Requests\StorechargeRequest;
use App\Http\Requests\UpdatechargeRequest;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chargerge=charge::with('fournisseur')->get();
        return view("charge.index")->with([
         "charge"=> charge::paginate(5)
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
      /*   $fournisseur = fournisseur::all(); */
        $produit = produit::all();
        $fournisseur = fournisseur::all();
        return view('charge.create',compact('produit','fournisseur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorechargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorechargeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show(charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit(charge $charge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatechargeRequest  $request
     * @param  \App\Models\charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatechargeRequest $request, charge $charge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy(charge $charge)
    {
        //
    }
}
