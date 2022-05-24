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
        <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
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
    <div class="container p-3" >
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow p-3 mb-5 bg-body rounded" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-2" > 
                                      <i class="fa fa-plus" style="font-size:26px;color:#a45e5f"></i> Ajouter nouveau service
                                      </h3>
                                </div>
                                    <form action="{{route("service.store")}}" method="post"> 
                                    @csrf
                                    <div class="row ">
                                        <div class=" form-group col-sm-5" style="padding-left: 70px" > 
                                               <label 
                                                    for="nom"
                                                    class="col-form-label "
                                                    style=" font-size:20px;color:black">Nom du service <em style="color:#01555f"> (Domaine d'activité)</em> : </label>
                                                        <input  
                                                            name="nom"
                                                            type="text" 
                                                            style="padding: 8px; font-size:19px;background-color:white;color:black"
                                                            class="form-control" id="nom"
                                                            placeholder="nom du service">
                                        </div>
                                    </div><br> 
                                            <div class="row ">
                                                            <div class=" form-group col-sm-8"  style="padding-left: 70px" >
                                                                <label class="col-form-label " 
                                                                    for="description" 
                                                                    style="font-size:19px;color:black">Description : 
                                                                </label>
                                                                    <textarea   
                                                                            name="description" 
                                                                            id="description" 
                                                                            style="font-size:19px;background-color:white ;color:black"
                                                                            class="form-control "
                                                                            cols="40" rows="8"  
                                                                            placeholder="Description">
                                                                    </textarea>
                                                            </div>
                                                                </div> <br><br>
                                                                    <div class="form-group pull-right" >
                                                                                <button type="submit " class="btn2 fw-bold "  ><i class="fa fa-save"></i> Enregistrer</button>
                                                                                <button class="btn2 fw-bold" ><a type="button" style="text-decoration: none;  color:white"  href="{{route("service.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
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