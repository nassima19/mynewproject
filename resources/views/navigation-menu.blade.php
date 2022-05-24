
<style>
     .affix {
                top: 0;
                width: 100%;
            }
                .affix + .navbar-inverse {
                    padding-top: 70px;
                }
</style>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <div class="navbar ">
                <nav class="navbar navbar-inverse navbar-fixed-top  ">
                                <a class="navbar-brand" href="{{ route('dashboard.index') }}" ><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                                    </a> 
                                <a class="navbar-brand" href="{{ route('fournisseur.index') }}"><i class='fa fa-industry'></i> Fournisseur</a>
                                <a class="navbar-brand" href="{{ route('produit.index') }}"> <i class="fa fa-product-hunt"></i> Produit</a>
                                <a class="navbar-brand" href="{{ route('service.index') }}"> <i class="fa fa-wrench" aria-hidden="true"></i> Service</a>

                                <a class="navbar-brand " href="{{ route('categorie.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Categorie</a>
                                <a class="navbar-brand" href="{{ route('charge.index') }}"><i class="fa fa-credit-card" aria-hidden="true"></i> Charge</a>
                                <a class="navbar-brand" href="{{ route('piece.index') }}"><i class="fas fa-file-invoice" aria-hidden="true"></i> Piece</a>
{{--                                 <a class="navbar-brand " href="{{ route('rapport') }}"><i class="fa fa-line-chart" aria-hidden="true"></i> Rapport</a>
 --}}                               
                    </nav>
            </div>
 
