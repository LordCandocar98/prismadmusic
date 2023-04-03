<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class UpCancionW extends AbstractWidget
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
        return view('voyager::dimmer', array_merge($this->config, [
            'button' => [
                'text' => 'Subir Canción',
                'link' => url("/subir-cancion"),
                'color' => "#34a4eb",
                'id' => "btnUpSong",
                'class' => "btn-big"
            ],
            'image' => '/images/pexels-yaroslava.jpg',
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
