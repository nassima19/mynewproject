<x-app-layout>
    @section('title')
         <title>   Bénéficiaire  </title>
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
        <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-transform:uppercase; text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
            {{ __('Bénéficiaire') }}
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
                                        <i class="fas fa-edit" style="font-size:30px;color:#a45e5f"></i> Modifier le Bénéficiaire {{$benificiere->nom}}
                                        </h3>
                                        <a type="button" class="close btn-close " href="{{route("benificiere.index")}}"></a>
                                  </div>
                                  <form action="{{route("benificiere.update",$benificiere->id)}}" method="post"> 
                                    @csrf
                                     @method('put')
                                       <div class="row mb-2 flex-container">
                                                <div class="form-group mb-3 ">
                                                        <label
                                                            for="nom" 
                                                            class="labelStyle col-form-label">Nom 
                                                        </label>
                                                            <span class="required colorr" aria-hidden="true">*</span>
                                                            <input 
                                                                type="text"
                                                                class="inputText form-control col-md-1 " 
                                                                name="nom"
                                                                id="nom" 
                                                                value="{{$benificiere->nom}}"
                                                                placeholder="Nom">
                                                            <br>
                                             </div>
                                                    <div class="form-group mb-3 ">
                                                            <label
                                                                    for="genre" 
                                                                    class="labelStyle col-form-label">Genre
                                                            </label>
                                                                <span class="required colorr" aria-hidden="true">*</span>
                                                                    <select name="genre"
                                                                            id="genre" 
                                                                            style=" background-color:#a45e5f ;
                                                                            color:white;
                                                                            padding: 8px;
                                                                             font-size:19px;"
                                                                            class="form-control ">
                                                                            <option value="---"  selected="select" >---</option>
                                                                                    <option value="Masculain" >Masculain</option>
                                                                                    <option value="Féminain" >Féminain</option>
                                                                    </select>
                                                          </div> 
                                              </div> 
                                           <div class="mb-2 row flex-container">
                                            <div class="form-group mb-3 ">
                                                    <label 
                                                            for="pays" 
                                                            class="labelStyle col-form-label">Pays
                                                    </label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <br>
                                                              <select 
                                                                    name="pays" 
                                                                    id="pays" 
                                                                    style=" background-color:#a45e5f ;
                                                                            color:white;
                                                                            padding: 8px;
                                                                             font-size:19px;"
                                                                    class="form-control col-md-2 ">
                                                                    <option value="choisir une pays" selected="select">choisir une pays</option>
                                                                    <option value="marocco" selected="select">morocco</option>
                                                                    <option value="autre" >autre</option>
                                                             </select>
                                            </div>
                                                <div class="form-group mb-3 ">
                                                    <label 
                                                        for="ville" 
                                                        class="labelStyle col-form-label">Ville
                                                    </label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <select
                                                            name="ville" 
                                                            id="ville" 
                                                            style=" background-color:#a45e5f ;
                                                                            color:white;
                                                                            padding: 8px;
                                                                             font-size:19px;"
                                                            class="form-control col-md-2 ">
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
                                                            class="labelStyle col-form-label">Curriel
                                                       </label>
                                                       <span class="required colorr" aria-hidden="true">*</span>

                                                               <input 
                                                                    type="text" 
                                                                    class="inputText form-control col-md-2" 
                                                                    id="curriel" 
                                                                    value="{{$benificiere->curriel}}"
                                                                    name="curriel">
                                                   </div>
                                                        <div class="form-group mb-3 ">                                                    
                                                            <label 
                                                                for="langue" 
                                                                class="labelStyle col-form-label">Langue
                                                            </label>
                                                                    <select 
                                                                        name="langue" 
                                                                        id="langue"
                                                                        class="form-control"
                                                                        style="width: 100%; background-color:#a45e5f ;color:white;padding: 8px; font-size:19px;">
                                                                        <option selected="selected" value="fr">Français</option>
                                                                        <option value="en">English</option>
                                                                    
                                                                    </select>
                                                        </div>
                                                </div>
                                                    <div class="row mb-2 flex-container">
                                                        <div class="form-group mb-3 ">                          
                                                            <label 
                                                                for="number_employe" 
                                                                class="labelStyle col-form-label">Nombre des employées
                                                            </label>
                                                            <span class="required colorr" aria-hidden="true">*</span>
                                                                    <input 
                                                                    class="inputText form-control col-md-2"                                                             
                                                                      type="text"
                                                                      value="{{$benificiere->number_employe}}"                                                                        class="form-control col-md-2" 
                                                                        id="number_employe" 
                                                                        name="number_employe">
                                                        </div>
                                                        <div class="form-group mb-3 ">
                                                            <label for="date_naissance"
                                                            class="col-form-label labelStyle"
                                                            >Date naissance</label>
                                                            <input                                                                
                                                                     type="date" min="2000-01-09" max="2022-01-01"
                                                                     value="{{$benificiere->date_naissance}}"
                                                                     class=" inputText form-control col-md-2" 
                                                                        id="date_naissance" 
                                                                        name="date_naissance">
                                                       
                                                    </div>
                                                    </div>
                                                        <div class="form-group pull-right" >
                                                            <button type="submit " class="btn2 bold"> Modifier</button>
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