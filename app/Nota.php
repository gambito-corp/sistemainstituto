<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model {

    protected $table = 'notas';

    public function notasCiclo() {
        return $this->belongsTo('App\ciclo', 'ciclo_id');
    }
      protected $fillable = [
       'carrera_id', 'curso_id', 'ciclo_id','periodo_id','user_id','nota1','nota2','nota3','nota4','nota5','nota6','nota7','nota8','estado_nota','estado_periodo',
    ];

}
