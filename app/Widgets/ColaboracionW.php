<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Tienda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColaboracionW extends AbstractWidget
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
        $repertorios = ColaboracionRepertorio::where('cliente_email', $user->email)->get();
        $repertorios = $user->role_id == 2 ? $repertorios : Repertorio::all();
        $count = count($repertorios);
        $url_solicitud = url('/cancion-colaboracion');
        $mensaje_w = "Actualmente tu cuenta tiene un total de " . $count . " colaboraciones. Haga clic en el botón de abajo para ver sus colaboraciones.";


        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'fa fa-music',
            'title'  => "Colaboracion de cancionesº",
            'text'   => $mensaje_w,
            'button' => [
                'text' => 'Ver colaboraciones',
                'link' => $url_solicitud,
                'color' => "#fff",
            ],
            'image' => '/images/colaboracion.jpg',
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
