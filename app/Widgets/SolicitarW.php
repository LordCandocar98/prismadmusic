<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Tienda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitarW extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $user = Auth::user();
        $repertorios = ColaboracionRepertorio::where('cliente_email',$user->email)->get();
        $repertorios = $user->role_id == 2 ? $repertorios : Repertorio::all();
        $count = count($repertorios);
        $url_solicitud = '';
        $mensaje_w = '';
        $regalias = DB::table('users')
        ->join('persona', 'users.id', '=', 'persona.user_id')
        ->join('cliente', 'persona.id', '=', 'cliente.persona_id')
        ->join('regalia', 'cliente.id', '=', 'regalia.cliente_id')
        ->where('users.role_id',2)
        ->where('users.id', $user->id)
        ->whereNull('nomina_id')
        ->sum('regalia.valor');
        
        if ($regalias >= 200.00) {
            $url_solicitud = route('nomina.create');
            $mensaje_w = "Actualmente tu cuenta tiene un saldo de " . $regalias . " dólares. Haga clic en el botón de abajo para solicitar pagos.";
        }else{
            $url_solicitud = url('/sinSaldo');
            $mensaje_w = "Actualmente tu cuenta tiene un saldo de " . $regalias . " dólares. Todavía no puede hacer clic en el botón de abajo para solicitar pagos, monto mínimo a solicitar $200.";
        }

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-dollar',
            'title'  => "SALDO ACTUAL: $" . $regalias,
            'text'   => $mensaje_w,
            'button' => [
                'text' => 'Solicitar Pago',
                'link' => $url_solicitud,
                'color' => "#fff",
            ],
            'image' => '/images/dollar.jpg',
        ]));
    }
    public function shouldBeDisplayed()
    {
        $session = Auth::user();
        if ($session->role_id == 2) {
            return true;
        } else {
            return false;
        }
    }
}
