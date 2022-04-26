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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
