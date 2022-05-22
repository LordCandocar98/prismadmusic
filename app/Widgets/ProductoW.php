<?php

namespace App\Widgets;

use App\Models\Cliente;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class ProductoW extends AbstractWidget
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
        $productos = Repertorio::all();
        $count = count($productos);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-lab',
            'title'  => '<div class="widget-css">'."Gestión de productos".'</div>',
            'text'   => '<div class="widget-css">'."Actualmente hay un total de $count productos registradas en plataforma. Haga clic en el botón de abajo para ver todos los productos.".'</div>',
            'button' => [
                'text' => 'Ver todos los productos',
                'link' => $user->role_id == 3 ?  url("/producto") : route('voyager.repertorio.index'),
                'color' => "#34a4eb",
            ],
            'image' => '/images/producto.jpg',
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
