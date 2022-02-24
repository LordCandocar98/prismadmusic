<?php

namespace App\Http\Controllers;


use App\Models\Persona; //Importamos User para poder añadir datos a la DB
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // LINEA DE CODIGO SUPREMA PARA OBTENER EL ROL DE VOYAGER
use App\Http\Requests\Registro\RegistroRequest;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

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

    public function store(RegistroRequest $request)
    {
        $id = Auth::user()->id;
        // Pasar a usuario verificado
        User::where('id', $id)->update([
            'registro_confirmed'    => 0,
        ]);

        // Pasar imagen de formato base64/png a png y guardar
        $image = $request->firma;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $id.'.'.'png';
        $file = public_path(). '/storage'. '/firma' . '/'. $imageName;
        file_put_contents($file, base64_decode($image));
        // Generar documento
        $rutaDocumento = $this->generarDocumento($request, $id);

        $persona = Persona::create([
            'nombre'                => $request->nombre,
            'apellido'              => $request->apellido,
            'pais'                  => $request->pais,
            'ciudad'                => $request->ciudad,
            'departamento'          => $request->departamento,
            'tipo_documento'        => $request->tipo_documento,
            'numero_identificacion' => $request->numero_identificacion,
            'telefono'              => $request->telefono,
            'firma'                 => $file,
            'contrato'              => $rutaDocumento,
            'user_id'               => auth()->id(), //AGARRA EL ID DE LA SESIÓN ACTUAL
            'role_id'               => 2, //2 de usuario normal, 3 para moderador
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

    public function generarDocumento(Request $request, $id)
    {
        $templateProcessor = new TemplateProcessor(public_path(). '/storage'. '/plantilla' . '/contrato_prismad_music.docx');
        $templateProcessor->setValues(
            array(
                'username'      => Auth::user()->name,
                'email'         => Auth::user()->email,
                'name'          => $request->nombre,
                'lastname'      => $request->apellido,
                'country'       => $request->pais,
                'department'    => $request->departamento,
                'town'          => $request->ciudad,
                'id_type'       => $request->tipo_documento,
                'id'            => $request->numero_identificacion,
                'phone_number'  => $request->telefono,
                'stage_name'    => $request->nombre_artistico,
                'link_spotify'  => $request->link_spoty
            )
        );
        $templateProcessor->setImageValue('firm', public_path(). '/storage'. '/firma' . '/'. $id.'.'.'png');

        $pathToSave = public_path(). '/storage'. '/contratos'.'/'.$id.'.pdf';
        $templateProcessor->saveAs($pathToSave);

        return $pathToSave;
    }
}
