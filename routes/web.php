<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Cancion\Gestion\CancionController;
use App\Http\Controllers\Cancion\Gestion\HistoricoCancionController;
use App\Http\Controllers\Repertorio\Gestion\RepertorioController;
use App\Http\Controllers\Clientes\Gestion\ClientesController;
use App\Http\Controllers\Regalias\Gestion\RegaliasController;
use App\Http\Controllers\Regalias\Gestion\RegaliasVariasController;
use App\Http\Controllers\Nominas\Gestion\NominaController;
use App\Http\Controllers\Nominas\Informe\InformeNominaController;
use App\Http\Controllers\Persona\Gestion\PersonaController;
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Regalias\Informe\InformeRegaliaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


Route::group(['prefix' => 'admin', 'middleware' => 'autenticado'], function () {
    Voyager::routes();
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/register/verify/{code}', 'App\Http\Controllers\Cancion\Gestion\CancionController@verify');

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
    //Routes rol: Cliente.
    Route::resource('repertorio', RepertorioController::class);
    Route::resource('cancion', CancionController::class); //Cancion
    Route::resource('informeNomina', InformeNominaController::class);
    Route::resource('informeRegalias', InformeRegaliaController::class);
    
    Route::get('/subir-cancion', [RepertorioController::class, 'upSong']);
    Route::get('/cancion/historico/{id}', [CancionController::class, 'getDetailSong']);
    Route::get('/getCanciones', [CancionController::class, 'getCanciones']);
    Route::get('/getColaboradores', [CancionController::class, 'getColaboradoresCancion']);
    Route::get('/datatable/canciones', [CancionController::class, 'getSongsDatatable']);
    Route::get('/datatable/cancion/{id}', [CancionController::class, 'getSongDatatable']);
    
    Route::get('/cancion-creador/{id}', [CancionController::class, 'create_song'])->name('create_song');
    Route::get('/cancion-colaboracion', [CancionController::class, 'shareSong'])->name('shareSong');
    Route::post('/finishProduct/{id}', [RepertorioController::class, 'finishProduct'])->name('finishProduct');
    Route::post('/annulProduct/{id}', [RepertorioController::class, 'annulProduct'])->name('annulProduct');
    Route::post('/uploadcover', [RepertorioController::class, 'uploadcover'])->name('uploadcover');
    Route::post('/uploadsong', [CancionController::class, 'uploadsong'])->name('uploadsong');

    //Proceso de solicitud de pago de un usuario normal.
    Route::get('/nomina/create', [NominaController::class, 'create'])->name('nomina.create');
    Route::post('/nomina', [NominaController::class, 'store'])->name('nomina.store');

    //Notificacion para solicitud de pago menor a 200 dolares
    Route::get('/sinSaldo',[NominaController::class, 'solicitudPagoDenegado'])->name('sinSaldo');

    Route::group(['middleware' => ['is_mod']], function () {    
    //Route roles: ADMIN y Moderadores.
        Route::resource('clientes', ClientesController::class);
        Route::resource('regalias', RegaliasController::class);
        Route::resource('regaliasvarias', RegaliasVariasController::class);
        Route::resource('producto', ProductoController::class);
        // Route::resource('nomina', NominaController::class);
        Route::get('/nomina', [NominaController::class, 'index'])->name('nomina.index');
        Route::put('/nomina/{id}', [NominaController::class, 'update'])->name('nomina.update');
        Route::get('/nomina/{id}', [NominaController::class, 'show'])->name('nomina.show');

        //Gestion para moderador de historico canciones de clientes
        Route::resource('hitorico-cancion', HistoricoCancionController::class);
        Route::post('/hitorico-cancion/store', [HistoricoCancionController::class, 'store']);
        Route::get('/hitorico-cancion/show/{id}', [HistoricoCancionController::class, 'show']);
        Route::get('/hitorico/show/{id}', [HistoricoCancionController::class, 'showHistorico']);
        Route::put('/hitorico-cancion/update/{id}', [HistoricoCancionController::class, 'update']);
        Route::get('/hitorico-cliente/canciones/{id}', [HistoricoCancionController::class, 'indexCanciones']);
        Route::get('/index/datable-clientes', [CancionController::class, 'getClientesDatatable']);
        Route::get('/datatable/canciones-cliente', [CancionController::class, 'getSongsDatatableCliente']);
    });

    Route::group(['middleware' => ['is_admin']], function () {    
        Route::get('/clear-cache', function () {
            Artisan::call('cache:clear');
            return "Cache is cleared";
        });
    
        Route::get('/config-cache', function () {
            Artisan::call('config:cache');
            return "Cache is cleared";
        });
    });
});

// Route::post('upload', [UploadController::class, 'store']);

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