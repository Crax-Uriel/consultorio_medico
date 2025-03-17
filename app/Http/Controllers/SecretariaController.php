<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class SecretariaController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Secretaria $model)
    {
        $this->validationRules = [
            'nombres' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'curp' => 'required|string|max:18|min:18|unique:secretarias',
            'celular' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required|string|max:250',
            'sexo' => 'required|string|max:2',
            'status' => 'required|string|max:12',
            'email' =>'required|max:250|unique:users',
            'password' =>'required|max:250|confirmed',
            
        ];

        $this->attributeNames = [
            'nombres' => 'Nombre',
            'apellido_paterno' => 'Apellido paterno',
            'apellido_materno' => 'Apellido materno',
            'curp' => 'CURP',
            'celular' => 'Celular',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'direccion' => 'Direccion',
            'sexo' => 'Sexo',
            'status' => 'Status',
            'email' => 'correo electronico',
            'password' => 'contraseña',
        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute ya esta registrado',
            'regex' => 'El campo :attribute tiene un formato inválido.',
            'max' => 'El campo :attribute sobrepaso el numero maximo de caracteres.',
            'date' => 'El campo :attribute debe ser una fecha válida',
            'confirmed' => 'El campo :attribute no coincide con la confirmacion de contraseña.',
        ];
        $this->model = $model;
    }


    public function index()
    {
        //consulta pata listar usuarios
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    public function create()
    {
        $secretaria = new Secretaria;
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.secretarias.create', compact('secretaria','validator'));
    }

    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'curp' => 'required|string|max:18|min:18|unique:secretarias',
            'celular' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required|string|max:250',
            'sexo' => 'required|string|max:2',
            'status' => 'required|string|max:12',
            'email' =>'required|max:250|unique:users',
            'password' =>'required|max:250|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();  

        $secretaria = new Secretaria();
        $secretaria->user_id= $usuario->id;
        $secretaria->nombres= $request->nombres;
        $secretaria->apellido_paterno= $request->apellido_paterno;
        $secretaria->apellido_materno= $request->apellido_materno;
        $secretaria->curp= $request->curp;
        $secretaria->celular= $request->celular;
        $secretaria->fecha_nacimiento= $request->fecha_nacimiento;
        $secretaria->direccion= $request->direccion;
        $secretaria->sexo= $request->sexo;
        $secretaria->status= $request->status;
        $secretaria->save();  
        $usuario->assignRole('secretaria');


        //$usuario->assignRole('secretaria');
        return redirect()->route('admin.secretarias.index')->with('mensaje','Se registro a la recepcionista de manera correcta')->with('icono','success');
        

    }

    public function show($id)
    {
        $secretaria =Secretaria::with('user')->findorFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria =Secretaria::with('user')->findorFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    public function update(Request $request,$id)
    {
        //$usuario = User::find($id);
        $secretaria = Secretaria::find($id);
        $request->validate([
            'nombres' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'apellido_paterno' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'curp' =>'required|max:18|unique:secretarias,curp,'.$secretaria->id,
            'celular' =>'required|regex:/^[0-9]+$/|max:10',
            'fecha_nacimiento' =>'required',
            'direccion' =>'required',
            'sexo' => 'required|string|max:2',
            'status' => 'required|string|max:12',
            'email' =>'required|max:250|unique:users,email,'.$secretaria->user->id,
            'password' =>'nullable|max:250|confirmed',
        ]);
        $secretaria->nombres= $request->nombres;
        $secretaria->apellido_paterno= $request->apellido_paterno;
        $secretaria->apellido_materno= $request->apellido_materno;
        $secretaria->curp= $request->curp;
        $secretaria->celular= $request->celular;
        $secretaria->fecha_nacimiento= $request->fecha_nacimiento;
        $secretaria->direccion= $request->direccion;
        $secretaria->sexo= $request->sexo;
        $secretaria->status= $request->status;
        $secretaria->save(); 

        $usuario = User::find($secretaria->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
    

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
            
        }
        $usuario->save();
        return redirect()->route('admin.secretarias.index')->with('mensaje','Se actualizo la recepcionista de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $secretaria =Secretaria::with('user')->findorFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
    } 

    
    public function destroy($id)
    {
        $secretaria= Secretaria::find($id);
        //eliminar usuario asociado
        $user = $secretaria->user;
        $user->delete(); 
        //eliminar a la recepcionista 
        $secretaria->delete();
        return redirect()->route('admin.secretarias.index')->with('mensaje','Se elimino a la recepcionista de manera correcta')->with('icono','success');
    }

    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
