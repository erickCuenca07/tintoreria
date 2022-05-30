<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicio';
    protected $primaryKey = 'servicio_id';
    public $incrementing = true;
    public $timestamps = false;

    public function tarifa(){
        return $this->hasMany('App\Models\Tarifa');
    }
    
    public function lineas(){
        return $this->hasMany('App\Models\LineaPedido');
    }
}

