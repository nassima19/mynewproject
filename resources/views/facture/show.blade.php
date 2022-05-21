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
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <div class="card col-md-12 shadow p-3 mb-5 bg-body rounded pb-2 ">
                                  <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                      <h3 class="text-secondary">
                                          <button ><i class="fa-solid fa-list" style="font-size:28px;color:#a0627d"></i> Liste des charges associer à la pièce <span style="color: #003048;padding:1px 4px;background-color:#dfb3c6;border-radius: 3px" > {{ $piece->id}} </span> </button>
                                      </h3>
                                       </div>
                                  <table  class="table " id="ex2">
                                      <thead>
                                          <tr class="cellule">
                                              <th>N°</th>
                                              <th>FOURNISSEUR</th>
                                              <th>PRODUIT</th>
                                              <th>DATE</th>
                                              <th>STATU</th>
                                              <th>PRIX</th>
                                              <th>QUANTITE</th>
                                          </tr>
                                      </thead> 
                                      <tbody class="tab">
                                          @foreach($piece->charges as $charge)
                                                  <td>
                                                       {{$charge->id}}
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
                                  </table>
                                </div>
                                <div class="form-group float-end">
                                    <button class="ajouter "><a type="button" style="text-decoration: none;  color:white"  href="{{route('charge.index')}}" >Retour</a></button>
                                 </div>
                            </div><br>
                      </div>
         @endsection
</x-app-layout>