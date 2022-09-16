<?php

namespace App\Http\Controllers\Cancion\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Cancion;
use App\Models\HistoricoCancion;
use App\Models\Persona;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoCancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('historicoCanciones.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCanciones($id)
    {
        $user = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->select('users.id', 'users.email', DB::raw('CONCAT(persona.nombre," ",persona.apellido) AS nombre_completo'), 'persona.numero_identificacion')
            ->where('users.id', $id)
            ->first();
        // $email = $request->email;
        return view('historicoCanciones.indexHitorico', compact('user'));
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
    public function store(Request $request)
    {
        $valor_formateado = round(floatval($request->valor), 2);
        $historico = new HistoricoCancion;
        $historico->cancion_id = $request->idCancion;
        $historico->annio = $request->annio;
        $historico->mes = $request->mes;
        $historico->valor = $valor_formateado;
        $historico->save();
        $notification = array(
            'message' => 'Historico cargado exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('/cancion/historico/' . $request->idCancion)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHistorico($id, Request $request)
    {
        $cancion = Cancion::find($id);
        $user = User::find($request->user);
        $persona = Persona::where('user_id', $user->id)->first();
        return view('historicoCanciones.updateLink', compact('cancion', 'user', 'persona'));
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
        $annios = Year::all();
        return view('historicoCanciones.historicoCancion', compact('cancion', 'annios'));
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
        $cancion = Cancion::find($id);
        $cancion->link_preguardado = $request->linkPreguardado;
        $cancion->save();

        $notification = array(
            'message' => 'Link actulizado exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('/hitorico-cliente/canciones/' . $request->idCliente)->with($notification);
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
