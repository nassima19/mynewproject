<x-app-layout>
    @section('title')
         <title>Categorie  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
            {{ __('CATEGORIE') }}
        </h2>
</x-slot>
@section('content')
<div class="container  p-3">
    <div class="row justify-content-center">
            <div class="col-md-10 ">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-12 ">
                                  <div class="d-flex flex-row justify-content-between align-items-center pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fas fa-eye" style="color:#a45e5f"></i> Détail de la categorie {{$categorie->libele}}
                                       </h3>
                                        <a type="button" class="close btn-close " href="{{route("categorie.index")}}"></a>
                                  </div>
                                  <form action="{{route("categorie.show",$categorie->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                    <div class="form-group col-md-4" style="padding-left: 40px">
                                    <label for="name" class="col-form-label" style=" font-size:19px">Libelle :</label><br>
                                    <input name="libele"
                                     type="text" 
                                     class="form-control " 
                                     id="name" 
                                      style="padding: 8px; font-size:20px;" 
                                      placeholder=""
                                      value="{{$categorie->libele}}"><br>
                                    </div>
                                    <div class="form-group col-md-8" style="padding-left: 40px">
                                        <label for="description" class="col-form-label" style=" font-size:19px">Description : </label><br>
                                        <textarea name="description"  
                                         class="form-control "
                                         cols="60"
                                         rows="8"
                                         style="padding: 13px; font-size:20px;" 
                                         placeholder="description">{{$categorie->description}}</textarea>
                                        </div><br> <br>
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