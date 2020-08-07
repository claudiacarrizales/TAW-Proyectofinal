<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Enfermedad extends Model
{
    use Notifiable;

    protected $fillable = [
        'id', 'nombre', 'tipo', 'causa'
    ];

    protected $table = 'enfermedades';
}
