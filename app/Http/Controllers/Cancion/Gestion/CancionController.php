<?php

namespace App\Http\Controllers\Cancion\Gestion;

use Exception;
use App\Models\User;
use App\Models\Persona;
use App\Models\Cliente;
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
use App\Models\HistoricoCancion;
use Illuminate\Support\Facades\Log;

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
        $canciones = DB::table('cancion as ca')
        ->leftJoin('repertorio as re', 're.id', '=', 'ca.repertorio_id')
        ->where('ca.titulo', 'like', '%' . $term . '%')
        ->orWhere('re.titulo', 'like', '%' . $term . '%')
        ->select('ca.id', DB::raw('CONCAT(ca.titulo, " - ", re.titulo) AS text'))
        ->get();
        return response()->json($canciones);
    }

    /**
     * Mostrar los colaboradores de las canciones
     *
     * @return \Illuminate\Http\Response
     */
    public function getColaboradoresCancion (Request $request) {
        $cancion_id = $request->cancion;

        $colaboradores = DB::table('cancion as ca')
        ->leftJoin('colaboracion as col', 'col.cancion_id', '=', 'ca.id')
        ->join('users as u', 'u.email', '=', 'col.cliente_email')
        ->where('col.cancion_id', '=', $cancion_id)
        ->select(
            'u.name as nombre',
            'u.email as correo',
            'col.porcentaje_intelectual as porcentaje'    
        )
        ->get();

        return response()->json($colaboradores);
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
        try {
            DB::beginTransaction();

            $session = Auth::user();
            $request_song = json_decode($request->pista_mp3);
            $repertorio = Repertorio::find($request->repertorio);

            copy(storage_path() . '/app/public/' . $request_song->folder . $request_song->filename, storage_path() . '/app/public/canciones/' . $request_song->filename);

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
                       
                    $persona = Persona::create([
                        'nombre' => 'default',
                        'apellido' => 'default',
                        'pais' => 'default',
                        'ciudad' => '',
                        'departamento' => '',
                        'tipo_documento' => 'cc',
                        'numero_identificacion' => 0000,
                        'telefono' => 0000,
                        'firma' => 'default',
                        'contrato'=> 'default',
                        'user_id'=> $usuario->id //AGARRA EL ID DE LA SESIÓN ACTUAL
                    ]);

                    Cliente::create([
                        'nombre_artistico' => 'default',
                        'link_spoty' => 'default',
                        'persona_id' => $persona->id
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
            $infoSpoty = $request->linkspoty ?? [];

            for ($i = 0; $i < count($infoArtista); $i++) {
                $cola = new ColaboracionArtFea();
                $cola->nombre = $infoArtista[$i];
                $cola->link_spoty = $infoSpoty[$i];
                $cola->tipo_colaboracion = "Artista Principal";
                $cola->cancion_id = $song->id;
                $cola->save();
            }

            $infoFeaturing = $request->nombrefeaturing ?? [];
            $infoSpoty_fea = $request->linkspoty_fea ?? [];

            for ($i = 0; $i < count($infoFeaturing); $i++) {
                $cola = new ColaboracionArtFea();
                $cola->nombre = $infoFeaturing[$i];
                $cola->link_spoty = $infoSpoty_fea[$i];
                $cola->tipo_colaboracion = "Featuring";
                $cola->cancion_id = $song->id;
                $cola->save();
            }

            if (($repertorio->formato == 'SINGLE') or (($repertorio->formato == 'EP') and ($repertorio->count_song() >= 5))) {
                app(RepertorioController::class)->finishProduct($repertorio->id);
            }

            DB::commit();

            return redirect()->route('repertorio.show', $request->repertorio)->with('message', 'Canción creada Correctamente');
        } catch (Exception $exception) {
            Log::error($exception->getLine() . ' - ' . $exception->getMessage() . ' - ' . $exception->getFile());   
            DB::rollBack();
            return redirect()->route('repertorio.show', $request->repertorio)->with('error', 'Error al crear la Canción, por favor comunicarse con el administrador');
        }
    }

    public function verify($code)
    {
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
            $song->move(storage_path() . '/app/public/' . $destinosong, $profilesong);
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
                    'cl.porcentaje_intelectual'
                )
                ->get();
            return DataTables::of($canciones)
                ->addColumn('participacion', function ($cancion) {
                    return $cancion->porcentaje_intelectual . '%';
                })
                ->addColumn('accion', function ($cancion) {
                    return '<a href="/cancion/historico/' . $cancion->id . '" data-id="' . $cancion->id . '" class="btn btn-info ctm-border-radius cancion"><i class="fa fa-eye"><span class="hidden-xs hidden-sm"> Ver detalle</span></i></button>';
                })
                ->rawColumns(['participacion', 'accion'])
                ->make(true);
        } catch (Exception $exception) {
            Log::error($exception->getLine() . ' - ' . $exception->getMessage() . ' - ' . $exception->getFile());   
            return response()->json([
                'code'    => 500,
                'status'  => 'error',
                'message' => $exception->getMessage()
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Obtener el detalle de una canción para su historico
     *
     * @param  int  $id de la canción solicitada
     * @return \Illuminate\Http\View
     */
    public function getDetailSong($id)
    {
        $cancion = Cancion::findOrFail($id);
        // $colaboraciones = Colaboracion::where('cancion_id', $id)->get();
        return view('cancion.gestion.detalle', compact('cancion'));
    }

    /**
     * Datatable del historico de una canción
     *
     * @param  int $id de la canción
     * @return \Illuminate\Http\Response|\Yajra\DataTables\Facades\DataTables
     */
    public function getSongDatatable(int $id)
    {
        try {
            //return $session->email;
            $canciones = HistoricoCancion::join('years', 'years.id', '=', 'historico_canciones.annio')
                ->where('cancion_id', $id)
                ->get();
            return DataTables::of($canciones)
                ->addColumn('valores', function ($cancion) {
                    return '<div class="valor">' . $cancion->valor . '</div>';
                })
                ->addColumn('mes_reporte', function ($cancion) {
                    setlocale(LC_TIME, 'es_ES');
                    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                    return $meses[$cancion->mes - 1];
                })
                ->rawColumns(['valores', 'mes_reporte'])
                ->make(true);
        } catch (Exception $exception) {
            return response()->json([
                'code'    => 500,
                'status'  => 'error',
                'message' => $exception->getMessage()
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
    /**
     * Datatable del Clientes par ver historicos de canciones por cliente
     *
     * @return \Illuminate\Http\Response|\Yajra\DataTables\Facades\DataTables
     */
    public function getClientesDatatable()
    {
        $users = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->select('users.id', 'users.registro_confirmed', 'users.email', 'users.avatar', DB::raw('CONCAT(persona.nombre," ",persona.apellido) AS nombre_completo'))
            ->where('role_id', 2)
            ->get();
        $url = env('APP_URL'); 
        return Datatables::of($users)
            ->addColumn('ver_colaboraciones', function ($user) use ($url) {
                return "<abbr title='Ver Colaboraciones'><a href='" . $url . "/hitorico-cliente/canciones/" . $user->id . "' class='btn btn-sm btn-primary pull-right edit'><i class='fa fa-external-link' aria-hidden='true'></i> Ver Colaboraciones</a></abbr>";
            })
            ->addColumn('avatar', function ($user) use ($url) {
                return '<img src="{{ asset("storage/"' . $user->avatar . '") }}" style="width:100px">';
            })
            ->addColumn('registro_confirmed', function ($user) use ($url) {
                return '<span class="label label-primary">' . $user->registro_confirmed === 0 ? "Incompleto" : "Completado" . '</span>';
            })
            ->rawColumns(['ver_colaboraciones', 'avatar', 'registro_confirmed'])
            ->make(true);    
    }

     /**
     * Datatable con listado de canciones subidas por cliente.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response|\Yajra\DataTables\Facades\DataTables
     */
    public function getSongsDatatableCliente(Request $request)
    {
        try {
            $canciones = Cancion::Join('colaboracion as cl', 'cl.cancion_id', 'cancion.id')
                ->leftJoin('historico_canciones as h_c', 'h_c.cancion_id', 'cancion.id')
                ->where('cl.cliente_email', $request->email)
                ->select(
                    'cancion.id',
                    'cancion.titulo',
                    'cancion.annio_produccion',
                    'cancion.fecha_principal_salida',
                    'cancion.link_preguardado',
                    'cl.porcentaje_intelectual',
                    DB::raw('SUM(h_c.valor) AS total')
                )
                ->groupBy(
                    'cancion.id', 
                    'cancion.titulo', 
                    'cancion.annio_produccion',
                    'cancion.fecha_principal_salida',
                    'cancion.link_preguardado',
                    'cl.porcentaje_intelectual',
                )
                ->get();
            $user = User::where('email', $request->email)->first();
            return DataTables::of($canciones)
                ->addColumn('participacion', function ($cancion) {
                    return $cancion->porcentaje_intelectual . '%';
                })
                ->addColumn('total', function ($cancion) {
                    return '<span class="valor">' . number_format($cancion->total, 2) . '</span>';
                })
                ->addColumn('link_preguardado', function ($cancion) {
                    if($cancion->link_preguardado != null){
                        return '<abbr title="Link Preguardado"><a href="' . $cancion->link_preguardado . '" target="_blank" class="btn btn-sm btn-warning pull-right edit"><i class="fa fa-external-link" aria-hidden="true"></i> Link Preguardado</a></abbr>';
                    }
                    return '-';
                })
                ->addColumn('accion', function ($cancion) use($user) {
                    return '
                        <abbr title="Cargar Link Preguardado"><a href="/hitorico/show/' .  $cancion->id . '?user=' . $user->id . '" class="btn btn-sm btn-success pull-right edit"><i class="fa fa-external-link" aria-hidden="true"></i> Cargar Link Preguardado</a></abbr>
                        <abbr title="Ver Detalle"><a href="/cancion/historico/' . $cancion->id . '" data-id="' . $cancion->id . '" class="btn btn-sm btn-info pull-right edit"><i class="fa fa-eye" aria-hidden="true"></i> Ver detalle</a></abbr>
                    ';
                })
                ->rawColumns(['accion', 'link_preguardado', 'total'])
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
