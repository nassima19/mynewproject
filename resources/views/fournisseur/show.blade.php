<x-app-layout>
    @section('title')
         <title>Categorie  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
           <style>
              .colorr{
                  color: red;
                }
                .flex-container {
                    display: flex; justify-content:space-around;
                   
                   }
                   .flex-container > div {
                        margin:0px; width:33%;padding:.100rem;
                   }
                
           </style>
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
            {{ __('FOURNISSEUR') }}
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
      <div class="container p-3 ">
          <div class="row justify-content-center ">
              <div class="col-md-12 ">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-14">
                                  <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fas fa-eye" style="font-size:30px;color:#a45e5f "></i> Détail de fournisseur {{$fournisseur->nom}}
                                        </h3>
                                        <a type="button" class="close btn-close " href="{{route("fournisseur.index")}}"></a>

                                  </div>
                                  <form action="{{route("fournisseur.show",$fournisseur->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                       <div class="row mb-2 flex-container">
                                        <div class="col-xs-12 col-sm-4 ">
                                                <label for="nom"   style="font-size:19px;color:black" class="col-form-label">Nom </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <input 
                                                type="text" 
                                                class="form-control col-md-1 " 
                                                name="nom" 
                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                id="nom" 
                                                value="{{$fournisseur->nom}}"><br>
                                        </div>
                                        <div class="col-xs-12 col-sm-3">
                                                <label for="genre"  class="col-form-label" 
                                                 style="font-size:19px;color:black">Genre </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <input 
                                                type="text" 
                                                class="form-control col-md-1 " 
                                                name="genre" 
                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                id="genre" 
                                                value="{{$fournisseur->genre}}"><br>
                                           </div> 
                                        </div> 
                                           <div class=" mb-2 row flex-container">
                                            <div class="col-xs-12 col-sm-4"> 
                                                    <label for="titre" style="font-size:19px;color:black"  class="col-form-label">Titre :</label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <input 
                                                    type="text" 
                                                    class="form-control col-md-2"  
                                                    value="{{$fournisseur->titre}}" 
                                                    id="titre" 
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    name="titre"><br>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <label for="domaine_activite"   style="font-size:19px;color:black" class="col-form-label">Domaine activité </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                           {{--    <input 
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    type="text" 
                                                    id=" domaine_activite" 
                                                    name="domaine_activite"
                                                    class="form-control col-md-4"  
                                                    value="{{$fournisseur->domaine_activite}}" > --}}<br>
                                            </div>
                                           </div>
                                           <div class=" mb-2 row flex-container">
                                            <div class="col-xs-12 col-sm-4"> 
                                                <label for="adresse"    style="font-size:19px;color:black" class="col-form-label">Adresse </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <input  
                                                class="form-control col-md-2"   
                                                value="{{$fournisseur->adresse}}" 
                                                id="adresse" 
                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                name="adresse">
                                           </div>
                                           <div class="col-xs-15 col-sm-2">
                                            <label for="code_postal"   style="font-size:19px;color:black" class="col-form-label">Code postale</label>
                                            <span class="required colorr" aria-hidden="true">*</span>
                                            <input 
                                            style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                            type="text" 
                                            class="form-control col-md-2" 
                                            value="{{$fournisseur->code_postal}}"  
                                            id="code_postal" 
                                            name="code_postal">
                                           </div>
                                           </div>
                                           <div class="mb-2 row flex-container">
                                                <div class="col-xs-12 col-sm-4">
                                                    <label for="pays"  style="font-size:19px;color:black"   class="col-form-label">Pays:</label><br>
                                                    <input
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    type="text" 
                                                    class="form-control col-md-2" 
                                                    value="{{$fournisseur->pays}}" 
                                                    id="pays" 
                                                    name="pays">
                                                </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                    <label for="ville"   style="font-size:19px;color:black" class="col-form-label">Ville:</label>
                                                    <input
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    type="text" 
                                                    class="form-control col-md-2" 
                                                    value="{{$fournisseur->ville}}" 
                                                    id="ville" 
                                                    name="ville">
                                                </div>
                                            </div>
                                                <div class=" mb-2 row flex-container">
                                                    <div class="form-group mb-3 ">                                                    
                                                        <label for="curriel"  
                                                        style="font-size:19px;color:black"
                                                        class="col-form-label">Curriel :</label>
                                                    <input
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    type="text" 
                                                    class="form-control col-md-2" 
                                                    value="{{$fournisseur->curriel}}" 
                                                    id="curriel" 
                                                    name="curriel">
                                              </div>
                                              <div class="form-group mb-3 ">       
                                                  <label for="telephone"   
                                                  style="font-size:19px;color:black"
                                                  class="col-form-label">Télephone :</label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <input 
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    type="text" 
                                                    class="form-control col-md-2"  
                                                    value="{{$fournisseur->telephone}}" 
                                                    id="telephone" 
                                                    name="telephone">
                                                </div>
                                             </div>
                                             <div class="row mb-2 flex-container">
                                                <div class="form-group mb-3 ">
                                                      <label for="site_internet"  
                                                      style="font-size:19px;color:black"
                                                      class="col-form-label"> Site internet :</label>
                                                      <input 
                                                      style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                      id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteField" 
                                                      type="text" class="form-control col-md-2" 
                                                       value="{{$fournisseur->site_internet}}" 
                                                       id="site_internet" name="site_internet"><a id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteLink" href="http://" target="_blank"><i class="fa fa-external-link"></i></a>
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="categorie_id"  
                                                    style="font-size:19px;color:black"
                                                    class="col-form-label">Categorie </label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <input 
                                                            style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                            type="text" 
                                                            class="form-control col-md-4"  
                                                            value="{{$fournisseur->categorie->libele}}"
                                                            id=" categorie_id" 
                                                            name="categorie_id">  
                                               </div> 
                                            </div>
                                            <div class="row flex-container col-sm-6" style="margin:auto">
                                                <label for="note"                                                                    
                                                 style="font-size:19px;color:black"
                                                class="col-form-label">notes : </label>
                                                <textarea name="note" id="note" 
                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                class="form-control col-md-4" cols="40" rows="10"   placeholder="" >{{$fournisseur->note}}</textarea>
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