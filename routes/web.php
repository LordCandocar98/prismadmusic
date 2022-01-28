<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\RepertorioController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Clientes\Gestion\ClientesController;
use App\Http\Controllers\Regalias\Gestion\RegaliasController;
use App\Http\Controllers\Nominas\Gestion\NominaController;
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
Route::resource('repertorio', RepertorioController::class);//Repertorio

Route::get('profile', function () {
    return redirect('/admin');
})->middleware('verified');

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/nosotros', [SiteController::class, 'nosotros'])->name('nosotros');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

//Gestión de clientes para los roles: AMIN y Moderadores.
Route::resource('clientes', ClientesController::class);

//Gestión de regalias para los roles: AMIN y Moderadores.
Route::resource('regalias', RegaliasController::class);

//Gestión de nomina para los roles: AMIN y Moderadores.
Route::resource('nomina', NominaController::class);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});