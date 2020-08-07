<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    // id	nombre	tipo
    protected $fillable = [
        'id', 'nombre', 'tipo'
    ];

    protected $table = 'alergias';
    public $timestamps = false;

}
