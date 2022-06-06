<x-app-layout>
    @section('title')
  Dashboard  
@endsection
@section('style')
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
          .container {
          width: 100%;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .bg-white{
        color: #1e768a;
        background-color: #b37f4c;
        font-size: 1.25rem;
    }
    .text-gray-700 {
        color:#b17438;
    }
    .box {
    width: 20%;
    min-height: 500px;
    line-height: 1;
    color: #717171;
    padding: 12px;
    margin: 0 0 12px;
    border: 1px solid #cfcfcf;
    border-radius: 4px;
    position: relative;
    background-color: #fff;}
    .productDashboared{
    }
    .productDashboared:hover{
        color: #d4a875;
    }
        .progress{
        box-shadow: 0 3px 3px -5px #ffffff, 0 2px 5px #9c9494;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        } 
</style>
@endsection
<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
        {{ __('DASHBOARED') }}
    </h2>
</x-slot>
@section('content') 
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6"style="padding-top: 0.5rem;">
             <div class="card shadow p-3 mb-0 bg-body rounded pb-2 " style="height: 120px;border-left:5px solid #f69000">
                     <div class="d-flex flex-row  pb-1 md-3">
                         <p style="color:#f69000;font-family: Roboto Slab;  font-size:1.5rem;">Total Fournisseur</p>
                     </div>  
                             <div class="d-flex flex-row justify-content-center pb-1 md-3" style="font-size: 1.5rem;">
                             @foreach($numberfournisseurs as $numberfournisseur)
                             {{$numberfournisseur->count}}
                             @endforeach  
                         </div>
                 </div>
          </div>   
              <div class="col-md-6" style="padding-top: 00.5rem;">
             <div class="card  shadow p-3 mb-0 bg-body rounded pb-2 " style="height: 120px;border-left:5px solid #153e5c">
               <div class="d-flex flex-row justify-content-center pb-1 md-3">
                             <p style="color:#153e5c;font-family: Roboto Slab;  font-size: 1.5rem;">Total Bénéficiaire</p>
                             </div>  
                             <div class="d-flex flex-row justify-content-center pb-1 md-3" style="font-size: 1.5rem;">
                             @foreach($numberbeificiaires as $numberbeificiaire)
                             {{$numberbeificiaire->count}}
                             @endforeach  </div>
                 </div>
          </div>
        </div>
        <div class="row">
            <div class=" col-md-6 " style="padding-top: 2rem;">
               <div class="cardshadow p-3 mb-0 bg-body rounded pb-2 " style="height: 120px;border-left:5px solid #2D7B8C">
                 <div class="d-flex flex-row justify-content-center pb-1 md-3">
                               <p style="color:#2D7B8C;font-family: Roboto Slab;  font-size: 1.5rem;">Total Categorie</p>
                               </div>  
                               <div class="d-flex flex-row justify-content-center pb-1 md-3" style="font-size: 1.5rem;">
                               @foreach($numbercategories as $numbercategorie)
                               {{$numbercategorie->count}}
                               @endforeach  </div>
                   </div>
            </div> 
            <div class=" col-md-6" style="padding-top: 2rem;">
               <div class="cardshadow p-3 mb-0 bg-body rounded pb-2 " style="height: 120px;border-left:5px solid #b37f4c">
                 <div class="d-flex flex-row justify-content-center pb-1 md-3">
                               <p style="color:#b37f4c;font-family: Roboto Slab;  font-size: 1.5rem;">Total Charge</p>
                               </div>  
                               <div class="d-flex flex-row justify-content-center pb-1 md-3" style="font-size: 1.5rem;">
                               @foreach($numbercharges as $numbercharge)
                               {{$numbercharge->count}}
                               @endforeach  </div>
               </div>
            </div>
        </div>
    </div><br><br><br><br>
 <div class="col">
        <div class=" card col-md-9 shadow p-3 mb-0 bg-body rounded pb-2 " style="height: 420px;">
                                <div class="d-flex flex-row justify-content-between  border-bottom pb-1 md-3">
                                        <h3 class="text-secondary">
                                            <a href="{{route("produit.index")}}" class="me-2"> <button data-bs-toggle="collapse" style="color: #864c65" data-bs-target="#ex2" class="productDashboared"><i class="fa fa-tasks productDashboared" style="color: #864c65" aria-hidden="true" style="font-size:28px;"></i> Produits</button></a>
                                        </h3>
                                            <a href="{{route("produit.create")}}" class="me-2  pull-right" >
                                               <i class="fa fa-plus-circle productDashboared" aria-hidden="true" style="font-size:22px; color:#864c65"></i> 
                                            </a>
                                </div> <br><br>
                                                <ul style="font-weight: bold">
                                                    @foreach ($produits as $produit)<br>
                                                          <a href="http://127.0.0.1:8000/produit/{{$produit->id}}/edit/" style="text-decoration: none"><li style="color:#864c65 ; padding: 0 15px 0 0;margin: 0 0 6px;text-transform:uppercase; position: relative;">* {{$produit->libele}}</li></a>
                                                    @endforeach
                                               </ul>
            </div>
        </div>
    <div class="col">
        <div class="card col-md-9 shadow p-3  mb-0 bg-body rounded pb-2 "style="height: 425px">
                        <div class="d-flex flex-row justify-content-between border-bottom pb-1">
                            <h3 class="text-secondary">
                                <a href="{{route("charge.index")}}" class="me-2"> <button class="productDashboared" data-bs-toggle="collapse" data-bs-target="#ex2" style="color:#f69000" ><i class="far fa-credit-card productDashboared"  aria-hidden="true" style="font-size:30px;color:#f69000"></i> Charges</button></a>
                                  </h3>
                                    <a href="{{route("charge.create")}}" class="me-2  pull-right" >
                                    <i class="fa fa-plus-circle " aria-hidden="true" style="font-size:22px;color:#f69000"></i> 
                                    </a></div>
                                <br>
                                <div class="d-flex flex-row justify-content-between  bold pb-1">
                                            <span class="" style="text-transform: uppercase;padding:20px 20px;color:#f69000;font-weight: bold; text-transform: uppercase;"> à payer</span>
                                           <span type="text" name="Total"  style=" border:none;text-transform: uppercase;padding:20px 20px;color:#f69000;font-weight: bold; text-transform: uppercase;">{{session()->get('Total')}} MAD</span>
                                </div> 
                                <div class="d-flex flex-row justify-content-between  bold pb-2">
                                        <span class="" style="text-transform: uppercase;padding:20px 20px;color:#f69000;font-weight: bold; text-transform: uppercase;"> payer</span>
                                        <span type="text" name="TotalP"  style=" border:none;text-transform: uppercase;padding:20px 20px;color:#f69000;font-weight: bold; text-transform: uppercase;">{{session()->get('TotalP')}} MAD</span>
                                </div> 
                                <canvas class="p-10"
                                        id="thisDepensesPieChart" 
                                        style="display: block; width: 400px; height: 100px;" width="300" height="192"   >
                                </canvas><br><br>
                            </div>
    
</div>  
</div><br>
<div class="row ">
                <div class="col-md-10">
                    <div class="card  shadow p-3 mb-0 bg-body rounded pb-2 ">
                                  <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                      <h3 class="text-secondary">
                                          <button class="productDashboared titre" style="font-weight: normal"><i class="fa-solid fa-list list" ></i> Les dernieres charges</button>
                                      </h3>
                                       </div>
                                  <table  class="table " id="ex2">
                                      <thead>
                                          <tr class="cellule" style="background-color:#01555f; color:#ffffffd0">
                                              <th>N°</th> 
                                              <th>DATE</th>
                                              <th>FOURNISSEUR</th> 
                                              <th>PRODUIT</th>
                                              <th>Piece</th>
                                              <th>STATU</th>
                                              <th>PRIX</th>
                                              <th>QUANTITE</th>
                                          </tr>
                                      </thead> 
                                      <tbody class="tab">
                                                  @foreach($depences as $depence)
                                                  <td>
                                                      {{$depence->id}}
                                                  </td>
                                                  <td>
                                                      {{$depence->created_at}}
                                                   </td> 
                                                  <td>
                                                      {{$depence->fournisseur->nom}}
                                                  </td>
                                                  <td>
                                                      {{$depence->produit->libele}}
                                                  </td>
                                                      <td>
                                                      {{$depence->piece_id}}
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
                                  </table><div  class="justify-content-center  d-flex flex-row " style="color:#003048">
                                    {{ $depences->links() }}
                                </div> 
                              </div>
                            </div>
                      </div>
          <br>
 @endsection
        @section("script")
        {{-- <script src="/js/Chart.min.css">
        </script> --}}
        <script src="/js/popper.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> 
<script>
        dataDepenses = {
            datasets: [{
                data: [ {{session()->get('Total')}}, {{session()->get('TotalP')}}],
                backgroundColor: ["rgb(255,187,84)", "rgb(255,153,0)"]
            }],

            labels: [
                "Charge à payer {{session()->get('Total')}} MAD",
                "Charge payer {{session()->get('TotalP')}} MAD",
            ]
        };
        var ctxDepenses = $("#thisDepensesPieChart");
        var DepensesChart = new Chart(ctxDepenses, {
            data: dataDepenses,
            type: 'pie',
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {

                            var label = data.labels[tooltipItem.index];
                            return label;
                        }
                    }
                }
            },
            tooltipFillColor: "rgba(0,0,0,0.6)"
        });
    </script>
   @endsection
</x-app-layout>




