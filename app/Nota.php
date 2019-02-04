<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model {

    protected $table = 'notas';

    public function notasCiclo() {
        return $this->belongsTo('App\ciclo', 'ciclo_id');
    }

}
