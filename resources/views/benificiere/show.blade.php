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
        <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-transform:uppercase text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
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
              <div class="col-md-10">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center pb-2">
                                    <h3 class="text-secondary border-bottom mb-3 p-1"> 
                                      <i class="fas fa-eye" style="color:#a45e5f"></i> Détail de la Bénéficiaire {{$benificiere->nom}}
                                     </h3>
                                      <a type="button" class="close btn-close " href="{{route("benificiere.index")}}"></a>
                                </div>
                                  <form action="{{route("benificiere.show",$benificiere->id)}}" method="POST"> 
                                    @csrf
                                    @method('put')
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
                                                                value="{{$benificiere->nom}}"
                                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                            ><br>
                                             </div>
                                                    <div class="form-group mb-3 ">
                                                            <label
                                                                    for="genre" 
                                                                    style="font-size:19px;color:black"
                                                                    class="col-form-label"> Genre
                                                            </label>
                                                                <span class="required colorr" aria-hidden="true">*</span>
                                                                <input 
                                                                type="text" 
                                                                class="form-control col-md-2" 
                                                                id="genre" 
                                                                value="{{$benificiere->genre}}"
                                                                style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                name="genre">  
                                                          </div> 
                                              </div> 
                                           <div class="mb-2 row flex-container">
                                            <div class="form-group mb-3 ">
                                                    <label 
                                                            for="pays" 
                                                            style="font-size:19px;color:black" 
                                                            class="col-form-label">Pays:
                                                    </label><span class="required colorr" aria-hidden="true">*</span>
                                                    <br>
                                                    <input 
                                                    type="text" 
                                                    class="form-control col-md-2" 
                                                    id="pays" 
                                                    value="{{$benificiere->pays}}"
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    name="pays">
                                            </div>
                                                <div class="form-group mb-3 ">
                                                    <label 
                                                        for="ville" 
                                                        style="font-size:19px;color:black" 
                                                        class="col-form-label">Ville:
                                                    </label>
                                                    <span class="required colorr" aria-hidden="true">*</span>
                                                    <input 
                                                    type="text" 
                                                    class="form-control col-md-2" 
                                                    id="ville" 
                                                    value="{{$benificiere->ville}}"
                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                    name="ville">  
                                                </div>
                                            </div>
                                                <div class=" mb-2 row flex-container">
                                                    <div class="form-group mb-3 ">                                                    
                                                        <label 
                                                            for="curriel" 
                                                            style="font-size:19px;color:black" 
                                                            class="col-form-label">Curriel :
                                                       </label><span class="required colorr" aria-hidden="true">*</span>

                                                               <input 
                                                                    type="text" 
                                                                    class="form-control col-md-2" 
                                                                    id="curriel" 
                                                                    value="{{$benificiere->curriel}}"
                                                                    style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                    name="curriel">
                                                   </div>
                                                        <div class="form-group mb-3 ">                                                    
                                                            <label 
                                                                for="langue" 
                                                                style="font-size:19px;color:black" 
                                                                class="col-form-label">Langue
                                                            </label>
                                                            <input 
                                                            type="text" 
                                                            class="form-control col-md-2" 
                                                            id="langue" 
                                                            value="{{$benificiere->langue}}"
                                                            style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                            name="langue">
                                                        </div>
                                                </div>
                                                    <div class="row mb-2 flex-container">
                                                        <div class="form-group mb-3 ">                          
                                                            <label 
                                                                for="number_employe" 
                                                                style="font-size:19px;color:black"
                                                                class="col-form-label">Nombre des employées :
                                                            </label><span class="required colorr" aria-hidden="true">*</span>
                                                                    <input                                                                
                                                                       style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                       type="text"
                                                                        value="{{$benificiere->number_employe}}"
                                                                        class="form-control col-md-2" 
                                                                        id="number_employe" 
                                                                        name="number_employe">
                                                        </div>
                                                            <div class="form-group mb-3 ">
                                                                <label 
                                                                    for="date_naissance"
                                                                    class="col-form-label"
                                                                    style="font-size:19px;color:black"
                                                                    >Date naissance
                                                                </label>
                                                                       <input                                                                
                                                                            style="background-color:white ;color:black;font-size:19px;padding:8px " 
                                                                            type="date" min="2000-01-09" max="2022-01-01"
                                                                            value="{{$benificiere->date_naissance}}"
                                                                            class="form-control col-md-2" 
                                                                            id="date_naissance" 
                                                                            name="date_naissance">
                                                                    </div>
                                                                </div>
                                                   
                                                  </div>
                                            </div>
                                        </div>
                                    </div></form>
                                    <form action="{{route("benificiere.Charge_benificier",$benificiere->id)}}" method="GET"> 
                                    <div class="card shadow p-3 mb-5 bg-body rounded">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table  class="table" id="ex2">
                                                        <thead>
                                                            <tr class="cellule">
                                                                <th>
                                                                    <i class="checkbox2 fa fa-square-o" style="float: none;"></i>
                                                                </th>
                                                                <th>N°</th>
                                                                <th>Piece</th>
                                                                <th>FOURNISSEUR</th>
                                                                <th> PRODUIT </th>
                                                                <th>DATE</th>
                                                                <th>STATU</th>
                                                                <th>PRIX</th>
                                                                <th>QUANTITE</th>
                                                            </tr>
                                                        </thead> 
                                                       <tbody class="tab">
                                                                    @foreach($charges as $charge)
                                                                   <tr>
                                                                        <td><input type="checkbox" name="charges[{{$charge->id}}]" value="{{$charge->id}}" /></td>
                                                                    
                                                                    <td>
                                                                         {{$charge->id}}
                                                                    </td>
                                                                    <td>
                                                                        {{$charge->piece_id}}
                                                                    </td>
                                                                    <td>
                                                                        {{$charge->fournisseur->nom}}
                                                                    </td>
                                                                    <td>
                                                                        {{$charge->produit->libele}}
                                                                    </td>
                                                                    <td>
                                                                        {{$charge->date}}
                                                                     </td> 
                                                                     <td>
                                                                        {{$charge->statu}}
                                                                     </td>
                                                                    <td>
                                                                        {{$charge->prix}}   
                                                                    </td>
                                                                    <td>
                                                                        {{$charge->qte}}   
                                                                    </td>
                                                                   </tr>
                                                                @endforeach
                                                            </tbody>
                                                    </table>
                                                    <div class="me-5 form-group d-flex flex-row pull-right" >
                                                        <button type="submit" value="Associer" class="btn2" style="font-family: Roboto Slab;   font-size: 1.5rem;" > Associer</button>
                                                </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                                </div>
                          </div>
                      </div>
           @endsection
  </x-app-layout>