<?php

namespace App\Http\Controllers\Repertorio\Gestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Repertorio;
use App\Models\ColaboracionRepertorio;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Repertorio\RepertorioRequest;
use App\Mail\CorreoPrismadMusic;
use App\Models\Cancion;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\ImageManagerStatic as Image;

class RepertorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $sesion = Auth::user();
        $repertorios = DB::table('users')
        ->join('colaboracion_repertorio', 'users.email', '=', 'colaboracion_repertorio.cliente_email')
        ->join('repertorio', 'colaboracion_repertorio.repertorio_id', '=', 'repertorio.id')
        ->where('users.role_id',2)
        ->where('users.id',$sesion->id)
        ->get();
        return view('repertorio.gestion.index', compact('repertorios'));
    }

    /**
     * send finished

     *
     * @return \Illuminate\Http\Response
     */

    public function finishProduct($id)
    {
        try {
            $users = DB::table('users')
            ->join('colaboracion_repertorio as cr', 'users.email', '=', 'cr.cliente_email')
            ->where('cr.repertorio_id', $id)
            ->select('users.id', 'users.role_id', 'users.name', 'users.email')
            ->get()[0];
    
            if($users->id  == auth()->user()->id){
                $repertorio = Repertorio::find($id);
                $repertorio->terminado = 1;
                $repertorio->save();
    
                $details = [
                    'title' => 'Asunto: Hora de revisar este nuevo exito!',
                    'subtitle' => $users->name . ' Acaba de finalizar la contrucción del repertorio ' .$repertorio->titulo,
                    'body' => 'En Prismad Music nos encanta apoyar el espíritu musical',
                    'descripcion' => '',
                    'button' => 'Ver Repertorio',
                    'enlace' => route('repertorio.show', $repertorio->id)
                ];
    
                $moderadores = User::where('role_id', '=',  3)->get();
    
                foreach($moderadores as $moderador){
                    Mail::to($moderador->email)->send(new CorreoPrismadMusic($details));
                }
    
                return redirect()->route('repertorio.show', $repertorio->id)->with('message', 'Producto terminado con exitosamente');
            }else{
                return redirect()->route('repertorio.index')->with('message', 'Usuario no corresponde');
            }
        } catch (Exception $e) {
            Log::debug($e->getMessage() . ' - ' . $e->getFile() . ' - ' . $e->getLine());
            return redirect()->route('repertorio.index');
        }
    }

    /**
     * Annul finished

     *
     * @return \Illuminate\Http\Response
     */

     public function annulProduct($id)
     {
         try {
             $users = DB::table('users')
             ->join('colaboracion_repertorio as cr', 'users.email', '=', 'cr.cliente_email')
             ->where('cr.repertorio_id', $id)
             ->select('users.id', 'users.role_id', 'users.name', 'users.email')
             ->get()[0];
     
             if($users->id  == auth()->user()->id){
                Repertorio::find($id)
                ->update([
                    'terminado' => 2
                ]);
     
                 return redirect()->route('repertorio.show', $id)->with('message', 'Producto Anulado exitosamente');
             }else{
                 return redirect()->route('repertorio.index')->with('message', 'Usuario no corresponde');
             }
         } catch (Exception $e) {
             Log::debug($e->getMessage() . ' - ' . $e->getFile() . ' - ' . $e->getLine());
             return redirect()->route('repertorio.index');
         }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = \DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get();

        $genre = \DB::table('genero')->select('nombre')->get();
        $subgenre = \DB::table('subgenero')->select('nombre')->get();

        if (Auth::user()->registro_confirmed == 0){ // *********CORREGIR ÉSTO PARA CUADRAR LOS PERMISOS**********
            return view('repertorio.gestion.create', compact("clientes", "genre", "subgenre"));
        }

        return view('repertorio.gestion.create', compact("clientes", "genre", "subgenre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepertorioRequest $request)
    {
        try {
            DB::beginTransaction();

            $sesion = Auth::user();

            $cliente_sesion = Cliente::join("persona","cliente.persona_id", "=", "persona.id")->where("persona.user_id", "=", $sesion->id)
            ->select("cliente.*")
            ->first();
    
            $cover =json_decode($request->cover);
            copy(storage_path() . '/app/public/portadas/tmp/' . $cover->filename, storage_path() . '/app/public/portadas/' . $cover->filename);
    
            // Imagen reducida
            $image = Image::make(storage_path() . '/app/public/portadas/' . $cover->filename);
            $image->resize($image->width() * 0.2, $image->height() * 0.2);
            $image->save(storage_path() . '/app/public/portadas/min' . $cover->filename);
    
            $repertorio = Repertorio::create([
                'titulo' => $request->titulo,
                'version' => $request->version,
                'genero' => $request->genero,
                'subgenero' => $request->subgenero,
                'nombre_sello' => $request->nombre_sello,
                'formato' => $request->formato,
                'productor' => $request->productor,
                'copyright' => 'Prismad Music',
                'annio_produccion' => $request->annio_produccion,
                'portada' => $cover->filename,
                'fecha_lanzamiento' => $request->fecha_lanzamiento,
            ]);
            ColaboracionRepertorio::create([
                'repertorio_id'           => $repertorio->id,
                'cliente_email'           => $sesion->email,
                'tipo_colaboracion'       => "Principal (1st)",
                'spotify_colaboracion'    => $cliente_sesion->link_spoty,
            ]);
    
            DB::commit();

            return redirect()->route('create_song', $repertorio->id);
        } catch (Exception $exception) {
            Log::error($exception->getLine() . ' - ' . $exception->getMessage() . ' - ' . $exception->getFile());   
            DB::rollBack();
            return redirect()->to('admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('users')
        ->join('colaboracion_repertorio as cr', 'users.email', '=', 'cr.cliente_email')
        ->where('cr.repertorio_id', $id)
        ->select('users.id', 'users.role_id')
        ->first();

        if(($users->id  == auth()->user()->id) or ($users->role_id == 3)){
            $repertorio = Repertorio::find($id);
            $canciones = Cancion::where('repertorio_id', '=', $id)->get();
            return view('repertorio.gestion.show', compact('repertorio', 'canciones', 'users'));
        }else{
            return redirect()->route('repertorio.index');
        }
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
    public function uploadcover(Request $request)
    {
        $image = Image::make($request->cover);
        $rules = [
            'cover' => 'image|mimes:jpg,png|max:35000|dimensions:min_width=3000,min_height=3000'
        ];
        $messages = [
            'cover.dimensions' => 'La imagen tiene dimensiones incorrectas '.$image->width() . ' x ' . $image->height(),
            'cover.mimes' => 'La imagen tiene formato incorrecto ' . $image->mime(),
            'cover.max' => 'La imagen supera el tamaño maximo ' . $image->filesize()
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'message' => $validator->messages()
            ], 400, [], JSON_PRETTY_PRINT);
        }

        if($image = $request->file('cover')){
            $destinoPortada = 'portadas/tmp/';
            $profileImage  = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path() . '/app/public/' . $destinoPortada, $profileImage);
        };

        return [
            'folder' => $destinoPortada,
            'filename' => $profileImage
        ];
    }

    public function upSong()
    {
        $sesion = Auth::user();
        $repertorios = DB::table('users')
        ->join('colaboracion_repertorio', 'users.email', '=', 'colaboracion_repertorio.cliente_email')
        ->join('repertorio', 'colaboracion_repertorio.repertorio_id', '=', 'repertorio.id')
        ->where([
            ['users.role_id', '=', 2],
            ['users.id', '=', $sesion->id],
            ['repertorio.terminado', '=', 0] //Repertorios No terminados
        ])
        ->get();

        if (count($repertorios) <= 0) {
            $clientes = DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get();

            $genre = DB::table('genero')->select('nombre')->get();
            $subgenre = DB::table('subgenero')->select('nombre')->get();
            return redirect()->route('repertorio.create')->with('message', 'Primero vamos a crear un Repertorio');
        } else {
            return view('repertorio.gestion.indexHelp', compact('repertorios'))->with('message', '');
        }
    }
}
