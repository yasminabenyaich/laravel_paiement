<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
// On fait une route ,on apelle la méthode Show et Index => ON va compléter nos controller
Route::get('/boutique',[ ProductController::class,"index"])->name('products.index');
Route::get('/boutique/{slug}',[ProductController::class,"show"])->name('products.show');

// Carte route => L'ajout d'un produit dans le panier
Route::post('/panier/ajouter',[CartController::class,"store"])->name('cart.store');
// Dans l'index on affiche le panier avec tous nos produits
Route::get('/panier',[CartController::class,"index"])->name('cart.index');