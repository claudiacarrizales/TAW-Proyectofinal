<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    //hace referencia a la tabla de pagos 
     protected $fillable = [
        'id', 'fecha', 'total', 'detalles', 'tipo', 'estado'
    ];
    protected $table = 'pagos';
    public $timestamps = false;
}
