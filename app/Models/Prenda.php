<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    use HasFactory;
    protected $table = 'prenda';
    protected $primaryKey = 'prenda_id';
    public $incrementing = true;
    public $timestamps = false;
    
    public function tarifa(){
        return $this->hasMany('App\Models\Tarifa');
    }

    public function lineas(){
        return $this->hasMany('App\Models\LineaPedido');
    }

    public function servicio(){
        return $this->hasMany('App\Models\Servicio');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id','categoria_id');
    }
}
