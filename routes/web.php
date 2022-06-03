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
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Regalias\Informe\InformeRegaliaController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


Route::group(['prefix' => 'admin', 'middleware' => 'autenticado'], function () {
    Voyager::routes();
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('register/verify/{code}', 'App\Http\Controllers\Cancion\Gestion\CancionController@verify'); //Vacca
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

Route::group(['middleware' => ['auth', 'verified', 'autenticado']], function () {
    Route::resource('repertorio', RepertorioController::class); //Repertorio
    //Gestión de Repertorios para los rol: Cliente.
    Route::resource('cancion', CancionController::class); //Cancion
    Route::get('/getCanciones', [CancionController::class, 'getCanciones']);
    //Gestión de nomina para los roles: AMIN y Moderadores.
    Route::resource('nomina', NominaController::class);
    //Notificacion para solicitud de pago menor a 200 dolares
    Route::get('/sinSaldo',[NominaController::class, 'solicitudPagoDenegado'])->name('sinSaldo');
    //Gestión de clientes para los roles: AMIN y Moderadores.
    Route::resource('clientes', ClientesController::class);
    //Gestión de regalias para los roles: AMIN y Moderadores.
    Route::resource('regalias', RegaliasController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('informeNomina', InformeNominaController::class);
    Route::resource('informeRegalias', InformeRegaliaController::class);

    Route::get('/cancion-creador/{id}', [CancionController::class, 'create_song'])->name('create_song');
    Route::get('/cancion-colaboracion', [CancionController::class, 'shareSong'])->name('shareSong');
    Route::get('/finishProduct/{id}', [RepertorioController::class, 'finishProduct'])->name('finishProduct');
    Route::post('/uploadcover', [RepertorioController::class, 'uploadcover'])->name('uploadcover');
    Route::post('/uploadsong', [CancionController::class, 'uploadsong'])->name('uploadsong');
});

Route::post('upload', [UploadController::class, 'store']);

Route::get('profile', function () {
    return redirect('/admin');
})->middleware('verified');

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/nosotros', [SiteController::class, 'nosotros'])->name('nosotros');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
Route::get('/compartir-musica', [SiteController::class, 'compartir'])->name('compartir');
Route::get('/articulo', [SiteController::class, 'articulo'])->name('articulo');
Route::post('/compartir-musica', [SiteController::class, 'postCompartir'])->name('compartirMusica');

Route::get('/terminos-y-condiciones', function () {
    return view('site.termino_uso.tcondiciones');
})->name('tcondiciones');

Route::get('/politicas-de-privacidad', function () {
    return view('site.termino_uso.privacidad');
})->name('privacidad');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return "Cache is cleared";
});
