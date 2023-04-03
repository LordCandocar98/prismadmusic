<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Regalia;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class RegaliaW extends AbstractWidget
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
        $regalias = Regalia::all();
        $count = count($regalias);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-wallet',
            'title'  => "Gestión de regalías",
            'text'   => "Actualmente hay un total de $count regalías registrados en plataforma. Haga clic en el botón de abajo para ver todas las regalías.",
            'button' => [
                'text' => 'Ver todas las regalías',
                'link' => $user->role_id == 3 ?  url("/regalias") : route('voyager.regalia.index'),
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
