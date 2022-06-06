<x-app-layout>
    @section('title')
         <title>Charge </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
            {{ __('CHARGE') }}
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
                                    <h3 class="border-bottom mb-3 p-2" style="color: #f69000" > 
                                      <i class="fa fa-plus" style="font-size:26px;color: #f69000"></i> Ajouter nouveau charge
                                      </h3>
                                </div>
                                <script type="text/javascript">
                                function calculer(){
                                    document.getElementById('total').value=document.getElementById('prix').value* document.getElementById('qte').value;
                                }
                                function change(event){
                                    let produitsOptions = document.querySelectorAll('.produits-options')  ;
                                    let categorie = Array.from(produitsOptions).find(option => option.getAttribute('value') == event.target.value).getAttribute('categorie')
                                    let fournisseur_cat =  document.querySelectorAll(".option")  
                                    for (var i = 0; i < fournisseur_cat.length; i++) {
                                    if(fournisseur_cat[i].getAttribute("categorie_f")!=categorie)
                                    {  
                                        fournisseur_cat[i].style.display="none"; 
                                    } 
                                }   
                       }
  </script> 
     <form action="{{route("charge.store")}}" method="post"> 
                                    @csrf
                                    <div class="row ">
                                        <div class=" form-group col-sm-5 my-3" style="padding-left: 50px" > 
                                                <label 
                                                    for="produit_id"
                                                    class="col-form-label "
                                                    style="font-size:19px;color:black"
                                                    >Produit : 
                                                </label>
                                                    <select 
                                                           id="produits-list"
                                                            onchange="change(event)"
                                                            name="produit_id" 
                                                            class="form-control col-form-label"
                                                            style="background-color:#f3f4d3 ;color:;padding: 8px; font-size:19px;">
                                                           <option value="" >Choisir un produit</option>
                                                            @foreach($produit as $product)
                                                            <option value="{{$product->id}}"  class="produits-options" categorie="{{$product->categorie_id}}">{{$product->libele}}</option>
                                                            @endforeach
                                                    </select>  
                                        </div>
                                              <div class=" form-group col-sm-5 my-3" style="padding-left: 100px;padding-right:0%" > 
                                                <label 
                                                        for="taxes"
                                                        class="col-form-label "
                                                        style=" font-size:20px;color:black">Taxes :
                                                    </label>
                                                        <input  
                                                            name="taxes"
                                                            type="text" 
                                                            style="padding: 8px;cursor:context-menu; font-size:19px;background-color:#f3f4d3;color:black"
                                                            class="form-control" id="taxes"
                                                            placeholder="nom du service">
                                             </div>
                                    </div>
                                             <div class="row ">
                                                    <div class=" form-group col-sm-5 my-3"  style="padding-left: 50px" >
                                                                    <label 
                                                                            for="fournisseur_id" 
                                                                            style="font-size:19px;color:black"
                                                                            class="col-form-label" >Fournisseur :
                                                                   </label><button style="font-size:19px;color: #1a3733" class=" pull-right"><a href="{{route("fournisseur.create")}}" style="text-decoration: none;color:#f69000"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter</a></button><br>
                                                                            <select  
                                                                                     id="fournisseur_id"
                                                                                    name="fournisseur_id"
                                                                                    class="form-control col-form-label" 
                                                                                    style="background-color:#f3f4d3 ;color:black;padding: 8px; font-size:19px;">
                                                                                    <option value=""  selected="select" >Choisir un fournisseur</option>
                                                                                @foreach($fournisseur as $vendor)
                                                                                    <option value="{{$vendor->id}}"  categorie_f="{{$vendor->categorie_id}}" class=" option">{{$vendor->nom}}</option>
                                                                                   @endforeach  
                                                                            </select>
                                                    </div>
                                                         <div class=" form-group col-sm-5 my-3"  style="padding-left: 100px;padding-right:0%" >
                                                                            <label class="col-form-label " 
                                                                                for="statu" 
                                                                                style="font-size:19px;color:black">Statue : 
                                                                            </label>
                                                                                  <select  
                                                                                        name="statu"
                                                                                        class="form-control " 
                                                                                        style="background-color:#f3f4d3 ;color:black;padding: 8px; font-size:19px;"
                                                                                        id="statu">
                                                                                          <option value="0">Brouillon</option>
                                                                                          <option value="Payée">Payée</option>
                                                                                          <option value="A Payée">A Payée</option>
                                                                        </select>
                                                            </div>
                                                    </div>
                                                     <div class="row ">
                                                        <div class=" form-group col-sm-5 my-3"  style="padding-left: 50px" >
                                                                <label class="col-form-label " 
                                                                    for="date" 
                                                                    style="font-size:19px;color:black">Date : 
                                                                </label><br>
                                                                        <input 
                                                                        name="date"
                                                                            class="form-control " 
                                                                            type="Date"
                                                                            style="background-color:#f3f4d3 ;color:black;font-size:19px;padding:8px " >
                                                        </div>
                                                         <div class=" form-group col-sm-5 my-3" style="padding-left: 100px;padding-right:0%" > 
                                                            <label 
                                                                    for="piece_id"
                                                                    class="col-form-label "
                                                                    style=" font-size:20px;color:black">N° piece fournisseur :
                                                                </label> <select  
                                                                                        name="piece_id"
                                                                                        class="form-control " 
                                                                                        style="background-color:#f3f4d3 ;color:black;padding: 8px; font-size:19px;"
                                                                                        id="piece_id">
                                                                                          <option >---</option>
                                                                                          @foreach($piece as $pieces)
                                                                                          <option value="{{$pieces->id}}">{{$pieces->numero}}</option>
                                                                                          @endforeach
                                                                        </select>
                                                         </div>  
                                                     </div><br>
                                                    <div class="row">
                                                        <div class=" form-group  col-md-5 my-3" style="padding-left: 50px;">
                                                            <label class="sr-only" for="prix">Prix</label>
                                                            <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                <div 
                                                                   class="input-group-text" 
                                                                   style="padding: 8px; font-size:19px;background-color: #f69000;color:white;">Prix HT
                                                                </div>
                                                              </div>
                                                              <input 
                                                              name="prix"
                                                                    type="text" 
                                                                    onkeyup="calculer()"
                                                                    class="form-control" 
                                                                    id="prix"
                                                                    value="0.00"
                                                                    style="padding: 8px; font-size:19px;background-color:#f3f4d3;color:black; text-align:right;cursor:context-menu"
                                                                    placeholder="Prix">
                                                            </div>
                                                          </div><br>
                                                                <div class=" form-group  col-sm-5 my-3" style="padding-left: 80px;padding-right:2%">
                                                                    <label class="sr-only" for="qte">Qté</label>
                                                                    <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div 
                                                                        class="input-group-text" 
                                                                        style="padding: 8px; font-size:19px;background-color:#f69000;color:white">Quantité
                                                                        </div>
                                                                    </div>
                                                                    <input 
                                                                    name="qte"
                                                                    onkeyup="calculer()"
                                                                    type="text" 
                                                                    class="form-control" 
                                                                    id="qte"
                                                                    value="1"
                                                                    style="padding: 8px; font-size:19px;cursor:context-menu;background-color:#f3f4d3;color:black;text-align:right"
                                                                    placeholder="Quantité">
                                                            </div>
                                                          </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="form-group  col-md-10 my-3"  style="padding-left: 50px; padding-right:0px;">
                                                                 <label class="sr-only " style="padding: 4px 4px " for="total">Total</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                          <div 
                                                                                class="input-group-text" 
                                                                                style="padding: 8px; font-size:19px;background-color: #f69000;color:white;cursor: pointer;caret-color: red;">Total
                                                                          </div>
                                                                      </div>
                                                                            <input 
                                                                                    name="total"
                                                                                    type="text" 
                                                                                    class="form-control" 
                                                                                    id="total"
                                                                                    value="0.00"
                                                                                    style="float:left;padding: 8px; font-size:19px;cursor:context-menu;background-color:#f3f4d3;color:black;text-align:right;"
                                                                                     placeholder="Total">
                                                                    </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" form-group col-md-10 my-3" style="padding-left: 50px;padding-right:0%" > 
                                                               <label 
                                                                       for="description"
                                                                       class="col-form-label "
                                                                       style=" font-size:20px;color:black">Discription :
                                                                   </label>
                                                               <textarea 
                                                                       name="description" 
                                                                       id="" 
                                                                       
                                                                       cols="30" 
                                                                       rows="5"
                                                                       class="form-control"
                                                                       
                                                                       style="padding: 8px; font-size:19px;background-color:#f3f4d3;color:black;cursor:context-menu;"
                                                                       >
                                                                   </textarea>
                                                       </div> </div><br>
                                                          <div class="form-group pull-right my-4" >
                                                                                <button type="submit "  class="btn2 fw-bold" style="background-color: #f69000;color:#fff"> Enregistrer <i class="fa fa-save" style="color: #fff"></i></button>
                                                                                <button class="btn2 fw-bold" style="background-color: #f69000" ><a type="button" style="text-decoration: none;  color:#fff; background-color: #f69000"  href="{{route("charge.index")}}" >Annuler <i class="fa fa-times" style="color: #fff"></i></a></button>
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
{{--   @section('script')
  <script src="/js/javascript.js"></script>
  @endsection --}}
</x-app-layout>

