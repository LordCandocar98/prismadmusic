<?php

namespace App\Http\Controllers\Cancion\Gestion;

use Exception;
use App\Models\User;
use App\Models\Cancion;
use App\Models\Repertorio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Colaboracion;
use App\Mail\CorreoPrismadMusic;
use App\Models\ColaboracionArtFea;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Cancion\CancionRequest;
use App\Http\Controllers\Repertorio\Gestion\RepertorioController;

/**
 * Controlador Maneja Lógica de Canciones.
 *
 * Controlador que maneja la lógica de las canciones para listar, guardar datos.
 *
 * @package    Controllers
 * @subpackage \Cancion\Gestion
 * @copyright  2022 Geem Seeders
 * @author     Santiago Roncancio <Sntgrncnc@gmail.com>
 * @author     Candido Moreno <stiivenmoreno@gmail.com>
 * @version    v1.0.1
 */
class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sesion = Auth::user();
        // $canciones = DB::table('users')
        //     ->join('colaboracion', 'users.email', '=', 'colaboracion.cliente_email')
        //     ->join('cancion', 'colaboracion.cancion_id', '=', 'cancion.id')
        //     ->where('users.role_id', 2)
        //     ->where('users.id', $sesion->id)
        //     ->get();
        // return view('cancion.gestion.index', compact('canciones'));
        return redirect()->route('repertorio.index');
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
     * Mostrar todas las canciones
     *
     * @return \Illuminate\Http\Response
     */
    public function getCanciones(Request $request)
    {
        $term = $request->term ?: '';
        $canciones = Cancion::where('titulo', 'like', '%' . $term . '%')->select('id', 'titulo as text')->get();
        return response()->json($canciones);
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
        if ($repertorio->terminado == 0) {
            return view('cancion.gestion.create', compact('repertorio', 'session'));
        } else {
            return redirect()->route('repertorio.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shareSong()
    {
        $session = Auth::user();
        $colas = Colaboracion::where('cliente_email', '=', $session->email)
            ->join('cancion', 'colaboracion.cancion_id', '=', 'cancion.id')
            ->get();

        return view('cancion.gestion.share', compact("colas"));
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
        $request_song = json_decode($request->pista_mp3);
        $repertorio = Repertorio::find($request->repertorio);

        //Ejecuto el comando para copiar los archivos de la carpeta from a to  /portadas/
        copy(public_path() . '/storage/' . $request_song->folder . '' . $request_song->filename, public_path() . '/storage/canciones/' . $request_song->filename);

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

        $info = $request->infocol ?? [];

        $cola = new Colaboracion();
        $cola->cliente_email = Auth::user()->email;
        $cola->porcentaje_intelectual = $request->porcentaje_intelectualCreador;
        $cola->cancion_id = $song->id;
        $cola->save();

        for ($i = 0; $i < count($info); $i += 2) {
            if (!(User::where('email', '=', $info[$i])->exists())) {
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
            $cola->porcentaje_intelectual = $info[$i + 1];
            $cola->cancion_id = $song->id;
            $cola->save();
        }

        $infoArtista = $request->nombreartista ?? [];

        for ($i = 0; $i < count($infoArtista); $i++) {
            $cola = new ColaboracionArtFea();
            $cola->nombre = $infoArtista[$i];
            $cola->tipo_colaboracion = "Artista Principal";
            $cola->cancion_id = $song->id;
            $cola->save();
        }

        $infoFeaturing = $request->nombrefeaturing ?? [];

        for ($i = 0; $i < count($infoFeaturing); $i++) {
            $cola = new ColaboracionArtFea();
            $cola->nombre = $infoFeaturing[$i];
            $cola->tipo_colaboracion = "Featuring";
            $cola->cancion_id = $song->id;
            $cola->save();
        }

        if (($repertorio->formato == 'SINGLE') or (($repertorio->formato == 'EP') and ($repertorio->count_song() >= 5))) {
            app(RepertorioController::class)->finishProduct($repertorio->id);
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
        if ($song = $request->file('pista_mp3')) {
            $destinosong = 'canciones/tmp/';
            $profilesong  = time() . '.' . $song->getClientOriginalExtension();
            $filename = $destinosong . $profilesong;
            $song->move('storage/' . $destinosong, $profilesong);
        };

        return [
            'folder' => $destinosong,
            'filename' => $profilesong
        ];
    }

    /**
     * Datatable con listado de canciones subidas por el usuario actual
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response|\Yajra\DataTables\Facades\DataTables
     */
    public function getSongsDatatable(Request $request)
    {
        try {
            $session = Auth::user();
            //return $session->email;
            $canciones = Cancion::Join('colaboracion as cl', 'cl.cancion_id', 'cancion.id')
                ->where('cl.cliente_email', $session->email)
                ->select(
                    'cancion.id',
                    'cancion.titulo',
                    'cancion.annio_produccion',
                    'cancion.fecha_principal_salida',
                    'cancion.link_preguardado',
                    'cl.porcentaje_intelectual')
                ->get();
            return DataTables::of($canciones)
                ->addColumn('participacion', function ($cancion) {
                    return $cancion->porcentaje_intelectual . '%';
                })
                ->addColumn('accion', function ($cancion) {
                    return '<button data-id="' . $cancion->id . '" type="button" class="btn btn-info ctm-border-radius cancion"><i class="fa fa-eye"><span class="hidden-xs hidden-sm"> Ver detalle</span></i></button>';
                })
                ->rawColumns(['participacion', 'accion'])
                ->make(true);
        } catch (Exception $exception) {
            return response()->json([
                'code'    => 500,
                'status'  => 'error',
                'message' => $exception->getMessage()
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
