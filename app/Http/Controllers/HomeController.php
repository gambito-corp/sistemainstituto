<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index() {
        return view('home');
    }

    public function test() {
        $ciclos = \App\Ciclo::all();
        return view('test', [
            'ciclos' => $ciclos
        ]);
    }


public function principal(){
        return View('front.index');
    }


    public function quienes(){
        return View('front.quienes');
    }

    public function mision(){
        return View('front.mision');
    }

    public function vision(){
        return View('front.vision');
    }

    public function docentes(){
        return View('front.docentes');
    }

    public function suficiencia(){
        return View('front.suficiencia');
    }

    public function extraordinarios(){
        return View('front.extraordinarios');
    }

    public function t_english(){
        return View('front.t_english');
    }

    public function videos(){
        return View('front.videos');
    }

    public function blog(){
        return View('front.blog');
    }

    public function intranet(){
        return View('front.intranet');
    }
    
    public function contactenos(){
        return View('front.contactenos');
    } 

}
