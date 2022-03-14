<?php

namespace App\Widgets;

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
        $repertorios = Repertorio::join('cliente', 'repertorio.artista_principal', '=', 'cliente.id')
            ->join('persona', 'cliente.persona_id', '=', 'persona.id')
            ->join('users', 'persona.user_id', '=', 'users.id')
            ->where('users.role_id', 2)
            ->where('users.id', $user->id)
            ->get();
        $repertorios = $user->role_id == 2 ? $repertorios : Repertorio::all();
        $count = count($repertorios);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-dollar',
            'title'  => "Pagos - Solicitar pagos",
            'text'   => "Actualmente tu cuenta tiene un saldo de 0 dolares. Haga clic en el botón de abajo para solicitar pagos.",
            'button' => [
                'text' => 'Solicitar Pago',
                'link' => url("/admin"),
                'color' => "#fff",
            ],
            'image' => '/images/dollar.jpg',
        ]));
    }
    public function shouldBeDisplayed()
    {
        return true;
    }
}
