<x-app-layout>
    @section('title')
<title>
    Piece
</title>
@endsection 
@section('style')
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
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
                                      <h3 class="text-secondary">
                                            <button data-bs-toggle="collapse" data-bs-target="#ex1"><i class="fa-solid fa-list" style="font-size:28px;color:#a0627d"></i> Liste des pieces</button>
                                         </h3> 
                                          <a href="{{route("piece.create")}}">
                                            <button type="button" class="ajouter"><i class="fas fa-plus" style="font-size:22px;color:#fff"></i> Ajouter</button>
                                        </a>
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
                                                                <i class="fas fa-edit" style="color:#5d3277"></i></a>
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
                                                                                    <i class="fas fa-trash" style="color:#5d3277"></i>
                                                                                </button>
                                                                    </form>
                                                            <a href="{{route("piece.show",$document->id)}}" class="btn1 btn-warning btn-sm ">
                                                            <i class="fas fa-info-circle " style="color:#5d3277"></i></a>
                                                                    
                                                        </td> 
                                                       </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
       @endsection
    </x-app-layout>