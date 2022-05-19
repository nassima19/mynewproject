 <x-app-layout>
    @section('title')
         <title>Piece  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
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
                                        <i class="fa fa-plus" style="font-size:30px;color:#a45e5f "></i> Ajouter nouveau piece
                                        </h3>
                                  </div>
                                {{--   <script>
                                      var a = 1;
                                      function numeropiece(){
                                            var piece = document.getElementById("numero");
                                            piece.value = a;
                                            a++;
                                    }  
                                     
                                </script> --}}
                                  <form action="{{route("piece.store")}}" method="post"> 
                                    @csrf
                                   <div class=" form-group  col-sm-5 my-4"  style="padding-left: 50px" >
                                                <label 
                                                    for="type_piece"  
                                                    class="col-form-label" 
                                                    style=" font-size:19px">Type de piece : 
                                                </label><br>
                                                        <select 
                                                                name="type_piece"  
                                                                class="form-control" 
                                                                style="color:white ;background-color: #a45e5f;padding: 8px; font-size:20px;" >
                                                                <option value="Facture"  selected="select" >Facture</option>
                                                                <option value="Bound"  selected="select" >Bound</option>
                                                                <option value="0"   >choisir type de piece</option>
                                                        </select> 
                                    </div>
                                        <div class=" form-group  col-sm-5 my-4"  style="padding-left: 50px" > 
                                                     <label 
                                                             for="numero"  
                                                             class="col-form-label" 
                                                             style=" font-size:19px">Numéro :
                                                      </label>
                                                         <input 
                                                             style="padding: 8px; font-size:20px;"
                                                             name="numero"
                                                             type="text"
                                                             class="form-control  " 
                                                             id="numero" placeholder="numéro piece ">
                                        </div>       
                                            <div class=" form-group col-sm-5 my-4"  style="padding-left: 50px" >
                                                    <label 
                                                            class="col-form-label " 
                                                            for="paiement_date" 
                                                            style="font-size:19px;color:black">Date de paimement: 
                                                    </label><br>
                                                            <input 
                                                                name="paiement_date"
                                                                class="form-control " 
                                                                type="Date"
                                                                style="background-color:white ;color:black;font-size:19px;padding:8px " >
                                            </div>  
                                                    <div class=" form-group  col-sm-5 my-4"  style="padding-left: 50px" > 
                                                        <label 
                                                                for="bank_account"  
                                                                class="col-form-label" 
                                                                style=" font-size:19px">Compte bancaire :
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
                                                                                class="col-form-label" 
                                                                                style=" font-size:19px">Note : 
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
                                                                            <button type="submit "  class="btn2 "  ><i class="fa fa-save"></i> Enregistrer</button>
                                                                            <button class="btn2 "  ><a type="button" style="text-decoration: none; color:white"  href="{{route("piece.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
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
 