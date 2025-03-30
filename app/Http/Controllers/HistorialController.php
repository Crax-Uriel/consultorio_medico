<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Barryvdh\DomPDF\Facade\PDF;

class HistorialController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Historial $model)
    {
        //$paciente = Paciente::find($id);
        $this->validationRules = [
            'detalle' => 'required|string|max:250',
            'fecha_visita' =>'required|date',
            'paciente_id' => 'required',
            'doctor_id' => 'required',

            
        ];

        $this->attributeNames = [
            'detalle' => 'Detalle de la cita ',
            'fecha_visita' => 'Fecha de visita',
            'paciente_id' => 'Paciente',
            'doctor_id' => 'Doctor',
            


        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute ya esta registrado',
            'regex' => 'El campo :attribute tiene un formato inválido.',
            'max' => 'El campo :attribute sobrepaso el numero maximo de caracteres.',
            'min' => 'El campo :attribute no cumple con el numero minimo de caracteres.',
        ];
        $this->model = $model;
    }
    public function index()
    {
        //
        $historiales = Historial::with('paciente','doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$historial = new Historial();
        $pacientes = Paciente::all();
        //$validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.historial.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$this->setValidator($request)->validate();
        $request->validate([
            'detalle' => 'required|string|max:250',
            'fecha_visita' =>'required|date',
            'paciente_id' => 'required',
        ]);
        $historial = new Historial();
        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;
        $historial->save();
        //Historial::create($request->all());
        return redirect()->route('admin.historial.index')->with('mensaje','Se registro el historial de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $pacientes = Paciente::all();
        $historial =Historial::findorFail($id);
        return view('admin.historial.show', compact('historial','pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $pacientes = Paciente::all();
        $historial = Historial::find($id);
        return view('admin.historial.edit', compact('historial','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $historial = Historial::find($id);
        $request->validate([
            'detalle' => 'required|string|max:250',
            'fecha_visita' =>'required|date',
            'paciente_id' => 'required',
        ]);

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;
        $historial->save();

        return redirect()->route('admin.historial.index')->with('mensaje','Se actulizo el historial de manera correcta')->with('icono','success');

    }

    public function confirmDelete($id){
        $pacientes = Paciente::all();
        $historial = Historial::find($id);
        return view('admin.historial.delete', compact('historial','pacientes'));
    } 

    public function destroy( $id)
    {
        $historial = Historial::find($id);
        $historial->delete();
        return redirect()->route('admin.historial.index')->with('mensaje','Se elimino el hsitorial clinico de manera correcta')->with('icono','success');
    }

    public function pdf($id){
        
        $configuracion= Configuracione::latest()->first();
        $historial = Historial::find($id);
        $pdf = PDF::loadView('admin.historial.pdf', compact('historial','configuracion'));
        return $pdf->stream();
        
    }

    public function buscar_paciente(Request $request){
        $curp = $request->curp_paciente;
        $paciente =Paciente::where('curp_paciente',$curp)->first();
        return view('admin.historial.buscar_paciente',compact('paciente'));
    }

    public function imprimir_historial($id){
        $configuracion= Configuracione::latest()->first();
        $historiales =Historial::where('paciente_id',$id)->get();
        $paciente = Paciente::find($id);
        $pdf = PDF::loadView('admin.historial.imprimir_historial', compact('historiales','configuracion','paciente'));
        return $pdf->stream();
    }
    

    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
