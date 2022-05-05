    <x-app-layout >
        @section('title')
    <title>
        Categorie
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
                                            <button data-bs-toggle="collapse" data-bs-target="#ex2"><i class="fa-solid fa-list" style="font-size:28px;color:#a765a3"></i> Liste des categories</button>
                                         </h3>
                                        <a href="{{route("categorie.create")}}">
                                            <i class="fas fa-plus" style="font-size:33px;color:#a765a3"></i>
                                        </a>
                                    </div>
                                    <table  class="table collapse" id="ex2">
                                        <thead>
                                            <tr class="cellule">
                                                <th>ID</th>
                                                <th>LIBELLE</th>
                                                <th>DESCRIPTION</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>                                            
                                        <tbody class="tab">
                                                @foreach($categorie as $category)
                                               <tr>
                                                <td >
                                                    {{$category->id}}
                                                </td>
                                                <td>
                                                    {{$category->libele}}
                                                </td>
                                                <td>
                                                    {{Str::limit($category->description, 25)}}
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center ">
                                                    <a href="{{route("categorie.edit",$category->id)}}" class="btn1 btn-sm mr-2">
                                                        <i class="fas fa-edit" style="color:#5d3277"></i></a>
                                                            <form action="{{route("categorie.destroy",$category->id)}}" method="post">
                                                                    @csrf
                                                                    @method("delete")
                                                                        <button class="btn1 btn-sm mr-2">
                                                                            <i class="fas fa-trash" style="color:#5d3277"></i>
                                                                        </button>
                                                            </form>
                                                            <a href="{{route("categorie.show",$category->id)}}" class="btn1 btn-warning btn-sm ">
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