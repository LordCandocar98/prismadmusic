<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\PersonaController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Clientes\Gestion\ClientesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'admin','middleware'=>'autenticado'], function () {
    Voyager::routes();
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/register', function () {
    auth()->logout();
    return view('auth.registro');
})->name('register');

Route::get('/admin/login', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('login');

Route::resource('registro', PersonaController::class);//Registro de Personas con un controlador creado a mano

Route::get('profile', function () {
    return redirect('/admin');
})->middleware('verified');

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/nosotros', [SiteController::class, 'nosotros'])->name('nosotros');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
Route::get('/gestionClientes', [ClientesController::class, 'index'])->name('gestionClientes');



Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});