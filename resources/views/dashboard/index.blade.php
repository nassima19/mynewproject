<x-app-layout>
    @section('title')
  dashboard  
@endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="/js/Chart.min.css">
</script>
 
      <style>
          .container {
          width: 100%;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
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
        color: #f69000;

    }
    .productDashboared:hover{
        color: #717171;
    }
  
      </style>
@endsection
<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight fw-bold" style="text-shadow: 4px 4px 5px #a3a3a3;color:rgb(233, 157, 122);font-size:28px">
        {{ __('DASHBOARED') }}
    </h2>
</x-slot>
@section('content')

<div class="container p-3 ">
    <div class="row justify-content-center ">
        <div class="col-md-14">
            <div class=" card shadow p-3 mb-5 bg-body rounded" >
                <div class="card-body">
                  <div class="row "><br><br>
                      <div class=" col-md-3" >
                          <div class="card shadow p-3 mb-0 bg-body " style="height: 500px">
                                <div class="d-flex flex-row justify-content-between {{-- align-items-center --}} border-bottom pb-1 md-3">
                                    <h3 class="text-secondary">
                                        <a href="{{route("produit.index")}}" class="me-2"> <button data-bs-toggle="collapse" data-bs-target="#ex2" class="productDashboared"><i class="fa fa-tasks productDashboared" aria-hidden="true" style="font-size:28px;"></i> Produits</button></a>
                                        </h3>
                                            <a href="{{route("produit.create")}}" class="me-2  pull-right" >
                                            <i class="fa fa-plus-circle productDashboared" aria-hidden="true" style="font-size:22px;"></i> 
                                        </a></div>
                                   <br><br>
                                    <ul style="font-weight: bold">
                                    @foreach ($produits as $produit)
                                     <br> <a href="http://127.0.0.1:8000/produit/?id={{$produit->id}}/edit/" style="text-decoration: none"><li style="color:#f69000 ; padding: 0 15px 0 0;margin: 0 0 6px;text-transform: uppercase; position: relative;">{{$produit->libele}}</li></a>
                                     @endforeach
                                   </ul>
                </div>
            </div><br>
    <div class="col-md-4">
        <div class="card shadow p-3 mb-0 bg-body " style="height: 400px">
                        <div class="d-flex flex-row justify-content-between border-bottom pb-1">
                            <h3 class="text-secondary">
                                <a href="{{route("charge.index")}}" class="me-2"> <button class="productDashboared" data-bs-toggle="collapse" data-bs-target="#ex2" style="color:#864c65" ><i class="fa fa-tasks productDashboared" aria-hidden="true" style="font-size:28px;color:#864c65"></i> Charges</button></a>
                                  </h3>
                                    <a href="{{route("charge.create")}}" class="me-2  pull-right" >
                                    <i class="fa fa-plus-circle " aria-hidden="true" style="font-size:22px;color:#864c65"></i> 
                                    </a></div>
                                <br><br>
                                <div class="d-flex flex-row justify-content-between  bold pb-1">
                                    <span class="" style="text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;"> à payer</span>
                                   <span type="text" name="Total"  style=" border:none;text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;">{{session()->get('Total')}} MAD</span>
                                     </div> 
                                <div class="d-flex flex-row justify-content-between  bold pb-1">
                                    <span class="" style="text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;"> payer</span>
                                   <span type="text" name="TotalP"  style=" border:none;text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;">{{session()->get('TotalP')}} MAD</span>
                                     </div> 
                                 
                                <canvas class="p-10"
                                        id="thisDepensesPieChart" 
                                        style="display: block; width: 400px; height: 100px;" width="300" height="192"   >
                                </canvas>
                                     </div></div><br>
                                    <div class="col col-md-4">
                                     <div class="card shadow p-3 mb-0 bg-body " style="height: 320px">
                                        <div class="d-flex flex-row justify-content-between  border-bottom pb-1">
                                            <h3 class="text-secondary">
                                                <a href="{{route("charge.index")}}" class="me-2"> <button data-bs-toggle="collapse" data-bs-target="#ex2" class=""  style="color:rgb(202, 122, 122)"><i class="fa fa-bank "  style="color:rgb(202, 122, 122)" aria-hidden="true" style="font-size:28px;"  class=""></i> Paiements</button></a>
                                            </h3>
                                        </div>
                                        <div class="d-flex flex-row justify-content-between  bold pb-1">
                                        <span class="" style="text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;">  payer</span>
                                     <span type="text"  style=" border:none;text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;">{{-- {{session()->get('Total')}} --}} MAD</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
            </div> <div>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Janv</th>
                                <th>Fiv</th>
                                <th>MARS</th>
                                <th>Avril</th>
                                <th>Mai</th>
                                <th>Juin</th>
                               <th>Juil</th>
                             <th>Oct</th>
                             <th>Nov</th>
                             <th>Déc</th>
                             </tr>
                            </thead>
                            <tbody class="tab">
                                                @foreach($charges as $charge)
                                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
</div>
</div>
</div>
<div>
    <canvas id="GlobalChart" style="display: block; width: 1133px; height: 307px;" width="1133" height="307"></canvas>

</div>
</div> 

        @endsection
        @section("script")
        <script src="/js/popper.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script> --}}
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
    {{-- <script> 
        $(document).ready(function () {
            jQuery(window).resize(drawchart);
            drawchart();
        });

        function drawchart() {
            dataGlobalChart = {
                labels: [ " Déc. ","   Janv. ","   Févr. ","   Mars ","   Avr. ","   Mai " ],
                datasets: [
                   {
                        label: "Dépenses",
                        backgroundColor: "rgba(241, 132, 8, 0.2)",
                        borderColor: "rgba(241, 132, 8, 1)",
                        data: [ " 0 ","   0 ","   0 ","   0 ","   0 ","   2460.00 " ],
                        fill: false
                    }
                ]
            };

            var ctxGlobalChart = $("#GlobalChart");
            var myLineChart = new Chart(ctxGlobalChart, {
                data: dataGlobalChart,
                type: 'line',
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
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return data.datasets[tooltipItem.datasetIndex].label + ": " + Kiwili.FormatNumber(tooltipItem.yLabel, 'fr', 2, 'MAD', false);
                            }
                        }
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Value'
                            },
                            ticks: {
                                callback: function (value, index, values) {
                                    return Kiwili.FormatNumber(value, 'fr', 0, 'MAD', true);
                                }
                            }
                        }]
                    }
                },
                tooltipFillColor: "rgba(0,0,0,0.6)"
            });
        }
    </script> --}}
 
 {{-- 
        <script>
            const dataPie = {
                startAngle: 240,
                labels: ["Total à payer"],
              
              datasets: [
                {
/*                     labels: ["Total à payer:{{session()->get('Total')}}Mad"],
 */                    data:[{{session()->get('Total')}}] ,
                      backgroundColor: [
                       "rgb(255, 187, 84)",
                  ],
                  hoverOffset: 4,
                },
              ],
            };
            const configPie = {
              type: "pie",
              data: dataPie,
              options: {},
            };
            var chartBar = new Chart(document.getElementById("chartPie"), configPie);
          </script> --}}
 
 
 
        {{--       
<script>
    var ctx = document.getElementById("myChart").getContext("2d");
    let charges = document.querySelectorAll('.charges');
    let dataVal = [];
    for (let i = 0; i < charges.length; i++) {
        dataVal[i] = charges[i].innerHTML
    }
    var myChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: [
            "Jan",	
            "Feb",
            "Mar",
            'Apr',
            "May",
            "June",
            "July",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec",
        ],
        datasets: [
            {
                label: "work load",
                data: dataVal,
                backgroundColor: "rgba(2, 72, 151, 0.5)",
            },
        ],
    },
    });
</script> --}} 
   @endsection
</x-app-layout>




