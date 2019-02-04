<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $table = 'cursos';

    public function cicloCurso() {
        return $this->hasMany('App\ciclo');
    }

    public function CarreraCurso() {
        return $this->belongsTo('App\carrera', 'curso_id');
    }

}
