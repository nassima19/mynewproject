
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
                                            <label for="libele"  class="col-form-label labelStyle" >Libelle :</label>
                                            <input style="padding: 8px; font-size:20px;"
                                            name="libele"
                                            type="text" 
                                            class="form-control  " 
                                            id="lible" placeholder="libelle produit">
                                          </div>
                                          <div class=" form-group  col- col-sm-5"  style="padding-left: 100px" >
                                            <label for="code_barre"  class="col-form-label labelStyle" >Code :</label>
                                            <input name="code_barre" type="text"
                                                  class="form-control " 
                                                  id="code_barre"
                                                  style="padding: 8px; font-size:20px;"  placeholder="code produit">
                                          </div>
                                        </div> <br><br>
                                        <div class="row ">
                                            <div class=" form-group  col-sm-5"  style="padding-left: 70px" >
                                                <label for="categorie_id"  class="col-form-label labelStyle" >Categorie : </label><button style="font-size:19px;color:#D6A65E" class=" pull-right"><a href="{{route("categorie.create")}}" style="text-decoration: none;color:#f69000;"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter</a></button><br>
                                                <select name="categorie_id"  class="form-control" style="color:white ;background-color: #a45e5f;padding: 8px; font-size:20px;" >
                                          <option value=""  selected="select" >choisir une categorie</option>
                                         @foreach($categorie as $category)
                                         <option value="{{$category->id}}">{{$category->libele}}</option>
                                         @endforeach
                                    </select> 
                                     </div>
                                     <div class=" form-group  col- col-sm-5"  style="padding-left: 100px" >
                                      <label  
                                      for="methode_paiement"  
                                      class="col-form-label labelStyle" >Method paiement :
                                    </label>  <br>
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
                                  <div class="row ">
                                    <div class=" form-group  col- col-sm-8"  style="padding-left: 70px" >
                                            <label 
                                            for="description" 
                                            class="col-form-label labelStyle" >Description : 
                                          </label><br>
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
                                          <button type="submit " class="btn2 "  > Enregistrer <i class="fa fa-save" style="color: #efc8b1"></i></button>
                                           <button class="btn2 "><a type="button" style="text-decoration: none; color:white"  href="{{route("produit.index")}}" >Annuler <i style="color: #efc8b1" class="fa fa-times"></i></a></button>
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
 