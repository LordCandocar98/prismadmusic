<?php

namespace App\Http\Controllers\Regalias\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Regalias\Varios\RegaliasVariasRequest;
use App\Models\Cliente;
use App\Models\Colaboracion;
use App\Models\Persona;
use App\Models\Regalia;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class RegaliasVariasController extends Controller
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
            ->where('role_id', 2)
            ->where('tipo',2)
            ->orWhere('tipo',3)
            //->where('pago_externo', 1)
            ->get();

            //cambiar esta view

        return view('regalias.varios.index', compact('regalias'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = DB::table('cliente as cl')
        ->join('persona as pe', 'pe.id', '=', 'cl.persona_id')
        ->select('cl.id', DB::raw('CONCAT(pe.nombre, " - ",pe.apellido) AS text'))
        ->where('cl.pago_externo', '=', 1)
        ->orderBy('cl.id', 'asc')
        ->get()
        ->pluck('text', 'id')
        ->toArray();
        return view('regalias.varios.create', compact('clientes'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegaliasVariasRequest $request)
    {
        try {
            DB::beginTransaction();
            $cliente = cliente::where('id', $request ->idcliente2) ->first();
            $valor_cliente = $request->valor2;
            $regalia = new Regalia;
            $regalia->cliente_id = $cliente->id;
            $regalia->fecha_informe_inicio =  date("Y-m-d");
            $regalia->fecha_informe_final = date("Y-m-d");
            $regalia->valor = $valor_cliente;
            $regalia->tipo = 2;
            $regalia->save();
            DB::commit();

        }
    
        catch (Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage() . ' - ' . $e->getLine() . ' ' . $e->getFile());
            $notification = array(
                'message' => $e->getLine() . " " . $e->getMessage(),
                'alert-type' => 'warning'
            );
            return back()->withInput()->with($notification);
        }
        $notification = array(
            'message' => 'Regalia creada exitosamente!',
            'alert-type' => 'success'
        );

        return redirect('regaliasvarias')->with($notification);
    }
        //
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regalia = Regalia::find($id);
        $client = Cliente::find($regalia->cliente_id);
        $persona = Persona::find($client->persona_id);
        $clientes = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->select('users.*', 'persona.*', 'cliente.*')
            ->where('pago_externo', 1)
            ->where('role_id', 2)
            ->where('registro_confirmed', 1)
            ->get();

            //cambiar esta view

        return view('regalias.gestion.edit', compact('regalia', 'persona', 'clientes', 'client'));
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
    public function update(RegaliasVariasRequest $request, $id)
    {
        
        $regalia = Regalia::find($id);
        if ($regalia->nomina_id == null) {
            //Guardado y path del archivo
            $filename = "";

            $regalia->valor                 = $request->valor;
            $regalia->save();
            $notification = array(
                'message' => 'Regalia editada exitosamente!',
                'alert-type' => 'success'
            );

            return redirect('regalias')->with($notification);
        } else {
            $notification = array(
                'message' => 'La regalia ha sido pagada, ya no se puden hacer cambios!',
                'alert-type' => 'error'
            );

            return redirect('regalias')->with($notification);
        }
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
