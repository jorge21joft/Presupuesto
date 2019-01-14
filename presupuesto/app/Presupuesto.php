<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
      // un presupuesto tiene muchos gastos
      public function gastos(){
        return $this->hasMany(Gasto::class);
    }

      // un presupuesto tiene muchos ingresos
      public function ingresos(){
        return $this->hasMany(Ingreso::class);
    }
    public function users(){
      return $this->belongsTo(User::class);
  }
}
