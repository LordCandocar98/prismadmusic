<?php

namespace App\Http\Controllers;

use App\Http\Requests\Repertorio\CompartirMusicaRequest;
use App\Mail\CorreoPrismadMusic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use TCG\Voyager\Models\Post;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', 'PUBLISHED')->latest()->take(3)->get();
        return view('site.home', compact('posts'));
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
                'subtitle' => 'Sr(a). ' . $moderador->name . '. Un nuevo artista busca conctactarse contigo con nombre artístico: ' . $request->nombre_artista,
                'body' => 'El artista ha compartido la siguiente información.' .
                    'Link spotify: ' . $request->link_spotify . ', Celular: ' . $request->num_celular . ', Correo electrónico: ' . $request->email,
                'descripcion' => $request->descripcion,
                'button' => 'Ingresa al portal',
                'enlace' => url('/')
            ];
            Mail::to($moderador->email)->send(new CorreoPrismadMusic($details));
        }

        if (!(User::where('email', '=', $request->email)->exists())) {
            $usuario = User::create([
                'email'    => $request->email,
                'name'     => $request->nombre_artista,
                'password' => Hash::make($request->nombre_artista),
                'role_id'  => 2,
                'confirmation_code' => Str::random(40),
            ]);

            $details = [
                'title' => 'Asunto: ¡Completa el registro!',
                'subtitle' => 'Te invitamos a completar el registro para poder tratar tus datos',
                'body' => 'En Prismad Music nos encanta apoyar el espíritu musical, ¿qué esperas para unirte?, tu contraseña es: "' . $request->nombre_artista . '", ¡recuerda cambiarla!, Acepta a continuación.',
                'descripcion' => '',
                'button' => 'Ingresa al portal',
                'enlace' => url('register/verify/' . $usuario->confirmation_code),
            ];
            Mail::to($request->email)->send(new CorreoPrismadMusic($details));
        }

        return back()->with("message", 'Por favor verifica tu bandeja de correo electrónico para completar el registro y poder procesar tus datos.');
    }


    // Posts

    public function indexPost()
    {
        $posts = Post::paginate(9);
        return view('site.posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('site.posts.show', compact('post'));
    }
}
