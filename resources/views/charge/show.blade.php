
<x-app-layout>
    @section('title')
         <title>Charge </title>
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
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
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
                                         <i class="fas fa-eye" style="font-size:26px;color: #f69000"></i> Détail de la charge de produit {{$charge->produit->libele}} 
                                      </h3>
                                      <a type="button" class="close btn-close " href="{{route("charge.index")}}"></a>
                                </div>
                                <script type="text/javascript">
                                function calculer(){
                                    document.getElementById('total').value=document.getElementById('prix').value* document.getElementById('qte').value;
                                }
                                </script>
                                    <div class="row ">
                                        <div class=" form-group col-sm-5 my-3" style="padding-left: 50px" > 
                                                <label 
                                                    for="produit_id"
                                                    class="col-form-label "
                                                    style="font-size:19px;color:black"
                                                    >Produit : 
                                                </label>
                                                <input  
                                                name="produit_id"
                                                type="text" 
                                                style="padding: 8px;cursor:context-menu; font-size:19px;background-color:#f3f4d3;color:black"
                                                class="form-control" id="produit_id"
                                                placeholder=""
                                                value="{{$charge->produit->libele}}"
                                                >
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
                                                            placeholder=""
                                                            value="{{$charge->taxes}}"
                                                            >
                                             </div>
                                    </div>
                                             <div class="row ">
                                                    <div class=" form-group col-sm-5 my-3"  style="padding-left: 50px" >
                                                                    <label 
                                                                            for="fournisseur_id" 
                                                                            style="font-size:19px;color:black"
                                                                            class="col-form-label" >Fournisseur :
                                                                   </label><br>
                                                                   <input  
                                                                   name="fournisseur_id"
                                                                   type="text" 
                                                                   style="padding: 8px;cursor:context-menu; font-size:19px;background-color:#f3f4d3;color:black"
                                                                   class="form-control" id="fournisseur_id"
                                                                   placeholder=""
                                                                   value="{{$charge->fournisseur->nom}}"
                                                                   >
                                                    </div>
                                                         <div class=" form-group col-sm-5 my-3"  style="padding-left: 100px;padding-right:0%" >
                                                                            <label class="col-form-label " 
                                                                                for="statu" 
                                                                                style="font-size:19px;color:black">Statue : 
                                                                            </label>
                                                                            <input  
                                                                            name="statu"
                                                                            type="text" 
                                                                            style="padding: 8px;cursor:context-menu; font-size:19px;background-color:#f3f4d3;color:black"
                                                                            class="form-control" id="statu"
                                                                            placeholder=""
                                                                            value="{{$charge->statu}}"
                                                                            >
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
                                                                            value="{{$charge->date}}"
                                                                            style="background-color:#f3f4d3 ;color:black;font-size:19px;padding:8px " >
                                                        </div>
                                                         <div class=" form-group col-sm-5 my-3" style="padding-left: 100px;padding-right:0%" > 
                                                            <label 
                                                                    for="piece_id"
                                                                    class="col-form-label "
                                                                    style=" font-size:20px;color:black">N° piece fournisseur :
                                                                </label>
                                                                <input 
                                                                        name="piece_id"
                                                                            class="form-control " 
                                                                            type="text"
                                                                            value="{{$charge->piece_id}}"
                                                                            style="background-color:#f3f4d3 ;color:black;font-size:19px;padding:8px " >
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
                                                                    class="form-control" 
                                                                    id="prix"
                                                                    value="{{$charge->prix}}"
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
                                                                    type="text" 
                                                                    class="form-control" 
                                                                    id="qte"
                                                                    value="{{$charge->qte}}"
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
                                                                            onfocus="calculer()"
                                                                                    name="total"
                                                                                    type="text" 
                                                                                    class="form-control" 
                                                                                    id="total"
                                                                                    value="{{$charge->total}}"
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
                                                                  {{$charge->description}} </textarea>
                                                       </div> </div><br>
                                           </div>
                                     </div>
                               </div>
                         </div>
                  </div>
           </div>
      </div>      
  @endsection
</x-app-layout>

