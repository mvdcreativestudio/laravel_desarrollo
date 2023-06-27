<?php

namespace App\Models\Movimientos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $connection = 'cashflow';
    protected $table = 'usuarios';


    public function movimientos() 
    {
        return $this->hasMany(Movimiento::class);
    }
}