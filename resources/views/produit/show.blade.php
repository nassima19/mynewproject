{{-- <x-app-layout>
@section('title')
     <title>Produit  </title>
@endsection
@section('style')
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit') }}
        </h2>
</x-slot>
@section('content')
              <div class="col-md-10 my-5  mx-4 ">
                  <button type="button" class="btn btn-secondary pull-right" data-bs-toggle="modal" data-bs-target="#myModal">
                      ajouter un produit
                  </button>
              </div>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
           <div class="modal-dialog">
             <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                 <h4 class="modal-title">Nouveau produit</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="numero">Numero du projet :</label> <br>
                      <input type="text" class="form-control" id="numero"  placeholder="numero du produit"> <br>
                    </div>
                          <div class="form-group">
                            <label for="name">Nom du produit :</label> <br>
                            <input type="text" class="form-control" id="name" placeholder="Entrer le nom du produit"> <br>
                          </div>
                                <div class="form-group">
                                  <label for="four">Fournisseur : </label> <a class="plus" href="{{ route('fournisseur') }}"><i class="fa-solid fa-plus"></i>ajouter</a>
                                  <br>
                                  <input type="text" name="four" class="form-control" id="four" placeholder="entrez le fournisseur" > <br>
                                </div>
                 </form>
            </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                    <div class="container">
    {{--                           <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Enregistrer</button>
    --}}{{-- 
                      <button class="btn"data-bs-dismiss="modal"><i class="fa fa-save"></i> Enregistrer</button>
                      <button  class="btn" data-bs-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>       
       
                   
                    </div>
                </div>
           </div>
         </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
      </body>
</html>
@endsection
</x-app-layout>
  



  --}} 
  <x-app-layout>
    @section('title')
         <title>Produit  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endsection
@section('content')
      <div class="container p-2">
          <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fa fa-plus" style="font-size:30px;color:rgb(224, 204, 24) "></i>Ajouter produit
                                        </h3>
                                  </div>
                                  <form action="{{route("produit.store")}}" method="post"> 
                                    @csrf
                                    <div class="row">
                                      <div class="col ">
                                          <label for="name">Libelle :</label><br>
                                          <input name="libele" type="text" class="form-control col-md-2 " id="name"  placeholder="libelle produit"><br>
                                      </div>
                                    <div class="col">
                                          <label for="code_barre">Code :</label><br>
                                          <input name="code_barre" type="text" class="form-control col-md-2" id="code_barre"  placeholder="code produit"><br>
                                    </div>
                                    </div>  
                                        <div class="form-group">
                                            <label for="description">Description : </label><br>
                                            <textarea name="description" id="description" class="form-control" cols="40" rows="8"  placeholder="description"></textarea>
                                        </div><br>
                                        <div class="form-group" >
                                          <button type="submit "  class="btn2 " ><i class="fa fa-save"></i> Enregistrer</button>
                                           <button class="btn2"><a type="button" style="text-decoration: none;  color:white"  href="{{route("produit.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
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
  