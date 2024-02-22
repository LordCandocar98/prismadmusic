<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Models\Cancion;
use App\Models\Persona;
use App\Models\Repertorio;
use App\Models\ColaboracionArtFea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 3){ //Moderador
            // $repertorio = Repertorio::where('terminado', '=', 1)->get();
            $repertorio = DB::table('repertorio')
            ->join('cancion', 'cancion.repertorio_id', '=', 'repertorio.id')
            ->leftjoin('colaboracion_art_feas as caf', 'caf.cancion_id', '=', 'cancion.id')
            ->where('repertorio.terminado', '=', 1)
            ->select(
                'repertorio.*', 
                // DB::raw('GROUP_CONCAT(DISTINCT caf.nombre) as artPrincipal')
                DB::raw('GROUP_CONCAT(DISTINCT CASE WHEN caf.tipo_colaboracion = "Artista Principal" THEN caf.nombre ELSE NULL END) as artPrincipal')
            )
            ->groupBy('repertorio.id')
            ->orderBy('repertorio.id','desc')
            ->get();
            // dd($repertorio);
            return view('producto.index', ['repertorio' => $repertorio]);
        }else{
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
        if(Auth::user()->role_id == 3){
            return redirect()->route('producto.index');
        }else{
            return redirect()->route('repertorio.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role_id == 3){
            return redirect()->route('producto.index');
        }else{
            return redirect()->route('repertorio.index');
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
        if(Auth::user()->role_id == 3){
            $repertorio = Repertorio::find($id);
            $canciones = Cancion::where('repertorio_id', '=', $id)->get();
            $colaboradores = ColaboracionArtFea::whereIn('cancion_id', $canciones->pluck('id'))->get();
            $principal = Persona::where('id', '=', $repertorio->artista_principal)->get();
            return view('producto.show', compact('repertorio', 'canciones', 'principal', 'colaboradores'));
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
        if(Auth::user()->role_id == 3){
            return redirect()->route('producto.index');
        }else{
            return redirect()->route('repertorio.index');
        }
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
        if(Auth::user()->role_id == 3){
            $repertorio = Repertorio::find($id);
            $repertorio->procesado = 1;
            $repertorio->save();
            return redirect()->route('producto.index');
        }else{
            return redirect()->route('repertorio.index');
        }
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
