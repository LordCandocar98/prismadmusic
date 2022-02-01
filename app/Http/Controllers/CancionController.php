<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cancion;
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
        if (Auth::user()->registro_confirmed == 0){ // *********CORREGIR ÉSTO PARA CUADRAR LOS PERMISOS**********
            return view('gestionClientes/gestionCancion/index')
                        ->with('clientes', $clientes)
                        ->with('clientes2', $clientes2)
                        ->with('clientes3', $clientes3);
        }
        //return redirect('admin');
        return view('gestionClientes/gestionCancion/index')
                    ->with('clientes', $clientes)
                    ->with('clientes2', $clientes2)
                    ->with('clientes3', $clientes3);
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
        if($image = $request->file('portada')){
            $destinoPortada = 'portadas/' . date('FY') . '/';
            $profileImage  = time() . '.' . $image->getClientOriginalExtension();
            $filename = $destinoPortada . $profileImage ;
            $image->move('storage/' . $destinoPortada, $profileImage);
        };

        $cancion = Cancion::create([
            'titulo'               => $request->titulo,
            'version'              => $request->version,
            'artista_principal'    => $request->artista_principal,
            'genero'               => $request->genero,
            'subgenero'            => $request->subgenero,
            'nombre_sello'         => $request->nombre_sello,
            'formato'              => $request->formato,
            'fecha_salida'         => $request->fecha_salida,
            'productor'            => $request->productor,
            'copyright'            => $request->copyright,
            'annio_produccion'     => $request->annio_produccion,
            'upc_ean'              => $request->upc_ean,
            'numero_catalogo'      => $request->numero_catalogo,
            'portada'              => $filename,
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
