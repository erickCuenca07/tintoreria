<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LineaPedido;
use App\Models\Prenda;
use App\Models\Pedido;
use App\Models\Servicio;

class LineaPedidoController extends Controller
{
    public function index()
    {
        $linea=LineaPedido::all();
        return view('factura',compact('linea'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $linea = new LineaPedido();
        $linea->linea_pedido_id = $request->linea_pedido_id;
        $linea->numero_pedido = $request->numero_pedido;
        $linea->prenda_id = $request->prenda_id;
        $linea->precio = $request->precio;
        $linea->cantidad = $request->cantidad;
        $linea->servicio_id = $request->servicio_id;
        $linea->save();
        $num=$request->numero_pedido;
        $pedido=Pedido::find($num);
        $prenda=Prenda::all();
        $servicio=Servicio::all();

        return view('factura',['pedido'=>$pedido,'prenda'=>$prenda,'servicio'=>$servicio]);
    }

    public function update(Request $request, $id)
    {
        $id = LineaPedido::find($id);
        $id->linea_pedido_id = $request->linea_pedido_id;
        $id->numero_pedido = $request->numero_pedido;
        $id->prenda_id = $request->prenda_id;
        $id->servicio_id = $request->servicio;
        $id->cantidad = $request->cantidad;
        $id->precio = $request->precio;

        $id->update();
        
        $num=$request->numero_pedido;
        $pedido=Pedido::find($num);
        $prenda=Prenda::all();
        $servicio=Servicio::all();
        return view('factura',['pedido'=>$pedido,'prenda'=>$prenda,'servicio'=>$servicio]);
    }

    public function edit($id)
    {
        //
    }
    public function show(){
        //
    }
    public function destroy(Request $request,$id)
    {
        $id = LineaPedido::find($id);
        $id->delete();
        
        $num=$request->numero_pedido;
        $pedido=Pedido::find($num);
        $prenda=Prenda::all();
        $servicio=Servicio::all();

        return view('factura',['pedido'=>$pedido,'prenda'=>$prenda,'servicio'=>$servicio]);
    }
}
