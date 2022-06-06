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
        <h2 class="font-semibold text-xl leading-tight fw-bold" style=" text-transform:uppercase; text-shadow: 4px 4px 5px #a3a3a3;color:#a45e5f;font-size:28px">
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
                                      <i class="fas fa-eye" style="color:#a45e5f"></i> Détail du bénéficiaire {{$benificiere->nom}}
                                     </h3>
                                      <a type="button" class="close btn-close " href="{{route("benificiere.index")}}"></a>
                                </div>
                                       <div class="row mb-2 flex-container">
                                                <div class="form-group mb-3 ">
                                                        <label
                                                            for="nom" 
                                                            class="labelStyle col-form-label">Nom :
                                                        </label>
                                                            <input 
                                                                type="text"
                                                                class="inputText form-control col-md-1 " 
                                                                name="nom"
                                                                id="nom" 
                                                                value="{{$benificiere->nom}}"
                                                            ><br>
                                             </div>
                                                    <div class="form-group mb-3 ">
                                                            <label
                                                                    for="genre" 
                                                                    class="labelStyle col-form-label"> Genre :
                                                            </label>
                                                                <input 
                                                                type="text" 
                                                                class="inputText form-control col-md-2" 
                                                                id="genre" 
                                                                value="{{$benificiere->genre}}"
                                                                name="genre">  
                                                          </div> 
                                              </div> 
                                           <div class="mb-2 row flex-container">
                                            <div class="form-group mb-3 ">
                                                    <label 
                                                            for="pays" 
                                                            class="labelStyle col-form-label">Pays :
                                                    </label>
                                                    <br>
                                                    <input 
                                                    type="text" 
                                                    class="inputText form-control col-md-2" 
                                                    id="pays" 
                                                    value="{{$benificiere->pays}}"
                                                    name="pays">
                                            </div>
                                                <div class="form-group mb-3 ">
                                                    <label 
                                                        for="ville" 
                                                        class="labelStyle col-form-label">Ville :
                                                    </label>
                                                        <input 
                                                        type="text" 
                                                        class="inputText form-control col-md-2" 
                                                        id="ville" 
                                                        value="{{$benificiere->ville}}"
                                                        name="ville">  
                                                </div>
                                            </div>
                                                <div class=" mb-2 row flex-container">
                                                    <div class="form-group mb-3 ">                                                    
                                                        <label 
                                                            for="curriel" 
                                                            class="labelStyle col-form-label">Curriel :
                                                       </label>
                                                               <input 
                                                                    type="text" 
                                                                    class=" inputText form-control col-md-2" 
                                                                    id="curriel" 
                                                                    value="{{$benificiere->curriel}}"
                                                                    name="curriel">
                                                   </div>
                                                        <div class="form-group mb-3 ">                                                    
                                                            <label 
                                                                for="langue" 
                                                                class="labelStyle col-form-label">Langue :
                                                            </label>
                                                            <input 
                                                            type="text" 
                                                            class=" inputText form-control col-md-2" 
                                                            id="langue" 
                                                            value="{{$benificiere->langue}}"
                                                            name="langue">
                                                        </div>
                                                </div>
                                                    <div class="row mb-2 flex-container">
                                                        <div class="form-group mb-3 ">                          
                                                            <label 
                                                                for="number_employe" 
                                                                class="labelStyle col-form-label">Nombre des employées :
                                                            </label>
                                                                    <input                                                                
                                                                       type="text"
                                                                        value="{{$benificiere->number_employe}}"
                                                                        class=" inputText form-control col-md-2" 
                                                                        id="number_employe" 
                                                                        name="number_employe">
                                                        </div>
                                                            <div class="form-group mb-3 ">
                                                                <label 
                                                                    for="date_naissance"
                                                                    class="labelStyle col-form-label"
                                                                    >Date naissance :
                                                                </label>
                                                                       <input                                                                
                                                                            type="date" min="2000-01-09" max="2022-01-01"
                                                                            value="{{$benificiere->date_naissance}}"
                                                                            class=" inputText form-control col-md-2" 
                                                                            id="date_naissance" 
                                                                            name="date_naissance">
                                                                    </div>
                                                                </div>
                                                   
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($benificiere->charges->toArray()))
                                    <form action="{{route("benificiere.Annuler_Charge",$benificiere->id)}}" method="POST" id="form_annuler" > 
                                      @csrf
                                        <div class="card shadow p-3 mb-5 bg-body rounded">
                                       <div class="card-body ">
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <h3 class=" {{-- mb-3 --}} titre" style="font-weight: normal"><i class="fa-solid fa-list list">
                                                </i> Les charges de bénéficiaire {{$benificiere->nom}} </h3>
                                                   <table  class="table" id="">
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
                                                               <th>Action</th>
                                                           </tr>
                                                       </thead> 
                                                      <tbody class="tab">
                                                                   @foreach($benificiere->charges as $charge)
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
                                                                   <td class="d-flex flex-row justify-content-center align-items-center  pull-left">
                                                                    <a href="{{route("charge.edit",$charge->id)}}" class="btn1 btn-sm mr-2">
                                                                        <i class="fas fa-edit" style=""></i></a>
                                                                          
                                                                            <a href="{{route("charge.show",$charge->id)}}" class="btn1 btn-warning btn-sm ">
                                                                                <i class="fas fa-eye" style=""></i></a>
                                                                  </td> 
                                                                  </tr>
                                                               @endforeach
                                                           </tbody>
                                                   </table>
                                                   <div class="me-3 form-group d-flex flex-row pull-right" >
                                                    <button type="submit" class="btn2" form="form_annuler" style="font-family: Roboto Slab;  font-size: 1.5rem;color:#c6e1e4;background-color:#002744" > Annuler</button>
                                               </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </form>
                               @endif
                                @if (!empty($charges->toArray()))
                                    
                                <form action="{{route("benificiere.Charge_benificier",$benificiere->id)}}" method="GET"> 
                                <div class="card shadow p-3 mb-5 bg-body rounded">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                                    <h3 class=" mb-3 titre"  style="font-weight: normal">
                                                       <i data-bs-toggle="collapse" data-bs-target="#ex2" class="fa-solid fa-list list"></i> Autre charges
                                                    </h3>
                                                </div>
                                                <table  class="table collapse" id="ex2">
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
                                                </table><br>
                                                <div class="me-2 form-group d-flex flex-row pull-right" >
                                                    <button type="submit" value="Associer" class="btn2" style="font-family: Roboto Slab;  font-size: 1.5rem;color:#c6e1e4;background-color:#002744" > Associer</button>
                                               </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </form>
                            @else
                            <div class="card justify-content-center  shadow-lg align-items-center" style="width: 100%;; height:10% ; padding :12px">
                                    <h3 class="me-3 align-items-center justify-content-between " style="font-family: Roboto Slab;font-size:2.1rem;color:#b37f4c">
                                        <i class="fa fa-frown-o" aria-hidden="true" style="text-shadow: 3px 1px 4px #c0cece; font-size:32px;color:#2D7B8C"></i>
                                        aucune autre charge trouvé pour le moment
                                </h3>
                            </div>
                            @endif <br>
                                </div>
                          </div>
                      </div>
           @endsection
  </x-app-layout>