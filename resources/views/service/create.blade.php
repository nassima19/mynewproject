<x-app-layout>
    @section('title')
         <title>Service </title>
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
        <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
            {{ __('SERVICE') }}
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
            <div class="col-md-10" style="border-radius: 7px;background-color:black">
                <div class="card" style="border-radius: 7px;background-color:black">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-2" > 
                                      <i class="fa fa-plus" style="font-size:26px;color:rgb(224, 204, 24)"></i> Ajouter nouveau service
                                      </h3>
                                </div>
                                    <form action="{{route("service.store")}}" method="post"> 
                                    @csrf
                                    <div class="row ">
                                        <div class=" form-group col-sm-4" style="padding-left: 70px" > 
                                               <label 
                                                    for="nom"
                                                    class="col-form-label "
                                                    style=" font-size:20px;color:white">Nom du service :
                                                </label>
                                                        <input  
                                                            name="nom"
                                                            type="text" 
                                                            style="padding: 8px; font-size:19px;background-color:black;color:white"
                                                            class="form-control" id="nom"
                                                            placeholder="nom du service">
                                        </div>
                                    </div><br>
                                            <div class="row ">
                                                <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                                <label 
                                                                    for="fournisseur_id"
                                                                    class="col-form-label "
                                                                    style="font-size:19px;color:white"
                                                                    >Fournisseur : 
                                                                </label>
                                                                <button style="font-size:18px;" class="col-form-label  pull-right"><a href="{{route("fournisseur.create")}}" style="text-decoration: none;color:#17a3b3"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter</a></button><br>
                                                                        <select  name="fournisseur_id" 
                                                                        class="form-control col-form-label"
                                                                        style="background-color:black ;color:white;padding: 8px; font-size:19px;">
                                                                            <option value="" >Choisir un fournisseur</option>
                                                                                @foreach($fournisseur as $vendor)
                                                                                <option value="{{$vendor->id}}">{{$vendor->nom}}</option>
                                                                                @endforeach
                                                                        </select>  
                                                        </div> 
                                                </div><br>
                                                <div class="row ">
                                                    <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                                    <label 
                                                                            for="methode_paiement" 
                                                                            style="font-size:19px;color:white"
                                                                            class="col-form-label" >Methode de paiement :
                                                                   </label> 
                                                                            <select  
                                                                                    name="methode_paiement"
                                                                                    class="form-control col-form-label" 
                                                                                    style="background-color:black ;color:white;padding: 8px; font-size:19px;">
                                                                                    <option value=""  selected="select" >Choisir une méthode</option>
                                                                                    <option value="Espèce">Espèce</option>
                                                                                    <option value="Chèque">Chèque</option>
                                                                                    <option value="Carte bancaire">Carte bancaire</option>
                                                                                    <option value="autre méthode">autre méthode</option>
                                                                            </select>
                                                            </div>
                                                      </div>
                                                             <br><div class="row ">
                                                                     <div class=" form-group col-sm-8"  style="padding-left: 70px" >
                                                                         <label class="col-form-label " 
                                                                            for="description" 
                                                                            style="font-size:19px;color:white">Description : 
                                                                         </label>
                                                                            <textarea   
                                                                                    name="description" 
                                                                                    id="description" 
                                                                                    style="font-size:19px;background-color:black ;color:white"
                                                                                    class="form-control "
                                                                                    cols="40" rows="8"  
                                                                                    placeholder="Description">
                                                                            </textarea>
                                                                      </div>
                                                                </div> <br><br>
                                                                    <div class="form-group pull-right" >
                                                                                <button type="submit "  class="btn2 fw-bold "  ><i class="fa fa-save"></i> Enregistrer</button>
                                                                                <button class="btn2 fw-bold"><a type="button" style="text-decoration: none;  color:white"  href="{{route("service.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
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