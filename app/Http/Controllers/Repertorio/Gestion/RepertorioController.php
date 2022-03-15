<?php

namespace App\Http\Controllers\Repertorio\Gestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Repertorio;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Repertorio\RepertorioRequest;

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
        $repertorios = DB::table('repertorio')
        ->join('cliente', 'repertorio.artista_principal', '=', 'cliente.id')
        ->join('persona', 'cliente.persona_id', '=', 'persona.id')
        ->join('users', 'persona.user_id', '=', 'users.id')
        ->where('users.role_id',2)
        ->where('users.id',$sesion->id)
        ->get();
        //dd($repertorios);
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
        if($image = $request->file('portada')){
            $destinoPortada = 'portadas/' . date('FY') . '/';
            $profileImage  = time() . '.' . $image->getClientOriginalExtension();
            $filename = $destinoPortada . $profileImage ;
            $image->move('storage/' . $destinoPortada, $profileImage);
        };

        $repertorio = Repertorio::create([
            'titulo'               => $request->titulo,
            'version'              => $request->version,
            'artista_principal'    => $request->artista_principal,
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
