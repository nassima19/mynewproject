<x-app-layout>
    @section('title')
  dashboard  
@endsection
@section('style')
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
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
<div class="container p-3" >
    <div class="row justify-content-center">
        <div class="col" >
            <div class="card shadow p-3 mb-5 bg-body rounded" >
                <div class="card-body">
        <div class="row"><br>
            <div class="col col-md-3">
                <div class="card shadow p-3 mb-0 bg-body  " style="height: 500px">
                                <div class="d-flex flex-row justify-content-between {{-- align-items-center --}} border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <a href="{{route("produit.index")}}" class="me-2"> <button data-bs-toggle="collapse" data-bs-target="#ex2" class="productDashboared"><i class="fa fa-tasks productDashboared" aria-hidden="true" style="font-size:28px;"></i> Produits</button></a>
                                        </h3>
                                            <a href="{{route("produit.create")}}" class="me-2  pull-right" >
                                            <i class="fa fa-plus-circle productDashboared" aria-hidden="true" style="font-size:22px;"></i> 
                                        </a></div>
                                   <br><br>
                                    <ul>
                                    @foreach ($produits as $produit)
                                     <br> <a href="http://127.0.0.1:8000/produit/?id={{$produit->id}}/edit/" style="text-decoration: none"><li style="color:#f69000 ; padding: 0 15px 0 0;margin: 0 0 6px;text-transform: uppercase; position: relative;">{{$produit->libele}}</li></a>
                                     
                                     @endforeach
                                </ul>
                </div>
            </div><br>
    <div class="col col-md-4">
        <div class="card shadow p-3 bg-body  " style="height: 320px">
                        <div class="d-flex flex-row justify-content-between  border-bottom pb-1">
                            <h3 class="text-secondary">
                                <a href="{{route("charge.index")}}" class="me-2"> <button data-bs-toggle="collapse" data-bs-target="#ex2" style="color:#864c65" class=""><i class="fa fa-tasks productDashboared" aria-hidden="true" style="font-size:28px;color:#864c65"></i> Charges</button></a>
                                  </h3>
                                    <a href="{{route("charge.create")}}" class="me-2  pull-right" >
                                    <i class="fa fa-plus-circle " aria-hidden="true" style="font-size:22px;color:#864c65"></i> 
                                    </a></div>
                                <br>
                                <div class="d-flex flex-row justify-content-between  bold pb-1">
                                    <span class="" style="text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;"> à payer</span>
                                   <span type="text" name="Total"  style=" border:none;text-transform: uppercase;padding:20px 20px;color:#864c65;font-weight: bold; text-transform: uppercase;">{{session()->get('Total')}} MAD</span>
                            </div>
                        </div>
    </div><br>
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
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
</x-app-layout>

{{-- 

<div class="max-w-sm rounded overflow-hidden shadow-lg col-md-4">
<div class="px-6 py-4">
  <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
</div>
<div class="px-6 pt-4 pb-2">
</div>
</div> --}}
 {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <x-jet-welcome />
                        </div>
                    </div>
            </div> 
@endsection --}}
            
