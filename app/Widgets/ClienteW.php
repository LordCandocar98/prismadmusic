<?php

namespace App\Widgets;

use App\Models\Cliente;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class ClienteW extends AbstractWidget
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
        $regalias = Cliente::all();
        $count = count($regalias);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-smile',
            'title'  => "Gestión de clientes",
            'text'   => "Actualmente hay un total de $count clientes registradas en plataforma. Haga clic en el botón de abajo para ver todos los clientes.",
            'button' => [
                'text' => 'Ver todos los clientes',
                'link' => $user->role_id == 3 ?  url("/admin/cliente") : route('voyager.cliente.index'),
                'color' => "#34a4eb",
            ],
            'image' => '/images/cliente.jpg',
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
