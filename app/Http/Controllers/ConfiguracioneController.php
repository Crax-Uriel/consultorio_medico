<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracioneController extends Controller
{
    /*
    Vista del index 
     */
    public function index()
    {
        //
        $configuraciones = Configuracione::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /*
    Vista que retorna las configutaciones del sistema 
     */
    public function create()
    {
        //
        return view('admin.configuraciones.create');
    }

    /*
    Metodo que crea el regsitro y lo alamcena en la abse de datos 
     */
    public function store(Request $request)
    {
        //Validaciona antes de crear 
        $request->validate([
            'nombre' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:80',
            'direccion' =>'required|max:200',
            'telefono' =>'required|regex:/^[0-9]+$/|max:10|min:10',
            'correo' =>'required|max:250|unique:configuraciones,correo,',
            'logo' =>'required',
        ]);
        //Creamos una nueva instancia y traemos lo que hay del request 
        $configuracion = new Configuracione();
        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos','public');
        //Guardamos en la bsa de datos 
        $configuracion->save(); 
        //Retornamos al listado con un mensaje de exito 
        return redirect()->route('admin.configuraciones.index')->with('mensaje','Se registro la configuracion de manera correcta')->with('icono','success');
    }

    /*
        Metodo show para ver los datos 
     */
    public function show( $id)
    {
        //
        $configuracion =Configuracione::findorFail($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /*
        metodo que retorna la vista edit 
     */
    public function edit( $id)
    {
        //
        $configuracion =Configuracione::findorFail($id);
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /*
    Metodo que actuliza los datos 
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        //Buscamos el id correpsondoiente 
        $configuracion = Configuracione::find($id);
        //validamos los datos anstes de enviarlos 
        $request->validate([
            'nombre' =>'required|regex:/^[A-Za-z\s]+$/|max:100',
            'direccion' =>'required|max:100',
            'telefono' =>'nullable|regex:/^[0-9]+$/|max:10',
            'correo' =>'required|max:250|unique:configuraciones,correo,'.$configuracion->id,
            
        ]);
        
        //traemos que hay en el re quest y lo gurdamos 
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
        
        
        //gurdamos la actualizacin 
        $configuracion->save();
        return redirect()->route('admin.configuraciones.index')->with('mensaje','Se actualizo la configuracion de manera correcta')->with('icono','success');
    }
    //nos mostrara la confoirmacion antes de eliminar 
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
