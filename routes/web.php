<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Cancion\Gestion\CancionController;
use App\Http\Controllers\Repertorio\Gestion\RepertorioController;
use App\Http\Controllers\Clientes\Gestion\ClientesController;
use App\Http\Controllers\Regalias\Gestion\RegaliasController;
use App\Http\Controllers\Nominas\Gestion\NominaController;
use App\Http\Controllers\Nominas\Informe\InformeNominaController;
use App\Http\Controllers\Persona\Gestion\PersonaController;
use App\Http\Controllers\Regalias\Informe\InformeRegaliaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


Route::group(['prefix' => 'admin', 'middleware' => 'autenticado'], function () {
    Voyager::routes();
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('register/verify/{code}','App\Http\Controllers\Cancion\Gestion\CancionController@verify'); //Vacca
//Route::get('/registro', 'App\Http\Controllers\Persona\Gestion\PersonaController@store');

Route::get('/register', function () {
    auth()->logout();
    return view('auth.registro');
})->name('register');

Route::get('/admin/login', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('login');

Route::resource('registro', PersonaController::class); //Registro de Personas con un controlador creado a mano
//Gestión de Repertorios para los rol: Cliente.
Route::resource('repertorio', RepertorioController::class); //Repertorio
Route::resource('cancion', CancionController::class); //Cancion
Route::resource('informeNomina', InformeNominaController::class);
Route::resource('informeRegalias', InformeRegaliaController::class);

Route::get('profile', function () {
    return redirect('/admin');
})->middleware('verified');

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/nosotros', [SiteController::class, 'nosotros'])->name('nosotros');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
Route::get('/compartir-musica', [SiteController::class, 'compartir'])->name('compartir');
Route::get('/articulo', [SiteController::class, 'articulo'])->name('articulo');
Route::post('/compartir-musica', [SiteController::class, 'postCompartir'])->name('compartirMusica');

//Gestión de clientes para los roles: AMIN y Moderadores.
Route::resource('clientes', ClientesController::class);

//Gestión de regalias para los roles: AMIN y Moderadores.
Route::resource('regalias', RegaliasController::class);

//Gestión de nomina para los roles: AMIN y Moderadores.
Route::resource('nomina', NominaController::class);

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-cache', function () {
    Artisan::call('cache:config');
    return "Cache is cleared";
});

Route::get('/terminos-y-condiciones', function (){
    return view('site.termino_uso.tcondiciones');
})->name('tcondiciones');

Route::get('/politicas-de-privacidad', function (){
    return view('site.termino_uso.privacidad');
})->name('privacidad');