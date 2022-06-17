<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function precio(Request $request){
        $prenda = $request->input('prenda_id');
        $servicio = $request->input('servicio_id');
        $sql = 'SELECT precio FROM tarifa where prenda_id = '.$prenda.' AND servicio_id = '.$servicio;
        $precio = DB::select($sql);
        return response(json_encode($precio),200);
        
    }
    public function cliente (Request $request){
        $sql = 'SELECT * FROM cliente where telefono = ' . $request->input('telefono');
        $cliente = DB::select($sql);
        return response(json_encode($cliente),200);
    }
}
