<?php

namespace App\Providers;

use App\Nota;
use App\Periodo;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen('eloquent.created: App\Ciclo', function($ciclo){
           
         
           $user_id = $ciclo['user_id'];
           $carrera_id = $ciclo['carrera_id'];
           $curso_id = $ciclo['curso_id'];
           $nombre = $ciclo['nombre'];
           $id = $ciclo['id'];
           $nota1 = 0;
           $nota2 = 0;
           $nota3 = 0;
           $nota4 = 0;
           $nota5 = 0;
           $nota6 = 0;
           $nota7 = 0;
           $nota8 = 0;
           $estado_nota = 1;
           $estado_periodo = 1;

          $hoy = date("Y-m-d");;
          $periodos = periodo::all();
        

          
          $periodo = 1;
        


            nota::create(
            ['carrera_id' => $carrera_id,
            'curso_id' => $curso_id,
            'ciclo_id' => $id,
            'periodo_id' => $periodo,
            'user_id' => $user_id,
            'nota1' => $nota1,
            'nota2' => $nota2,
            'nota3' => $nota3,
            'nota4' => $nota4,
            'nota5' => $nota5,
            'nota6' => $nota6,
            'nota7' => $nota7,
            'nota8' => $nota8,
            'estado_nota' => $estado_nota,
            'estado_periodo' => $estado_periodo
        ]);
 
           
        
        });

        //
    }
}
