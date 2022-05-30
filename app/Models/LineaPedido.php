<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;
    protected $table = 'lineas_pedido';
    protected $primaryKey = 'linea_pedido_id';
    public $incrementing = true;
    public $timestamps = false;

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }
    public function prenda(){
        return $this->belongsTo('App\Models\Prenda');
    }

    public function servicio(){
        return $this->belongsTo('App\Models\Servicio');
    }
}
