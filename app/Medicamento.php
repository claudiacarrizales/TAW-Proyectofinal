<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //
    protected $fillable = [
        'id', 'nombre', 'presentacion', 'detalles'
    ];

    protected $table = 'medicina';
    public $timestamps = false;
}
