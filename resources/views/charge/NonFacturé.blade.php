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
            <form action="{{route('facture.show')}}" method="GET">
            <div class="row">
                <div class="col">
                    <div class="card col-md-12 shadow p-3 mb-5 bg-body rounded pb-2 ">
                                  <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                      <h3 class="text-secondary">
                                          <button ><i class="fa-solid fa-list" style="font-size:28px;color:#a0627d"></i> Liste des charges Non facturé</button>
                                      </h3>
                                       </div>
                                  <table  class="table " id="ex2">
                                      <thead>
                                          <tr class="cellule">
                                              <th> 
                                                  <i class="checkbox2 fa fa-square-o" style="float: none;"></i>
                                              </th>
                                              <th>N°</th>
                                              <th>Piece</th>
                                              <th>FOURNISSEUR</th>
                                              <th>PRODUIT</th>
                                              <th>DATE</th>
                                              <th>STATU</th>
                                              <th>PRIX</th>
                                              <th>QUANTITE</th>
                                          </tr>
                                      </thead> 
                                      <tbody class="tab">
                                                  @foreach($chargenonfacture as $depence)
                                                 <tr>
                                                     <td><input type="checkbox" name="factureà" value="{{$depence->id}}" /></td>
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
                                                 </tr>
                                              @endforeach
                                              <button type="submit"></button>
                                          </tbody>
                                  </table>
                              </div>
                            </div><br>
                <div class="col">
                    <div class="card col-md-11 shadow p-3 mb-5 bg-body rounded pb-2 ">
                        <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                            <h3 class="text-secondary">
                                  <button data-bs-toggle="collapse" data-bs-target="#ex1"><i class="fa-solid fa-list" style="font-size:28px;color:#a0627d"></i> Liste des piece</button>
                               </h3> 
                          </div>
                        <table  class="table" id="ex1">
                            <thead>
                                <tr class="cellule">
                                    <th></th>
                                    <th>N°</th>
                                    <th>Type</th>
                                    <th>Date_paiement</th>
                                    <th>Compte_bancaire</th>
                                </tr>
                            </thead>                                            
                            <tbody class="tab">
                                    @foreach($piece as $document)
                                   <tr>
                                       <td> 
                                           <input type="radio" name="facture" value="{{$document->id}}" ></td>
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
                                       </tr>
                                    @endforeach
                                </tbody>
                            </table>
                      </div>
                </div>
                <div class="form-group d-flex flex-row justify-content-center" >
                        <button type="submit" value="Associer" class="btn2" style="font-family: Roboto Slab, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;   font-size: 2rem;" > Associer</button>
                </div>
          </div>
        </form>
   @endsection
</x-app-layout>