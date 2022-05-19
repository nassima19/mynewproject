<?php

namespace App\Http\Controllers;

use App\Models\piece;
use App\Http\Requests\StorepieceRequest;
use App\Http\Requests\UpdatepieceRequest;

class PieceController extends Controller
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
        return view("piece.index")->with([
            "piece"=> Piece::paginate(10)
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
        
        return view("piece.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepieceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepieceRequest $request)
    {
        //
        
        $this->validate($request,[
           "type_piece"=> "required", 
            "paiement_date"=> "required|min:10",
            "numero"=> "required|min:1",
             "note"=> "min:1", 
             /* "bank_account"=> "min:1" */  
        ]); 
        //store data
        $type_piece = $request->type_piece;
        $paiement_date = $request->paiement_date;
        $numero = $request->numero;
        $note = $request->note;
        $bank_account = $request->bank_account;
        Piece::create([
            "type_piece"=> $type_piece,
            "paiement_date"=> $paiement_date,
            "numero"=> $numero,
            "note"=> $note,
            "bank_account"=> $bank_account,
            "user_id"=> auth()->user()->id,
        ]);
        //redirect user
        
        return redirect()->route("piece.index")->with([
            'success','Piece ajouter avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(piece $piece)
    {
        //
         
        return view("piece.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepieceRequest  $request
     * @param  \App\Models\piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepieceRequest $request, piece $piece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(piece $piece)
    {
        //
        
        $piece->delete();
        //redirect user
        return redirect()->route("piece.index")->with([
            "success"=> "Piece supprimée avec succes"
        ]);
    }
}
