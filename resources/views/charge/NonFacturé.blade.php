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
                                      <h3 class="titre">
                                          <button ><i class="fa-solid fa-list list"></i> Liste des charges non facturé</button>
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
                                                     <td><input type="checkbox" name="charges[{{$depence->id}}]" value="{{$depence->id}}" /></td>
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
                            <h3 class="titre">
                                  <button data-bs-toggle="collapse" data-bs-target="#ex1"><i class="fa-solid fa-list list" ></i> Liste des piece</button>
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
                                           <input type="radio" name="piece" value="{{$document->id}}" ></td>
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
                            </table><div  class="justify-content-center  d-flex flex-row " style="color:#003048">
                                {{ $piece->links() }}
                            </div>
                      </div>
                </div>
                <div class="form-group d-flex flex-row justify-content-center" >
                        <button type="submit" value="Associer" class="ajouter" style="font-size:1.7rem;" > Associer</button>   
                                 </div>
          </div>
        </form>
   @endsection
</x-app-layout>