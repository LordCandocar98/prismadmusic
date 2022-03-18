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
use App\Models\Persona;

class RepertorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        //$this->middleware('is_admin'); //Middleware para permitir que sólo admins/mods registen personas
        //$this->middleware('is_mod');
        //$this->middleware('not_confirmed');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = \DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');

        if (Auth::user()->registro_confirmed == 0){ // *********CORREGIR ÉSTO PARA CUADRAR LOS PERMISOS**********
            return view('repertorio.gestion.create')->with('clientes', $clientes);
        }
        return view('repertorio.gestion.create')->with('clientes', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepertorioRequest $request) //ACÁ REDIRIGE AL VALIDATOR*******************************
    {
        $sesion = Auth::user();

        $cliente_sesion = Cliente::join("persona","cliente.persona_id", "=", "persona.id")->where("persona.user_id", "=", $sesion->id)
        ->select("cliente.id")
        ->first();

        // $persona =  Persona::where('user_id', $sesion->id)->first();
        // $cliente_sesion = Cliente::where('persona_id', $persona->id)->first();

        $colaboraciones = json_decode($request->colaboradores_repertorio);

        if($image = $request->file('portada')){
            $destinoPortada = 'portadas/' . date('FY') . '/';
            $profileImage  = time() . '.' . $image->getClientOriginalExtension();
            $filename = $destinoPortada . $profileImage ;
            $image->move('storage/' . $destinoPortada, $profileImage);
        };
        $contadorPrincipal = 0;
        foreach($colaboraciones as $colaborador_especifico){
            if($colaborador_especifico->tipo_colaboracion == "Principal"){
                $contadorPrincipal += 1;
            }
        }
        if($contadorPrincipal > 1){ //Hay más de un Principal
            dd("Hay más de 1 artista como colaborador Principal");
        }else{
            $repertorio = Repertorio::create([
                'titulo'               => $request->titulo,
                'version'              => $request->version,
                'genero'               => $request->genero,
                'subgenero'            => $request->subgenero,
                'nombre_sello'         => $request->nombre_sello,
                'formato'              => $request->formato,
                'productor'            => $request->productor,
                'copyright'            => $request->copyright,
                'annio_produccion'     => $request->annio_produccion,
                'upc_ean'              => $request->upc_ean,
                'numero_catalogo'      => $request->numero_catalogo,
                'portada'              => $filename,
                'fecha_lanzamiento'    => $request->fecha_lanzamiento,
            ]);
            foreach($colaboraciones as $colaboracion_individual){
                if($colaboracion_individual->cliente_email != NULL){
                    ColaboracionRepertorio::create([
                        'repertorio_id'           => $repertorio->id,
                        'cliente_email'           => $colaboracion_individual->cliente_email,
                        'tipo_colaboracion'       => $colaboracion_individual->tipo_colaboracion,
                        'spotify_colaboracion'    => $colaboracion_individual->spotify_colaboracion,
                    ]);
                }
            }
        }

//------------------------------------------------------------------------
        $notification = array(
            'message' => 'Repertorio creado exitosamente!',
            'alert-type' => 'success'
        );

        return redirect('admin')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repertorio = Repertorio::find($id);
        $colaboraciones = ColaboracionRepertorio::where('repertorio_id',$id)->get();
        //dd($colaboraciones);
        //dd($repertorio);
        return view('repertorio.gestion.show', compact('repertorio',$repertorio,'colaboraciones',$colaboraciones));
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
