<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
