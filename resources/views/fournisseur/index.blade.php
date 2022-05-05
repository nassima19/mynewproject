
<x-app-layout >
    @section('title')
<title>
    Fournisseur
</title>
@endsection
@section('style')
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-14">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                        <h3 class="text-secondary">
                                            <button data-bs-toggle="collapse" data-bs-target="#ex2"><i class="fa-solid fa-list" style="font-size:28px;color:#FFA97A"></i> Liste des fournisseur</button>
                                        </h3>
                                        <a href="{{route("fournisseur.create")}}">
                                            <i class="fas fa-plus" style="font-size:33px;color:#FFA97A"></i>
                                        </a>
                                    </div>
                                    <table  class="table collapse" id="ex2">
                                        <thead>
                                            <tr class="cellulef">
                                                <th>ID</th>
                                                <th>TITRE</th>
                                                <th>NOM</th>
                                               <th>CATEGORIE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>                                            
                                        <tbody class="tab">
                                                @foreach($fournisseur as $vendor)
                                               <tr>
                                                    <td >
                                                        {{$vendor->id}}
                                                    </td>
                                                        <td>
                                                            {{$vendor->titre}}
                                                        </td>
                                                            <td>
                                                                {{$vendor->nom}}
                                                        </td>
                                                                 <td>
                                                                    {{$vendor->categorie->libele}}
                                                                </td> 
                                                    <td class="d-flex flex-row justify-content-center align-items-center ">
                                                        <a href="{{route("fournisseur.edit",$vendor->id)}}" class="btn1 btn-sm mr-2">
                                                            <i class="fas fa-edit" style="color:#5d3277"></i></a>
                                                                <form action="{{route("fournisseur.destroy",$vendor->id)}}" method="post">
                                                                    @csrf
                                                                    @method("delete")
                                                                        <button class="btn1 btn-sm mr-2">
                                                                            <i class="fas fa-trash" style="color:#5d3277"></i>
                                                                        </button>
                                                                </form>
                                                        <a href="{{route("fournisseur.show",$vendor->id)}}" class="btn1 btn-warning btn-sm ">
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