<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Prenda;
use App\Models\Servicio;
use App\Models\LineaPedido;

class PedidoController extends Controller
{
    
    public function index()
    {
        $pedido=Pedido::all();
        $cliente=Cliente::all();
        return view('lista',compact('pedido','cliente'));
    }

    public function create()
    {
        $pedido=Pedido::all();
        $cliente=Cliente::all();
        return view('create',['pedido'=>$pedido,'cliente'=>$cliente]);
    }

    public function store(Request $request)
    {
        $pedido = new Pedido();
        
        $pedido->numero_pedido = $request->pedido_id;
        $pedido->cliente_id = $request->cliente_id;
        $pedido->fecha_recibo= $request->fecha_actual;
        $pedido->domicilio = $request->domicilio;
        $pedido->provincia = $request->provincia;
        $pedido->municipio = $request->municipio;
        $pedido->fecha_prevista = $request->fecha_prevista;
        $pedido->fecha_entregado = $request->fecha_entrega;

        $pedido->save();

        $prenda=Prenda::all();
        $servicio=Servicio::all();
        $cliente=Cliente::all();
        $linea=LineaPedido::all();
        return view('factura',['pedido'=>$pedido,'cliente'=>$cliente,'prenda'=>$prenda,'servicio'=>$servicio,'linea'=>$linea]);
    }
    public function edit($num)
    {
        $pedido=Pedido::find($num);
       $prenda=Prenda::all();
       $servicio=Servicio::all();
       $linea=LineaPedido::all();
        return view('factura',['pedido'=>$pedido,'prenda'=>$prenda,'servicio'=>$servicio,'linea'=>$linea]);
    }
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request,$numero_pedido)
    {
        $numero_pedido= Pedido::find($numero_pedido);
        
        $numero_pedido->delete();

        return redirect()->back();
    }
}
