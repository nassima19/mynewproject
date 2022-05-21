<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/dashboard/index');
    })->name('dashboard');
});
/* Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/fournisseur', function () {
        return view('/fournisseur/create');
    })->name('fournisseur');
}); */

/*Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
 ])->group(function () {
    Route::get('/produit', function () {
        return view('/produit/create');
    })->name('produit');
}); */
/* Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/depence', function () {
        return view('/depence/create');
    })->name('depence');
}); */
/* Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/rapport', function () {
        return view('rapport.index');
    })->name('rapport');
});  */
/* Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/categorie', function () {
        return view('/categorie/show');
    })->name('categorie');
}); */
/* Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/categorie', function () {
        return view('/categorie/show');
    })->name('categorie');
}); */
/* Route::resource('categories', CategorieController::class);
 */


/*  Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/categories', function () {
        return view('/management/categorie/index');
    })->name('categories.index');
});  */
/* Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/categories/create', function () {
        return view('/management/categorie/create');
    })->name('categories.create');
});  */
//don't work!!!!
// 
 Route::resource('categorie', CategorieController::class);
 Route::resource('produit', ProduitController::class);
 Route::resource('fournisseur', FournisseurController::class);
 Route::resource('charge', ChargeController::class);
 Route::resource('service', ServiceController::class);
 Route::resource('piece', PieceController::class);
 Route::resource('home', HomeController::class);

Route::get('search_produit', [ProduitController::class, 'search_produit'])->name('produit.search_produit');
Route::get('search_fournisseur', [FournisseurController::class, 'search_fournisseur'])->name('fournisseur.search_fournisseur');
Route::get('search', [ServiceController::class, 'search'])->name('service.search');
Route::get('search_categorie', [CategorieController::class, 'search_categorie'])->name('categorie.search_categorie');
Route::get('search_charge', [ChargeController::class, 'search_charge'])->name('charge.search_charge');
Route::get('Charge_non_facturé', [ChargeController::class, 'NonFacturé'])->name('charge.NonFacturé');
Route::get('Charge_facturé', [ChargeController::class, 'charge_Facturé'])->name('facture.show');
