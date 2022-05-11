{{--
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categorie') }}
    </h2>
</x-slot>
</x-app-layout> --}}
<x-app-layout>
    @section('title')
<title>
    Produit
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                      <h3 class="text-secondary">
                                            <button data-bs-toggle="collapse" data-bs-target="#ex1"><i class="fa-solid fa-list" style="font-size:28px;color:#a0627d"></i> Liste des produits</button>
                                         </h3> 
                                          <a href="{{route("produit.create")}}">
                                            <button type="button" class="ajouter"><i class="fas fa-plus" style="font-size:22px;color:#182c42"></i> Ajouter</button>
                                        </a>
                                    </div>
                                        <table  class=" collapse table " id="ex1">
                                            <thead>
                                                <tr class="cellule">
                                                    <th>ID</th>
                                                    <th>LIBELLE</th>
                                                    <th>CODE_BARRE</th>
                                                    <th>METHODE_PAIEMENT</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>                                            
                                            <tbody class="tab">
                                                    @foreach($produit as $product)
                                                   <tr>
                                                        <td>
                                                            {{$product->id}}
                                                            </td>
                                                        <td>
                                                            {{$product->libele}}
                                                        </td>
                                                        <td>
                                                            {{$product->code_barre}}
                                                        </td>
                                                        <td>
                                                            {{$product->methode_paiement}}
                                                        </td>
                                                        <td>
                                                            {{Str::limit($product->description, 25)}}
                                                        </td>
                                                    <td class="d-flex flex-row justify-content-center align-items-center ">
                                                            <a href="{{route("produit.edit",$product->id)}}" class="btn1 btn-sm mr-2">
                                                                <i class="fas fa-edit" style="color:#5d3277"></i></a>
                                                                    <form action="{{route("produit.destroy",$product->id)}}" method="post">
                                                                            @csrf
                                                                            @method("delete")
                                                                                <button class="btn1 btn-sm mr-2">
                                                                                    <i class="fas fa-trash" style="color:#5d3277"></i>
                                                                                </button>
                                                                    </form>
                                                            <a href="{{route("produit.show",$product->id)}}" class="btn1 btn-warning btn-sm ">
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