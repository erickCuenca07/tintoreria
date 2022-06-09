<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;
    protected $table = 'tarifa';
    protected $primaryKey = 'tarifa_id';
    public $incrementing = true;
    public $timestamps = false;

    public function prendas(){
        return $this->belongsTo(Prenda::class,'prenda_id','prenda_id');
    }
    public function servicios(){
        return $this->belongsTo(Servicio::class,'servicio_id','servicio_id');
    }
}

