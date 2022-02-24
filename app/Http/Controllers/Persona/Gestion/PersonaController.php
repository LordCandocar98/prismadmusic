<?php

namespace App\Http\Controllers\Persona\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
    {

        $accion="";
        $metodo="";
        $user = Auth::user();
        $persona = Persona::find($user->id);
        $cliente = Cliente::find($persona->id);

        if($cliente->nombre_artistico == $user->email){ //Es colaborador
            $metodo="PATCH";
            $accion="registro/{".$persona->id."}";
        }else{
            $metodo="post";
            $accion="registro.store";
        }
        if (Auth::user()->registro_confirmed == 0){
            return view('registro/index',compact('accion','metodo'));
        }
        return redirect('admin');
    }

    public function indexColaboradores()
    {
        $accion="registro.store";
        $metodo="PATCH";
        // $user = Auth::user();
        // $persona = Persona::find($user->id);
        // $cliente = Cliente::find($persona->id);
        if (Auth::user()->registro_confirmed == 0){
            return view('registro/index',compact('accion','metodo'));
        }
        return redirect('admin');
    }


    public function store(RegistroRequest $request)
    {
        // Pasar a usuario verificado
        User::where('id', Auth::user()->id)->update([
            'registro_confirmed'    => 1,
        ]);

        // Pasar imagen de formato base64/png a png
        $image = $request->firma;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(16).'.'.'png';
        $file = public_path(). '/storage'. '/firma' . '/'. $imageName;
        $firma = file_put_contents($file, base64_decode($image));

        $persona = Persona::create([
            'nombre'                => $request->nombre,
            'apellido'              => $request->apellido,
            'pais'                  => $request->pais,
            'ciudad'                => $request->ciudad,
            'departamento'          => $request->departamento,
            'tipo_documento'        => $request->tipo_documento,
            'numero_identificacion' => $request->numero_identificacion,
            'telefono'              => $request->telefono,
            'firma'                 => storage_path(). '/' . $imageName,
            'user_id'               => auth()->id(), //AGARRA EL ID DE LA SESIÓN ACTUAL
            'role_id'               => 2,
        ]);

        Cliente::create([
            'nombre_artistico'        => $request->nombre_artistico,
            'link_spoty'              => $request->link_spoty,
            'numero_cuenta_bancaria'  => $request->numero_cuenta_bancaria,
            'tipo_cuenta_bancaria'    => $request->tipo_cuenta_bancaria,
            'persona_id'              => $persona->id,
            'nombre_banco'            => $request->nombre_banco,
            'archivo_banco'           => $request->archivo_banco,
        ]);
        $notification = array(
            'message' => 'Registro completado exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('admin')->with($notification);
    }

    public function update($id,RegistroRequest $request)
    {

        // Pasar imagen de formato base64/png a png
        $image = $request->firma;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(16).'.'.'png';
        $file = public_path(). '/storage'. '/firma' . '/'. $imageName;
        $firma = file_put_contents($file, base64_decode($image));

        $persona = Persona::find($id);
        $persona->nombre = $request->nombre;
        $persona->apellido            = $request->apellido;
        $persona->pais                = $request->pais;
        $persona->ciudad              = $request->ciudad;
        $persona->departamento        = $request->departamento;
        $persona->tipo_documento      = $request->tipo_documento;
        $persona->numero_identificacion = $request->numero_identificacion;
        $persona->telefono            = $request->telefono;
        $persona->firma               = storage_path(). '/' . $imageName;
        $persona->user_id             = auth()->id();
        $persona->role_id             = 2;
        $persona->save();

        $cliente = Cliente::find($persona->id);
        $cliente->nombre_artistico       = $request->nombre_artistico;
        $cliente->link_spoty             =$request->link_spoty;
        $cliente->numero_cuenta_bancaria =$request->numero_cuenta_bancaria;
        $cliente->tipo_cuenta_bancaria   =$request->tipo_cuenta_bancaria;
        $cliente->persona_id             =$persona->id;
        $cliente->nombre_banco           =$request->nombre_banco;
        $cliente->archivo_banco          =$request->archivo_banco;
        $cliente->save();

        $notification = array(
            'message' => 'Registro completado exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('admin')->with($notification);
    }
}
