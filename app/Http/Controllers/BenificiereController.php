<?php

namespace App\Http\Controllers;

use App\Models\charge;
use App\Models\produit;
use App\Models\benificiere;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use App\Http\Requests\StorebenificiereRequest;
use App\Http\Requests\UpdatebenificiereRequest;

class BenificiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $benificiares = benificiere::all();
        return view("benificiere.index")->with([
            "benificiares"=> $benificiares
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
   
        return view('benificiere.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebenificiereRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebenificiereRequest $request)
    {
        //
        $this->validate($request,[
            "nom"=> "required|min:3",
             "curriel"=> "min:3", 
            "genre"=> "required", 
            "langue"=> "", 
            "date_naissance"=> "string",
             "ville"=> "required", 
             "pays"=> "required", 
             "number_employe"=>"required",
          ]);  

          //store data
          $nom = $request->nom;
          $curriel = $request->curriel;
          $genre = $request->genre; 
          $langue = $request->langue ;
          $date_naissance = $request->date_naissance;
          $ville = $request->ville;
          $pays = $request->pays;
          $number_employe=$request->number_employe;
          Benificiere::create([
              "nom"=>   $nom ,
              "genre"=>  $genre,              
              "curriel"=>  $curriel ,
              "langue"=>  $langue,
              "date_naissance"=>  $date_naissance,
              "ville"=> $ville,
              "pays"=> $pays,
              "number_employe"=>$number_employe,
              "user_id"=> auth()->user()->id,
  
          ]); 
          return redirect()->route("benificiere.index")->with([
              "success"=> "Bénificiere crée avec succes"
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\benificiere  $benificiere
     * @return \Illuminate\Http\Response
     */
    public function show(benificiere $benificiere)
    {
        //
        $chargenonfacture = Charge::where('benificiere_id',)->get();
        $benificiere = benificiere::find($benificiere->id);
        return view('benificiere.show')->with([
            'benificiere'=> $benificiere,
            "charges"=>$charges,
        ]);
    }
    public function Charge_benificier(Request $request ,$benificiaire)
    {
       
    
       $charges = $request->input('charges');
       $benificiaire = benificiere::find($benificiaire);
        $this->validate($request,[
              "charges"=> "required",
              ]);
               $fournisseur =fournisseur::all();
               $produit = produit::all(); 
               foreach($request->charges as $charge)
               {
                 $charge_Benificier = charge::where('id','=',$charge)->first();
                 $charge_Benificier->update([
                 'benificiare_id'=>$benificiaire,
                 ]);  
          }
          return view("benificiere.show")->with([
               "produit" => $produit,
               "fournisseur"=>$fournisseur,
               "charges"=> $charge,
           ]);
   } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\benificiere  $benificiere
     * @return \Illuminate\Http\Response
     */
    public function edit(benificiere $benificiere)
    {
        //
       
       return view("benificiere.edit")->with([
           "benificiere" =>$benificiere,
           
       ]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebenificiereRequest  $request
     * @param  \App\Models\benificiere  $benificiere
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebenificiereRequest $request, benificiere $benificiere)
    {
        //
        $this->validate($request,[
            "nom"=> "required|min:3",
             "curriel"=> "min:3", 
            "genre"=> "required", 
            "langue"=> "", 
            "date_naissance"=> "string",
             "ville"=> "required", 
             "pays"=> "required", 
             "number_employe"=>"required",
          ]);  

          //store data
          $nom = $request->nom;
          $curriel = $request->curriel;
          $genre = $request->genre; 
          $langue = $request->langue ;
          $date_naissance = $request->date_naissance;
          $ville = $request->ville;
          $pays = $request->pays;
          $number_employe=$request->number_employe;
         $benificiere->update([
              "nom"=>   $nom ,
              "genre"=>  $genre,              
              "curriel"=>  $curriel ,
              "langue"=>  $langue,
              "date_naissance"=>  $date_naissance,
              "ville"=> $ville,
              "pays"=> $pays,
              "number_employe"=>$number_employe,
  
          ]); 
          return redirect()->route("benificiere.index")->with([
              "success"=> "Bénificiere modifier avec succes"
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\benificiere  $benificiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(benificiere $benificiere)
    {
        //
         //delete vendor
         $benificiere->delete();
         //redirect user
         return redirect()->route("benificiere.index")->with([
             "success"=> "Benificiere supprimée avec succes"
         ]);
    }
}
