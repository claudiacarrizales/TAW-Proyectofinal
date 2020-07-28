<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    //
    //hace referencia a la tabla de pagos 
    protected $fillable = [
        'id', 'total', 'f_apertura', 'f_cierre'
    ];
    protected $table = 'cajas';
    public $timestamps = false;
}
