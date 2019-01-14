<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

protected $fillable =['name'];

    public function tipo_categoria(){
        return $this->belongsTo(Tipo_categoria::class);
    }
}
