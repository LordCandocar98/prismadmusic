<?php

namespace App\Http\Controllers;

use App\Http\Requests\Repertorio\CompartirMusicaRequest;
use App\Mail\CorreoPrismadMusic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home');
    }

    public function nosotros()
    {
        return view('site.nosotros');
    }
    public function compartir()
    {
        return view('site.compartir');
    }
    public function articulo()
    {
        return view('site.articulo');
    }

    public function postCompartir(CompartirMusicaRequest $request)
    {
        $users = User::whereIn('role_id', [1, 3])->get();
        foreach ($users as $moderador) {
            $details = [
                'title' => 'Asunto: Artista quiere contactarse',
                'subtitle' => 'Sr(a). '.$moderador->name.'. Un nuevo artista busca conctactarse contigo con nombre artístico: ' . $request->nombre_artista,
                'body' => 'El artista ha compartido la siguiente información.' .
                    'Link spotify: ' . $request->link_spotify . ', Celular: ' . $request->num_celular . ', Correo electrónico: ' . $request->email,
                'descripcion' => $request->descripcion,
                'button' => 'Ingresa al portal',
                'enlace' => url('/')
            ];
            Mail::to($moderador->email)->send(new CorreoPrismadMusic($details));
        }
        return back()->with("Success", 'Mensaje exitoso');
    }
}
