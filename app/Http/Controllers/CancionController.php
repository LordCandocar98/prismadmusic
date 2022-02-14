<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cancion;
use App\Models\Colaboracion;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cancion\CancionRequest;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = \DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $clientes2 = \DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $clientes3 = \DB::table('cliente')
            ->select('cliente.nombre_artistico','cliente.id')
            ->orderBy('id', 'DESC')
            ->get('');
        $repertorios = \DB::table('repertorio')
            ->select('repertorio.titulo','repertorio.id')
            ->orderBy('id', 'DESC')
            ->get('');

        if (Auth::user()->registro_confirmed == 0){ // *********CORREGIR ÉSTO PARA CUADRAR LOS PERMISOS**********
            return view('gestionClientes/gestionCancion/index')
                        ->with('clientes', $clientes)
                        ->with('clientes2', $clientes2)
                        ->with('clientes3', $clientes3)
                        ->with('repertorios', $repertorios);
        }
        //return redirect('admin');
        return view('gestionClientes/gestionCancion/index')
                    ->with('clientes', $clientes)
                    ->with('clientes2', $clientes2)
                    ->with('clientes3', $clientes3)
                    ->with('repertorios', $repertorios);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CancionRequest $request)
    {
        if($song = $request->file('pista_mp3')){
            $destinoCancion = 'canciones/' . date('FY') . '/';
            $cancionArchivo  = time() . '.' . $song->getClientOriginalExtension();
            $filename = $destinoCancion . $cancionArchivo ;
            $song->move('storage/' . $destinoCancion, $cancionArchivo);
        };
        $cancion = Cancion::create([
            'tipo_secundario'         => $request->tipo_secundario,
            'instrumental'            => $request->instrumental,
            'titulo'                  => $request->titulo,
            'version_subtitulo'       => $request->version_subtitulo,
            'cliente_id'              => $request->cliente_id, //ÉSTE ES EL QUE SUBE LA CANCIÓN, ARTISTA PRINCIPAL
            'featuring'               => $request->featuring, //SI ESTE CAMBIO ESTÁ LLENO, SERÁ EL QUE COMPARTA COLABORACIÓN
            'remixer'                 => $request->remixer, //SI ESTE CAMBIO ESTÁ LLENO, SERÁ EL QUE COMPARTA COLABORACIÓN
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
            'porcentaje_intelectual'  => $request->porcentaje_artistaPr,
            'cliente_id'              => $request->cliente_id,
        ]);
        if($request->featuring){
            Colaboracion::create([
                'nombre_colaboracion'     => $request->nombre_colaboracion,
                'cancion_id'              => $cancion->id,
                'porcentaje_intelectual'  => $request->porcentaje_featuring,
                'cliente_id'              => $request->featuring,
            ]);
        }
        if($request->remixer){
            Colaboracion::create([
                'nombre_colaboracion'     => $request->nombre_colaboracion,
                'cancion_id'              => $cancion->id,
                'porcentaje_intelectual' => $request->porcentaje_remix,
                'cliente_id'              => $request->remixer,
            ]);
        }
        $notification = array(
            'message' => 'Canción añadida exitosamente!',
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
