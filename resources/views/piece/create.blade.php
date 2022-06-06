 <x-app-layout>
    @section('title')
         <title>Piece  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
          <link rel="stylesheet" href="/css/style.css">
          <style>
               .colorr{
                  color: red;
                }
          </style>
    @endsection
    <x-slot name="header">
      <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
          {{ __('PIECE') }}
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
                                        <i class="fa fa-plus" style="font-size:30px;color:#a45e5f "></i> Ajouter nouveau pièce
                                        </h3>
                                  </div>
                                  <form action="{{route("piece.store")}}" method="post"> 
                                    @csrf
                                   <div class=" form-group  col-sm-5 my-4"  style="padding-left: 50px" >
                                                <label 
                                                    for="type_piece"  
                                                    class="col-form-label labelStyle">Type de piece 
                                                </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <br>
                                                        <select 
                                                                name="type_piece"  
                                                                class="form-control "    style=" background-color:#a45e5f ;
                                                                color:white;
                                                                padding: 8px;
                                                                 font-size:19px;"
                                                                style=" font-size:20px;" >
                                                                <option value="Facture"  selected="select" >Facture</option>
                                                                <option value="Bound"  selected="select" >Bound</option>
                                                                <option value="0"   >choisir type de piece</option>
                                                        </select> 
                                    </div>
                                        <div class=" form-group  col-sm-5 my-4"  style="padding-left: 50px" > 
                                                     <label 
                                                             for="numero"  
                                                             class="labelStyle col-form-label" >Numéro
                                                      </label>
                                                      <span class="required colorr" aria-hidden="true">*</span>
                                                         <input 
                                                             style="padding: 8px; font-size:20px;"
                                                             name="numero"
                                                             type="text"
                                                             class="form-control  " 
                                                             id="numero" placeholder="numéro piece ">
                                        </div>       
                                            <div class=" form-group col-sm-5 my-4"  style="padding-left: 50px" >
                                                    <label 
                                                            class="col-form-label labelStyle" 
                                                            for="paiement_date" >Date de paimement
                                                            <span class="required colorr" aria-hidden="true">*</span>
                                                        </label>
                                                    <br>
                                                            <input 
                                                                name="paiement_date"
                                                                class="form-control " 
                                                                type="Date"
                                                                style="background-color:white ;color:black;font-size:19px;padding:8px " >
                                            </div>  
                                                    <div class=" form-group  col-sm-5 my-4"  style="padding-left: 50px" > 
                                                        <label 
                                                                for="bank_account"  
                                                                class="col-form-label labelStyle" >Compte bancaire
                                                       </label>
                                                            <input 
                                                                style="padding: 8px; font-size:20px;"
                                                                name="bank_account"
                                                                type="text" 
                                                                class="form-control  " 
                                                                id="bank_account" placeholder=" ">
                                                    </div>   
                                                        <div class=" form-group  col-sm-8 my-4"  style="padding-left: 50px" >
                                                                        <label for="note" 
                                                                                class="col-form-label labelStyle">Note 
                                                                       </label><br>
                                                                        <textarea  name="note"
                                                                            id="note"
                                                                            class="form-control col-md-2"
                                                                            cols="40"
                                                                            rows="8"
                                                                            style="padding: 13px; font-size:20px;" placeholder="description">
                                                                        </textarea>
                                                        </div>
                                                            <div class="form-group pull-right my-4" >
                                                                            <button type="submit "  class="btn2 "  > Enregistrer <i class="fa fa-save" style="color: #efc8b1"></i></button>
                                                                            <button class="btn2 "  ><a type="button" style="text-decoration: none; color:white"  href="{{route("piece.index")}}" >Annuler <i class="fa fa-times" style="color: #efc8b1"></i></a></button>
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
 