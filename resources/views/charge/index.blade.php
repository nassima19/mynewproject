<x-app-layout >
    @section('title')
<title>
    Charge
</title>
@endsection
@section('style')
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">
      <style>
        .search{
        border: none;
        display: block;
        box-shadow: none; 
        width: 100%;
        height: 35px;
        padding: 3px 40px 3px 0px;
        font-size: 24px;
        line-height: 30px;
        border-bottom: 1px solid #c1c1c1;
        text-align: center;
        padding-top: 3px;
        color: #fff;
        border-radius: 0;
        }
    
        .searchicon{
        font-size: 24px;
        color: #fff;
        padding: 0;
        border: none;
        right: 5px;
        top: 2px;
        }
    .divSearch{
    width: 100%;
    margin: 0 auto;
    height: 70px;
    padding: 2px 50px 2px 0;
    font-size: 24px;
    line-height: 27px;
    border-bottom: 1px solid #c1c1c1;
    }
    .searchicon:hover{
          color:rgb(250, 151, 21);
        }
        .pls{
            font-size:22px;
            color:#003048;
        }
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
@section('search')
<div style="background-color: #003048;;" class="divSearch">
<form action="{{route('charge.search_charge')}}" class="d-flex mr-3 justify-content-center ">
    <div class="form-group mb-1 mr-1 p-2 ">
        <input type="text" name="q" value="{{request()->q ?? ''}}" style="color:#fff;background-color: #003048;" class="form-control search ">
    </div>
    <span class="line"></span>
   <button type="submit" class="btn"><i class="fas fa-search searchicon" aria-hidden="true"></i></button> 
</form>
</div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success " style="text-transform: uppercase;color:rgb(163, 101, 8); text-align:center;font-size:1.7rem;  font-family: 'Roboto Slab';font-weight:bold">
                   <i  class="fas fa-info-circle" style="font-size:1.7rem"></i>  {{ session()->get('success') }}
                </div>
            @endif
                <div class="card shadow p-3 mb-5 bg-body rounded ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-14">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="titre">
                                        <button data-bs-toggle="collapse" data-bs-target="#ex2"><i class="fa-solid fa-list list" ></i> Liste des charges</button>
                                    </h3>
                                    <x-slot name="header">
                                        <h2 class="d-flex flex-row justify-content-end font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#728a8d;font-size:28px">
                                            <div>
                                            <a href="{{route("charge.create")}}" class="me-2" style="text-decoration: none">
                                                <button type="button" class="ajouter"> Ajouter <i class="fa fa-plus-circle" ></i></button> 
                                            </a>
                                            <a href="{{route("charge.NonFacturé")}}" class="me-2">
                                                <button type="button" class="ajouter chargefactureButton" > Charges non facturé</button> 
                                            </a> </div>
                                        </h2>
                                        </x-slot><h2 class="d-flex flex-row justify-content-end font-semibold text-xl leading-tight fw-bold">
                                            <div class="d-flex justify-content-end me-2">
                                              <a href="{{route("importC")}}" class="me-2">
                                                  <button type="button" class="  ajouter fw-bold import " > Import <i class="fa fa-cloud-upload" aria-hidden="true"></i>                                            </button> 
                                                   </a>
                                          </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{route("exportC")}}" class="me-2">
                                                <button type="button" class="  ajouter fw-bold import"> Export <i class='fas fa-file-export pls '></i></button> 
                                                 </a>
                                        </div></h2>
                                     </div>
                                

                                <table  class="table collapse" id="ex2">
                                    <thead>
                                        <tr class="cellule">
                                            <th>N°</th>
                                            <th>Piece</th>
                                            <th>FOURNISSEUR</th>
                                            <th> PRODUIT</th>
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
                                                    {{$depence->fournisseur->nom}}
                                                </td>
                                                <td>
                                                    {{$depence->produit->libele}}
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
                                                    <i class="fas fa-edit"></i></a>
                                                        <form id="{{$depence->id}}" action="{{route("charge.destroy",$depence->id)}}" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                    <button 
                                                                    onclick="
                                                                               event.preventDefault();
                                                                               if(confirm('Vous voulez supprimer le charge de produit  {{$depence->produit->libele}}?'))
                                                                               document.getElementById({{$depence->id}}).submit()
                                                                               "
                                                                    class="btn1 btn-sm mr-2">
                                                                        <i class="fas fa-trash" ></i>
                                                                    </button>
                                                        </form>
                                                        <a href="{{route("charge.show",$depence->id)}}" class="btn1 btn-warning btn-sm ">
                                                            <i class="fas fa-eye" ></i></a>
                                                         
                                              </td> 
                                               </tr>
                                            @endforeach
                                        </tbody>
                                </table><div  class="justify-content-center  d-flex flex-row " style="color:#003048">
                                    {{ $charge->links() }}
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
   </div><script src="/js/javascript.js"></script>
   @endsection
</x-app-layout>