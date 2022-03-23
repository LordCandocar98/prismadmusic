<?php

namespace App\Http\Controllers\Cancion\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cancion\CancionRequest;
use App\Mail\CorreoPrismadMusic;
use App\Models\Cancion;
use App\Models\Colaboracion;
use App\Models\Persona;
use App\Models\Cliente;
use App\Models\ColaboracionRepertorio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesion = Auth::user();
        $canciones = DB::table('users')
            ->join('colaboracion', 'users.email', '=', 'colaboracion.cliente_email')
            ->join('cancion', 'colaboracion.cancion_id', '=', 'cancion.id')
            ->where('users.role_id', 2)
            ->where('users.id', $sesion->id)
            ->get();
        return view('cancion.gestion.index', compact('canciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = DB::table('cliente')
            ->select('cliente.nombre_artistico', 'cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $clientes2 = DB::table('cliente')
            ->select('cliente.nombre_artistico', 'cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $clientes3 = DB::table('cliente')
            ->select('cliente.nombre_artistico', 'cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');

        $sesion = Auth::user();
        $repertorios = DB::table('users')
            ->join('colaboracion_repertorio', 'users.email', '=', 'colaboracion_repertorio.cliente_email')
            ->join('repertorio', 'colaboracion_repertorio.repertorio_id', '=', 'repertorio.id')
            ->where('users.role_id', 2)
            ->where('users.id', $sesion->id)
            ->get();

        if (Auth::user()->registro_confirmed == 0) { // *********CORREGIR ÉSTO PARA CUADRAR LOS PERMISOS**********
            return view('cancion.gestion.create')
                ->with('clientes', $clientes)
                ->with('clientes2', $clientes2)
                ->with('clientes3', $clientes3)
                ->with('repertorios', $repertorios);
        }

        return view('cancion.gestion.create')
            ->with('clientes', $clientes)
            ->with('clientes2', $clientes2)
            ->with('clientes3', $clientes3)
            ->with('repertorios', $repertorios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CancionRequest $request)
    {
        $colaboraciones = json_decode($request->colaboradores);
        $colaboraciones_existentes = json_decode($request->colaboradores_existentes);
        $contar_exist = 0;

        foreach ($colaboraciones_existentes as $colaborador_especifico) {
            if ($colaborador_especifico->cliente_email == "" || $colaborador_especifico->porcentaje_intelectual == "" || $colaborador_especifico->tipo_colaboracion == null) {
                if ($colaborador_especifico->cliente_email == "" && $colaborador_especifico->porcentaje_intelectual == "" && $colaborador_especifico->tipo_colaboracion == null) {
                    unset($colaboraciones_existentes[$contar_exist]);
                    $contar_exist--;
                } else {
                    $notification = array(
                        'message' => 'Debe llenar todos los datos del colaborador registrado en plataforma.',
                        'alert-type' => 'warning'
                    );
                    return back()->withInput()->with($notification);
                }
            }
            $contar_exist++;
        }
        if ($song = $request->file('pista_mp3')) {
            $destinoCancion = 'canciones/' . date('FY') . '/';
            $cancionArchivo  = time() . '.' . $song->getClientOriginalExtension();
            $filename = $destinoCancion . $cancionArchivo;
            $song->move('storage/' . $destinoCancion, $cancionArchivo);
        };
        $cancion = [];

        $contadorPrincipal = 0;
        $contadorArtistas = 0;
        $porcentaje_total = $request->porcentaje_intelectualCreador;
        $porcentaje_total1 = 0;
        $porcentaje_total2 = 0;

        //Validar que los correos a invitar NO existan en la base de datos
        $usuarios_registrados = DB::table('users')->get();
        //dd($usuarios_registrados);
        foreach ($colaboraciones as $colaborador_especifico) {
            foreach($usuarios_registrados as $usuario_registrado){
                if ($colaborador_especifico->email == $usuario_registrado->email) {
                    $notification = array(
                        'message' => 'No puedes invitar a alguien que ya pertenece a Prismad Music, correo existente: '.$usuario_registrado->email,
                        'alert-type' => 'warning'
                    );
                    return back()->withInput()->with($notification);
                }
            }
        }
        //---------------------------------------------------------------

        foreach ($colaboraciones_existentes as $colaborador_especifico) {
            $porcentaje_total1 += $colaborador_especifico->porcentaje_intelectual;
        }
        foreach ($colaboraciones as $colaborador_invitado) {
            $porcentaje_total2 += $colaborador_invitado->porcentaje_intelectual;
        }

        $porcentaje_total = $porcentaje_total1 + $porcentaje_total2 + $porcentaje_total;

        if ($request->tipo_colaboracionCreador == "Principal") {
            $contadorPrincipal += 1;
        }

        foreach ($colaboraciones_existentes as $colaborador_especifico) {
            if ($colaborador_especifico->tipo_colaboracion == "Principal") {
                $contadorPrincipal += 1;
            }
        }
        foreach ($colaboraciones as $colaborador_invitado) {
            if ($colaborador_invitado->tipo_colaboracion == "Principal") {
                $contadorPrincipal += 1;
            }
        }

        foreach ($colaboraciones_existentes as $colaborador_especifico) {
            $auxID = $colaborador_especifico->cliente_email;
            $auxCOL = $colaborador_especifico->tipo_colaboracion;
            $auxPOR = $colaborador_especifico->porcentaje_intelectual;
            foreach ($colaboraciones_existentes as $i) {
                if ($i->cliente_email == $auxID && !$i->porcentaje_intelectual == $auxPOR && !$i->tipo_colaboracion == $auxCOL) {
                    $contadorArtistas += 1;
                }
            }
        }
        foreach ($colaboraciones as $colaborador_invitado) {
            if ($colaborador_invitado->email != NULL) {
                $auxID2 = $colaborador_invitado->email;
                $auxCOL2 = $colaborador_invitado->tipo_colaboracion;
                $auxPOR2 = $colaborador_invitado->porcentaje_intelectual;
                foreach ($colaboraciones as $j) {
                    if ($j->email == $auxID2 && !$j->porcentaje_intelectual == $auxPOR2 && !$j->tipo_colaboracion == $auxCOL2) {
                        $contadorArtistas += 1;
                    }
                }
            }
        }

        if ($porcentaje_total > 100 || $porcentaje_total < 100) { //No coinciden los porcentajes
            $notification = array(
                'message' => 'La suma total de los porcentajes intelectuales no coincide (Supera o es Menor a 100%). Total actual: ' . $porcentaje_total,
                'alert-type' => 'warning'
            );
            return back()->withInput()->with($notification);
            //dd("La suma total de los porcentajes intelectuales no coincide (Supera o es Menor a 100%)", $porcentaje_total);
        }
        if ($contadorPrincipal == 0) { //No hay Principa
            $notification = array(
                'message' => 'No ha especificado el artista principal',
                'alert-type' => 'warning'
            );
            return back()->withInput()->with($notification);
            //dd("No hay artista Principal");
        }
        if ($contadorPrincipal > 1) { //Hay más de un Principal
            $notification = array(
                'message' => 'Se ha especificado más de 1 artista principal',
                'alert-type' => 'warning'
            );
            return back()->withInput()->with($notification);
            //dd("Hay más de 1 artista Principal", $contadorPrincipal);
        }
        if ($contadorArtistas > 1) { //Hay más de un Artista o Email
            $notification = array(
                'message' => 'Hay email repetidos en la colaboración',
                'alert-type' => 'warning'
            );
            return back()->withInput()->with($notification);
            //dd("Emails repetidos ..... Artistas repetidos", $contadorArtistas);
        } else {
            //Ciclo perrón
            $cancion = Cancion::create([
                'tipo_secundario'         => $request->tipo_secundario,
                'instrumental'            => $request->instrumental,
                'titulo'                  => $request->titulo,
                'version_subtitulo'       => $request->version_subtitulo,
                'autor'                   => $request->autor,
                'compositor'              => $request->compositor,
                'arreglista'              => $request->arreglista,
                'productor'               => $request->productor,
                'pline'                   => $request->pline,
                'annio_produccion'        => $request->annio_produccion,
                'genero'                  => $request->genero,
                'subgenero'               => $request->subgenero,
                'genero_secundario'       => $request->genero_secundario,
                'subgenero_secundario'    => $request->subgenero_secundario,
                'letra_chocante_vulgar'   => $request->letra_chocante_vulgar,
                'inicio_previsualizacion' => $request->inicio_previsualizacion,
                'idioma_titulo'           => $request->idioma_titulo,
                'idioma_letra'            => $request->idioma_letra,
                'fecha_principal_salida'  => $request->fecha_principal_salida,
                'repertorio_id'           => $request->repertorio_id,
                'pista_mp3'               => $filename,
            ]);
            //---CREADOR COLAB. CANCIÓN--
            $sesion = Auth::user();
            Colaboracion::create([
                'nombre_colaboracion'     => $request->nombre_colaboracion,
                'cancion_id'              => $cancion->id,
                'tipo_colaboracion'       => $request->tipo_colaboracionCreador,
                'porcentaje_intelectual'  => $request->porcentaje_intelectualCreador,
                'cliente_email'           => $sesion->email,
            ]);
            //----------
            foreach ($colaboraciones_existentes as $colaborador_especifico) {
                if ($colaborador_especifico->cliente_email != NULL) {
                    $user_colaborador = User::where('email', $colaborador_especifico->cliente_email)->first();
                    //dd($user_colaborador);
                    $persona_colaborador = Persona::where('user_id', $user_colaborador->id)->first();
                    //dd($persona_colaborador);
                    $cliente_colaborador = Cliente::where('persona_id', $persona_colaborador->id)->first();
                    //dd($cliente_colaborador);

                    Colaboracion::create([
                        'nombre_colaboracion'     => $request->nombre_colaboracion,
                        'cancion_id'              => $cancion->id,
                        'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                        'porcentaje_intelectual'  => $colaborador_especifico->porcentaje_intelectual,
                        'cliente_email'           => $colaborador_especifico->cliente_email,
                    ]);
                    ColaboracionRepertorio::create([
                        'repertorio_id'           => $request->repertorio_id,
                        'cliente_email'           => $colaborador_especifico->cliente_email,
                        'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                        'spotify_colaboracion'    => $cliente_colaborador->link_spoty,
                    ]);
                }
            }
            foreach ($colaboraciones as $colaborador_invitado) {
                if ($colaborador_invitado->email != NULL) {
                    $usuario = User::create([
                        'email'    => $colaborador_invitado->email,
                        'name'     => $colaborador_invitado->email,
                        'password' => Hash::make('password'),
                        'role_id'  => 2,
                        'confirmation_code' => Str::random(40),
                    ]);
                    // Send confirmation code---------------------------------------------------------------
                    $sesion = Auth::user();
                    $persona = Persona::where('user_id', $sesion->id)->first();
                    $cliente = Cliente::where('persona_id', $persona->id)->first();

                    $details = [
                        'title' => 'Asunto: ¡Te invito a Prismad Music!',
                        'subtitle' => $cliente->nombre_artistico . ' te invita a formar parte de su nuevo éxito "' . $cancion->titulo . '"',
                        'body' => 'En Prismad Music nos encanta apoyar el espíritu musical, ¿qué esperas para unirte?, tu contraseña es: " password ", ¡recuerda cambiarla!, Acepta a continuación.',
                        'descripcion' => '',
                        'button' => 'Ingresa al portal',
                        'enlace' => url('register/verify/' . $usuario->confirmation_code),
                    ];
                    Mail::to($usuario->email)->send(new CorreoPrismadMusic($details));

                    $persona = Persona::create([
                        'user_id'               => $usuario->id,
                    ]);
                    $cliente = Cliente::create([
                        'nombre_artistico'        => $colaborador_invitado->email, //Poner PATCH
                        'persona_id'              => $persona->id,
                        'link_spoty'              => $colaborador_invitado->spotify_colaboracion,
                    ]);
                    Colaboracion::create([
                        'nombre_colaboracion'     => $request->nombre_colaboracion,
                        'cancion_id'              => $cancion->id,
                        'tipo_colaboracion'       => $colaborador_invitado->tipo_colaboracion,
                        'porcentaje_intelectual'  => $colaborador_invitado->porcentaje_intelectual,
                        'cliente_email'           => $usuario->email,
                    ]);
                    ColaboracionRepertorio::create([
                        'repertorio_id'           => $request->repertorio_id,
                        'cliente_email'           => $usuario->email,
                        'tipo_colaboracion'       => $colaborador_invitado->tipo_colaboracion,
                        'spotify_colaboracion'    => $colaborador_invitado->spotify_colaboracion,
                    ]);
                }
            }
        }
        //----------------------------------------------------------------------------------------------------- Fin ciclo perrón
        $notification = array(
            'message' => 'Canción añadida exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('/cancion')->with($notification);
    }

    public function verify($code)
    { //VACCA
        $user = User::where('confirmation_code', $code)->first();
        if (!$user) {
            return redirect('/');
        }
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect('/registro')->with('notification', 'Has confirmado exitosamente tu correo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancion = Cancion::find($id);
        $colaboraciones = Colaboracion::where('cancion_id', $id)->get();
        return view('cancion.gestion.show', compact('cancion', $cancion, 'colaboraciones', $colaboraciones));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
