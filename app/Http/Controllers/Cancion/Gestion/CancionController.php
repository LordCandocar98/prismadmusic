<?php

namespace App\Http\Controllers\Cancion\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cancion\CancionRequest;
use App\Mail\CorreoPrismadMusic;
use App\Models\Cancion;
use App\Models\Colaboracion;
use App\Models\Persona;
use App\Models\Cliente;
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
        ->join('persona', 'users.id', '=', 'persona.user_id')
        ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
        ->join('cancion', 'cliente.id', '=', 'cancion.cliente_id')
        ->where('users.role_id',2)
        ->where('users.id',$sesion->id)
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
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $clientes2 = DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $clientes3 = DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $repertorios = DB::table('repertorio')
            ->select('repertorio.titulo','repertorio.id')
            ->orderBy('id', 'DESC')
            ->get('');

        if (Auth::user()->registro_confirmed == 0){ // *********CORREGIR ÉSTO PARA CUADRAR LOS PERMISOS**********
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

        if($song = $request->file('pista_mp3')){
            $destinoCancion = 'canciones/' . date('FY') . '/';
            $cancionArchivo  = time() . '.' . $song->getClientOriginalExtension();
            $filename = $destinoCancion . $cancionArchivo ;
            $song->move('storage/' . $destinoCancion, $cancionArchivo);
        };
        $cancion = [];

        $contadorPrincipal = 0;
        $contadorArtistas = -1;
        foreach($colaboraciones_existentes as $colaborador_especifico){
            if($colaborador_especifico->tipo_colaboracion == "Principal"){
                $contadorPrincipal += 1;
            }
        }
        foreach($colaboraciones as $colaborador_invitado){
            if($colaborador_invitado->tipo_colaboracion == "Principal"){
                $contadorPrincipal += 1;
            }
        }

        foreach($colaboraciones_existentes as $colaborador_especifico){
            $auxID = $colaborador_especifico->cliente_id;
            foreach($colaboraciones_existentes as $i){
                if($i->cliente_id == $auxID){
                    $contadorArtistas += 1;
                }
            }
        }
        foreach($colaboraciones as $colaborador_invitado){
            if($colaborador_invitado->email != NULL){
                $auxID2 = $colaborador_invitado->email;
                foreach($colaboraciones as $j){
                    if($j->email == $auxID2){ //Tal vez se pregunta con él mísmo
                        $contadorArtistas += 1;
                    }
                }
            }
        }

        if($contadorPrincipal == 0){ //No hay Principal
            dd("No hay artista Principal");
        }
        if($contadorPrincipal > 1){ //Hay más de un Principal
            dd("Hay más de 1 artista Principal");
        }
        if($contadorArtistas > 1){ //Hay más de un Artista o Email
            dd("Emails repetidos ..... Artistas repetidos");
        }else{
        //Ciclo perrón
            foreach($colaboraciones_existentes as $colaborador_especifico){
                if($colaborador_especifico->cliente_id != NULL){
                    if($colaborador_especifico->tipo_colaboracion == "Principal"){
                        $cancion = Cancion::create([
                            'tipo_secundario'         => $request->tipo_secundario,
                            'instrumental'            => $request->instrumental,
                            'titulo'                  => $request->titulo,
                            'version_subtitulo'       => $request->version_subtitulo,
                            'cliente_id'              => $colaborador_especifico->cliente_id,
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
                        Colaboracion::create([
                            'nombre_colaboracion'     => $request->nombre_colaboracion,
                            'cancion_id'              => $cancion->id,
                            'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                            'porcentaje_intelectual'  => $colaborador_especifico->porcentaje_intelectual,
                            'cliente_id'              => $colaborador_especifico->cliente_id,
                        ]);
                        foreach($colaboraciones_existentes as $colaborador_especifico){
                            if($colaborador_especifico->cliente_id != NULL){
                                if($colaborador_especifico->tipo_colaboracion != "Principal"){
                                    Colaboracion::create([
                                        'nombre_colaboracion'     => $request->nombre_colaboracion,
                                        'cancion_id'              => $cancion->id,
                                        'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                                        'porcentaje_intelectual'  => $colaborador_especifico->porcentaje_intelectual,
                                        'cliente_id'              => $colaborador_especifico->cliente_id,
                                    ]);
                                }
                            }
                        }
                        foreach($colaboraciones as $colaborador_invitado){
                            if($colaborador_invitado->email != NULL){
                                if($colaborador_invitado->tipo_colaboracion != "Principal"){
                                    $usuario = User::create([
                                        'email'    => $colaborador_invitado->email,
                                        'name'     => $colaborador_invitado->email,
                                        'password' => Hash::make('password'),
                                        'role_id'  => 2,
                                        'confirmation_code' => Str::random(40), //Vacca
                                    ]);
                                    // Send confirmation code---------------------------------------------------------------
                                    $details = [
                                        'title' => 'Asunto: ¡Te invito a Prismad Music!',
                                        'subtitle' => $request->autor.' te invita a formar parte de su nuevo éxito "' . $cancion->titulo.'"',
                                        'body' => 'En Prismad Music nos encanta apoyar el espíritu musical, ¿qué esperas para unirte?, Acepta a continuación.',
                                        'descripcion' => '',
                                        'button' => 'Ingresa al portal',
                                        'enlace' => url('register/verify/'.$usuario->confirmation_code),
                                    ];
                                    Mail::to($usuario->email)->send(new CorreoPrismadMusic($details));

                                    /*$usuario_array = json_decode(json_encode($usuario), true);
                                    Mail::send('emails.confirmation_code', $usuario_array, function($message) use($usuario){ //crear el campo en laravel
                                        $message->to($usuario['email'],$usuario['name'])->subject('¡Has sido invitado a Prismad Music!');
                                    });*/
                                    //---------------------------------------------------------------------------------------
                                    $persona = Persona::create([
                                        'user_id'               => $usuario->id,
                                    ]);
                                    $cliente = Cliente::create([
                                        'nombre_artistico'        => $colaborador_invitado->email, //Poner PATCH
                                        'persona_id'              => $persona->id,
                                    ]);

                                    Colaboracion::create([
                                        'nombre_colaboracion'     => $request->nombre_colaboracion,
                                        'cancion_id'              => $cancion->id,
                                        'tipo_colaboracion'       => $colaborador_invitado->tipo_colaboracion,
                                        'porcentaje_intelectual'  => $colaborador_invitado->porcentaje_intelectual,
                                        'cliente_id'              => $cliente->id,
                                    ]);
                                }
                            }
                            // foreach($colaboraciones_existentes as $colaborador_especifico){
                            //     if($colaborador_especifico->cliente_id != NULL){
                            //         if($colaborador_especifico->tipo_colaboracion != "Principal"){
                            //             Colaboracion::create([
                            //                 'nombre_colaboracion'     => $request->nombre_colaboracion,
                            //                 'cancion_id'              => $cancion->id,
                            //                 'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                            //                 'porcentaje_intelectual'  => $colaborador_especifico->porcentaje_intelectual,
                            //                 'cliente_id'              => $colaborador_especifico->cliente_id,
                            //             ]);
                            //         }
                            //     }
                            // }
                        }
                        break;
                    }else{
                        foreach($colaboraciones as $colaborador_invitado){
                            if($colaborador_invitado->email != NULL){
                                if($colaborador_invitado->tipo_colaboracion == "Principal"){
                                    $usuario = User::create([
                                        'email'    => $colaborador_invitado->email,
                                        'name'     => $colaborador_invitado->email,
                                        'password' => Hash::make('password'),
                                        'role_id'  => 2,
                                        'confirmation_code' => Str::random(40), //Vacca
                                    ]);
                                    $persona = Persona::create([
                                        'user_id'               => $usuario->id,
                                    ]);
                                    $cliente = Cliente::create([
                                        'nombre_artistico'        => $colaborador_invitado->email,
                                        'persona_id'              => $persona->id,
                                    ]);

                                    $cancion = Cancion::create([
                                        'tipo_secundario'         => $request->tipo_secundario,
                                        'instrumental'            => $request->instrumental,
                                        'titulo'                  => $request->titulo,
                                        'version_subtitulo'       => $request->version_subtitulo,
                                        'cliente_id'              => $cliente->cliente_id,
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
                                    // Send confirmation code---------------------------------------------------------------
                                    $details = [
                                        'title' => 'Asunto: ¡Te invito a Prismad Music!',
                                        'subtitle' => $request->autor.' te invita a formar parte de su nuevo éxito "' . $cancion->titulo.'"',
                                        'body' => 'En Prismad Music nos encanta apoyar el espíritu musical, ¿qué esperas para unirte?, Acepta a continuación.',
                                        'descripcion' => '',
                                        'button' => 'Ingresa al portal',
                                        'enlace' => url('register/verify/'.$usuario->confirmation_code),
                                    ];
                                    Mail::to($usuario->email)->send(new CorreoPrismadMusic($details));
                                    /*$usuario_array = json_decode(json_encode($usuario), true);
                                    Mail::send('emails.confirmation_code', $usuario_array, function($message) use($usuario){ //crear el campo en laravel
                                        $message->to($usuario['email'],$usuario['name'])->subject('¡Has sido invitado a Prismad Music!');
                                    });*/
                                    //---------------------------------------------------------------------------------------
                                    Colaboracion::create([
                                        'nombre_colaboracion'     => $request->nombre_colaboracion,
                                        'cancion_id'              => $cancion->id,
                                        'tipo_colaboracion'       => $colaborador_invitado->tipo_colaboracion,
                                        'porcentaje_intelectual'  => $colaborador_invitado->porcentaje_intelectual,
                                        'cliente_id'              => $cliente->id,
                                    ]);

                                    foreach($colaboraciones_existentes as $colaborador_especifico){
                                        if($colaborador_especifico->cliente_id != NULL){
                                            if($colaborador_especifico->tipo_colaboracion != "Principal"){
                                                Colaboracion::create([
                                                    'nombre_colaboracion'     => $request->nombre_colaboracion,
                                                    'cancion_id'              => $cancion->id,
                                                    'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                                                    'porcentaje_intelectual'  => $colaborador_especifico->porcentaje_intelectual,
                                                    'cliente_id'              => $colaborador_especifico->cliente_id,
                                                ]);
                                            }
                                        }
                                    }

                                    foreach($colaboraciones as $colaborador_invitado){
                                        if($colaborador_invitado->email != NULL){
                                            if($colaborador_invitado->tipo_colaboracion != "Principal"){
                                                $usuario = User::create([
                                                    'email'    => $colaborador_invitado->email,
                                                    'name'     => $colaborador_invitado->email,
                                                    'password' => Hash::make('password'),
                                                    'role_id'  => 2,
                                                    'confirmation_code' => Str::random(40), //Vacca
                                                ]);
                                                // Send confirmation code---------------------------------------------------------------

                                                $details = [
                                                    'title' => 'Asunto: ¡Te invito a Prismad Music!',
                                                    'subtitle' => $request->autor.' te invita a formar parte de su nuevo éxito "' . $cancion->titulo.'"',
                                                    'body' => 'En Prismad Music nos encanta apoyar el espíritu musical, ¿qué esperas para unirte?, Acepta a continuación.',
                                                    'descripcion' => '',
                                                    'button' => 'Ingresa al portal',
                                                    'enlace' => url('register/verify/'.$usuario->confirmation_code),
                                                ];
                                                Mail::to($usuario->email)->send(new CorreoPrismadMusic($details));

                                                /*$usuario_array = json_decode(json_encode($usuario), true);
                                                Mail::send('emails.confirmation_code', $usuario_array, function($message) use($usuario){ //crear el campo en laravel
                                                    $message->to($usuario['email'],$usuario['name'])->subject('¡Has sido invitado a Prismad Music!');
                                                });*/
                                                //---------------------------------------------------------------------------------------
                                                $persona = Persona::create([
                                                    'user_id'               => $usuario->id,
                                                ]);
                                                $cliente = Cliente::create([
                                                    'nombre_artistico'        => $colaborador_invitado->email,
                                                    'persona_id'              => $persona->id,
                                                ]);
                                                Colaboracion::create([
                                                    'nombre_colaboracion'     => $request->nombre_colaboracion,
                                                    'cancion_id'              => $cancion->id,
                                                    'tipo_colaboracion'       => $colaborador_invitado->tipo_colaboracion,
                                                    'porcentaje_intelectual'  => $colaborador_invitado->porcentaje_intelectual,
                                                    'cliente_id'              => $cliente->id,
                                                ]);
                                            }
                                        }
                                        // foreach($colaboraciones_existentes as $colaborador_especifico){
                                        //     if($colaborador_especifico->cliente_id != NULL){
                                        //         if($colaborador_especifico->tipo_colaboracion != "Principal"){
                                        //             Colaboracion::create([
                                        //                 'nombre_colaboracion'     => $request->nombre_colaboracion,
                                        //                 'cancion_id'              => $cancion->id,
                                        //                 'tipo_colaboracion'       => $colaborador_especifico->tipo_colaboracion,
                                        //                 'porcentaje_intelectual'  => $colaborador_especifico->porcentaje_intelectual,
                                        //                 'cliente_id'              => $colaborador_especifico->cliente_id,
                                        //             ]);
                                        //         }
                                        //     }
                                        // }
                                    }
                                    break;
                                }
                            }
                        }
                    }
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

    public function verify($code){ //VACCA
        $user = User::where('confirmation_code', $code)->first();
        if(! $user){
            return redirect('/');
        }
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect('/registro')->with('notification','Has confirmado exitosamente tu correo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
