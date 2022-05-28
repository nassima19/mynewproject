<style>
     .affix {
                top: 0;
                width: 100%;
            }
                .affix + .navbar-inverse {
                    padding-top: 70px;
                }
                .nav-link:focus {
                    color:#f69000;
                }
            .company{
                
                font-family: 'Open Sans', Arial,sans-serif;
                font-weight: bold;
                line-height: 25px;
                margin-left:0;
                 font-size: 25px;color:white;
                 text-transform:capitalize;
                 padding-left: 0%;
                 text-shadow: 2px 3px 4px#f69000;
                
        }       
</style>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar ">
    <nav class="navbar navbar-inverse navbar-fixed-top  me-5">
        <div class="float-right company me-5" ><i class="fa fa-building-o"></i> {{auth()->user()->entreprise}}</div>  
        <br>    
                                <a class="navbar-brandnav-link" href="{{ route('dashboard.index') }}" ><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> 
                                <a class="navbar-brand" href="{{ route('fournisseur.index') }}"><i class='fa fa-industry '></i> Fournisseur</a>
                                <a class="navbar-brand" href="{{ route('produit.index') }}"> <i class="fa fa-product-hunt"></i> Produit</a>
                                <a class="navbar-brand" href="{{ route('service.index') }}"> <i class="fa fa-wrench" aria-hidden="true"></i> Service</a>
                                <a class="navbar-brand " href="{{ route('categorie.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Categorie</a>
                                <a class="navbar-brand" href="{{ route('charge.index') }}"><i class="fa fa-credit-card" aria-hidden="true"></i> Charge</a>
                                <a class="navbar-brand" href="{{ route('piece.index') }}"><i class="fas fa-file-invoice" aria-hidden="true"></i> Piece</a>
                                <a class="navbar-brand" href="{{ route('benificiere.index') }}"><i class="fa fa-users" aria-hidden="true"></i> Bénéficiaire</a>

             <br>
                         @guest
                               @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                            @else
                                <li class="nav-item dropdown" style=" color:#01555f;" >
                                    <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div    class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style=" background-color:transparent;border:none">                                  
                                        
                                        <a class="dropdown-item navbar-brand" style="color:#f69000;" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                           <i class="fa fa-sign-out" style="text-transform:lowercase" aria-hidden="true"> </i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest  
                         </nav>                 
    </div>
 
