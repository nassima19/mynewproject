<x-app-layout>
    @section('title')
         <title>Categorie  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
    @endsection
<x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categorie') }}
            </h2>
</x-slot>
@section('content')
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="d-flex flex-row justify-content-between align-items-center pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fa fa-plus" style="font-size:30px;color:rgb(224, 204, 24) "></i> Modifier la categorie {{$categorie->libele}}
                                       </h3>
                                        <a type="button" class="close btn-close " href="{{route("categorie.index")}}"></a>
                                  </div>
                                  <form action="{{route("categorie.update",$categorie->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                      <label for="name">Libelle :</label><br>
                                      <input name="libele" type="text" class="form-control " id="name"  value="{{$categorie->libele}}"><br>
                                    </div>
                                        <div class="form-group">
                                            <label for="description">Description : </label><br>
                                            <textarea name="description" id="description" class="form-control" cols="40" rows="8"  placeholder="">{{$categorie->description}}</textarea>
                                        </div><br>
                                        <div class="form-group" >
                                          <button type="submit "  class="btn2 fw-bold" ><i class="fa fa-save"></i> Enregistrer</button>
{{--                                          <button type="button" class=" btn2 fw-bold" onclick="location.href='{{url('categorie.index')}}" ><i class="fa fa-close"></i> Annuler</button>       
                                          <button type="reset" class="btn btn-default pull-right">Cancel</button>--}}
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