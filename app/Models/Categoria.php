<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $primaryKey = 'categoria_id';
    public $incrementing = true;
    public $timestamps = false;

    public function prenda(){
        return $this->hasMany('App\Models\Prenda');
    }
}
