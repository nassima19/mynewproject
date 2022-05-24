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
        <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
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
      <div class="container p-3">
          <div class="row justify-content-center ">
              <div class="col-md-12 ">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-14">
                                  <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fa fa-plus" style="font-size:30px;color:#a45e5f"></i> Ajouter nouveau fournisseur
                                        </h3>
                                  </div>
                                  <form action="{{route("fournisseur.store")}}" method="post"> 
                                    @csrf
                                       <div class="row mb-2 flex-container">
                                                <div class="form-group mb-3 ">
                                                        <label
                                                            for="nom" 
                                                            style="font-size:19px;color:black"
                                                            class="col-form-label">Nom 
                                                        </label>
                                                            <span class="required colorr" aria-hidden="true">*</span>
                                                            <input 
                                                                type="text"
                                                                class="form-control col-md-1 " 
                                                                name="nom"
                                                                id="nom" 
                                                                value="{{old('nom')}}"
                                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 

                                                                placeholder="Nom">
                                                            <br>
                                             </div>
                                                    <div class="form-group mb-3 ">
                                                            <label
                                                                    for="genre" 
                                                                    style="font-size:19px;color:black"
                                                                    class="col-form-label"> Genre
                                                            </label>
                                                                <span class="required colorr" aria-hidden="true">*</span>
                                                                    <select name="genre"
                                                                            id="genre" 
                                                                            class="form-control" 
                                                                            style="background-color:#a45e5f ;color:white;padding: 8px; font-size:19px;">
                                                                            <option value="---"  selected="select" >---</option>
                                                                                    <option value="Masculain" selected="select">Masculain</option>
                                                                                    <option value="Féminain" selected="select">Féminain</option>
                                                                    </select>
                                                          </div> 
                                              </div> 
                                           <div class=" mb-2 row flex-container">
                                            <div class="form-group mb-3 "> 
                                                    <label 
                                                            for="titre"  
                                                            style="font-size:19px;color:black"
                                                            class="col-form-label">Titre :
                                                   </label>
                                                          <span class="required colorr" aria-hidden="true">*</span>
                                                                <input 
                                                                    type="text" 
                                                                    class="form-control col-md-2"
                                                                    placeholder="Titre"
                                                                    id="titre"
                                                                    value="{{old('titre')}}"
                                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                    name="titre"> <br>
                                            </div>
                                            <div class="form-group mb-3 ">
                                                    <label
                                                            for="domaine_activite" 
                                                            style="font-size:19px;color:black" 
                                                            class="col-form-label">Domaine activité 
                                                    </label>
                                                            <span class="required colorr" aria-hidden="true">*</span>
                                                            <select 
                                                                    name="domaine_activite" 
                                                                    id="domaine_activite" 
                                                                    class="form-control col-md-2"  
                                                                    style="background-color:#a45e5f ;color:white;padding: 8px; font-size:19px;">
                                                                    <option value="choisir une pays" selected="select">choisir une domaine</option>
                                                                    @foreach($services as $service)
                                                                      <option value="{{$service->id}}">{{$service->nom}}</option>
                                                                      @endforeach
                                                     </select>
                                            </div>
                                           </div>
                                           <div class=" mb-2 row flex-container">
                                            <div class="form-group mb-3 ">
                                                    <label 
                                                    style="font-size:19px;color:black"
                                                            for="adresse" 
                                                            class="col-form-label">Adresse 
                                                    </label>
                                                           <span class="required colorr" aria-hidden="true">*</span>
                                                                <input  
                                                                    class="form-control col-md-2" 
                                                                    placeholder="Adresse" 
                                                                    id="adresse" 
                                                                    value="{{old('adresse')}}"
                                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                    name="adresse">
                                           </div>
                                           <div class="col-xs-15 col-sm-2">
                                                 <label 
                                                        for="code_postal"
                                                        style="font-size:19px;color:black"  
                                                        class="col-form-label">Code postale
                                                 </label>
                                                       <span class="required colorr" aria-hidden="true">*</span>
                                                            <input 
                                                            type="text" 
                                                            style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                            class="form-control col-md-2" 
                                                            placeholder="Code postal" 
                                                            id="code_postal" 
                                                            value="{{old('code_postal')}}"
                                                            name="code_postal">
                                           </div>
                                           </div>
                                           <div class="mb-2 row flex-container">
                                            <div class="form-group mb-3 ">
                                                    <label 
                                                            for="pays" 
                                                            style="font-size:19px;color:black" 
                                                            class="col-form-label">Pays:
                                                    </label><br>
                                                              <select 
                                                                    name="pays" 
                                                                    id="pays" 
                                                                    class="form-control col-md-2"  
                                                                    style="background-color:#a45e5f ;color:white;padding: 8px; font-size:19px;">
                                                                    <option value="choisir une pays" selected="select">choisir une pays</option>
                                                                    <option value="marocco" selected="select">morocco</option>
                                                                    <option value="autre" selected="select">autre</option>
                                                             </select>
                                            </div>
                                                <div class="form-group mb-3 ">
                                                    <label 
                                                        for="ville" 
                                                        style="font-size:19px;color:black" 
                                                        class="col-form-label">Ville:
                                                    </label>
                                                    <select
                                                            name="ville" 
                                                            id="ville" 
                                                            class="form-control col-md-2"
                                                            style="background-color:#a45e5f ;color:white;padding: 8px; font-size:19px;">
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
                                                            style="font-size:19px;color:black" 
                                                            class="col-form-label">Curriel :
                                                       </label>
                                                               <input 
                                                                    type="text" 
                                                                    class="form-control col-md-2" 
                                                                    placeholder="Curriel" 
                                                                    id="curriel" 
                                                                    value="{{old('curriel')}}"
                                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                    name="curriel">
                                                   </div>
                                                        <div class="form-group mb-3 ">                                                    
                                                            <label 
                                                                for="telephone" 
                                                                style="font-size:19px;color:black" 
                                                                class="col-form-label">Telephone
                                                            </label>
                                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                                        <input 
                                                                        type="text" 
                                                                        class="form-control col-md-2" 
                                                                        placeholder="telephone" 
                                                                        id="telephone" 
                                                                        value="{{old('telephone')}}"
                                                                        style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                        name="telephone">
                                                        </div>
                                                </div>
                                                    <div class="row mb-2 flex-container">
                                                        <div class="form-group mb-3 ">                          
                                                            <label 
                                                                for="site_internet" 
                                                                style="font-size:19px;color:black"
                                                                class="col-form-label"> Site internet :
                                                            </label>
                                                                    <input                                                                
                                                                     style="background-color:white ;color:black;font-size:19px;padding:8px " 
{{--                                                                     id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteField" 
 --}}                                                                    type="text"
                                                                         value="{{old('site_internet')}}"
                                                                        class="form-control col-md-2" 
                                                                        placeholder="Site internet" 
                                                                        id="site_internet" 
                                                                        name="site_internet"><a id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteLink" href="http://" target="_blank"><i class="fa fa-external-link"></i></a>
                                                        </div>
                                                              <div class="form-group mb-3 ">                                                 
                                                                   <label 
                                                                        for="categorie_id"  
                                                                        style="font-size:19px;color:black"
                                                                        class="col-form-label">Categorie 
                                                                   </label>
                                                                        <span class="required colorr" aria-hidden="true">*</span>
                                                                        <select  
                                                                                name="categorie_id"   
                                                                                class="form-control" 
                                                                                style="background-color:#a45e5f ;color:white;padding: 8px; font-size:19px;">
                                                                                <option value="" selected="select" >choisir une categorie</option>
                                                                                    @foreach($categorie as $category)
                                                                                    <option value="{{$category->id}}">{{$category->libele}}</option>
                                                                                    @endforeach
                                                                        </select>  
                                               </div> 
                                                    </div>
                                                         <div class="row flex-container">
                                                             <div class="form-group mb-3 ">  
                                                                <label 
                                                                    for="note"  
                                                                    style="font-size:19px;color:black"
                                                                    class="col-form-label">notes : 
                                                                </label>
                                                                <textarea name="note" id="note" class="form-control col-md-2" cols="45" rows="8"  placeholder="note" > {{old('description')}}</textarea>
                                                        </div>
                                                    </div>
                                                        <div class="form-group pull-right" >
                                                            <button type="submit "  class="btn2  " ><i class="fa fa-save"></i> Enregistrer</button>
                                                            <button class="btn2 "><a type="button" style="text-decoration: none;  color:white"  href="{{route("fournisseur.index")}}" ><i class="fa fa-times"></i>Annuler</a></button>
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