<?php

namespace App\Http\Controllers;

use App\Http\Requests\Repertorio\CompartirMusicaRequest;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home');
    }

    public function nosotros(){
        return view('site.nosotros');
    }
    public function compartir(){
        return view('site.compartir');
    }

    public function postCompartir(CompartirMusicaRequest $request){
        dd($request);
    }
}
