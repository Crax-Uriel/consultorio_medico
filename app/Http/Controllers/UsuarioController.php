<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class UsuarioController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(User $model)
    {
        $this->validationRules = [
            'name' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'email' =>'required|max:250|unique:users',
            'password' =>'required|max:250|confirmed',
        ];

        $this->attributeNames = [
            'name' => 'nombre',
            'email' => 'correo electronico',
            'password' => 'contraseña',
        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute ya esta registrado',
            'regex' => 'El campo :attribute tiene un formato inválido.',
            'max' => 'El campo :attribute sobrepaso el numero maximo de caracteres.',
            'confirmed' => 'El campo :attribute no coincide con la conformacion de contraseña.',
        ];
        $this->model = $model;
    }

    public function index(){
        //consulta pata listar usuarios
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create(){
        $usuario = new User;
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.usuarios.create', compact('usuario','validator'));
    }

    public function store(Request $request){
        $this->setValidator($request)->validate();
        User::create($request->all());
        return redirect()->route('admin.usuarios.index')->with('mensaje','Se registro al usuario de manera correcta')->with('icono','success');

    }
    public function show($id){
        $usuario =User::findorFail($id);
        return view('admin.usuarios.show', compact('usuario'));

    }

    public function edit($id){
        $usuario =User::findorFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request,$id){
        $usuario = User::find($id);
        $request->validate([
            'name' =>'required|regex:/^[A-Za-z\s]+$/|max:100',
            'email' =>'required|max:250|unique:users,email,'.$usuario->id,
            'password' =>'nullable|max:250|confirmed',
        ]);
        
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
            
        }
        $usuario->save();
        return redirect()->route('admin.usuarios.index')->with('mensaje','Se actualizo al usuario de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $usuario =User::findorFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
                //se agrega la validacion que no se puede eliminar la cita 

        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('mensaje','Se elimino al usuario de manera correcta')->with('icono','success');
    }

    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
