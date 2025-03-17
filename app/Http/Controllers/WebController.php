<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WebController extends Controller
{
    public function index(){
        //echo $id;
        $consultorios = Consultorio::all();
        return view('index',compact('consultorios'));
    }

    public function cargar_datos_consultorios($id){
        $consultorio =Consultorio::findorFail($id);
        //echo $id;
        try {
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return view('/cargar_datos_consultorios',compact('horarios','consultorio'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => $exception->getMessage()]);
        }
    }


    public function cargar_reserva_barberos($id){
        try {
            $eventos = Event::where('doctor_id', $id)
                    ->select('title', 'start', 'end')
                    ->get();
            return response()->json($eventos);
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }
    
    

}
