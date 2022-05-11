
<x-app-layout>
    @section('title')
         <title>Charge </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
          <style>
              body{
                /* background-color:#d5b0d3;  */ 
            }
          </style>
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
            {{ __('CHARGE') }}
        </h2>
</x-slot>
@section('content')
@if ($errors->any())
@foreach ($errors as $error)
<div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
        @endif
    <div class="container p-4 " >
        <div class="row justify-content-center">
            <div class="col-md-8" style="border-radius: 7px;background-color:#1e2329">
                <div class="card" style="border-radius: 7px;background-color:#1e2329">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-2" > 
                                      <i class="fa fa-plus" style="font-size:26px;color:rgb(224, 204, 24)"></i> Ajouter nouveau charge
                                      </h3>
                                </div>
                                    <form action="{{route("charge.store")}}" method="post"> 
                                    @csrf
                                    <div class="row ">
                                        <div class=" form-group col-sm-5 my-3" style="padding-left: 50px" > 
                                                <label 
                                                    for="produit_id"
                                                    class="col-form-label "
                                                    style="font-size:19px;color:white"
                                                    >Produit : 
                                                </label>
                                                    <select
                                                            name="produit_id" 
                                                            class="form-control col-form-label"
                                                            style="background-color:#6D8B74 ;color:white;padding: 8px; font-size:19px;">
                                                           <option value="" >Choisir un produit</option>
                                                            @foreach($produit as $product)
                                                            <option value="{{$product->id}}">{{$product->libele}}</option>
                                                            @endforeach
                                                    </select>  
                                        </div>
                                              <div class=" form-group col-sm-5 my-3" style="padding-left: 100px;padding-right:0%" > 
                                                <label 
                                                        for="taxes"
                                                        class="col-form-label "
                                                        style=" font-size:20px;color:white">Taxes :
                                                    </label>
                                                        <input  
                                                            name="taxes"
                                                            type="text" 
                                                            style="padding: 8px; font-size:19px;background-color:#6D8B74;color:white"
                                                            class="form-control" id="taxes"
                                                            placeholder="nom du service">
                                             </div>
                                    </div>
                                             <div class="row ">
                                                    <div class=" form-group col-sm-5 my-3"  style="padding-left: 50px" >
                                                                    <label 
                                                                            for="fournisseur_id" 
                                                                            style="font-size:19px;color:white"
                                                                            class="col-form-label" >Fournisseur :
                                                                   </label><button style="font-size:19px;color: #1a3733" class=" pull-right"><a href="{{route("fournisseur.create")}}" style="text-decoration: none;color:rgb(233, 157, 122)"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter</a></button><br>
                                                                            <select  
                                                                                    name="fournisseur_id"
                                                                                    class="form-control col-form-label" 
                                                                                    style="background-color:#6D8B74 ;color:white;padding: 8px; font-size:19px;">
                                                                                    <option value=""  selected="select" >Choisir un fournisseur</option>
                                                                                @foreach($fournisseur as $vendor)
                                                                                    <option value="{{$vendor->id}}">{{$vendor->nom}}</option>
                                                                                   @endforeach  
                                                                            </select>
                                                    </div>
                                                         <div class=" form-group col-sm-5 my-3"  style="padding-left: 100px;padding-right:0%" >
                                                                            <label class="col-form-label " 
                                                                                for="statu" 
                                                                                style="font-size:19px;color:white">Statue : 
                                                                            </label>
                                                                                  <select  
                                                                                        name="statu"
                                                                                        class="form-control " 
                                                                                        style="background-color:#6D8B74 ;color:white;padding: 8px; font-size:19px;"
                                                                                        id="statu">
                                                                                          <option value="0">Brouillon</option>
                                                                                          <option value="Payée">Payée</option>
                                                                                          <option value="A Payée">A Payée</option>
                                                                        </select>
                                                            </div>
                                                    </div>
                                                     <div class="row ">
                                                        <div class=" form-group col-sm-5 my-3"  style="padding-left: 50px" >
                                                                <label class="col-form-label " 
                                                                    for="date" 
                                                                    style="font-size:19px;color:white">Date : 
                                                                </label><br>
                                                                        <input 
                                                                            class="form-control " 
                                                                            type="Date"
                                                                            style="background-color:#6D8B74 ;color:white;font-size:19px;padding:8px " >
                                                        </div>
                                                         <div class=" form-group col-sm-5 my-3" style="padding-left: 100px;padding-right:0%" > 
                                                            <label 
                                                                    for="piece_id"
                                                                    class="col-form-label "
                                                                    style=" font-size:20px;color:white">N° piece fournisseur :
                                                                </label>
                                                                    <input  
                                                                        name="piece_id"
                                                                        type="number" 
                                                                        style="padding: 8px; font-size:19px;background-color:#6D8B74;color:white"
                                                                        class="form-control" id="piece_id"
                                                                        placeholder="numéro de peice">
                                                         </div>  
                                                     </div><br>
                                                    <div class="row">
                                                        <div class=" form-group  col-md-6 my-3" style="padding-left: 55px;padding-right:0%">
                                                            <label class="sr-only" for="prix">Prix</label>
                                                            <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                <div 
                                                                   class="input-group-text" 
                                                                   style="padding: 8px; font-size:19px;background-color: #6D8B74;color:white;">Prix HT
                                                                </div>
                                                              </div>
                                                              <input 
                                                              name="prix"
                                                                    type="text" 
                                                                    class="form-control" 
                                                                    id="prix"
                                                                    value="0.00"
                                                                    style="padding: 8px; font-size:19px;background-color:#6D8B74;color:white; text-align:right"
                                                                    placeholder="Prix">
                                                            </div>
                                                          </div> </div><br>
                                                          <div class="row">
                                                                <div class=" form-group  col-md-6 my-3" style="padding-left: 50px;padding-right:0%">
                                                                    <label class="sr-only" for="qte">Qté</label>
                                                                    <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div 
                                                                        class="input-group-text" 
                                                                        style="padding: 8px; font-size:19px;background-color: #6D8B74;color:white">Quantité
                                                                        </div>
                                                                    </div>
                                                                    <input 
                                                                    name="qte"
                                                                    type="text" 
                                                                    class="form-control" 
                                                                    id="qte"
                                                                    value="1"
                                                                    style="padding: 8px; font-size:19px;background-color:#6D8B74;color:white;text-align:right"
                                                                    placeholder="Quantité">
                                                            </div>
                                                          </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="form-group  col-md-9 my-3"  style="padding-left: 50px; padding-right:0px">
                                                                 <label class="sr-only " for="total">Total</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                          <div 
                                                                                class="input-group-text" 
                                                                                style="padding: 8px; font-size:19px;background-color: #6D8B74;color:white;cursor: pointer;caret-color: red;">Total
                                                                          </div>
                                                                      </div>
                                                                            <input 
                                                                                    name="total"
                                                                                    type="text" 
                                                                                    class="form-control" 
                                                                                    id="total"
                                                                                    value="0.00"
                                                                                    style="float:left;padding: 8px; font-size:19px;background-color:#6D8B74;color:white;text-align:right;"
                                                                                     placeholder="Total">
                                                                    </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" form-group col-md-9 my-3" style="padding-left: 50px;padding-right:0%" > 
                                                               <label 
                                                                       for="description"
                                                                       class="col-form-label "
                                                                       style=" font-size:20px;color:white">Discription :
                                                                   </label>
                                                               <textarea 
                                                                       name="description" 
                                                                       id="" 
                                                                       
                                                                       cols="30" 
                                                                       rows="5"
                                                                       class="form-control"
                                                                       
                                                                       style=" background-position: bottom;padding: 8px; font-size:19px;background-color:#6D8B74;color:white; "
                                                                       >
                                                                   </textarea>
                                                       </div> </div><br>
                                                          <div class="form-group pull-right my-3" >
                                                                                <button type="submit "  class="btn2 fw-bold "  ><i class="fa fa-save"></i> Enregistrer</button>
                                                                                <button class="btn2 fw-bold"><a type="button" style="text-decoration: none;  color:white"  href="{{route("charge.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
                                                        </div>
                                                 </form>
                                           </div>
                                     </div>
                               </div>
                         </div>
                  </div>
           </div>
      </div>      
  @endsection
</x-app-layout>

