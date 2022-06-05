<x-app-layout>
    @section('title')
<title>
    Piece
</title>
@endsection 
@section('style')
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">
      <style>
            .bg-white{
        color: #1e768a;
        background-color: #b37f4c;
        font-size: 1.25rem;
    }
    .text-gray-700 {
        color:#b17438;
    }
      </style>
@endsection
@section('content')
@if(session()->has('success'))
<div class="alert alert-success " style="text-transform: uppercase;color:rgb(163, 101, 8);font-weight: bold; text-align:center;font-size:1.7rem;  font-family: 'Roboto Slab';">
   <i class="fas fa-check-circle" style="font-size:1.7rem"></i>  {{ session()->get('success') }}
</div>
@endif
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-14">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                        <x-slot name="header">
                                           <h2 class="d-flex flex-row justify-content-end   font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#728a8d;font-size:28px">
                                                <a href="{{route("piece.create")}}">
                                                    <button type="button" class="ajouter"> Ajouter <i class="fa fa-plus-circle" ></i></button>
                                                </a>
                                          </h2>
                                        </x-slot>
                                      <h3 class="titre">
                                            <button data-bs-toggle="collapse" data-bs-target="#ex1"><i class="fa-solid fa-list list"></i> Liste des pièces</button>
                                         </h3> 
                                    </div>
                                        <table  class=" collapse table " id="ex1">
                                            <thead>
                                                <tr class="cellule">
                                                    <th>N°</th>
                                                    <th>Type</th>
                                                    <th>Date_paiement</th>
                                                    <th>Compte_bancaire</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>                                            
                                            <tbody class="tab">
                                                    @foreach($piece as $document)
                                                   <tr>
                                                       <td>
                                                           {{$document->numero}}
                                                       </td>
                                                        <td>
                                                            {{$document->type_piece}}
                                                            </td>
                                                        <td>
                                                            {{$document->paiement_date}}
                                                        </td>
                                                        <td>
                                                            {{$document->bank_account}}
                                                        </td>
                                                    <td class="d-flex flex-row justify-content-center align-items-center ">
                                                            <a href="{{route("piece.edit",$document->id)}}" class="btn1 btn-sm mr-2">
                                                                <i class="fas fa-edit" ></i></a>
                                                                    <form id="{{$document->id}}"  action="{{route("piece.destroy",$document->id)}}" method="post">
                                                                            @csrf
                                                                            @method("delete")
                                                                                <button 
                                                                                onclick="
                                                                               event.preventDefault();
                                                                               if(confirm('Vous voulez supprimer la pièce {{$document->numero}}?'))
                                                                               document.getElementById({{$document->id}}).submit()
                                                                               "
                                                                                class="btn1 btn-sm mr-2">
                                                                                    <i class="fas fa-trash" ></i>
                                                                                </button>
                                                                    </form>
                                                            <a href="{{route("piece.show",$document->id)}}" class="btn1 btn-warning btn-sm ">
                                                            <i class="fas fa-eye" ></i></a>
                                                                    
                                                        </td> 
                                                       </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div  class="justify-content-center  d-flex flex-row " style="color:#003048">
                                                {{ $piece->links() }}
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