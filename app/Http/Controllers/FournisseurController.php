<?php
namespace App\Http\Controllers;

use ulluminate\Http\Request;
use App\Models\categorie;
use App\Models\fournisseur;
use App\Http\Requests\StorefournisseurRequest;
use App\Http\Requests\UpdatefournisseurRequest;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $fournisseur=Fournisseur::with('categorie')->get();
        return view("fournisseur.index")->with([
            "fournisseur"=> fournisseur::paginate(5)
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
        $categorie = categorie::all();
        return view('fournisseur.create',compact('categorie'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefournisseurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefournisseurRequest $request)
    {
      //
      $this->validate($request,[
          "nom"=> "required|min:3",
           "titre"=>"required|min:2",
           "domaine_activite"=> "required|min:3",
           "adresse"=> "required|min:2",
           "ville"=> "required", 
           "pays"=> "required", 
           "telephone"=> "required", 
             "code_postal"=> "required",
             "curriel"=> "min:3",
             "site_internet"=> "min:3",
             "note"=>"required",
             "categorie_id"=> "required",
             "genre"=> "required", 
        ]);  
    
    
           
        //store data
        $nom = $request->nom;
        $titre = $request->titre;
        $genre = $request->genre; 
        $domaine_activite = $request->domaine_activite;
        $adresse = $request->adresse;
        $ville = $request->ville;
        $pays = $request->pays;
        $code_postal = $request->code_postal;
        $curriel = $request->curriel;
        $telephone = $request->telephone ;
        $site_internet = $request->site_internet;
        $note = $request->note;
     
        Fournisseur::create([
            "nom"=>   $nom ,
            "titre"=>$titre ,
            "genre"=>  $genre,
            "domaine_activite"=> $domaine_activite,
            "adresse"=> $adresse,
            "ville"=> $ville,
            "pays"=> $pays,
            "code_postal"=>  $code_postal,
            "curriel"=>  $curriel ,
            "telephone"=>  $telephone,
            "site_internet"=>  $site_internet,
            "note"=> $note ,
            "user_id"=> auth()->user()->id,
            "categorie_id" => $request->categorie_id,

        ]); 
        return redirect()->route("fournisseur.index")->with([
            'success','fournisseur ajouter avec succes'
        ]);
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(fournisseur $fournisseur)
    {
        //
        $categorie = categorie::all();
        return view('fournisseur.show',compact('categorie'))->with([
            'fournisseur'=> $fournisseur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(fournisseur $fournisseur)
    {
        //
         $categorie = categorie::all();
        return view("fournisseur.edit")->with([
            "fournisseur" =>$fournisseur,
            "categorie" => $categorie,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefournisseurRequest  $request
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefournisseurRequest $request, fournisseur $fournisseur)
    {
        //
     
        $this->validate($request,[
            "nom"=> "required|min:3",
            "titre"=>"required|min:2",
            "genre"=> "required|min:5",
            "domaine_activite"=> "required|min:3",
             "adresse"=> "required|min:2",
                 "ville"=> "required", 
                  "pays"=> "min:3", 
                  "code_postal"=> "required",
                   "telephone"=> "required", 
                   "curriel"=> "min:3",
                   "site_internet"=> "min:3",
                  "note"=>"min:3",
                  "categorie_id"=> "required",
                ]);  
              
        //store data
       
        $nom = $request->nom;
        $titre = $request->titre;
        $genre = $request->genre; 
        $domaine_activite = $request->domaine_activite;
        $adresse = $request->adresse;
        $ville = $request->ville;
        $pays = $request->pays;
        $code_postal= $request->code_postal;
        $curriel = $request->curriel;
      $telephone = $request->telephone ; 
        $site_internet = $request->site_internet;
        $note = $request->note;

        $fournisseur->update([
            "nom"=>   $nom ,
            "titre"=> $titre ,
            "genre"=>  $genre,
            "domaine_activite"=>  $domaine_activite,
            "adresse"=> $adresse,
            "ville"=> $ville,
            "pays"=> $pays,
            "code_postal"=>  $code_postal,
            "curriel"=>  $curriel ,
             "telephone"=>  $telephone, 
            "site_internet"=>  $site_internet,
            "note"=>  $note ,
            "categorie_id"=> $request->categorie_id ,

        ]);
            
        return redirect()->route("fournisseur.index")->with([
            'success','Fournisseur modifier avec succes'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(fournisseur $fournisseur)
    {
        //
        //delete vendor
        $fournisseur->delete();
        //redirect user
        return redirect()->route("fournisseur.index")->with([
            "success"=> "Fournisseur supprimée avec succes"
        ]);
    }
}
