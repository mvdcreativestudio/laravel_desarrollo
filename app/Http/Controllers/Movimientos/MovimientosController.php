<?php

namespace App\Http\Controllers\Movimientos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movimientos\Movimiento;
use App\Models\Movimientos\Usuario;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;

class MovimientosController extends Controller
{
    // TODOS LOS MOVIMIENTOS

    public function transactions()
    {
        $movimientos = Movimiento::orderBy('id', 'desc')->get();
        $usuarios = Usuario::pluck('nombre', 'id');

        return view('admin.movimientos.transactions', compact('movimientos', 'usuarios'));
    }

    // AGREGAR MOVIMIENTO
    public function agregar(Request $request, $accion)
{
    // Obtener la lista de usuarios
    $usuarios = Usuario::pluck('nombre', 'id');

    $usuarioId = $request->input('usuario_id'); // Obtener el ID del usuario seleccionado

    // Obtener el nombre del cliente seleccionado
    $nombreCliente = $usuarios[$usuarioId];

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
    $movimiento->usuario_id = $usuarioId; // Asignar el ID del usuario al movimiento
    $movimiento->save();

    $mensaje = ($tipo === 'cobro') ? 'Cobro' : 'Pago';
    return redirect()
    ->back()
    ->with(['success' => $mensaje . ' agregado exitosamente', 'usuarios' => $usuarios]);

}



    public function editar(Request $request, $id)
    {
    // Obtener el movimiento a editar
    $movimiento = Movimiento::findOrFail($id);

    return view('admin.movimientos.editar', compact('movimiento'));
    }


    public function actualizar(Request $request, $id)
    {
    // Validar los datos del formulario de edición si es necesario
    $request->validate([
        'nombre_cliente' => 'required',
        'concepto' => 'required',
        'monto' => 'required',
        'tipo' => 'required',
    ]);

    // Obtener el movimiento a actualizar
    $movimiento = Movimiento::findOrFail($id);

    // Actualizar los campos del movimiento con los datos del formulario
    $movimiento->nombre_cliente = $request->input('nombre_cliente');
    $movimiento->concepto = $request->input('concepto');
    $movimiento->monto = $request->input('monto');
    $movimiento->tipo = $request->input('tipo');

    // Guardar los cambios en la base de datos
    $movimiento->save();

    // Redirigir a la página de visualización del movimiento o a donde desees
    return redirect()->route('admin.movimientos.index')->with('success', 'Movimiento actualizado exitosamente');


    }

    
    // VER MOVIMIENTO
    public function ver($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        
        return view('admin.movimientos.ver', compact('movimiento'));
    }
    
    // ELIMINAR MOVIMIENTO
    public function eliminar($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->delete();

        return redirect()->back()->with('success', 'Movimiento eliminado exitosamente');
    }
    
    // DASHBOARD DE MOVIMIENTOS
    public function index()
    {
        $movimientos = Movimiento::orderBy('id', 'desc')->get();
        $clienteCount = $this->getClienteCount();
        $proveedoresCount = $this->getProveedoresCount();
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

    // BUSCAR MOVIMIENTO
    public function search(Request $request)
    {
    $searchText = $request->input('search');

    // Realizar la búsqueda de movimientos según el texto de búsqueda
    $movimientos = Movimiento::where('nombre_cliente', 'LIKE', "%{$searchText}%")
        ->orWhere('concepto', 'LIKE', "%{$searchText}%")
        ->orWhere('tipo', 'LIKE', "%{$searchText}%")
        ->orderBy('id', 'desc')
        ->get();

    // Renderizar las filas de la tabla como HTML
    $html = View::make('admin.movimientos.table_rows', compact('movimientos'))->render();

    // Retornar el HTML como respuesta AJAX
    return $html;
    }

    // VISTA AGREGAR USUARIO

    public function agregarUsuario()
    {
        return view('admin.movimientos.agregar-usuario');
    }
}
