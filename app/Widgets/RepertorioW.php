<?php

namespace App\Widgets;

use App\Models\ColaboracionRepertorio;
use App\Models\Repertorio;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

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
            'title'  => '<div class="widget-css">'."Repertorio - Ver repertorios".'</div>',
            'text'   => '<div class="widget-css">'."Actualmente tu cuenta tiene un total de $count repertorios registradas. Haga clic en el botón de abajo para ver todos los repertorios.".'</div>',
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
        $session = Auth::user();
        if ($session->role_id == 2) {
            return true;
        } else {
            return false;
        }
        
    }
}
