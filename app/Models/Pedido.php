<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedido';
    protected $primaryKey = 'numero_pedido';
    public $incrementing = true;
    public $timestamps = false;

    public function clientes(){
        return $this->belongsTo(Cliente::class,'cliente_id','cliente_id');
    }

    public function lineas(){
        return $this->hasMany(LineaPedido::class,'numero_pedido','numero_pedido');
    }

    public function prenda(){
        return $this->belongsTo(Prenda::class,'prenda_id','prenda_id');
    }
    public function servicios(){
        return $this->belongsTo(Servicio::class,'servicio_id','servicio_id');
    }
}
