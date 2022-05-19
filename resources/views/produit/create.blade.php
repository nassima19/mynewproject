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
    @endsection
    <x-slot name="header">
      <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
          {{ __('PRODUIT') }}
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
              <div class="col-md-10">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1">  
                                        <i class="fa fa-plus" style="font-size:30px;color:#a45e5f "></i> Ajouter nouveau produit
                                        </h3>
                                  </div>
                                  <form action="{{route("produit.store")}}" method="post"> 
                                    @csrf
                                    <div class="row ">
                                      <div class=" form-group  col-sm-5"  style="padding-left: 70px" > 
                                            <label for="libele"  class="col-form-label" style=" font-size:19px">Libelle :</label>
                                            <input style="padding: 8px; font-size:20px;"
                                            name="libele"
                                            type="text" 
                                            class="form-control  " 
                                            id="lible" placeholder="libelle produit">
                                          </div>
                                          <div class=" form-group  col- col-sm-5"  style="padding-left: 100px" >
                                            <label for="code_barre"  class="col-form-label" style=" font-size:19px">Code :</label>
                                            <input name="code_barre" type="text"
                                                  class="form-control " 
                                                  id="code_barre"
                                                  style="padding: 8px; font-size:20px;"  placeholder="code produit">
                                          </div>
                                        </div> <br><br>
                                        <div class="row ">
                                            <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                                <label for="categorie_id"  class="col-form-label" style=" font-size:19px">Categorie : </label><button style="font-size:19px;color:#D6A65E" class=" pull-right"><a href="{{route("categorie.create")}}" style="text-decoration: none;color:#f69000;"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter</a></button><br>
                                                <select name="categorie_id"  class="form-control" style="color:white ;background-color: #a45e5f;padding: 8px; font-size:20px;" >
                                          <option value=""  selected="select" >choisir une categorie</option>
                                         @foreach($categorie as $category)
                                         <option value="{{$category->id}}">{{$category->libele}}</option>
                                         @endforeach
                                    </select> 
                                     </div>
                                     <div class=" form-group  col- col-sm-5"  style="padding-left: 100px" >
                                      <label for="methode_paiement"  class="col-form-label" style=" font-size:19px">Method paiement :</label>  <br>
                                      <select  name="methode_paiement"   class="form-control " style="color:white ;background-color: #a45e5f;padding: 8px; font-size:20px;">
                                          <option value=""  selected="select" >choisir une methode</option>
                                         <option value="Espéce">Espéce</option>
                                         <option value="Chéque">Chéque</option>
                                         <option value="Carte banquaire">Carte banquaire</option>
                                         <option value="autre methode">autre methode</option>
                                    </select>
                                    </div>
                                  </div>
                                  <br><br>
                                  <div class="row">
                                    <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                    <label for="image"  class="col-form-label"  style=" font-size:20px;color:black">Image :</label><br>
                                      <input 
                                            type="file" 
                                            name="image"
                                            placeholder="choisir image" 
                                            style="padding: 8px; font-size:19px;background-color:white;color:black"
                                            id="image">
                                              @error('image')
                                                    <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                              @enderror
                                    </div>
                                  </div><br>
                                  <div class="row ">
                                    <div class=" form-group  col- col-sm-8"  style="padding-left: 70px" >
                                            <label for="description" class="col-form-label" style=" font-size:19px">Description : </label><br>
                                            <textarea  name="description"
                                            id="description"
                                             class="form-control col-md-2"
                                              cols="40"
                                               rows="8"
                                               style="padding: 13px; font-size:20px;" placeholder="description"></textarea>
                                          </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group pull-right" >
                                          <button type="submit "  class="btn2 "  ><i class="fa fa-save"></i> Enregistrer</button>
                                           <button class="btn2 "  ><a type="button" style="text-decoration: none; color:white"  href="{{route("produit.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
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
 