<?php

use Illuminate\Support\Facades\Auth;
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
    return view('site.home');
})->name('home');
Route::get('/catalogos', function () {
    return view('site.catalogos');
})->name('catalogos');
Route::get('/catalogo/20', function () {
    return view('site.product');
})->name('produtos');
Route::get('/account', function () {
    return view('site.my_account');
})->name('account');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/admin', function () {
    return view('site.admin.index');
})->middleware('checkadmin')->name('AdminHome');

Route::get('/admin/catalogos', ['App\Http\Controllers\AdminCatalogosController', 'index'])->middleware('checkadmin')->name('AdminCatalogos');

Route::post('/admin/catalogos/new', ['App\Http\Controllers\CatalogoController', 'store'])->middleware('checkadmin');

Route::get('/admin/catalogo/delete/{id}', ['App\Http\Controllers\CatalogoController', 'destroy'])->middleware('checkadmin');
