<?php

namespace App\Http\Controllers;

use App\Models\charge;
use App\Models\produit;
use App\Models\categorie;
use App\Models\benificiere;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        foreach($charges as $charge)
        {
                $Total += $charge->prix*$charge->qte;
                $request->session()->put('Total',number_format($Total,2,".",""));
         }
        if($request->session()->has('TotalP')) 
        $request->session()->forget('TotalP');
        foreach($chargesP as $charge)
        {
            $TotalP += $charge->prix*$charge->qte;
            $request->session()->put('TotalP',number_format($TotalP,2,".",""));
        }
        //
         /* $produitss = produit::select(\DB::raw("COUNT(*) as count"))->groupBy('categorie_id')
            ->orderBy('libele')
            ->get();
         $categorieLible = categorie::find($produitss);      $chargeByMonth = charge::select(DB::raw("COUNT(*) as count, MONTH(created_at) as month"))->whereYear('created_at', '20'.date('y'))
         ->groupBy('month')->get(); */
         $numberfournisseurs = fournisseur::select(\DB::raw("COUNT(*) as count"))->get();
         $numberbeificiaires = benificiere::select(\DB::raw("COUNT(*) as count"))->get();
         $numbercategories = categorie::select(\DB::raw("COUNT(*) as count"))->get();
         $numbercharges = categorie::select(\DB::raw("COUNT(*) as count"))->get();
        return view('dashboard.index',compact('charges','produits'))->with([ 
            'depences' => charge::latest()->paginate(6),
            'numberfournisseurs'=>$numberfournisseurs,
             'numberbeificiaires'=>$numberbeificiaires,
            'numbercategories'=>$numbercategories, 
            'numbercharges'=>$numbercharges,
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
