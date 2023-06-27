<?php

namespace App\Http\Controllers\Movimientos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movimientos\Movimiento;
use App\Models\Movimientos\Usuario;

class MovimientosController extends Controller
{
    // TODOS LOS MOVIMIENTOS

    public function transactions()
    {
        $movimientos = Movimiento::orderBy('id', 'desc')->get();

        return view('admin.movimientos.transactions', compact('movimientos'));
    }

    // AGREGAR MOVIMIENTO
    public function agregar(Request $request, $accion)
    {
        $nombreCliente = $request->input('nombre_cliente');
        $concepto = $request->input('concepto');
        $monto = $request->input('monto');
        $tipo = $request->input('tipo');

        // Insertar el nuevo movimiento en la base de datos "movimientos"
        $movimiento = new Movimiento();
        $movimiento->nombre_cliente = $nombreCliente;
        $movimiento->concepto = $concepto;
        $movimiento->fecha = date('Y-m-d H:i:s');
        $movimiento->monto = $monto;
        $movimiento->tipo = $tipo;
        $movimiento->save();

        $mensaje = ($tipo === 'cobro') ? 'Cobro' : 'Pago';
        return redirect()->back()->with('success', $mensaje . ' agregado exitosamente');
    }

    // DASHBOARD DE MOVIMIENTOS
    public function index(UsersController $usersController)
    {
        $movimientos = Movimiento::orderBy('id', 'desc')->get();
        $clienteCount = $usersController->getClienteCount();
        $proveedoresCount = $usersController->getProveedoresCount();
        $totalTransacciones = Movimiento::count();

        $cobradoHoy = Movimiento::where('tipo', 'cobro')
        ->whereDate('created_at', now()->format('Y-m-d'))
        ->sum('monto');

        $ingresosSemana = Movimiento::where('tipo', 'cobro')
        ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->sum('monto');

        $ingresosMes = Movimiento::where('tipo', 'cobro')
        ->whereYear('created_at', now()->year)
        ->whereMonth('created_at', now()->month)
        ->sum('monto');

        $ingresosAño = Movimiento::where('tipo', 'cobro')
        ->whereYear('created_at', now()->year)
        ->sum('monto');


        return view('admin.movimientos.index', compact('movimientos', 'clienteCount', 'proveedoresCount', 'totalTransacciones', 'cobradoHoy', 'ingresosSemana', 'ingresosMes', 'ingresosAño'));
    }

    // INGRESOS
    public function incomes()
    {
        $movimientos = Movimiento::where('tipo', 'cobro')
            ->orderBy('id', 'desc')
            ->get();
        
        return view('admin.movimientos.incomes', compact('movimientos'));
    }

    // TODOS LOS EGRESOS
    public function expenses()
    {
        $movimientos = Movimiento::where('tipo', 'pago')
            ->orderBy('id', 'desc')
            ->get();
        
        return view('admin.movimientos.expenses', compact('movimientos'));
    }
}
