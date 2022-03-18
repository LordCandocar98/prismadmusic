<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Tienda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RepertorioW extends AbstractWidget
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
            'icon'   => 'voyager-documentation',
            'title'  => "Repertorio - Ver repertorios",
            'text'   => "Actualmente tu cuenta tiene un total de $count repertorios registradas. Haga clic en el botón de abajo para ver todos los repertorios.",
            'button' => [
                'text' => 'Repertorio',
                'link' => $user->role_id == 2 ?  url("/repertorio") : route('voyager.repertorio.index'),
                'color' => "#34a4eb",
            ],
            'image' => '/images/repertorio.jpg',
        ]));
    }
    public function shouldBeDisplayed()
    {
        return true;
    }
}
