<x-app-layout>
    @section('title')
         <title>Categorie  </title>
    @endsection
    @section('style')
          <link rel="stylesheet" href="/css/bootstrap.min.css">
           <link rel="stylesheet" href="/css/style.css">
           <style>
              .colorr{
                  color: red;
                }
                .flex-container {
                    display: flex; justify-content:space-around;
                   
                   }
                   .flex-container > div {
                        margin:0px; width:33%;padding:.100rem;
                   }
                
           </style>
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
            {{ __('FOURNISSEUR') }}
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
              <div class="col-md-12 ">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-14">
                                  <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fas fa-edit" style="color:#a45e5f"></i> Modifier le fournisseur {{$fournisseur->nom}}
                                        </h3>
                                        <a type="button" class="close btn-close " href="{{route("fournisseur.index")}}"></a>

                                  </div>
                                  <form action="{{route("fournisseur.update",$fournisseur->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                       <div class="row mb-2 flex-container">
                                        <div class="col-xs-12 col-sm-4 ">
                                                <label for="nom"  
                                                    class="col-form-label labelStyle">Nom
                                                 </label>
                                                        <span class="required colorr" aria-hidden="true">*</span>
                                                            <input 
                                                                type="text" 
                                                                class="form-control col-md-1 inputText " 
                                                                name="nom" 
                                                                id="nom" 
                                                                value="{{$fournisseur->nom}}">
                                                        <br></div>
                                                                <div class="col-xs-12 col-sm-3">
                                                                        <label 
                                                                            for="genre"  
                                                                            class="col-form-label labelStyle">Genre 
                                                                        </label>
                                                                        <span class="required colorr" aria-hidden="true">*</span>
                                                                        <select 
                                                                                name="genre" 
                                                                                id="genre" 
                                                                                style=" background-color:#a45e5f ;
                                                                            color:white;
                                                                            padding: 8px;
                                                                             font-size:19px;"
                                                                                class="form-control " >
                                                                                <option value=""  selected="select" >---</option>
                                                                                <option value="Masculain" selected="select">Masculain</option>
                                                                                <option value="Féminain" selected="select">Féminain</option>
                                                                        </select>
                                                                  </div> 
                                                              </div> 
                                                        <div class=" mb-2 row flex-container">
                                                    <div class="col-xs-12 col-sm-4"> 
                                                        <label 
                                                            for="titre"   
                                                            class="col-form-label labelStyle">Titre :
                                                        </label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                <input 
                                                type="text" 
                                                class="form-control col-md-2 inputText"  
                                                value="{{$fournisseur->titre}}" 
                                                id="titre" 
                                                name="titre"><br>
                                            </div>
                                        <div class="col-xs-12 col-sm-4">
                                                <label 
                                                    for="domaine_activite"  
                                                    class="col-form-label labelStyle">Domaine activité 
                                                </label>
                                            <span class="required colorr" aria-hidden="true">*</span>
                                        <select 
                                                name="domaine_activite"  
                                                style=" background-color:#a45e5f ;
                                                    color:white;
                                                    padding: 8px;
                                                        font-size:19px;"
                                                class="form-control"> 
                                                <option value=""  >choisir une domaine</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id}}" {{old('domaine_activite') == $service->id  || $fournisseur->domaine_activite == $service->id  ? "selected" : ""}}>{{ $service->nom }}</option>
                                                @endforeach
                                        </select><br>
                                    </div>
                                </div>
 <div class=" mb-2 row flex-container">
     <div class="col-xs-12 col-sm-4"> 
        <label 
            for="adresse"    
            class="col-form-label labelStyle">Adresse 
        </label>
                <span class="required colorr" aria-hidden="true">*</span>
                <input  
                    class="form-control col-md-2 inputText"   
                    value="{{$fournisseur->adresse}}" 
                    id="adresse" 
                    name="adresse">
     </div>
      <div class="col-xs-15 col-sm-2">
            <label 
                    for="code_postal"   
                    class="col-form-label labelStyle">Code postale
            </label>
                   <span class="required colorr" aria-hidden="true">*</span>
            <input 
                type="text" 
                class="form-control col-md-2 inputText" 
                value="{{$fournisseur->code_postal}}"  
                id="code_postal" 
                name="code_postal">
        </div>
</div>
        <div class="mb-2 row flex-container">
            <div class="col-xs-12 col-sm-4">
                <label 
                    for="pays"  
                    class="col-form-label labelStyle">Pays:
                </label><br>
                        <select name="pays" 
                        style=" background-color:#a45e5f ;
                            color:white;
                            padding: 8px;
                                font-size:19px;"
                        id="pays" class="form-control col-md-2 ">
                            <option value="choisir une pays" selected="select">choisir une pays</option>
                            <option value="morocco" selected="select">Morocco</option>
                            <option value="autre" selected="select">Autre</option>   
                        </select>
            </div>
                 <div class="col-xs-12 col-sm-4">
                        <label 
                            for="ville"   
                            class="col-form-label">Ville:
                        </label>
                             <select name="ville" id="ville" 
                             style=" background-color:#a45e5f ;
                                    color:white;
                                    padding: 8px;
                                        font-size:19px;"
                                    class="form-control col-md-2 " >                                                    
                                    <option value="0" >choisir une ville</option>
                                    <option value="AL HAJEB">AL HAJEB</option>
                                    <option value="AGADIR">AGADIR</option>
                                    <option value="AL HOCEIMA">AL HOCEIMA</option>
                                    <option value="ASSA ZAG">ASSA ZAG</option>
                                    <option value="AZILAL">AZILAL</option>
                                    <option value="BENI MELLAL">BENI MELLAL</option>
                                    <option value="BENSLIMANE">BENSLIMANE</option>
                                    <option value="BOUJDOUR">BOUJDOUR</option>
                                    <option value="BOULEMANE">BOULEMANE</option>
                                    <option value="BERRECHID">BERRECHID</option>
                                    <option value="CASABLANCA">CASABLANCA</option>
                                    <option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
                                    <option value="CHTOUKA AIT BAHA">CHTOUKA AIT BAHA</option>
                                    <option value="CHICHAOUA">CHICHAOUA</option>
                                    <option value="EL JADIDA">EL JADIDA</option>
                                    <option value="EL KELAA DES SRAGHNAS">EL KELAA DES SRAGHNAS</option>
                                    <option value="ERRACHIDIA">ERRACHIDIA</option>
                                    <option value="ESSAOUIRA">ESSAOUIRA</option>
                                    <option value="EL SEMARA"> EL SEMARA</option>
                                    <option value="FES"> FES</option>
                                    <option value="FIGUIG">FIGUIG</option>
                                    <option value="GUELMIM">GUELMIM</option>
                                    <option value="IFRANE">IFRANE</option>
                                    <option value="KENITRA">KENITRA</option>
                                    <option value="KHEMISSET">KHEMISSET</option>
                                    <option value="KHENIFRA">KHENIFRA</option>
                                    <option value="KHOURIBGA">KHOURIBGA</option>
                                    <option value="LAAYOUNE">LAAYOUNE</option>
                                    <option value="LARACHE">LARACHE</option>
                                    <option value="MOHAMMEDIA">MOHAMMEDIA</option>
                                    <option value="MARRAKECH">MARRAKECH</option>
                                    <option value="MEKNES">MEKNES</option>
                                    <option value="NADOR">NADOR</option>
                                    <option value="OUARZAZATE">OUARZAZATE</option>
                                    <option value="OUJDA">OUJDA</option>
                                    <option value="OUED EDDAHAB">OUED EDDAHAB</option>
                                    <option value="RABAT">RABAT</option>
                                    <option value="SALE">SALE</option>
                                    <option value="SKHIRAT TEMARA">SKHIRAT TEMARA</option>
                                    <option value="SEFROU">SEFROU</option> 
                                    <option value="SAFI">SAFI</option>
                                    <option value="SETTAT">SETTAT</option>
                                    <option value="42">SIDI KACEM</option>
                                    <option value="TANGER">TANGER</option>
                                    <option value="TAN TAN">  TAN TAN</option>
                                    <option value="TAOUNAT">TAOUNAT</option>
                                    <option value="TATA">TATA</option>
                                    <option value="TAZA">TAZA</option>
                                    <option value="TETOUAN">TETOUAN</option> 
                                    <option value="TIZNIT">TIZNIT</option>
                                </select>
                        </div>
                    </div>
                        <div class=" mb-2 row flex-container">
                            <div class="form-group mb-3 ">                                                    
                                <label 
                                    for="curriel"  
                                    class="col-form-label labelStyle">Curriel :
                                </label>
                                    <input
                                    type="text" 
                                    class="form-control col-md-2 inputText" 
                                    value="{{$fournisseur->curriel}}" 
                                    id="curriel" 
                                    name="curriel">
                           </div>
                                <div class="form-group mb-3 ">       
                                    <label 
                                        for="telephone"   
                                        class="col-form-label labelStyle">Télephone :
                                    </label>
                                        <span class="required colorr" aria-hidden="true">*</span>
                                    <input 
                                        type="text" 
                                        class="form-control col-md-2 inputText"  
                                        value="{{$fournisseur->telephone}}" 
                                        id="telephone" 
                                        name="telephone">
                                </div>
                        </div>
                            <div class="row mb-2 flex-container">
                                <div class="form-group mb-3 ">
                                    <label 
                                        for="site_internet"  
                                        class="col-form-label labelStyle"> Site internet :
                                    </label>
                                    <input 
                                        id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteField" 
                                        type="text" 
                                        class="form-control col-md-2 inputText" 
                                        value="{{$fournisseur->site_internet}}" 
                                        id="site_internet" name="site_internet"><a id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteLink" href="http://" target="_blank"><i class="fa fa-external-link"></i></a>
                                 </div>
                                        <div class="form-group mb-3 ">
                                            <label 
                                                  for="categorie_id"  
                                                  class="col-form-label labelStyle">Categorie : 
                                            </label>
                                            <span class="required colorr" aria-hidden="true">*</span>
                                            <select name="categorie_id"  
                                            style=" background-color:#a45e5f ;
                                                                            color:white;
                                                                            padding: 8px;
                                                                             font-size:19px;"
                                                    class=" form-control" >
                                                    <option value=""  >choisir une categorie</option>
                                                    @foreach($categorie as $category)
                                                            <option value="{{ $category->id}}" {{old('categorie_id') == $category->id || $fournisseur->categorie->id== $category->id ? "selected" : ""}}>{{ $category->libele }}</option>
                                                    @endforeach
                                            </select> 
                                        </div> 
                                </div>
                                    <div class="row flex-container col-sm-6" style="margin:auto">
                                        <label 
                                            for="note"                                                                    
                                            class="col-form-label labelStyle">notes : 
                                       </label>
                                        <textarea name="note" id="note" 
                                        style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                        class="form-control col-md-4" cols="40" rows="10"   placeholder="" >{{$fournisseur->note}}</textarea>
                                  </div>
                                        <div class=" pull-right" >
                                          <button type="submit " class="btn2 " > Modifier</button>
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