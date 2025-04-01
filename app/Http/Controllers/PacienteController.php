<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
class PacienteController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Paciente $model)
    {
        //$paciente = Paciente::find($id);
        $this->validationRules = [
            'nombre_paciente' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno_paciente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_paciente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'nss' => 'required|string|max:12|min:12|unique:pacientes,nss', //.$paciente->id,
            'curp_paciente' =>'required|min:18|max:18|unique:pacientes,curp_paciente',//.$paciente->id,
            'correo_paciente' => 'required|email|max:200|unique:pacientes,correo_paciente,',//.$paciente->id,
            'celular_paciente' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'fecha_nacimiento_paciente' =>'required|date',
            'direccion_paciente' => 'required|string|max:250',
            'sexo_paciente' => 'required|string|max:2',
            'tipo_sangre' => 'required|string|max:3',
            'alergias' => 'nullable|string|max:200',
            'peso' => 'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'altura' => 'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'contacto_emergencia' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'observaciones' => 'nullable|string|max:250',

            
        ];

        $this->attributeNames = [
            'nombre_paciente' => 'Nombre del Paciente ',
            'apellido_paterno_paciente' => 'Apellido paterno',
            'apellido_materno_paciente' => 'Apellido materno',
            'nss' => 'NSS',
            'curp_paciente' => 'CURP',
            'correo_paciente' => 'Correo electronico',
            'celular_paciente' => 'Celular',
            'fecha_nacimiento_paciente' => 'Fecha de nacimiento',
            'direccion_paciente' => 'Direccion',
            'sexo_paciente' => 'nombre',
            'tipo_sangre' => 'nombre',
            'alergias' => 'nombre',
            'peso' => 'nombre',
            'altura' => 'nombre',
            'contacto_emergencia' => 'nombre',
            'observaciones' => 'nombre'


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
        //consulta pata listar usuarios
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paciente = new Paciente();
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.pacientes.create', compact('paciente','validator'));
    }

    
    public function store(Request $request)
    {

        //$datos = request()->all();
        //return response()->json($datos);
        $this->setValidator($request)->validate();
        Paciente::create($request->all());
        return redirect()->route('admin.pacientes.index')->with('mensaje','Se registro al paciente de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $paciente =Paciente::findorFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $paciente =Paciente::findorFail($id);
        
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $paciente =Paciente::findorFail($id);
        $request->validate([
            'nombre_paciente' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno_paciente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_paciente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'nss' => 'required|string|max:12|min:12|unique:pacientes,nss,'.$paciente->id,
            'curp_paciente' =>'required|min:18|max:18|unique:pacientes,curp_paciente,'.$paciente->id,
            'correo_paciente' => 'required|email|max:200|unique:pacientes,correo_paciente,'.$paciente->id,
            'celular_paciente' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'fecha_nacimiento_paciente' =>'required|date',
            'direccion_paciente' => 'required|string|max:250',
            'sexo_paciente' => 'required|string|max:2',
            'tipo_sangre' => 'required|string|max:3',
            'alergias' => 'nullable|string|max:200',
            'peso' => 'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'altura' => 'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'contacto_emergencia' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'observaciones' => 'nullable|string|max:250',
        ]);

        $paciente->update($request->all());
        return redirect()->route('admin.pacientes.index')->with('mensaje','Se actualizo al paciente de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $paciente =Paciente::findorFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    } 

    public function destroy( $id)
    {
        $paciente =Paciente::findorFail($id);
        if ($paciente->historial()->count() > 0) { 
            return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'No se puede eliminar al paciente porque tiene un histotrial activo')
            ->with('icono', 'error');
        }elseif ($paciente->pagos()->count() > 0) { 
            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', 'No se puede eliminar al paciente porque tiene un pago asociado')
                ->with('icono', 'error');
        }

        $paciente->delete();
        return redirect()->route('admin.pacientes.index')->with('mensaje','Se elimino al paciente de manera correcta')->with('icono','success');
    }

    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
