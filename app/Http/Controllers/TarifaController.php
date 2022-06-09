<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa; 
use App\Models\Prenda;
use App\Models\Servicio;

class TarifaController extends Controller
{
    public function index()
    {
        $tarifa=Tarifa::all();
        $prenda=Prenda::all();
        $servicio=Servicio::all();
        return view('tarifas.index',compact('tarifa','prenda','servicio'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $tarifa = new Tarifa();
        $tarifa->prenda_id = $request->prenda_id;
        $tarifa->servicio_id = $request->servicio_id;
        $tarifa->precio= $request->precio;

        $tarifa->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $tarifa_id)
    {
        $tarifa_id= Tarifa::find($tarifa_id);

        $tarifa_id->tarifa_id= $request->tarifa_id;
        $tarifa_id->prenda_id= $request->prenda_id;
        $tarifa_id->servicio_id= $request->servicio_id;
        $tarifa_id->precio=$request->precio;
        
        $tarifa_id->update();

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
