<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        $total_monto = Pago::sum('monto');
        return view('admin.pagos.index', compact('pagos','total_monto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellido_paterno_paciente','asc')->get();
        $doctores = Doctor::orderBy('apellido_paterno_doctor','asc')->get();
        return view('admin.pagos.create',compact('pacientes','doctores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'descripcion' => 'required|string|max:250',
            'fecha_pago' =>'required|date',
            'paciente_id' => 'required',
            'doctor_id' => 'required',
        ]);
        $pago = new Pago();
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;
        $pago->save();
        //Historial::create($request->all());
        return redirect()->route('admin.pagos.index')->with('mensaje','Se registro el pago de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $pago =Pago::findorFail($id);
        $pacientes = Paciente::orderBy('apellido_paterno_paciente','asc')->get();
        $doctores = Doctor::orderBy('apellido_paterno_doctor','asc')->get();
        return view('admin.pagos.show', compact('pago','pacientes','doctores'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $pago =Pago::findorFail($id);
        $pacientes = Paciente::orderBy('apellido_paterno_paciente','asc')->get();
        $doctores = Doctor::orderBy('apellido_paterno_doctor','asc')->get();
        return view('admin.pagos.edit', compact('pago','pacientes','doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $pago = Pago::find($id);
        $request->validate([
            'monto' => 'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'descripcion' => 'required|string|max:250',
            'fecha_pago' =>'required|date',
            'paciente_id' => 'required',
            'doctor_id' => 'required',
        ]);

        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;
        $pago->save();

        return redirect()->route('admin.pagos.index')->with('mensaje','Se actualizo el pago de manera correcta')->with('icono','success');


    }

    public function confirmDelete($id){

        $pago =Pago::findorFail($id);
        $pacientes = Paciente::orderBy('apellido_paterno_paciente','asc')->get();
        $doctores = Doctor::orderBy('apellido_paterno_doctor','asc')->get();
        return view('admin.pagos.delete', compact('pago','pacientes','doctores'));

    } 

    public function destroy( $id)
    {
        $pago =Pago::findorFail($id);
        $pago->delete();
        return redirect()->route('admin.pagos.index')->with('mensaje','Se elimino el pago clinico de manera correcta')->with('icono','success');

    }

    public function pdf($id){
        
        $configuracion= Configuracione::latest()->first();
        $pago =Pago::findorFail($id);


        $data ="codigo de seguridad del comprobante de pago".$pago->paciente->apellido_paterno_paciente." ".$pago->paciente->apellido_materno_paciente." ".$pago->paciente->nombre_paciente." en fecha ".$pago->fecha_pago." con el monto de : ".$pago->monto;
        $qrcode = new QrCode($data);
        $writer = new PngWriter();
        $result = $writer->write($qrcode);
        $qrCodeBase64 = base64_encode($result->getString());


        $pdf = PDF::loadView('admin.pagos.pdf', compact('pago','configuracion','qrCodeBase64'));
        return $pdf->stream();
        
    }
}
