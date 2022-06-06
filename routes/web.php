<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
//************************************ Produit**********************************

Route::resource('produit', ProduitController::class)->middleware("auth");
Route::get('export_produit/', [ProduitController::class, 'export_produit'])->name('exportP');
Route::get('import_produit/', [ProduitController::class, 'import_produit'])->name('importP');//la premiere de chose c'est imporation
Route::post('upload_produit/', [ProduitController::class, 'upload_produit'])->name('uploadP');
Route::get('search_produit', [ProduitController::class, 'search_produit'])->name('produit.search_produit')->middleware("auth")->middleware("auth");


//*****************************************Categorie*******************************

 Route::resource('categorie', CategorieController::class)->middleware("auth");
 Route::get('search_categorie', [CategorieController::class, 'search_categorie'])->name('categorie.search_categorie')->middleware("auth");

 
//****************************************Fournisseur*******************************

 Route::resource('fournisseur', FournisseurController::class)->middleware("auth");
 Route::get('export_Fournisseur/', [FournisseurController::class, 'export_fournisseur'])->name('exportF');
Route::get('import_fournisseur/', [FournisseurController::class, 'import_fournisseur'])->name('importF');//la premiere de chose c'est imporation
Route::post('upload_fournisseur/', [FournisseurController::class, 'upload_fournisseur'])->name('uploadF');
Route::get('search_fournisseur', [FournisseurController::class, 'search_fournisseur'])->name('fournisseur.search_fournisseur')->middleware("auth");


//*********************************************Charge*********************************

Route::resource('charge', ChargeController::class)->middleware("auth");
Route::get('export_charge/', [ChargeController::class, 'export_charge'])->name('exportC');
Route::get('import_charge/', [ChargeController::class, 'import_Charge'])->name('importC');//la premiere de chose c'est imporation
Route::post('upload_charge/', [ChargeController::class, 'upload_charge'])->name('uploadC');
Route::get('search_charge', [ChargeController::class, 'search_charge'])->name('charge.search_charge')->middleware("auth");
Route::get('Charge_non_facturé', [ChargeController::class, 'NonFacturé'])->name('charge.NonFacturé')->middleware("auth");
Route::get('Charge_facturé', [ChargeController::class, 'charge_Facturé'])->name('facture.show')->middleware("auth");

//***********************************************Service*******************************

Route::resource('service', ServiceController::class)->middleware("auth");
Route::get('search', [ServiceController::class, 'search'])->name('service.search')->middleware("auth");

 //***********************************************Piece*****************************
 Route::resource('piece', PieceController::class)->middleware("auth");

  //************************************************Home******************************
  Route::resource('home', HomeController::class)->middleware("auth");
 
 
  //***********************************************Benificiere*****************************
  Route::resource('benificiere', BenificiereController::class)->middleware("auth");
  Route::get('Charge_benificier/{benificiaire}', [BenificiereController::class, 'Charge_benificier'])->name('benificiere.Charge_benificier')->middleware("auth");
  Route::post('Annuler_Charge/{benificiaire}', [BenificiereController::class, 'Annuler_Charge'])->name('benificiere.Annuler_Charge')->middleware("auth");
  Route::get('export_benificiare/', [BenificiereController::class, 'export'])->name('exportB');
  Route::get('import_beneficiare/', [BenificiereController::class, 'import_beneficiare'])->name('importB');//la premiere de chose c'est imporation
  Route::post('upload_beneficiare/', [BenificiereController::class, 'upload_beneficiare'])->name('uploadB');
  Route::get('search_benificiaire', [BenificiereController::class, 'search_benificiaire'])->name('benificiere.search_benificiaire')->middleware("auth");
 
 
  //***********************************************Dashboard*****************************
  Route::resource('dashboard',  DashboaredController::class )->middleware("auth");


