<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'fecha_reserva' =>'required',
            'hora_reserva' =>'required',
        
        ]);


        $doctor = Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva= $request->hora_reserva;
        //valida si eciste el horaio del barbero 
        $dia = date('l',strtotime($fecha_reserva));
        $dia_de_reserva =$this->traducir_dia($dia);

        $horarios = Horario::where('doctor_id',$doctor->id)->where('dia',$dia_de_reserva)->where('hora_inicio','<=',$hora_reserva)->where('hora_fin','>=',$hora_reserva)->exists();

        if (!$horarios) {
            return redirect()->back()->with([ 'mensaje'=>'El doctor no esta disponible en ese horario',
            'icono'=> 'error',
            'hora_reserva'=>'El doctor no esta disponible en ese horario',
            ]);
        }

        //valida si no existen eventos duplicados 
        $fecha_hora_reserva = $fecha_reserva." ".$hora_reserva;
        $eventos_duplicados = Event::where('doctor_id',$doctor->id)->where('start',$fecha_hora_reserva)->exists();
        if ($eventos_duplicados) {
            return redirect()->back()->with([ 'mensaje'=>'Ya existe una reserva con el mismo doctor en esa fecha y hora',
            'icono'=> 'error',
            'hora_reserva'=>'Ya existe una reserva con el mismo doctor en esa fecha y hora',
            ]);
        }

        $evento = new Event();
        $evento->title = $request->hora_reserva." ".$doctor->nombre_doctor." ".$doctor->apellido_paterno_doctor." ".$doctor->apellido_materno_doctor;
        $evento->start  = $request->fecha_reserva." ".$hora_reserva;
        $evento->end  = $request->fecha_reserva." ".$hora_reserva;
        $evento->color  = '#34bde1';
        $evento->user_id  = Auth::user()->id;
        $evento->doctor_id  = $request->doctor_id;
        $evento->consultorio_id  = '1';
        $evento->save();
        
        return redirect()->route('admin.index')->with('mensaje','Se registro la reserva de la cita de manera correcta')->with('icono','success');


    }

    private function traducir_dia($dia){
        $dias=[
            'Monday' => 'LUNES',
            'Tuesday' => 'MARTES',
            'Wednesday' => 'MIERCOLES',
            'Thursday' => 'JUEVES',
            'Friday' => 'VIERNES',
            'Saturday' => 'SABADO',
            'Sunday' => 'DOMINGO',
        ];
        return $dias[$dia]??$dias;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Event::destroy($id);
        //se agrega la validacion que no se puede eliminar la cita 
        return redirect()->back()->with([
            'mensaje' => 'Se elimino la reserva de la manera correcta',
            'icono' => 'success',
        ]);
    }

    public function reportes(){
        return view('admin.reservas.reportes');
    }

    public function pdf(){
        $configuracion= Configuracione::latest()->first();
        $reservas = Event::all();
        $pdf = PDF::loadView('admin.reservas.pdf', compact('reservas','configuracion'));
        return $pdf->stream();
    }

    public function pdf_fechas(Request $request){
        $configuracion= Configuracione::latest()->first();
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $reservas = Event::whereBetween('start',[$fecha_inicio,$fecha_fin])->get();
        $pdf = PDF::loadView('admin.reservas.pdf_fechas', compact('reservas','configuracion'));
        return $pdf->stream();
    }
}
