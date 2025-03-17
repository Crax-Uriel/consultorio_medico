<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.index', compact('horarios','consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create',compact('doctores','consultorios','horarios'));
    }


    public function cargar_datos_consultorios($id){
        //echo $id;
        try {
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_consultorios',compact('horarios'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => $exception->getMessage()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id', // Validar que el consultorio exista
        ]);

        // Verificar si el horario ya existe para ese día, rango de horas y consultorio
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id) // Filtrar por consultorio
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_fin', '>', $request->hora_inicio)
                        ->where('hora_fin', '<=', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_inicio)
                        ->where('hora_fin', '>', $request->hora_fin);
                });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para este asiento')
                ->with('icono', 'error');
        }


        Horario::create($request->all());
        return redirect()->route('admin.horarios.index')->with('mensaje','Se registro el horario de manera correcta')->with('icono','success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
