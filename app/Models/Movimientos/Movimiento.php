<?php

namespace App\Models\Movimientos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = ['nombre_cliente', 'concepto', 'fecha', 'monto'];
    protected $table = 'cashflow_movimientos';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');

    }
}
