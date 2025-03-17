<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class ConsultorioController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Consultorio $model)
    {
        //$paciente = Paciente::find($id);
        $this->validationRules = [
            'nombre_consultorio' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'descripcion' => 'nullable|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s-]+$/',
            'ubicacion' =>'required|max:10|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s-]+$/',
            'capacidad' =>'required|string|regex:/^[0-9]+$/|max:10',
            'telefono' =>'nullable|string|regex:/^[0-9]+$/|max:10|min:10',
            'especialidad' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'estado' => 'required|string|max:12',
            
        ];

        $this->attributeNames = [
            'nombre_consultorio' => 'Nombre del consultorio ',
            'descripcion' => 'Descripcion',
            'ubicacion' => 'Ubicacion del consultorio',
            'capacidad' => 'Capacidad',
            'telefono' => 'Telefono',
            'especialidad' => 'Especialidad',
            'estado' => 'Estado',

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
        $consultorios = Consultorio::all();;
        return view('admin.consultorios.index', compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consultorio = new Consultorio();
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.consultorios.create', compact('consultorio','validator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        Consultorio::create($request->all());
        return redirect()->route('admin.consultorios.index')->with('mensaje','Se registro el consultorio de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $consultorio =Consultorio::findorFail($id);
        
        return view('admin.consultorios.show', compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $consultorio =Consultorio::findorFail($id);
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form2');
        return view('admin.consultorios.edit', compact('consultorio','validator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $consultorio =Consultorio::findorFail($id);
        //$producto = Producto::where('producto_id', $id)->firstOrFail();
        $this->setValidator($request)->validate();
        $consultorio->update($request->all());
        return redirect()->route('admin.consultorios.index')->with('mensaje','Se actualizo el consultorio de manera correcta')->with('icono','success');

    }

    public function confirmDelete($id){
        $consultorio =Consultorio::findorFail($id);
        return view('admin.consultorios.delete', compact('consultorio'));
    }

    public function destroy($id)
    {
        $consultorio =Consultorio::findorFail($id);
        $consultorio->delete();
        return redirect()->route('admin.consultorios.index')->with('mensaje','Se elimino el consultorio de manera correcta')->with('icono','success');
    }


    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}

