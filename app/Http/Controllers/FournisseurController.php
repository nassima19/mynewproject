<?php
namespace App\Http\Controllers;
use App\Models\service;
use App\Models\categorie;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use App\Exports\FournisseurExport;
use App\Imports\FournisseurImport;
use Maatwebsite\Excel\Facades\Excel;
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
        $services = service::all();
        $fournisseur=Fournisseur::with('categorie')->get();
        return view("fournisseur.index")->with([
            "services"=>$services,
            "fournisseur"=> fournisseur::paginate(8)
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
        $services = service::all();
        $categorie = categorie::all();
        return view('fournisseur.create',compact('categorie', 'services'));

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
            "domaine_activite"=> "required",
            "adresse"=> "required|min:2",
            "code_postal"=> "required",
            "categorie_id"=> "required",
            "genre"=> "required", 
            "curriel"=> "required",
            "telephone"=> "required|min:10", 
            "ville"=> "", 
            "pays"=> "", 
            "site_internet"=> "min:3",
            "note"=>"min:3",
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
            "success"=> "Fournisseur crée avec succès"
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
        $fournisseur = Fournisseur::find($fournisseur->id);
        $services = service::all()->first();
        $categorie = categorie::all();
        return view('fournisseur.show',compact('categorie'))->with([
            'fournisseur'=> $fournisseur,
            'services'=> $services,
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
         $services = service::all();
         $categorie = categorie::all();
        return view("fournisseur.edit")->with([
            "fournisseur" =>$fournisseur,
            "services"=>$services,
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
            "domaine_activite"=> "required",
            "adresse"=> "required|min:2",
            "code_postal"=> "required",
            "categorie_id"=> "required",
            "genre"=> "required", 
            "curriel"=> "required",
            "telephone"=> "required|min:10", 
            "ville"=> "", 
            "pays"=> "", 
            "site_internet"=> "min:3",
            "note"=>"min:3",
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
            "success"=> "Fournisseur modifier avec succès"
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
            "success"=> "Fournisseur supprimée avec succès"
        ]);
    }
    public function search_fournisseur()
    {
        $search_text=$_GET['q'];
        $fournisseur=Fournisseur::where('nom','like','%'.$search_text.'%')->get();
        return view('fournisseur.search',compact('fournisseur'));
    }
    public function export_fournisseur() 
    {
       return Excel::download(new FournisseurExport, 'fournisseurs.xlsx');
    }

    public function  upload_fournisseur(Request $request)
    {
        Excel::import(new FournisseurImport, $request->file);
         return redirect()->route('fournisseur.index')->with('success', 'fournisseur Imported avec succès');
    }
    
    public function  import_fournisseur(){
        return view('fournisseur.import');
    }

}

