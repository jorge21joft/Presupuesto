<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_ingreso extends Model
{
    public function tipo_categorias(){
        return $this->hasMany(Tipo_categoria::class);
    }

    public function ingreso(){
        return $this->belongsTo(Ingreso::class);
    }

}
