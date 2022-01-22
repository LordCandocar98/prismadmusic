<?php

namespace App\Http\Controllers;


use App\Models\Persona; //Importamos User para poder añadir datos a la DB
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth; // LINEA DE CODIGO SUPREMA PARA OBTENER EL ROL DE VOYAGER
use App\Http\Requests\Registro\RegistroRequest;

class PersonaController extends Controller
{

    public function __construct()
    {
        $this->middleware('verified');
        //$this->middleware('is_admin'); //Middleware para permitir que sólo admins/mods registen personas
        //$this->middleware('is_mod');
        //$this->middleware('not_confirmed');
    }

    public function index()
    { //Index retorna la vista de Usuarios, por ende, acá crearemos la consulta SQL para mostrar datos de la DB
        $personas = \DB::table('persona')
            ->select('persona.*') //Seleccionamos todos los campos
            ->orderBy('id', 'DESC')
            ->get('');
        if (Auth::user()->registro_confirmed == 0){
            return view('registro/index')->with('personas', $personas); //ACÁ REDIRIGE A LA VISTA*******************************************
        }
        return redirect('admin');
    }

    public function store(RegistroRequest $request) //ACÁ REDIRIGE AL VALIDATOR*******************************
    {
        //Para recibir los valores del form
        //dd(Auth::user()->role_id); // LINEA DE CODIGO SUPREMA PARA OBTENER EL ROL DE VOYAGER
        //dd(Auth::user()); DATOS DE LA SESION
        User::where('id', Auth::user()->id)->update([
            'registro_confirmed'    => 1,
        ]);
        $persona = Persona::create([
            'nombre'                => $request->nombre,
            'apellido'              => $request->apellido,
            'pais'                  => $request->pais,
            'ciudad'                => $request->ciudad,
            'departamento'          => $request->departamento,
            'tipo_documento'        => $request->tipo_documento,
            'numero_identificacion' => $request->numero_identificacion,
            'telefono'              => $request->telefono,
            'user_id'               => auth()->id(), //AGARRA EL ID DE LA SESIÓN ACTUAL
            'role_id'               => 2, //2 de usuario normal, 3 para moderador
        ]);

        Cliente::create([
            'nombre_artistico'        => $request->nombre_artistico,
            'link_spoty'              => $request->link_spoty,
            'numero_cuenta_bancaria'  => $request->numero_cuenta_bancaria,
            'tipo_cuenta_bancaria'    => $request->tipo_cuenta_bancaria,
            'persona_id'              => $persona->id,
        ]);

        return redirect('admin');
    }
}
