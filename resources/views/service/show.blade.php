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
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
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
            <div class="col-md-10" >
                <div class="card shadow p-3 mb-5 bg-body rounded" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-2" style="color: #6D8B74"> 
                                        <i class="fas fa-eye" style="font-size:30px;color:#a45e5f "></i>  Détail de la service {{$service->nom}}
                                      </h3>
                                      <a type="button" class="close btn-close " style="background-color: #a45e5f"  href="{{route("service.index")}}"></a>

                                </div>
                                    <div class="row ">
                                        <div class=" form-group  col- col-sm-4"  style="padding-left: 70px" > 
                                               <label for="nom"
                                                 class="col-form-label"
                                                 style=" font-size:20px;color:black"
                                                  >Nom du service :</label>
                                               <input   name="nom"
                                                type="text" 
                                                style="padding: 8px; font-size:19px;background-color:white ;color:black"
                                                class="form-control" id="nom"
                                                  placeholder=""
                                                  value="{{$service->nom}}"
                                                  >
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
                                                                        style="background-color:white ;color:black;padding:0px;font-size:19px;"
                                                                        class="form-control "
                                                                        cols="40" rows="8"  
                                                                        placeholder="">
                                                                {{$service->description}} </textarea>
                                                            </div>
                                                        </div> 
                                           </div>
                                     </div>
                               </div>
                         </div>
                  </div>
           </div>
      </div>      
  @endsection
</x-app-layout>