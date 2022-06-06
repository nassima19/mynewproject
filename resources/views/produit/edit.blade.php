<x-app-layout>
    @section('title')
         <title>Produit  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
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
                                        <i class="fas fa-edit" style="color:#a45e5f"></i> Modifier le produit {{$produit->libele}}
                                        </h3>
                                        <a type="button" class="close btn-close " href="{{route("produit.index")}}"></a>
                                   </div>
                                  <form action="{{route("produit.update",$produit->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                    <br>
                                    <div class="row ">
                                        <div class=" form-group  col-sm-5"  style="padding-left: 70px" > 
                                              <label for="libele"  class="col-form-label labelStyle" >Libelle :</label>
                                              <input style="padding: 8px; font-size:20px;"
                                              name="libele"
                                              type="text" 
                                              class="form-control  " 
                                              id="lible"  
                                              placeholder="" value="{{$produit->libele}}">
                                          </div>
                                          <div class=" form-group  col- col-sm-5"  style="padding-left: 100px" >
                                              <label for="code_barre"  class="col-form-label labelStyle">Code :</label>
                                              <input name="code_barre" type="text"
                                                    class="form-control " 
                                                    id="code_barre"
                                                    style="padding: 8px; font-size:20px;"
                                                    value="{{$produit->code_barre}}">
                                          </div>
                                    </div> <br>
                                    <div class="row ">
                                        <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" >
                                            <label for="categorie_id"  class="col-form-label labelStyle" >Categorie : </label>
                                            <select name="categorie_id"  class="form-control" style="color:white ;background-color:#a45e5f;padding: 8px; font-size:20px;" >
                                                <option value=""  >choisir une categorie</option>
                                                @foreach($categorie as $category)
                                                     <option value="{{ $category->id}}" {{old('categorie_id') == $category->id ||$produit->categorie->id== $category->id? "selected" : ""}}>{{ $category->libele }}</option>
                                             @endforeach
                                            </select> 
                                       </div> 
                                       <div class=" form-group  col- col-sm-5"  style="padding-left: 100px" >
                                      <label for="methode_paiement"  class="col-form-label labelStyle">Method paiement :</label>  <br>
                                      <select  name="methode_paiement"   class="form-control " style="color:white ;background-color:#a45e5f;padding: 8px; font-size:20px;">
                                        <option value=""  selected="select" >choisir une methode</option>
                                        <option value="Espéce">Espéce</option>
                                        <option value="Chéque">Chéque</option>
                                        <option value="Carte banquaire">Carte bancaire</option>
                                        <option value="autre methode">autre methode</option>
                                    </select>
                                    </div>
                                  </div><br><br>
                                  <div class="row ">
                                    <div class=" form-group  col- col-sm-8"  style="padding-left: 70px" >
                                            <label for="description" class="col-form-label" style=" font-size:19px">Description : </label><br>
                                            <textarea  name="description"
                                            id="description"
                                             class="form-control col-md-2"
                                              cols="25"
                                               rows="5"
                                               style="padding: 13px; font-size:20px;"> {{$produit->description}}</textarea>
                                          </div><br>
                                        </div>
                                        <div class="form-group pull-right" >
                                          <button type="submit "  class="btn2 " > Modifier</button>
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
 