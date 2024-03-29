<?php

namespace App\Http\Controllers\Nominas\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nomina\Gestion\NominaRequest;
use App\Http\Requests\Nomina\Gestion\CargaNominaRequest;
use App\Models\Cliente;
use App\Models\Nomina;
use App\Models\Persona;
use App\Models\Regalia;
use App\Models\User;
use App\Mail\CorreoPrismadMusic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Svg\Tag\Rect;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 2) {
            return redirect('admin');
        }
        $nominas = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->join('nomina', 'cliente.id', '=', 'nomina.cliente_id')
            ->select(
                'users.email',
                'persona.nombre',
                'persona.apellido',
                'persona.telefono',
                'cliente.nombre_artistico',
                'nomina.id',
                'nomina.created_at',
                'nomina.desprendible',
                'nomina.valor',
                'nomina.numero_cuenta',
                'nomina.nombre_banco',
                'nomina.tipo_cuenta',
                'nomina.valor'
            )
            ->where('role_id', 2)
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
        $session = Auth::user();
        $cliente = Cliente::join('persona', 'persona.id', 'cliente.persona_id')
            ->join('users', 'users.id', '=', 'persona.user_id')
            ->where('users.id', $session->id)
            ->where('users.registro_confirmed', 1)
            ->where('users.role_id', 2)
            ->select('cliente.*', 'persona.*', 'cliente.id as id_cliente')
            ->first();
        return view('nomina.gestion.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NominaRequest $request)
    {
        try{
            $users = User::whereIn('role_id', [1, 3])->get();
            $user = Auth::user();
            $restante = 0.0;
            DB::beginTransaction();
            $nomina = new Nomina;
                $nomina->cliente_id     = $request->idCliente;
                $nomina->nombre_banco   = $request->nombre_banco;
                $nomina->numero_cuenta  = $request->numero_cuenta;
                $nomina->tipo_cuenta    = $request->tipo_cuenta;
                $nomina->valor          = $request->valor;
                $nomina->created_at     = now();
                $nomina->save();

            $regalias = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->join('regalia', 'cliente.id', '=', 'regalia.cliente_id')
            ->select(
                'regalia.valor',
                'regalia.id',
                'cliente.nombre_artistico',
                'cliente.link_spoty',
                'persona.nombre',
                'persona.apellido',
                'persona.telefono'
            )
            ->where('users.role_id',2)
            ->where('users.id', $user->id)
            ->whereNull('nomina_id')
            ->get();

            $suma = 0.0;
            $aprobadoRegalias = false;
            foreach ($regalias as $regalia) {
                $suma += $regalia->valor;
                //para cuando la suma supera el valor solicitado por el cliente
                if($suma >= $request->valor){
                    $aprobadoRegalias = true;
                    $restante = $suma - $request->valor;
                    $update_regalia = Regalia::find($regalia->id);
                    $update_regalia->nomina_id = $nomina->id;
                    $update_regalia->tipo=NULL;
                    $update_regalia->save();
                    foreach ($users as $moderador) {
                        $details = [
                            'title' => 'Asunto: Hay una nueva solicitud de nomina',
                            'subtitle' => 'Sr(a). ' . $moderador->name . '. Un nuevo artista solicito un pago con nombre artístico: ' . $regalia->nombre_artistico,
                            'body' => 'Un usuario ha pedido un pago: ' .
                                'Nombre: ' . $regalia->nombre . ', Apellido: ' . $regalia->apellido . ', Celular: ' . $regalia->telefono . 'Link spotify: ' . $regalia->link_spoty,
                            'descripcion' => 'Buen día',
                            'button' => 'Revisa en el portal',
                            'enlace' => url('/nomina')
                        ];
                        Mail::to($moderador->email)->send(new CorreoPrismadMusic($details));
                    }
                    break;
                }else{
                    //para cuando la suma no supera el valor solicitado
                    $update_regalia = Regalia::find($regalia->id);
                    $update_regalia->nomina_id = $nomina->id;
                    $update_regalia->tipo=NULL;
                    $update_regalia->save();
                }
            }
            //si hay sobrante, se crea regalia ficticia
            if($restante > 0.0){
                $regalia_sobrante = new Regalia;
                $regalia_sobrante->cliente_id            = $request->idCliente;
                $regalia_sobrante->fecha_informe_inicio  = date("Y-m-d");
                $regalia_sobrante->fecha_informe_final   = date("Y-m-d");
                $regalia_sobrante->valor                 = $restante;
                if($regalia_sobrante->tipo = null || 1){
                    $regalia_sobrante->tipo                  = 1;
                }
                if ($regalia_sobrante->tipo = 2 || 3){
                    $regalia_sobrante->tipo                  = 3;
                }
                $regalia_sobrante->save();
            }

            if($aprobadoRegalias == false){
                $notification = array(
                    'message' => '¡Error en la Solicitud de Pago, fondos insusficientes!',
                    'alert-type' => 'warning'
                );
                return back()->withInput()->with($notification);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $notification = array(
                'message' => $e->getLine()." ".$e->getMessage(),
                'alert-type' => 'warning'
            );
            return back()->withInput()->with($notification);
        }

        $notification = array(
            'message' => 'Solicitud creada exitosamente!',
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
        $nomina     = Nomina::find($id);
        $client     = Cliente::find($nomina->cliente_id);
        $persona    = Persona::find($client->persona_id);
        $clientes   = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->select('users.*', 'persona.*', 'cliente.*')
            ->where('role_id', 2)
            ->where('registro_confirmed', 1)
            ->get();
        return view('nomina.gestion.edit', compact('nomina', 'persona', 'clientes', 'client'));
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
    public function update(CargaNominaRequest $request, $id)
    {
        $nomina = Nomina::find($id);
        //Guardado y path del archivo
        $filename = "";
        if ($xlsArchivo = $request->file('fileDesprendible')) {
            $destinoXls = 'Nomina/' . date('FY') . '/';
            $profileXls  = time() . '.' . $xlsArchivo->getClientOriginalExtension();
            $filename = $destinoXls . $profileXls;
            $xlsArchivo->move('storage/' . $destinoXls, $profileXls);
        };

        //Control de archivos vacios
        $nomina->cliente_id = $request->idCliente;
        if ($filename != "") {
            $nomina->desprendible = $filename;
        } else {
            $nomina->desprendible = $nomina->desprendible;
        }

        $nomina->fecha_informe  = $request->fecha_Desprendible;
        $nomina->save();
        $notification = array(
            'message' => 'Nomina cargada exitosamente!',
            'alert-type' => 'success'
        );

        return redirect('nomina')->with($notification);
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

    public function solicitudPagoDenegado()
    {
        $notification = array(
            'message' => '¡Saldo insuficiente para realizar su solicitud!',
            'alert-type' => 'warning'
        );

        return redirect('admin')->with($notification);
    }
}
