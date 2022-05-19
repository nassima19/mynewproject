<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\fournisseur;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;

class ServiceController extends Controller
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
           //  
            $service=service::with('fournisseur')->get();
           return view("service.index")->with([
            "service"=> service::paginate(5)
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
        $fournisseur = fournisseur::all();
        return view('service.create',compact('fournisseur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceRequest $request)
    {
        //
        $this->validate($request,[
            "nom"=> "required|min:3",
            "description"=> "min:5",
            "methode_paiement"=> "required", 
            "fournisseur_id"=>"required",
        ]); 
      
        //store data
        $nom = $request->nom;
        $description = $request->description;
        $methode_paiement = $request->methode_paiement;
        Service::create([
            "nom"=> $nom,
            "methode_paiement"=>$methode_paiement,
            "description"=> $description,
            "fournisseur_id"=>$request->fournisseur_id,
            "user_id"=> auth()->user()->id,
        ]);
        //redirect user
        
        return redirect()->route("service.index")->with([
            'success','Srvice ajouter avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
        $fournisseur = fournisseur::all();
        return view('service.show')->with([
            'service'=> $service,
            'fournisseur'=> $fournisseur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
        $fournisseur = fournisseur::all();
        return view("service.edit")->with([
            "service"=> $service,
            "fournisseur" =>$fournisseur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceRequest $request, service $service)
    {
        //
        $this->validate($request,[
            "nom"=> "required|min:3",
            "description"=> "min:5",
            "methode_paiement"=> "required",
            "fournisseur_id"=>"required",
        ]); 
        //store data
        $nom = $request->nom;
        $description = $request->description;
        $methode_paiement = $request->methode_paiement;
      
        $service->update([
            "nom"=> $nom,
            "description"=> $description,
            "methode_paiement"=>$methode_paiement,
            "fournisseur_id"=>$request->fournisseur_id,
        ]);
        //redirect user
        
        return redirect()->route("service.index")->with([
            'success','Srvice ajouter avec succes'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
        $service->delete();
        //redirect user
        return redirect()->route("service.index")->with([
            "success"=> "Service supprimée avec succes"
        ]);
    }
    public function search()
    {
        $search_text=$_GET['q'];
        $service=Service::where('nom','like','%'.$search_text.'%')->get();
        return view('service.search',compact('service'));
    }
}
