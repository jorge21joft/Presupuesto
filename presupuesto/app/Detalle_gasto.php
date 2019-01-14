<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_gasto extends Model
{
    public function tipo_categorias(){
        return $this->hasMany(Tipo_categoria::class);
    }

    public function gasto(){
        return $this->belongsTo(Gasto::class);
    }

}
