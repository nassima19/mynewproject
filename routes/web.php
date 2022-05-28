<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboaredController;
use App\Http\Controllers\BenificiereController;
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
 Route::resource('categorie', CategorieController::class)->middleware("auth");
 Route::resource('produit', ProduitController::class)->middleware("auth");
 Route::resource('fournisseur', FournisseurController::class)->middleware("auth");
 Route::resource('charge', ChargeController::class)->middleware("auth");
 Route::resource('service', ServiceController::class)->middleware("auth");
 Route::resource('piece', PieceController::class)->middleware("auth");
 Route::resource('home', HomeController::class)->middleware("auth");
 Route::resource('benificiere', BenificiereController::class)->middleware("auth");
 Route::get('Charge_benificier/{benificiaire}', [BenificiereController::class, 'Charge_benificier'])->name('benificiere.Charge_benificier')->middleware("auth");

 
 Route::resource('dashboard',  DashboaredController::class )->middleware("auth");


Route::get('search_produit', [ProduitController::class, 'search_produit'])->name('produit.search_produit')->middleware("auth")->middleware("auth");
Route::get('search_fournisseur', [FournisseurController::class, 'search_fournisseur'])->name('fournisseur.search_fournisseur')->middleware("auth");
Route::get('search', [ServiceController::class, 'search'])->name('service.search')->middleware("auth");
Route::get('search_categorie', [CategorieController::class, 'search_categorie'])->name('categorie.search_categorie')->middleware("auth");
Route::get('search_charge', [ChargeController::class, 'search_charge'])->name('charge.search_charge')->middleware("auth");
Route::get('Charge_non_facturé', [ChargeController::class, 'NonFacturé'])->name('charge.NonFacturé')->middleware("auth");
Route::get('Charge_facturé', [ChargeController::class, 'charge_Facturé'])->name('facture.show')->middleware("auth");
