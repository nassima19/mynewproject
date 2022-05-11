<x-app-layout >
    @section('title')
<title>
    Charge
</title>
@endsection
@section('style')
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-14">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <button data-bs-toggle="collapse" data-bs-target="#ex2"><i class="fa-solid fa-list" style="font-size:28px;color:#a0627d"></i> Liste des charges</button>
                                     </h3>
                                    <a href="{{route("charge.create")}}">
                                   <button type="button" class="ajouter"><i class="fas fa-plus" style="font-size:22px;color:#182c42 "></i> Ajouter</button> 
                                    </a>
                                </div>
                                <table  class="table collapse" id="ex2">
                                    <thead>
                                        <tr class="cellule">
                                            <th>N°</th>
                                            <th>PIECE</th>
                                            <th>FOURNISSEUR</th>
                                            <th>PRODUIT</th>
                                            <th>DATE</th>
                                            <th>STATU</th>
                                            <th>PRIX</th>
                                            <th>QUANTITE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead> 
                                    <tbody class="tab">
                                                @foreach($charge as $depence)
                                               <tr>
                                                <td>
                                                    {{$depence->id}}
                                                </td>
                                                <td>
                                                    {{$depence->piece_id}}
                                                </td>
                                                <td>
                                                    {{$depence->fournisseur_id}}
                                                </td>
                                                <td>
                                                    {{$depence->produit->name}}
                                                </td>
                                                <td>
                                                    {{$depence->date}}
                                                 </td> 
                                                 <td>
                                                    {{$depence->statu}}
                                                 </td>
                                                <td>
                                                    {{$depence->prix}}   
                                                </td>
                                                <td>
                                                    {{$depence->qte}}   
                                                </td>
                                            <td class="d-flex flex-row justify-content-center align-items-center  pull-left">
                                                <a href="{{route("charge.edit",$depence->id)}}" class="btn1 btn-sm mr-2">
                                                    <i class="fas fa-edit" style="color:#5d3277"></i></a>
                                                        <form action="{{route("charge.destroy",$depence->id)}}" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                    <button class="btn1 btn-sm mr-2">
                                                                        <i class="fas fa-trash" style="color:#5d3277"></i>
                                                                    </button>
                                                        </form>
                                                        <a href="{{route("charge.show",$depence->id)}}" class="btn1 btn-warning btn-sm ">
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