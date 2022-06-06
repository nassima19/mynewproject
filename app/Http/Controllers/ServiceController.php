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
            $service=service::all();
           return view("service.index")->with([
            "service"=>service::paginate(8) 
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
        return view('service.create');
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
        ]); 
      
        //store data
        $nom = $request->nom;
        $description = $request->description;
        Service::create([
            "nom"=> $nom,
            "description"=> $description,
            "user_id"=> auth()->user()->id,
        ]);
        //redirect user
        
        return redirect()->route("service.index")->with([
            'success'=>'Service ajouter avec succès'
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
        return view('service.show')->with([
            'service'=> $service,
           
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
        return view("service.edit")->with([
            "service"=> $service,
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
        ]); 
        //store data
        $nom = $request->nom;
        $description = $request->description;
      
        $service->update([
            "nom"=> $nom,
            "description"=> $description,
        ]);
        //redirect user
        
        return redirect()->route("service.index")->with([
            'success'=>'Service modifier avec succès'
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
            "success"=> "Service supprimée avec succès"
        ]);
    }
    public function search()
    {
        $search_text=$_GET['q'];
        $service=Service::where('nom','like','%'.$search_text.'%')->get();
        return view('service.search',compact('service'));
    }
}
