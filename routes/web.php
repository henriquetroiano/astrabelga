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
});
Route::get('/catalogos', function () {
    return view('site.catalogos');
});
Route::get('/catalogo/20', function () {
    return view('site.product');
});
Route::get('/account', function () {
    return view('site.my_account');
});
Route::get('/admin', ['App\Http\Controllers\AdminController', 'index']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect('/');
});
