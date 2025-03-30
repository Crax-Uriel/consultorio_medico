<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        //Contamos el total de regsitros de cada tabla 
        $total_usuarios = User::count();
        $total_recepcionistas = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_reservas = Event::count();
        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $eventos = Event::all();
        //Mandamos las variables a la vista 
        return view('admin.index',compact('total_usuarios','total_recepcionistas','total_consultorios','total_pacientes','consultorios','doctores','eventos','total_doctores','total_horarios','total_reservas'));
    }

    public function ver_reservas($id){
        $eventos = Event::where('user_id',$id)->get();
        return view('admin.ver_reservas',compact('eventos'));

    }
}
