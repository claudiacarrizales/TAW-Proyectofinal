<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radiografia extends Model
{
    //
    protected $fillable = [
        'id', 'ruta', 'tipo'
    ];

    protected $table = 'archivos';
    public $timestamps = false;

}
