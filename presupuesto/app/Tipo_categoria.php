<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_categoria extends Model
{

    protected $table = 'tipo_categorias';

        // una categoria tiene muchas categorias
        public function categorias(){
            return $this->hasMany(Categoria::class,'tipo_categorias','id');
        }
    
         // una categoria tiene muchas subcategoria
        public function subcategorias(){
            return $this->hasMany(Subcategoria::class);
        }

          //un tipo de categoria pertenece a un detalle de ingreso
    public function detalle_ingreso(){
        return $this->belongsTo(Detalle_ingreso::class);
    }

        //un tipo de categoria pertenece a un detalle de gasto
    public function detalle_gasto(){
        return $this->belongsTo(Detalle_gasto::class);
    }

}
