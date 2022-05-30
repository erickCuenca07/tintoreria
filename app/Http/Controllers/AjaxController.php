<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Prenda;
use app\models\Servicio;
use app\models\Cliente;
class AjaxController extends Controller
{
    public function prenda(Request $request){
        $prenda=Prenda::find($request->input('prenda_id'));
       return response(json_encode($prenda),200);
   }
   public function servicio (Request $request){
       $servicio=Servicio::find($request->input('servicio_id'));
      return response(json_encode($servicio),200);
   }
   public function cliente (Request $request){
    $cliente=Cliente::find($request->input('cliente_id'));
   return response(json_encode($cliente),200);
}
}
