<?php

namespace App\Http\Controllers;

use App\Models\charge;
use App\Models\produit;
use App\Models\benificiere;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use App\Exports\BenificiereExport;
use App\Imports\BenificiereImport;
use Maatwebsite\Excel\Facades\Excel;
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
            "benificiares"=> benificiere::paginate(10)
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
              "success"=> "Bénéficiaire crée avec succès"
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
        $benificiere = benificiere::find($benificiere->id);
        $charges = Charge::whereNotIn("id",$benificiere->charges->pluck("id"))->get();
        return view('benificiere.show')->with([
            'benificiere'=> $benificiere,
            "charges"=>$charges,
        ]);
    }
    public function Charge_benificier(Request $request ,$benificiere)
    {
       $charges = $request->input('charges');
       $benificiere = benificiere::find($benificiere);
        $this->validate($request,[
            "charges"=> "required",
        ]);
        $fournisseur =fournisseur::all();
        $produit = produit::all(); 
        $benificiere->charges()->attach($charges);
       
        $charges = Charge::all();
        return redirect()->route("benificiere.show",$benificiere->id);
   } 
   //
   ////////////
   
   public function Annuler_Charge(Request $request ,$benificiere)
    {
   /*      dd($request->charges); */
       $charges = $request->input('charges');
        $this->validate($request,[
            "charges"=> "required",
        ]);
        $benificiere = benificiere::find($benificiere);
        $charges = $benificiere->charges->whereNotIn("id",$charges);
        $benificiere->charges()->sync($charges);
        return redirect()->route("benificiere.show",$benificiere->id);
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
              "success"=> "Bénéficiaire modifier  avec succès"
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
             "success"=> "bénéficiaire supprimée avec succès"
         ]);
    }
    public function search_benificiaire()
    {
        $search_text=$_GET['q'];
        $benificiaire=benificiere::where('nom','like','%'.$search_text.'%')->get();  /* dd($benificiaire); */
        return view('benificiere.search',compact('benificiaire'));
      
    } public function export() 
{
   return Excel::download(new BenificiereExport, 'bénéficiaires.xlsx');
}
public function  upload_beneficiare(Request $request)
{  
    Excel::import(new BenificiereImport, $request->file);
  
     return redirect()->route('benificiere.index')->with('success', 'bénéficiaires Imported avec succès');
}

public function  import_beneficiare(){
    return view('Benificiere.import');
}
}   
