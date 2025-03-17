<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{
    use HasRoles;
    protected $fillable = [
        'nombre_paciente',
        'apellido_paterno_paciente',
        'apellido_materno_paciente',
        'nss',
        'curp_paciente',
        'correo_paciente',
        'celular_paciente',
        'fecha_nacimiento_paciente',
        'direccion_paciente',
        'sexo_paciente',
        'tipo_sangre',
        'alergias',
        'peso',
        'altura',
        'contacto_emergencia',
        'observaciones',
    ];

    public function historial(){
        return $this->hasMany(Historial::class);
    }
    

}
