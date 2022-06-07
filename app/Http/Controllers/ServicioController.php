<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index',compact('servicios'));
    }

    public function store(Request $request)
    {
        $servicio = new Servicio();
        
        $servicio->servicio_id = $request->servicios_id;
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;

        if( $request->hasFile('foto') ) {
            $file = $request->file('foto');
            $destinationPath = 'img/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $servicio->foto = $destinationPath . $filename;
        }

        $servicio->save();

        return redirect()->back();
    }

 
    public function show($id)
    {
        //
    }

    function update(Request $request, $servicio_id)
    {
        $servicio_id= Servicio::find($servicio_id);

        $servicio_id->servicio_id= $request->servicio_id;
        $servicio_id->nombre= $request->nombre;
        $servicio_id->descripcion=$request->descripcion;
        
        if( $request->hasFile('foto') ) {
            $file = $request->file('foto');
            $destinationPath = 'img/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $servicio_id->foto = $destinationPath . $filename;
        }
      
        $servicio_id->update();

        return redirect()->back();
    }

    public function destroy(Request $request,$servicio_id)
    {
        $servicio_id= Servicio::find($servicio_id);
        $servicio_id->delete();

        return redirect()->back();
    }
}
