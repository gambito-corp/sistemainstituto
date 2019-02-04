<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model {

    protected $table = 'ciclos';

    public function userCiclo() {
        return $this->belongsTo('App\user', 'user_id');
    }

    public function cursoCiclo() {
        return $this->belongsTo('App\curso', 'curso_id');
    }

    public function carreraCiclo() {
        return $this->belongsTo('App\carrera', 'carrera_id');
    }

}
