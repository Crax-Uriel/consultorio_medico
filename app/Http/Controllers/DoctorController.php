<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Barryvdh\DomPDF\Facade\PDF;

class DoctorController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Doctor $model)
    {
        $this->validationRules = [
            'nombre_doctor' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno_doctor' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_doctor' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'curp' => 'required|string|max:18|min:18|unique:doctors',
            'celular' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'licencia_medica' =>'required|string|regex:/^[0-9]+$/|max:11|min:11|unique:doctors',
            'especialidad' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'email' =>'required|max:250|unique:users',
            'password' =>'required|max:250|confirmed',
            
        ];

        $this->attributeNames = [
            'nombre_doctor' => 'Nombre',
            'apellido_paterno_doctor' => 'Apellido paterno',
            'apellido_materno_doctor' => 'Apellido materno',
            'curp' => 'CURP',
            'celular' => 'Celular',
            'licencia_medica' => 'cedula profesional',
            'especialidad' => 'Especialidad',
            'email' => 'correo electronico',
            'password' => 'contraseña',
        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute ya esta registrado',
            'regex' => 'El campo :attribute tiene un formato inválido.',
            'max' => 'El campo :attribute sobrepaso el numero maximo de caracteres.',
            'confirmed' => 'El campo :attribute no coincide con la confirmacion de contraseña.',
        ];
        $this->model = $model;
    }

    public function index()
    {
        //consulta pata listar usuarios
        $doctores = Doctor::with('user')->get();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = new Doctor();
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.doctores.create', compact('doctor','validator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre_doctor' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno_doctor' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_doctor' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'curp' => 'required|string|max:18|min:18|unique:doctors',
            'celular' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'licencia_medica' =>'required|string|regex:/^[0-9]+$/|max:11|min:11|unique:doctors',
            'especialidad' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'email' =>'required|max:250|unique:users',
            'password' =>'required|max:250|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre_doctor;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();  


        $doctor = new Doctor();
        $doctor->user_id= $usuario->id;
        $doctor->nombre_doctor= $request->nombre_doctor;
        $doctor->apellido_paterno_doctor= $request->apellido_paterno_doctor;
        $doctor->apellido_materno_doctor= $request->apellido_materno_doctor;
        $doctor->curp= $request->curp;
        $doctor->celular= $request->celular;
        $doctor->licencia_medica= $request->licencia_medica;
        $doctor->especialidad= $request->especialidad;
        $doctor->save();  

        $usuario->assignRole('doctor');
        
        return redirect()->route('admin.doctores.index')->with('mensaje','Se registro al doctor de manera correcta')->with('icono','success');


    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $doctor =Doctor::with('user')->findorFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $doctor =Doctor::with('user')->findorFail($id);
        return view('admin.doctores.edit', compact('doctor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $doctor = Doctor::find($id);
        $request->validate([
            'nombre_doctor' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno_doctor' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_doctor' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'curp' => 'required|string|max:18|min:18|unique:doctors,curp,'.$doctor->id,
            'celular' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'licencia_medica' =>'required|string|regex:/^[0-9]+$/|max:11|min:11|unique:doctors,licencia_medica,'.$doctor->id,
            'especialidad' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'email' =>'required|max:250|unique:users,email,'.$doctor->user->id,
            'password' =>'nullable|max:250|confirmed',
        ]);


        $doctor->nombre_doctor= $request->nombre_doctor;
        $doctor->apellido_paterno_doctor= $request->apellido_paterno_doctor;
        $doctor->apellido_materno_doctor= $request->apellido_materno_doctor;
        $doctor->curp= $request->curp;
        $doctor->celular= $request->celular;
        $doctor->licencia_medica= $request->licencia_medica;
        $doctor->especialidad= $request->especialidad;
        $doctor->save();  

        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombre_doctor;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
    

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
            
        }
        $usuario->save();
        return redirect()->route('admin.doctores.index')->with('mensaje','Se actualizo la recepcionista de manera correcta')->with('icono','success');


    }


    
    public function confirmDelete($id){
        $doctor =Doctor::findorFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    } 


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        
        $doctor= Doctor::find($id);
        //eliminar usuario asociado
        $user = $doctor->user;
        $user->delete(); 
        //eliminar a la recepcionista 
        $doctor->delete();
        return redirect()->route('admin.doctores.index')->with('mensaje','Se elimino al doctor de manera correcta')->with('icono','success');
    }

    public function reporte() {
        $configuracion= Configuracione::latest()->first();
        $doctores = Doctor::all();
        $pdf = PDF::loadView('admin.doctores.reporte', compact('doctores','configuracion'));
        return $pdf->stream();
    }

    

    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
