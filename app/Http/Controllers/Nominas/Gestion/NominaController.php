<?php

namespace App\Http\Controllers\Nominas\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nomina\Gestion\NominaRequest;
use App\Models\Cliente;
use App\Models\Nomina;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $nominas = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->join('nomina', 'cliente.id', '=', 'nomina.cliente_id')
            ->select('users.*', 'persona.*', 'cliente.*', 'nomina.*')
            ->where('role_id',2)
            ->where('registro_confirmed', 1)
            ->get();
        return view('nomina.gestion.index', compact('nominas'));
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
        return view('nomina.gestion.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NominaRequest $request)
    {
        // dd($request);
        $filename = "";
        if($pdfArchivo = $request->file('fileDesprendible')){
            $destinoPdf = 'Nomina/' . date('FY') . '/';
            $profilePdf  = time() . '.' . $pdfArchivo->getClientOriginalExtension();
            $filename = $destinoPdf . $profilePdf ;
            $pdfArchivo->move('storage/' . $destinoPdf, $profilePdf);
        };
        $nomina = new Nomina;
        $nomina->cliente_id         = $request->idCliente;
        $nomina->desprendible       = $filename;
        $nomina->fecha_informe      = $request->fecha_Desprendible;
        $nomina->valor              = $request->valor;
        $nomina->save();
        $notification = array(
            'message' => 'Nomina creada exitosamente!',
            'alert-type' => 'success'
        );

        return redirect('nomina')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomina    = Nomina::find($id);
        $client     = Cliente::find($nomina->cliente_id);
        $persona    = Persona::find($client->persona_id);
        $clientes   = DB::table('users')
        ->join('persona', 'users.id', '=', 'persona.user_id')
        ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
        ->select('users.*', 'persona.*', 'cliente.*')
        ->where('role_id',2)
        ->where('registro_confirmed', 1)
        ->get();
        return view('nomina.gestion.edit', compact('nomina','persona', 'clientes','client'));
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
    public function update(NominaRequest $request, $id)
    {
        $nomina = Nomina::find($id);
        //Guardado y path del archivo
        $filename = "";
        if($xlsArchivo = $request->file('fileDesprendible')){
            $destinoXls = 'Nomina/' . date('FY') . '/';
            $profileXls  = time() . '.' . $xlsArchivo->getClientOriginalExtension();
            $filename = $destinoXls . $profileXls ;
            $xlsArchivo->move('storage/' . $destinoXls, $profileXls);
        };

        //Control de archivos vacios
        $nomina->cliente_id = $request->idCliente;
        if ($filename !="") {
            $nomina->desprendible = $filename;
        }else {
            $nomina->desprendible = $nomina->desprendible;
        }

        $nomina->fecha_informe  = $request->fecha_Desprendible;
        $nomina->valor         = $request->valor;
        $nomina->save();
        $notification = array(
            'message' => 'Nomina cargada exitosamente!',
            'alert-type' => 'success'
        );
        
        return redirect('regalias')->with($notification);
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
