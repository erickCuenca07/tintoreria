<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Prenda;
use App\Models\Servicio;
use App\Models\LineaPedido;

class ImprimirController extends Controller
{
    
    public function index()
    {
      
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($num)
    {
        $pedido=Pedido::find($num);
        $prenda=Prenda::all();
        $servicio=Servicio::all();
        $linea=LineaPedido::all();
        
        $pdf = PDF::loadView('imprimir',['pedido'=>$pedido,'prenda'=>$prenda,'servicio'=>$servicio,'linea'=>$linea]);
        return $pdf->stream();

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
