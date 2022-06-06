 </div><x-app-layout >
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
    .button, input, optgroup, select, textarea{
        color: #003048;
    }
    </style>
@endsection
@section('content')
        @if ($errors->any())
        @foreach ($errors as $error)
        <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endforeach
        @endif
<div class="container p-3" >
    <div class="row justify-content-center">
        <div class="col-md-14 card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row"> 
                        <x-slot name="header">
                            <h2 class="d-flex flex-row justify-content-end font-semibold text-xl leading-tight fw-bold" style="text-transform:uppercase; text-shadow: 4px 4px 5px #a3a3a3;color:#728a8d;font-size:28px">
                            <a href="{{route("charge.index")}}">
                            <button type="button" class="ajouter import"><i class="fa fa-arrow-left" style="font-size:23px;"></i> Retour </button>
                        </a>  
                    </h2>
                    </x-slot> 
                     <div class="d-flex flex-row justify-content-between align-items-center  pb-2">
                                <h3 class="border-bottom mb-3 p-2" style="color: #a45e5f"> <i class="fa fa-cloud-upload" aria-hidden="true"></i> Importer charge
                                  </h3>
                    </div><br>
                <form action="{{ route('uploadC') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <div class=" d-flex flex-row text-left">
                            <label class=" col-form-label labelStyle me-5" style="font-size:1.4rem; color: #003048" for="customFile">Choisir un fichier :</label>
                           <input type="file" name="file"class="custom-file-input" id="customFile" style=" border-radius:8px; font-size:1.25rem;">
                            
                        </div>
                    </div>
                    <div class="form-group pull-right" >
                        <button type="submit" class="btn2 " > Importer charge </button>
                        <button class="btn2 "><a type="button" style="text-decoration: none;  color:white"  href="{{route("charge.index")}}" > Annuler</a></button>
                    </div>
                </form>
               </div> 
            </div>
        </div>
   </div>
</div>
@endsection
</x-app-layout>