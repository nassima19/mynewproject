<?php

namespace App\Http\Controllers;

use App\Models\produit;
use App\Models\categorie;
use Illuminate\Http\Request;
use App\Exports\ProduitExport;
use App\Imports\ProduitImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreproduitRequest;
use App\Http\Requests\UpdateproduitRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); 
     
    }
    public function index()
    {
        //  
        $categorie = categorie::all();
        return view("produit.index")->with([
            "produit"=> produit::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = categorie::all();
        return view('produit.create', compact('categorie'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproduitRequest $request)
    {
       //
       $this->validate($request,[
            "libele"=> "required|min:3",
            "code_barre"=> "numeric",
            "methode_paiement"=> "required|min:2",
            "description"=> "min:5",
             "categorie_id"=> "required|numeric",
 
        ]);   
        //store data
        $libele = $request->libele;
        $code_barre=$request->code_barre;
        $methode_paiement = $request->methode_paiement;
        $description = $request->description;
 
        Produit::create([
            "libele"=> $libele,
            "code_barre"=> $code_barre,
            "methode_paiement"=>$methode_paiement,
            "description"=> $description,
            "user_id"=> auth()->user()->id,
            "categorie_id" => $request->categorie_id,
     ]);
        //redirect user
        
        return redirect()->route("produit.index")->with([
            'success'=>'produit ajouter avec succès'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(produit $produit)
    {
        //
        $categorie = categorie::all();
        return view('produit.show')->with([
            'produit'=>$produit,
            'categorie'=> $categorie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(produit $produit)
    {
        //
        $categorie = categorie::all();
        return view("produit.edit")->with([
            "produit"=> $produit,
            "categorie" =>$categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproduitRequest  $request
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproduitRequest $request, produit $produit)
    {
        //
      
          //validation
          $this->validate($request,[
            "libele"=> "required|min:3",
            "code_barre"=> "min:2",
            "description"=> "min:5",
            "methode_paiement"=> "required|min:2",
            "categorie_id"=> "required",
        ]); 
     
        //store data
        $libele = $request->libele;
        $code_barre=$request->code_barre;
        $description = $request->description;
        $methode_paiement = $request->methode_paiement;

        $produit->update([
            "libele"=> $libele,
            "code_barre"=> $code_barre,
            "description"=> $description,
            "methode_paiement"=>$methode_paiement,
            "categorie_id"=> $request->categorie_id ,

        ]);
        //redirect user
        return redirect()->route("produit.index")->with([
            "success"=> "Produit modifier avec succès"
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(produit $produit)
    {
        //
        //delete category
        $produit->delete();
        //redirect user
        return redirect()->route("produit.index")->with([
            "success"=> "Produit supprimée avec succès"
        ]);
    }
    public function search_produit()
    {
        $search_text=$_GET['q'];
        $produit=Produit::where('libele','like','%'.$search_text.'%')->get();
        return view('produit.search',compact('produit'));
    }
    public function export_produit() 
    {
       return Excel::download(new ProduitExport, 'produits.xlsx');
    }

    public function  upload_produit(Request $request)
        {
            Excel::import(new ProduitImport, $request->file);
             return redirect()->route('produit.index')->with('success', 'produit Imported Successfully');
        }
        
        public function  import_produit(){
            return view('produit.import');
        }

}