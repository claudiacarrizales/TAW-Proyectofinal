<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Paciente extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'id', 'nombre', 'apellido', 'edad', 'altura', 'peso', 'sexo', 'fecha_nacimiento', 'foto'
    ];

    protected $table = 'paciente';
    public $timestamps = false;
}
