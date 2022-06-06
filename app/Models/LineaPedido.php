<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;
    protected $table = 'linea_pedido';
    protected $primaryKey = 'linea_pedido_id';
    public $incrementing = true;
    public $timestamps = false;

    public function pedido(){
        return $this->belongsTo(Pedido::class,'numero_pedido','numero_pedido');
    }
    public function prenda(){
        return $this->belongsTo(Prenda::class,'prenda_id','prenda_id');
    }

    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id','servicio_id');
    }
}
