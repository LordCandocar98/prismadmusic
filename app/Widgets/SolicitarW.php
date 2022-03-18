<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Tienda;
use Illuminate\Support\Facades\Auth;

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

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-dollar',
            'title'  => "Pagos - Solicitar pagos",
            'text'   => "Actualmente tu cuenta tiene un saldo de 0 dolares. Haga clic en el botón de abajo para solicitar pagos.",
            'button' => [
                'text' => 'Solicitar Pago',
                'link' => route('nomina.create'),
                'color' => "#fff",
            ],
            'image' => '/images/dollar.jpg',
        ]));
    }
    public function shouldBeDisplayed()
    {
        $session = Auth::user();
        if ($session->role_id == 1 ||  $session->role_id == 2) {
            return true;
        } else {
            return false;
        }
    }
}
