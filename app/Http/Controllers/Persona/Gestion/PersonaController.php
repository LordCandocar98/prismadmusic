<?php

namespace App\Http\Controllers\Persona\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // LINEA DE CODIGO SUPREMA PARA OBTENER EL ROL DE VOYAGER
use App\Http\Requests\Registro\RegistroRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;

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
        $user = Auth::user();
        $persona = Persona::where('user_id', $user->id)->first();

        if(! $persona){
            $condicional_metodo = 0;
            $accion="registro";
            return view('registro/index',compact('accion','condicional_metodo'));
        }else{
            $cliente = Cliente::where('persona_id', $persona->id)->first();
            if($cliente->nombre_artistico == $user->email){ //Es colaborador
                $condicional_metodo = 1;
                $accion="registro/".$persona->id;
                return view('registro/index',compact('accion','condicional_metodo'));
            }
        }
        if (Auth::user()->registro_confirmed == 0){
            return view('registro/index',compact('accion','condicional_metodo'));
        }
        return redirect('admin');
    }

    public function indexColaboradores()
    {
        $accion="registro.store";
        $metodo="PATCH";
        // $user = Auth::user();
        // $persona = Persona::find($user->id); NO ESTÁ HACIENDO NADA ESTO ASDSAD
        // $cliente = Cliente::find($persona->id);
        if (Auth::user()->registro_confirmed == 0){
            return view('registro/index',compact('accion','metodo'));
        }
        return redirect('admin');
    }


    public function store(RegistroRequest $request)
    {
        $id = Auth::user()->id;
        // Pasar a usuario verificado
        User::where('id', $id)->update([
            'registro_confirmed'    => 1,
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
            'role_id'               => 2,
        ]);

        Cliente::create([
            'nombre_artistico'        => $request->nombre_artistico,
            'link_spoty'              => $request->link_spoty,
            'persona_id'              => $persona->id
        ]);

        $notification = array(
            'message' => 'Registro completado exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('admin')->with($notification);
    }

    public function update($id,RegistroRequest $request)
    {

       // Pasar imagen de formato base64/png a png y guardar
       $image = $request->firma;  // your base64 encoded
       $image = str_replace('data:image/png;base64,', '', $image);
       $image = str_replace(' ', '+', $image);
       $imageName = $id.'.'.'png';
       $file = public_path(). '/storage'. '/firma' . '/'. $imageName;
       file_put_contents($file, base64_decode($image));
       // Generar documento
       $rutaDocumento = $this->generarDocumento($request, $id);

        $sesion = Auth::user();
        $user = User::find($sesion->id);

        $user->registro_confirmed = 1;
        $user->save();

        $persona = Persona::find($id);
        $persona->nombre = $request->nombre;
        $persona->apellido            = $request->apellido;
        $persona->pais                = $request->pais;
        $persona->ciudad              = $request->ciudad;
        $persona->departamento        = $request->departamento;
        $persona->tipo_documento      = $request->tipo_documento;
        $persona->numero_identificacion = $request->numero_identificacion;
        $persona->telefono            = $request->telefono;
        $persona->firma               = $file;
        $persona->contrato            = $rutaDocumento;
        $persona->user_id             = auth()->id();
        $persona->save();

        //DB::table("cliente")->where('persona_id', $persona->id)->first();
        $cliente = Cliente::where('persona_id', $persona->id)->first();
        $cliente->nombre_artistico       =$request->nombre_artistico;
        $cliente->link_spoty             =$request->link_spoty;
        $cliente->persona_id             =$persona->id;
        $cliente->save();

        $notification = array(
            'message' => 'Registro completado exitosamente!',
            'alert-type' => 'success'
        );
        return redirect('admin')->with($notification);
    }

    public function generarDocumento(Request $request, $id){
        $templateProcessor = new TemplateProcessor(public_path(). '/storage'. '/plantilla' . '/contrato_prismad_music.docx');
        $templateProcessor->setValues(
            array(
                'name'              => Auth::user()->name,
                'url_condiciones'   => env('APP_URL').'/terminos-y-condiciones',
                'url_privacidad'    => env('APP_URL').'/politicas-de-privacidad',
                'fecha'             => date("Y-m-d H:i:s")
            )
        );
        $templateProcessor->setImageValue('firm', public_path(). '/storage'. '/firma' . '/'. $id.'.'.'png');

        $pathToSave = public_path(). '/storage'. '/contratos'.'/'.$id.'.docx';
        $templateProcessor->saveAs($pathToSave);

        // Make sure you have `dompdf/dompdf` in your composer dependencies.
        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        // Any writable directory here. It will be ignored.
        Settings::setPdfRendererPath('.');

        $phpWord = IOFactory::load($pathToSave, 'Word2007');
        $phpWord->save(public_path(). '/storage'. '/contratos'.'/'.$id.'.pdf', 'PDF');

        return $pathToSave;
    }
}
