<x-app-layout>
      @section('title')
           <title>Categorie  </title>
      @endsection
      @section('style')
            <link rel="stylesheet" href="/css/bootstrap.min.css">
             <link rel="stylesheet" href="/css/style.css">
      @endsection
@section('content')
        <div class="container  p-2 ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                        <h3 class="text-secondary border-bottom mb-3 p-2"> 
                                          <i class="fa fa-plus" style="font-size:30px;color:rgb(224, 204, 24) "></i>Ajouter categorie
                                          </h3>
                                    </div>
                                    <form action="{{route("categorie.store")}}" method="post"> 
                                      @csrf
                                      <div class="form-group">
                                        <label for="name">Libelle :</label><br>
                                        <input name="libele" type="text" class="form-control " id="name"  placeholder="libelle categorie"><br>
                                      </div>
                                     
                                          <div class="form-group">
                                              <label for="description">Description : </label><br>
                                              <textarea name="description" id="description" class="form-control" cols="40" rows="8"  placeholder="description"></textarea>
                                          </div><br>
                                          <div class="form-group" >
                                            <button type="submit "  class="btn2 " ><i class="fa fa-save"></i> Enregistrer</button>
{{--                                             <button  type="reset"  class="btn2 " href="{{ route('categorie.index') }}" ><i class="fa fa-close"></i> Annuler</button>
 --}}                                         <button class="btn2"><a type="button" style="text-decoration: none;  color:white"  href="{{route("categorie.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>

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