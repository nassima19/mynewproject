<?php

namespace App\Http\Controllers;

use App\Models\piece;
use App\Models\charge;
use App\Models\produit;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $fournisseur =fournisseur::all();
        $produit = produit::all();
        $charge=charge::all();
        $piece = piece::all();
        return view("charge.index")->with([
         "charge"=> $charge,
         "produit"=>$produit,
         "fournisseur"=>$fournisseur,
         "piece"=> $piece
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
        $fournisseur = fournisseur::all();/* :where('categorie_id','==',$produit->categorie_id)->first(); */
        $piece = piece::all();
        return view('charge.create',compact('produit','fournisseur','piece'));
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
        $this->validate($request,[
            "qte"=> "required",
              "taxes"=>"required",
            "date"=> "required",
             "statu"=> "required|min:2",
              "description"=> "min:3", 
             "remarque"=> "min:5", 
             "prix"=> "required", 
               "total"=> "required",
               "fournisseur_id"=> "required",
               "piece_id"=> "min:1", 
               "produit_id"=> "required", 
          ]); 
          //store data
     
                $qte = $request->qte;
                $taxes = $request->taxes;
                $date = $request->date; 
                $statu = $request->statu;
                $description = $request->description;
                $remarque = $request->remarque;
                $prix = $request->prix;
                $total = $request->total;
  
           if($request->piece_id!=0)
           { 
          Charge::create([
                 "qte"=>   $qte ,
                  "taxes"=>$taxes ,
                  "date"=>  $date,
                  "statu"=> $statu,
                  "description"=> $description,
                  /*               "remarque"=> $remarque,
                  */             
                  "prix"=> $prix,
                  "total"=>  $total,
                 "produit_id" => $request->produit_id,   
                    "piece_id" => $request->piece_id,
                  "fournisseur_id" => $request->fournisseur_id,
                  "user_id"=> auth()->user()->id,
                ]);
           }else{
                 Charge::create([
                            "qte"=>   $qte ,
                            "taxes"=>$taxes ,
                            "date"=>  $date,
                            "statu"=> $statu,
                            "description"=> $description,    
                            "prix"=> $prix,
                            "total"=>  $total,
                            "produit_id" => $request->produit_id,   
                            "piece_id" =>null,
                            "fournisseur_id" => $request->fournisseur_id,
                            "user_id"=> auth()->user()->id,
                          ]);
                        } 
                return redirect()->route("charge.index")->with([
              'success','fournisseur ajouter avec succes'
          ]);
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
        $produit = produit::all();
        $fournisseur = fournisseur::all();
        $piece = piece::all();
        return view('charge.show',compact('produit','fournisseur','piece'))->with([
            "charge"=>$charge
        ]);
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
        $produit = produit::all();
        $fournisseur = fournisseur::all();
        $piece = piece::all();
        return view('charge.edit',compact('produit','fournisseur','piece'))->with([
            "charge"=>$charge
        ]);
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
        $this->validate($request,[
              "qte"=> "required",
              "taxes"=>"required",
               "date"=> "required",
               "statu"=> "required|min:2",
               "description"=> "min:3", 
              "remarque"=> "min:5", 
              "prix"=> "required", 
               "total"=> "required",
               "fournisseur_id"=> "required",
               "piece_id"=> "min:1", 
               "produit_id"=> "required", 
          ]); 
          //store data
          $qte = $request->qte;
          $taxes = $request->taxes;
          $date = $request->date; 
          $statu = $request->statu;
          $description = $request->description;
          $remarque = $request->remarque;
          $prix = $request->prix;
          $total = $request->total; 

          if($request->piece_id!=0)
          { 
            $charge->update([
                "qte"=>   $qte ,
                 "taxes"=>$taxes ,
                 "date"=>  $date,
                 "statu"=> $statu,
                 "description"=> $description,
                 /*               "remarque"=> $remarque,
                 */             
                 "prix"=> $prix,
                 "total"=>  $total,
                "produit_id" => $request->produit_id,   
                   "piece_id" => $request->piece_id,
                 "fournisseur_id" => $request->fournisseur_id,
               ]);
          }else{
                $charge->update([
                           "qte"=>   $qte ,
                           "taxes"=>$taxes ,
                           "date"=>  $date,
                           "statu"=> $statu,
                           "description"=> $description,    
                           "prix"=> $prix,
                           "total"=>  $total,
                           "produit_id" => $request->produit_id,   
                           "piece_id" =>null,
                           "fournisseur_id" => $request->fournisseur_id,
                         ]);
                       } 
                return redirect()->route("charge.index")->with([
              'success','fournisseur modifier avec succes'
          ]);
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

        $charge->delete();
        //redirect user
        return redirect()->route("charge.index")->with([
            "success"=> "Charge supprimée avec succes"
        ]);
    }
    //
    //function pour faire un recherche dans barre de recherche

    public function search_charge()
    {
        $search_text=$_GET['q'];
        $charge = Charge::where('date','like','%'.$search_text.'%')->get();
        return view('charge.search',compact('charge'));
    }
    //
    //function pour faire un trie les charges non facturé

    public function NonFacturé(){
           $fournisseur =fournisseur::all();
            $produit = produit::all();
            $piece = piece::all();
            $chargenonfacture = Charge::where('piece_id',)->get();
            return view("charge.NonFacturé")->with([
            "chargenonfacture"=> $chargenonfacture,
            "produit"=>$produit,
            "fournisseur"=>$fournisseur,
            "piece"=> $piece,
     ]);}

     //
     //lier un charge à un facture
     public function charge_Facturé(Request $request)
     {
        /*  dd($request->charges); */
     
        $depence = $request->input('charges');
        $piece = $request->input('piece');
        $facture = Piece::where('id', $piece)->first();
        
         $this->validate($request,[
               "charges"=> "required",
               "piece"=>"required",]);
                $fournisseur =fournisseur::all();
                $produit = Produit::all();
                foreach($request->charges as $charge)
                {
                  $chargeFacture = Charge::where('id','=',$charge)->first();
                  $chargeFacture->update([
                  "piece_id"=> $piece
                  ]);   
           }
           return view("facture.show")->with([
                "produit" => $produit,
                "fournisseur"=>$fournisseur,
                "piece"=> $facture,
            ]);
    } 
  
    public function sortBy()
    {
        $produit = produit::all()
        ->sortBy('produit_id');
    }
   }
  