<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'nombre_doctor',
        'apellido_paterno_doctor',
        'apellido_materno_doctor',
        'curp',
        'celular',
        'licencia_medica',
        'especialidad',
        'user_id'
        
    ];

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function historial(){
        return $this->hasMany(Historial::class);
    }

    public function pagos(){
        return $this->hasMany(Pago::class);
    }
}
