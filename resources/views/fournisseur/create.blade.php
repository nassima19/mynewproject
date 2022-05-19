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
                                                                <input 
                                                                        type="text" 
                                                                        style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                        class="form-control col-md-4" 
                                                                        placeholder="Demaine d'activité" 
                                                                        id=" domaine_activite" 
                                                                        name="domaine_activite"><br>
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
                                                            <option value="1">AL HAJEB</option>
                                                            <option value="2">AGADIR</option>
                                                            <option value="3">AL HOCEIMA</option>
                                                            <option value="4">ASSA ZAG</option>
                                                            <option value="5">AZILAL</option>
                                                            <option value="6">BENI MELLAL</option>
                                                            <option value="7">BENSLIMANE</option>
                                                            <option value="8">BOUJDOUR</option>
                                                            <option value="9">BOULEMANE</option>
                                                            <option value="10">BERRECHID</option>
                                                            <option value="11">CASABLANCA</option>
                                                            <option value="12">CHEFCHAOUEN</option>
                                                            <option value="13">CHTOUKA AIT BAHA</option>
                                                            <option value="14">CHICHAOUA</option>
                                                            <option value="15">EL JADIDA</option>
                                                            <option value="16">EL KELAA DES SRAGHNAS</option>
                                                            <option value="17">ERRACHIDIA</option>
                                                            <option value="18">ESSAOUIRA</option>
                                                            <option value="19"> ES SEMARA</option>
                                                            <option value="20"> FES</option>
                                                            <option value="21">FIGUIG</option>
                                                            <option value="22">GUELMIM</option>
                                                            <option value="23">IFRANE</option>
                                                            <option value="24">KENITRA</option>
                                                            <option value="24">KHEMISSET</option>
                                                            <option value="25">KHENIFRA</option>
                                                            <option value="26">KHOURIBGA</option>
                                                            <option value="27">LAAYOUNE</option>
                                                            <option value="28">LARACHE</option>
                                                            <option value="29">MOHAMMEDIA</option>
                                                            <option value="30">MARRAKECH</option>
                                                            <option value="31">MEKNES</option>
                                                            <option value="32">NADOR</option>
                                                            <option value="33">OUARZAZATE</option>
                                                            <option value="34">OUJDA</option>
                                                            <option value="35">OUED EDDAHAB</option>
                                                            <option value="36">RABAT</option>
                                                            <option value="37">SALE</option>
                                                            <option value="38">SKHIRAT TEMARA</option>
                                                            <option value="39">SEFROU</option> 
                                                            <option value="40">SAFI</option>
                                                            <option value="41">SETTAT</option>
                                                            <option value="42">SIDI KACEM</option>
                                                            <option value="43">TANGER</option>
                                                            <option value="44">  TAN TAN</option>
                                                            <option value="45">TAOUNAT</option>
                                                            <option value="46">TATA</option>
                                                            <option value="47">TAZA</option>
                                                            <option value="48">TETOUAN</option> 
                                                            <option value="49">TIZNIT</option>
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
                                                                <textarea name="note" id="note" class="form-control col-md-2" cols="45" rows="8"  placeholder="note" ></textarea>
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