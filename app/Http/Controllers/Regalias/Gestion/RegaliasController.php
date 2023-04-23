<?php

namespace App\Http\Controllers\Regalias\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Regalias\Gestion\RegaliasRequest;
use App\Models\Cliente;
use App\Models\Colaboracion;
use App\Models\Persona;
use App\Models\Regalia;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            ->where('role_id', 2)
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
        $canciones = DB::table('cancion as ca')
        ->leftJoin('repertorio as re', 're.id', '=', 'ca.repertorio_id')
        ->leftJoin('colaboracion as col', 'col.cancion_id', '=', 'ca.id')
        ->join('users as u', 'u.email', '=', 'col.cliente_email')
        ->select('ca.id', DB::raw('CONCAT(ca.titulo, " - ", re.titulo, " - ", u.name) AS text')) 
        ->orderBy('ca.id', 'asc')
        ->get()
        ->pluck('text', 'id')
        ->toArray();
        return view('regalias.gestion.create', compact('canciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegaliasRequest $request)
    {
        try {
            $filename = "";
            if ($xlsArchivo = $request->file('fileInforme')) {
                $destinoXls = 'Regalias/' . date('FY') . '/';
                $profileXls  = time() . '.' . $xlsArchivo->getClientOriginalExtension();
                $filename = $destinoXls . $profileXls;
                $xlsArchivo->move(storage_path() . '/app/public/' . $destinoXls, $profileXls);
            };
            DB::beginTransaction();
            $colaboraciones = Colaboracion::where('cancion_id', $request->idcancion)->get();
            foreach ($colaboraciones as $colaboracion) {
                $cliente = User::join('persona', 'persona.user_id', 'users.id')
                    ->join('cliente', 'cliente.persona_id', 'persona.id')
                    ->where('users.email', $colaboracion->cliente_email)
                    ->select('cliente.id', 'cliente.nombre_artistico')
                    ->first();
                $valor_cliente = round(floatval($request->valor) * ($colaboracion->porcentaje_intelectual / 100), 2);
                $regalia = new Regalia;
                $regalia->cliente_id = $cliente->id;
                $regalia->informe = $filename;
                $regalia->fecha_informe_inicio =  date('Y-m-d', strtotime($request->fecha_informe_inicio));
                $regalia->fecha_informe_final = date('Y-m-d', strtotime($request->fecha_informe_final));
                $regalia->valor = $valor_cliente;
                $regalia->save();
            }
            DB::commit();
        } catch (Exception $e) {
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
        $regalia = Regalia::find($id);
        $client = Cliente::find($regalia->cliente_id);
        $persona = Persona::find($client->persona_id);
        $clientes = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->select('users.*', 'persona.*', 'cliente.*')
            ->where('role_id', 2)
            ->where('registro_confirmed', 1)
            ->get();
        return view('regalias.gestion.edit', compact('regalia', 'persona', 'clientes', 'client'));
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
            if ($xlsArchivo = $request->file('fileInforme')) {
                $destinoXls = 'Regalias/' . date('FY') . '/';
                $profileXls  = time() . '.' . $xlsArchivo->getClientOriginalExtension();
                $filename = $destinoXls . $profileXls;
                $xlsArchivo->move(storage_path() . '/app/public/' . $destinoXls, $profileXls);
            };

            //Control de archivos vacios
            $regalia->cliente_id = $request->idCliente;
            if ($filename != "") {
                $regalia->informe = $filename;
            } else {
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
        } else {
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
