<?php

namespace App\Http\Controllers\Regalias\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Regalias\Gestion\RegaliasRequest;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Regalia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegaliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regalias = DB::table('users')
        ->join('persona', 'users.id', '=', 'persona.user_id')
        ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
        ->join('regalia', 'cliente.id', '=', 'regalia.cliente_id')
        ->select('users.*', 'persona.*', 'cliente.*', 'regalia.*')
        ->where('role_id',2)
        // ->whereNull('nomina_id')
        ->get();
        return view('regalias.gestion.index', compact('regalias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clientes = DB::table('users')
        ->join('persona', 'users.id', '=', 'persona.user_id')
        ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
        ->select('users.*', 'persona.*', 'cliente.*')
        ->where('role_id',2)
        ->where('registro_confirmed', 1)
        ->get();
        return view('regalias.gestion.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegaliasRequest $request)
    {
        $filename = "";
        if($xlsArchivo = $request->file('fileInforme')){
            $destinoXls = 'Regalias/' . date('FY') . '/';
            $profileXls  = time() . '.' . $xlsArchivo->getClientOriginalExtension();
            $filename = $destinoXls . $profileXls ;
            $xlsArchivo->move('storage/' . $destinoXls, $profileXls);
        };
        $regalia = new Regalia;
        $regalia->cliente_id            = $request->idCliente;
        $regalia->informe               = $filename;
        $regalia->fecha_informe_inicio  = $request->fecha_informe_inicio;
        $regalia->fecha_informe_final   = $request->fecha_informe_final;
        $regalia->valor                 = $request->valor;
        $regalia->save();
        $notification = array(
            'message' => 'Regalia creada exitosamente!',
            'alert-type' => 'success'
        );

        return redirect('regalias')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regalia    = Regalia::find($id);
        $client     = Cliente::find($regalia->cliente_id);
        $persona    = Persona::find($client->persona_id);
        $clientes   = DB::table('users')
        ->join('persona', 'users.id', '=', 'persona.user_id')
        ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
        ->select('users.*', 'persona.*', 'cliente.*')
        ->where('role_id',2)
        ->where('registro_confirmed', 1)
        ->get();
        return view('regalias.gestion.edit', compact('regalia','persona', 'clientes','client'));
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
    public function update(RegaliasRequest $request, $id)
    {
        $regalia = Regalia::find($id);
        if ($regalia->nomina_id == null) {
            //Guardado y path del archivo
            $filename = "";
            if($xlsArchivo = $request->file('fileInforme')){
                $destinoXls = 'Regalias/' . date('FY') . '/';
                $profileXls  = time() . '.' . $xlsArchivo->getClientOriginalExtension();
                $filename = $destinoXls . $profileXls ;
                $xlsArchivo->move('storage/' . $destinoXls, $profileXls);
            };

            //Control de archivos vacios
            $regalia->cliente_id = $request->idCliente;
            if ($filename !="") {
                $regalia->informe = $filename;
            }else {
                $regalia->informe = $regalia->informe;
            }

            $regalia->fecha_informe_inicio  = $request->fecha_informe_inicio;
            $regalia->fecha_informe_final   = $request->fecha_informe_final;
            $regalia->valor                 = $request->valor;
            $regalia->save();
            $notification = array(
                'message' => 'Regalia editada exitosamente!',
                'alert-type' => 'success'
            );
            
            return redirect('regalias')->with($notification);
        }else{
            $notification = array(
                'message' => 'La regalia ha sido pagada, ya no se puden hacer cambios!',
                'alert-type' => 'error'
            );
            
            return redirect('regalias')->with($notification);
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
