<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    public function detalle_gastos(){
        return $this->hasMany(Detalle_gasto::class);
    }

    public function presupuesto(){
        return $this->belongsTo(Presupuesto::class);
    }

}
