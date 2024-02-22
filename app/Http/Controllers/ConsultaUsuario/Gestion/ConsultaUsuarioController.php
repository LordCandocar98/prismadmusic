<?php

namespace App\Http\Controllers\ConsultaUsuario\Gestion;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ConsultaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consultaUsuarios.index');
    }

    public function getUsuariosDatatable()
    {
        $users = DB::table('users')
            ->join('persona', 'users.id', '=', 'persona.user_id')
            ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
            ->leftJoin('regalia','cliente.id','=','regalia.cliente_id')
            ->whereNull('regalia.nomina_id')
            ->select(
                'users.email',
                DB::raw('CONCAT(persona.nombre," ",persona.apellido) AS nombre_completo'),
                DB::raw('CONCAT(persona.tipo_documento," ",persona.numero_identificacion) AS documento_identidad'),
                DB::raw("CONCAT( 'USD ', SUM(IFNULL(regalia.valor, 0))) AS saldo_total")
            )
            ->where('users.role_id', 2)
            ->groupBy('persona.id', 'users.email', 'nombre_completo', 'documento_identidad')
            ->get();
 
        return Datatables::of($users)
            ->make(true);    
    }
}