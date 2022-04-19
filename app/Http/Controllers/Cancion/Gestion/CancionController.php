<?php

namespace App\Http\Controllers\Cancion\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cancion\CancionRequest;
use App\Mail\CorreoPrismadMusic;
use App\Models\Cancion;
use App\Models\Colaboracion;
use App\Models\Repertorio;
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
        return redirect()->route('repertorio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_song(int $id)
    {
        $repertorio = Repertorio::find($id);
        $session = Auth::user();
        return view('cancion.gestion.create', compact('repertorio', 'session'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CancionRequest $request)
    {
        $session = Auth::user();
        $request_song =json_decode($request->pista_mp3);
        $repertorio = Repertorio::find($request->repertorio);
        //Ejecuto el comando para copiar los archivos de la carpeta from a to  /portadas/
        copy(public_path().'/storage/'.$request_song->folder.''.$request_song->filename, public_path().'/storage/canciones/'.$request_song->filename);

        $song = new Cancion();
        $song->repertorio_id = $request->repertorio;
        $song->tipo_secundario = $request->tipo_secundario;
        $song->instrumental = $request->instrumental;
        $song->titulo = $request->titulo;
        $song->version_subtitulo = $request->version_subtitulo;
        $song->autor = $request->autor;
        $song->compositor = $request->compositor;
        $song->arreglista = $request->arreglista;
        $song->productor = $request->productor;
        $song->pline = $request->pline;
        $song->annio_produccion = $request->annio_produccion;
        $song->genero = $repertorio->genero;
        $song->subgenero = $repertorio->subgenero;
        $song->genero_secundario = $repertorio->genero;
        $song->subgenero_secundario = $repertorio->subgenero;
        $song->letra_chocante_vulgar = $request->letra_chocante_vulgar;
        $song->inicio_previsualizacion = $request->inicio_previsualizacion;
        $song->idioma_titulo = $request->idioma_titulo;
        $song->idioma_letra = $request->idioma_letra;
        $song->fecha_principal_salida = $request->fecha_principal_salida;
        $song->pista_mp3 = $request_song->filename;
        $song->save();

        $info = $request->infocol;
        for($i = 0; $i<count($info); $i+=2){
            if(!(User::where('email', '=', $info[$i])->exists())){
                $usuario = User::create([
                    'email'    => $info[$i],
                    'name'     => $info[$i],
                    'password' => Hash::make('password'),
                    'role_id'  => 2,
                    'confirmation_code' => Str::random(40),
                ]);

                $details = [
                    'title' => 'Asunto: ¡Te invito a Prismad Music!',
                    'subtitle' => $session->email . ' te invita a formar parte de su nuevo éxito "' . $song->titulo . '"',
                    'body' => 'En Prismad Music nos encanta apoyar el espíritu musical, ¿qué esperas para unirte?, tu contraseña es: " password ", ¡recuerda cambiarla!, Acepta a continuación.',
                    'descripcion' => '',
                    'button' => 'Ingresa al portal',
                    'enlace' => url('register/verify/' . $usuario->confirmation_code),
                ];
                Mail::to($usuario->email)->send(new CorreoPrismadMusic($details));
            }

            $cola = new Colaboracion();
            $cola->cliente_email = $info[$i];
            $cola->porcentaje_intelectual = $info[$i+1];
            $cola->cancion_id = $song->id;
            $cola->nombre_colaboracion = $request->nombre_colaboracion;
            $cola->tipo_colaboracion = '';
            $cola->save();
        }

        return redirect()->route('repertorio.show', $request->repertorio);
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

    /**
     * upload cover in the product view
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function uploadsong(Request $request)
    {
        if($song = $request->file('pista_mp3')){
            $destinosong = 'canciones/tmp/';
            $profilesong  = time() . '.' . $song->getClientOriginalExtension();
            $filename = $destinosong . $profilesong ;
            $song->move('storage/' . $destinosong, $profilesong);
        };

        return [
            'folder' => $destinosong,
            'filename' => $profilesong
        ];
    }
}
