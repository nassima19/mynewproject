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
            <div class="col-md-12" style="border-radius: 7px;">
                <div class="card" style="border-radius: 7px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-16">
                                <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-2" style="color: #2B4C59"> 
                                        <i class="fas fa-edit" style="color:rgb(224, 204, 24)"></i>  Modifier la service {{$service->nom}}
                                      </h3>
                                </div>
                                    <form action="{{route("service.update",$service->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                    <div class="row ">
                                        <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" > 
                                               <label for="name"
                                                 class="col-form-label "
                                                 style=" font-size:19px"
                                                  >Nom du service :</label>
                                               <input   name="name"
                                                type="text" 
                                                style="padding: 8px; font-size:20px;"
                                                class="form-control" id="name"
                                                  placeholder=""
                                                  value="{{$service->name}}"
                                                  >
                                        </div>
                                    </div><br>
                                            <div class="row ">
                                                <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                                <label for="fournisseur_id"
                                                                class="col-form-label "
                                                                style="font-size:19px"
                                                                >Fournisseur : </label><button style="font-size:18px;color:#2B4C59" class="col-form-label  pull-right"><a href="{{route("fournisseur.create")}}" style="text-decoration: none;color:#2B4C59"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter</a></button><br>
                                                                        <select  name="fournisseur_id" 
                                                                        class="form-control col-form-label"
                                                                        style="color:#6f4826 ;background-color:#c5b998;padding: 8px; font-size:20px;">
                                                                            <option value="" >Choisir un fournisseur</option>
                                                                                @foreach($fournisseur as $vendor)
                                                                                <option value="{{ $vendor->id}}" {{old('fournisseur_id') == $vendor->id|| $service->fournisseur->id== $vendor->id? "selected" : ""}}>{{ $vendor->name }}</option>
                                                                                @endforeach
                                                                        </select>  
                                                        </div> 
                                                </div><br>
                                                <div class="row ">
                                                    <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                                    <label 
                                                                            for="methode_paiement" 
                                                                            style="font-size:19px"
                                                                            class="col-form-label" 
                                                                            style="color: #2B4C59">Methode de paiement :
                                                                   </label> 
                                                                            <select  name="methode_paiement"
                                                                             class="form-control col-form-label" 
                                                                              style="color:#6f4826 ;background-color:#c5b998;padding: 8px; font-size:20px;">
                                                                                    <option value=""  selected="select" >Choisir une méthode</option>
                                                                                    <option value="1">Espèce</option>
                                                                                    <option value="2">Chèque</option>
                                                                                    <option value="3">Carte bancaire</option>
                                                                                    <option value="4">autre méthode</option>
                                                                            </select>
                                                            </div>
                                                      </div>
                                                             <div class="row ">
                                                                     <div class=" form-group col-sm-8"  style="padding-left: 70px" >
                                                                         <label class="col-form-label " 
                                                                            for="description" 
                                                                            style="font-size:19px"
                                                                            style="color: #2B4C59">Description : 
                                                                         </label>
                                                                            <textarea   
                                                                                    name="description" 
                                                                                    id="description" 
                                                                                    style="padding: 13px; font-size:20px;"
                                                                                    class="form-control col-form-label"
                                                                                    cols="40" rows="8"  
                                                                                    placeholder="">
                                                                           {{$service->description}} </textarea>
                                                                      </div>
                                                                </div> <br><br>
                                                                    <div class="form-group pull-right" >
                                                                                <button type="submit "  class="btn2 fw-bold "  > Modifier</button>
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