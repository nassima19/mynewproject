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
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
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
            <div class="col-md-10" style="border-radius: 7px; background-color:black">
                <div class="card" style="border-radius: 7px; background-color:black">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-2" style="color: #6D8B74"> 
                                        <i class="fas fa-eye" style="font-size:30px;color:rgb(224, 204, 24) "></i> Détail la service {{$service->nom}}
                                      </h3>
                                      <a type="button" class="close btn-close " style="background-color:rgb(224, 204, 24)  " href="{{route("service.index")}}"></a>

                                </div>
                                    <form action="{{route("service.show",$service->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                    <div class="row ">
                                        <div class=" form-group  col- col-sm-4"  style="padding-left: 70px" > 
                                               <label for="nom"
                                                 class="col-form-label"
                                                 style=" font-size:20px;color:white"
                                                  >Nom du service :</label>
                                               <input   name="nom"
                                                type="text" 
                                                style="padding: 8px; font-size:20px;background-color:#6D8B74 ;color:white"
                                                class="form-control" id="nom"
                                                  placeholder=""
                                                  value="{{$service->nom}}"
                                                  >
                                        </div>
                                    </div><br>
                                            <div class="row ">
                                                <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                                <label for="fournisseur_id"
                                                                class="col-form-label "
                                                                style="font-size:20px;color:white"
                                                                >Fournisseur : </label><br>
                                                                        <select  name="fournisseur_id" 
                                                                        class="form-control col-form-label"
                                                                        style="background-color:#6D8B74 ;color:white;padding: 8px; font-size:20px;">
                                                                            <option value="" >Choisir un fournisseur</option>
                                                                                @foreach($fournisseur as $vendor)
                                                                                <option value="{{ $vendor->id}}" {{old('fournisseur_id') == $vendor->id|| $service->fournisseur->id== $vendor->id? "selected" : ""}}>{{ $vendor->nom }}</option>
                                                                                @endforeach
                                                                        </select>  
                                                        </div> 
                                                </div><br>
                                                <div class="row ">
                                                    <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                                    <label 
                                                                            for="methode_paiement" 
                                                                            style="font-size:20px; color:white"
                                                                            class="col-form-label " 
                                                                            style="color: #2B4C59">Methode de paiement :
                                                                   </label> 
                                                                            <select  name="methode_paiement"
                                                                             class="form-control col-form-label" 
                                                                              style="background-color:#6D8B74 ;color:white;padding: 8px; font-size:20px;">
                                                                                    <option value=""  selected="select" >Choisir une méthode</option>
                                                                                    <option value="1">Espèce</option>
                                                                                    <option value="2">Chèque</option>
                                                                                    <option value="3">Carte bancaire</option>
                                                                                    <option value="4">autre méthode</option>
                                                                            </select>
                                                            </div>
                                                      </div><br>
                                                             <div class="row ">
                                                                     <div class=" form-group col-sm-7"  style="padding-left: 70px" >
                                                                         <label class="col-form-label" 
                                                                            for="description" 
                                                                            style="font-size:20px;color:white"
                                                                            style="color: #2B4C59">Description : 
                                                                         </label>
                                                                            <textarea   
                                                                                    name="description" 
                                                                                    id="description" 
                                                                                    style="background-color:#6D8B74 ;color:white;padding:0px;font-size:20px;"
                                                                                    class="form-control "
                                                                                    cols="40" rows="8"  
                                                                                    placeholder="">
                                                                           {{$service->description}} </textarea>
                                                                      </div>
                                                                </div> <br><br>
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