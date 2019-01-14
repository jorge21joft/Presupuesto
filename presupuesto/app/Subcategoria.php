<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{

protected $fillable =['Nombre','categoria_id'];

    public function tipo_categoria(){
        return $this->belongsTo(Tipo_categoria::class,'subcategoria_id');
    }

    public static function towns($id){
        return Subcategoria::where('categoria_id','=',$id)->get();
    }
}
