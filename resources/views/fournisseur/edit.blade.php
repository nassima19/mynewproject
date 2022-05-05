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
@section('content')
      <div class="container p-2 ">
          <div class="row justify-content-center ">
              <div class="col-md-10 ">
                  <div class="card">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                      <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                        <i class="fa fa-plus" style="font-size:30px;color:rgb(224, 204, 24) "></i> Ajouter fournisseur
                                        </h3>
                                  </div>
                                  <form action="{{route("fournisseur.update",$fournisseur->id)}}" method="post"> 
                                    @csrf
                                    @method('put')
                                       <div class="row mb-2 flex-container">
                                        <div class="col-xs-12 col-sm-4 ">
                                                <label for="name" class="col-form-label">Nom </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <input type="text" class="form-control col-md-1 " name="name" id="name" placeholder="{{$fournisseur->nom}}"><br>
                                        </div>
                                        <div class="col-xs-12 col-sm-3">
                                                <label for="genre"  class="col-form-label">Genre </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <select name="genre" id="genre" class="form-control" style="color:#6f4826 ;background-color:#c5b998"  placeholder="{{$fournisseur->genre}}">
                                                     <option value=""  selected="select" >---</option>
                                                    <option value="1" selected="select">Masculain</option>
                                                    <option value="2" selected="select">Féminain</option>
                                                </select>
                                           </div> 
                                        </div> 
                                           <div class=" mb-2 row flex-container">
                                            <div class="col-xs-12 col-sm-4"> 
                                                    <label for="titre"  class="col-form-label">Titre :</label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <input type="text" class="form-control col-md-2"  placeholder="{{$fournisseur->titre}}" id="titre" name="titre"><br>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <label for="domaine_activite"  class="col-form-label">Domaine activité </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <input type="text" class="form-control col-md-4"  placeholder="{{$fournisseur->domaine_activite}}" id=" domaine_activite" name="domaine_activite"><br>
                                            </div>
                                           </div>
                                           <div class=" mb-2 row flex-container">
                                            <div class="col-xs-12 col-sm-4"> 
                                                <label for="adresse"  class="col-form-label">Adresse </label>
                                                <span class="required colorr" aria-hidden="true">*</span>
                                                <input  class="form-control col-md-2"   placeholder="{{$fournisseur->adresse}}" id="adresse" name="adresse">
                                           </div>
                                           <div class="col-xs-15 col-sm-2">
                                            <label for="code_postal"  class="col-form-label">Code postale</label>
                                            <span class="required colorr" aria-hidden="true">*</span>
                                            <input type="text" class="form-control col-md-2" placeholder="{{$fournisseur->code_postal}}" id="code_postal" name="code_postal">
                                           </div>
                                           </div>
                                           <div class="mb-2 row flex-container">
                                                <div class="col-xs-12 col-sm-4">
                                                    <label for="pays"  class="col-form-label">Pays:</label><br>
                                                    <select name="pays" id="pays" class="form-control col-md-2"  style="color:#6f4826 ;background-color:#c5b998"  placeholder="{{$fournisseur->code_postale}}">
                                                        <option value="choisir une pays" selected="select">choisir une pays</option>
                                                        <option value="marocco" selected="select">morocco</option>
                                                        <option value="autre" selected="select">autre</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <label for="ville"  class="col-form-label">Ville:</label>
                                                    <select name="ville" id="ville" class="form-control col-md-2" style="color:#6f4826 ;background-color:#c5b998"  placeholder="{{$fournisseur->ville}}">
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
                                                    <div class="col-xs-12 col-sm-4">
                                                    <label for="curriel"  class="col-form-label">Curriel :</label>
                                                    <input type="text" class="form-control col-md-2" placeholder="{{$fournisseur->curriel}}" id="curriel" name="curriel">
                                              </div>
                                              <div class="col-xs-12 col-sm-4">
                                                    <label for="telephone" class="col-form-label">Télephone :</label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <input type="text" class="form-control col-md-2" placeholder="{{$fournisseur->telephone}}" id="telephone" name="telephone">
                                                </div>
                                             </div>
                                             <div class="row mb-2 flex-container">
                                                <div class="col-xs-12 col-sm-4">
                                                      <label for="site_internet" class="col-form-label"> Site internet :</label>
                                                      <input id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteField" type="text" class="form-control col-md-2"  placeholder="{{$fournisseur->site_internet}}" id="site_internet" name="site_internet"><a id="ContentPlaceHolder_TabsControl_ctl02_BusinessEditFormOld_WebSiteLink" href="http://" target="_blank"><i class="fa fa-external-link"></i></a>
                                                </div>
                                               <div class="col-xs-12 col-sm-3">
                                                    <label for="categorie"  class="col-form-label">Categorie </label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <select name="categorie_id" id="genre" class="form-control" style="color:#6f4826 ;background-color:#c5b998"  >
                                                        <option value="{{ $category->libele}}" {{({{$post->type}} === {{ $category->libele}}) ? 'Selected' : ''}}>{{ $category->libele}}</option>
                                                        <option value="" disabled >choisir une categorie</option>
                                                        @foreach($categorie as $category)
                                                        <option value="{{$category->id}}">{{$category->libele}}</option>
                                                        @endforeach
                                                    </select> 
                                               </div> 
                                            </div>
                                            <div class="row flex-container">
                                                <div class="col-xs-8 col-sm-4">
                                                    <label for="note"  class="col-form-label">notes : </label>
                                                    <textarea name="note" id="note" class="form-control col-md-2" cols="45" rows="8"   placeholder="{{$fournisseur->note}}" ></textarea>
                                                </div>
                                            </div>
                                        <div class=" pull-right" >
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