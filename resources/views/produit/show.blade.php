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
<div class="container  p-3">
  <div class="row justify-content-center" style="padding: 12px">
      <div class="col-md-10">
          <div class="card shadow p-3 mb-5 bg-body rounded">
              <div class="card-body" >
                  <div class="row " style="padding: 12px;">
                      <div class="col-md-12">
                          <div class="d-flex flex-row justify-content-between align-items-center pb-2">
                              <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fas fa-eye" style="font-size:30px;color:#a45e5f "></i> Détail de produit {{$produit->libele}}
                                        </h3>
                                        <a type="button" class="btn-close close " href="{{route("produit.index")}}"></a>
                                  </div>
                                      <div class="row ">
                                        <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" > 
                                            <label for="libele" class="col-form-label labelStyle">Libelle :</label><br>
                                            <input 
                                              style="padding: 8px; font-size:20px;"
                                              name="libele"
                                              type="text" 
                                              class="form-control  " 
                                              id="lible"  
                                              placeholder=""
                                              value="{{$produit->libele}}">
                                             <br>
                                        </div>
                                        <div class="  form-group  col-sm-5" style="padding-left: 100px" > 
                                          <label for="code_barre" class="col-form-label labelStyle">Code :</label><br>
                                            <input name="code_barre" 
                                              type="text"
                                              class="form-control " 
                                              id="code_barre"
                                              style="padding: 8px; font-size:20px;"
                                              value="{{$produit->code_barre}}">
                                               <br>
                                      </div>
                                    </div>
                                    <br>
                                      <div class="row">
                                        <div class=" form-group  col- col-sm-5"  style="padding-left: 70px" > 
                                          <label for="methode_paiement"  class="col-form-label labelStyle">Methode de paiement :</label><br>
                                          <input 
                                              type="text" 
                                              name="methode_paiement"
                                              id="methode_paiement"
                                              class="form-control" 
                                              style="padding: 8px; ; font-size:20px;"
                                              value="{{$produit->methode_paiement}}">
                                            </div>
                                            <div class="  form-group  col-sm-5" style="padding-left: 100px" >
                                            <label for="categorie_id"  class="labelStyle col-form-label">Categorie :</label><br>
                                            <input 
                                                type="text" 
                                                name="categorie_id"
                                                id="categorie_id"
                                                class="form-control " 
                                                style="padding: 8px; ; font-size:20px"
                                                value="{{$produit->categorie->libele}}"><br>
                                            </div>
                                               <br>
                                      </div><br>
                                      <div class="row ">
                                        <div class=" col-md-7"   style="padding-left: 70px"> 
                                          <label for="description" class="col-form-label labelStyle" >Description : </label><br>
                                                  <textarea
                                                   name="description"
                                                    id="description"
                                                     class="form-control"
                                                      cols="25"
                                                       rows="5"
                                                       style="padding: 13px; font-size:20px;"
                                                       placeholder=""
                                                       >{{$produit->description}}</textarea>  
                                        </div> 
                                      </div>
                                 </div>
                              </div>
                         </div>
                  </div>
               </div>
          </div>
     </div>  
@endsection
  </x-app-layout>
  