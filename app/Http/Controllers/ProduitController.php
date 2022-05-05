<?php

namespace App\Http\Controllers;

use App\Models\produit;
use App\Models\categorie;
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
        return view("produit.index")->with([
            "produit"=> Produit::paginate(5)
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
        return view('produit.create',compact('categorie'));
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
            "code_barre"=> "required|numeric",
            "description"=> "required|min:5",
            "methode_paiement"=> "required|min:2"
        ]); 
        //store data
        $libele = $request->libele;
        $code_barre=$request->code_barre;
        $description = $request->description;
        $methode_paiement = $request->methode_paiement;
        Categorie::create([
            "libele"=> $libele,
            "code_barre"=> $code_barre,
            "description"=> $description,
            "methode_paiement"=>$methode_paiement,
            "user_id"=> auth()->user()->id,
            "categorie_id"=> auth()->categorie()->id,
        ]);
        //redirect user
        
        return redirect()->route("produit.index")->with([
            'success','produit ajouter avec succes'
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
        return view('produit.show')->with([
            'produit'=> $produit
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
        return view("produit.edit")->with([
            "produit"=> $produit
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
        //
          //validation
          $this->validate($request,[
            "libele"=> "required|min:3",
            "code_barre"=> "numeric",
            "description"=> "required|min:5",
            "methode_paiement"=> "required|min:2"
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
            "methode_paiement"=>$methode_paiement
        ]);
        //redirect user
        return redirect()->route("categorie.index")->with([
            "success"=> "Categorie modifier avec succes"
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
            "success"=> "Produit supprimée avec succes"
        ]);
    }
}
