<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = ['presupuesto_id','total'];

    public function detalle_ingresos(){
        return $this->hasMany(Detalle_ingreso::class);
    }

    public function presupuesto(){
        return $this->belongsTo(Presupuesto::class);
    }
}
