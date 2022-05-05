<x-app-layout>
    @section('title')
         <title>Categorie  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
    @endsection
@section('content')
      <div class="container  p-2">
          <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fa fa-plus" style="font-size:30px;color:rgb(224, 204, 24) "></i> Détail de la categorie {{$categorie->libele}}
                                        </h3>
                                        <a type="button" class="btn-close btn2" href="{{route("categorie.index")}}"></a>
                                  </div>
                                  <form action="{{route("categorie.update",$categorie->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                      <label for="name">Libelle :</label><br>
                                      <input name="libele" type="text" class="form-control " id="name"  value="{{$categorie->libele}}" placeholder="libelle categorie"><br>
                                    </div>
                                        <div class="form-group">
                                            <label for="description">Description : </label><br>
                                            <textarea name="description" id="description" class="form-control" cols="40" rows="8"  placeholder="">{{$categorie->description}}</textarea>
                                        </div><br>
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