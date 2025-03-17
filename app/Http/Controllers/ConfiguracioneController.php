<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $configuraciones = Configuracione::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:80',
            'direccion' =>'required|max:200',
            'telefono' =>'required|regex:/^[0-9]+$/|max:10|min:10',
            'correo' =>'required|max:250|unique:configuraciones,correo,',
            'logo' =>'required',
        ]);

        $configuracion = new Configuracione();
        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos','public');
        
        $configuracion->save(); 

        return redirect()->route('admin.configuraciones.index')->with('mensaje','Se registro la configuracion de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $configuracion =Configuracione::findorFail($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $configuracion =Configuracione::findorFail($id);
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $configuracion = Configuracione::find($id);
        
        $request->validate([
            'nombre' =>'required|regex:/^[A-Za-z\s]+$/|max:100',
            'direccion' =>'required|max:100',
            'telefono' =>'nullable|regex:/^[0-9]+$/|max:10',
            'correo' =>'required|max:250|unique:configuraciones,correo,'.$configuracion->id,
            
        ]);
        
        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        if ($request->hasFile('logo')) {
            // Verifica si ya existe un logo guardado
            if ($configuracion->logo) {
                $rutaLogo = $configuracion->logo; // Ya contiene 'logos/' si es necesario
                // Elimina el archivo anterior
                if (Storage::disk('public')->exists($rutaLogo)) {
                    Storage::disk('public')->delete($rutaLogo);
                } else {
                    dd("El archivo anterior no existe en la ruta: " . $rutaLogo);
                }
            }
            // Guarda el nuevo archivo en 'logos/' dentro de 'storage/app/public/'
            $configuracion->logo = $request->file('logo')->store('logos', 'public');
        }
        
        

        $configuracion->save();
        return redirect()->route('admin.configuraciones.index')->with('mensaje','Se actualizo la configuracion de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $configuracion =Configuracione::findorFail($id);
        return view('admin.configuraciones.delete', compact('configuracion'));
    }

    public function destroy($id)
    {
        $configuracion = Configuracione::find($id);

        // Verifica si el logo existe y elimina el archivo
        if ($configuracion && $configuracion->logo) {
            $rutaLogo = $configuracion->logo; // Ya contiene 'logos/'
            if (Storage::disk('public')->exists($rutaLogo)) {
                Storage::disk('public')->delete($rutaLogo); // Elimina el logo si existe
            } else {
                dd("El archivo no existe en la ruta: " . $rutaLogo);
            }
        }

        Configuracione::destroy($id);
        return redirect()->route('admin.configuraciones.index')->with('mensaje', 'Se eliminó la configuración de manera correcta')->with('icono', 'success');
    }
}
