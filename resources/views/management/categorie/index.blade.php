
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
    .bg-white{
        color: #1e768a;
        background-color: #b37f4c;
        font-size: 1.25rem;
    }
    .text-gray-700 {
        color:#b17438;
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
                    <div class="alert alert-success " style="text-transform: uppercase;color:rgb(163, 101, 8);font-weight: bold; text-align:center;font-size:1.7rem;  font-family: 'Roboto Slab';">
                       <i class="fas fa-check-circle" style="font-size:1.7rem"></i>  {{ session()->get('success') }}
                    </div>
                @endif
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-14">
                                    <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                        <h3 class="titre">
                                            <button data-bs-toggle="collapse" data-bs-target="#ex2"><i class="fa-solid fa-list list"></i> Liste des catégories</button>
                                         </h3><x-slot name="header">
                                            <h2 class="d-flex flex-row justify-content-end  font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:#728a8d;font-size:28px">
                                            <a href="{{route("categorie.create")}}">
                                                    <button type="button" class="ajouter me-3"> Ajouter <i class="fa fa-plus-circle"></i></button>
                                                </a>  
                                            </h2>
                                    </x-slot>
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
                                                <td class="d-flex flex-row justify-content-center align-items-center  pull-left">
                                                    <a href="{{route("categorie.edit",$category->id)}}" class="btn1 btn-sm mr-2">
                                                        <i class="fas fa-edit" ></i></a>
                                                        <form  id="{{$category->id}}" action="{{route("categorie.destroy",$category->id)}}" method="post">
                                                                    @csrf
                                                                    @method("delete")
                                                                        <button 
                                                                        onclick="
                                                                               event.preventDefault();
                                                                               if(confirm('Attion, si vous avez supprimer la categorie {{$category->libele}} tous les fournisseurs et les produit qui font partie à cette categorie seront supprimer!! Vous etes sur de confirmer la supprission ?'))
                                                                               document.getElementById({{$category->id}}).submit()
                                                                               "
                                                                        class="btn1 btn-sm mr-2">
                                                                            <i class="fas fa-trash" ></i>
                                                                        </button>
                                                            </form>
                                                            {{-- <script>
   $('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: 'This record and it`s details will be permanantly deleted!',
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
          }).then(function(value) {
          if (value) {
          window.location.href = url;
        }
      });
     });
</script>

dans la table ha chno kan 
<td>
               <a href="/category-delete/{{$data->id}}" class="btn btn-danger delete-confirm" role="button">Delete</a>
            </td>

--}}
                                                            <a href="{{route("categorie.show",$category->id)}}" class="btn1 btn-warning btn-sm ">
                                                                <i class="fas fa-eye " ></i></a>
                                                             
                                                  </td> 
                                                   </tr>
                                                @endforeach
                                              
                                            </tbody>
                                    </table>  <div  class="justify-content-center  d-flex flex-row " style="color:#003048">
                                                     {{ $categorie->links() }}
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