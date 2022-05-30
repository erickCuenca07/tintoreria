<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes=Cliente::all();
        return view('clientes.index',compact('clientes'));
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        
        $cliente->cliente_id = $request->clientes_id;
        $cliente->nif = $request->nif;
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->domicilio= $request->domicilio;
        $cliente->provincia= $request->provincia;
        $cliente->municipio= $request->municipio;

        $cliente->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $cliente_id)
    {
        $cliente_id= Cliente::find($cliente_id);

        $cliente_id->cliente_id = $request->cliente_id;
        $cliente_id->nif = $request->nif;
        $cliente_id->nombre = $request->nombre;
        $cliente_id->telefono = $request->telefono;
        $cliente_id->email = $request->email;
        $cliente_id->domicilio= $request->domicilio;
        $cliente_id->provincia = $request->provincia;
        $cliente_id->municipio = $request->municipio;
      
        $cliente_id->update();

        return redirect()->back();
    }

    public function destroy(Request $request,$cliente_id)
    {
        $cliente_id= Cliente::find($cliente_id);
        $cliente_id->delete();

        return redirect()->back();
    }
}
