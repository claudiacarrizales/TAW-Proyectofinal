<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cita extends Model
{
    use Notifiable;

    protected $guarded = [];
    protected $fillable = [
        'id', 'fecha', 'hora','detalles','id_enfermedad', 'doctor_id', 'paciente_id', 'pago', 'observaciones'
    ];

    protected $table = 'citas';
    public $timestamps = false;

}
