<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Support\Str;
use App\Http\Requests\StorecategorieRequest;
use App\Http\Requests\UpdatecategorieRequest;

class CategorieController extends Controller
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
        return view("management.categorie.index")->with([
            "categorie"=> Categorie::paginate(5)
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
        return view("management.categorie.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategorieRequest $request)
    {
        //validation
        //dd($request);
        $this->validate($request,[
            "libele"=> "required|min:3",
            "description"=> "required|min:10"
        ]); 
        //store data
        $libele = $request->libele;
        $description = $request->description;
        Categorie::create([
            "libele"=> $libele,
            "description"=> $description,
            "user_id"=> auth()->user()->id,
        ]);
        //redirect user
        
        return redirect()->route("categorie.index")->with([
            'success','Categorie ajouter avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
        //store data
    
        //redirect user
        return view('management.categorie.show')->with([
            'categorie'=> $categorie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie)
    {
        //
        return view("management.categorie.edit")->with([
            "categorie"=> $categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategorieRequest  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategorieRequest $request, categorie $categorie)
    {
        //
          //validation
          $this->validate($request,[
            "libele"=> "required|min:3",
            "description"=> "required|min:10"
        ]);
        //store data
        $libele = $request->libele;
        $description = $request->description;
        $categorie->update([
            "libele"=> $libele,
            "description"=> $description
        ]);
        //redirect user
        return redirect()->route("categorie.index")->with([
            "success"=> "Categorie modifier avec succes"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie)
    {
        //delete category
        $categorie->delete();
        //redirect user
        return redirect()->route("categorie.index")->with([
            "success"=> "Categorie supprimée avec succes"
        ]);

    }
}
