<x-app-layout >
    @section('title')
<title>
    Categorie
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
</style>
@endsection

@section('search')
<div style="background-color: #003048;" class="divSearch">
<form action="{{route('categorie.search_categorie')}}" class="d-flex mr-3 justify-content-center ">
    <div class="form-group mb-1 mr-1 p-2 ">
        <input type="text" name="q" value="{{request()->q ?? ''}}" style="color:#fff;background-color: #003048" class="form-control search ">
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
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-14">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <button><i class="fa-solid fa-list" style="font-size:28px;color:#003048"></i> Liste des categories</button>
                                     </h3>
                                    <a href="{{route("categorie.create")}}">
                                        <button type="button" class="ajouter"><i class="fas fa-plus" style="font-size:22px;color:#fff"></i> Ajouter</button>
                                    </a>
                                </div>
                                <table  class="table " id="ex2">
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
                                            <td class="d-flex flex-row justify-content-center align-items-center  pull-left">
                                                <a href="{{route("categorie.edit",$category->id)}}" class="btn1 btn-sm mr-2">
                                                    <i class="fas fa-edit" style="color:#5d3277"></i></a>
                                                        <form  id="{{$category->id}}" action="{{route("categorie.destroy",$category->id)}}" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                    <button 
                                                                    onclick="
                                                                           event.preventDefault();
                                                                           if(confirm('Vous voulez supprimer la categorie {{$category->libele}}?'))
                                                                           document.getElementById({{$category->id}}).submit()
                                                                           "
                                                                    class="btn1 btn-sm mr-2">
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