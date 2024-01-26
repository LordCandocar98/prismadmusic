<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Nomina;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class SolicitudPagoW extends AbstractWidget
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
        $nomina = Nomina::where('fecha_informe',null)->get();
        $count = count($nomina);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-treasure',
            'title'  => "Solicitudes de pago",
            'text'   => "Actualmente hay un total de $count solicitudes de pago. Haga clic en el botón de abajo para ver todas las solicitudes.",
            'button' => [
                'text' => 'Ver todas las solicitudes',
                'link' => $user->role_id == 3 ?  url("/nomina") : route('voyager.nomina.index'),
                'color' => "#34a4eb",
            ],
            'image' => '/images/regalia.jpg',
        ]));
    }
    public function shouldBeDisplayed()
    {
        $session = Auth::user();
        if ($session->role_id == 3 || $session->role_id == 1) {
            return true;
        } else {
            return false;
        }
    }
}
