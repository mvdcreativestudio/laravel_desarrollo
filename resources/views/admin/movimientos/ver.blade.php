@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Detalles del Movimiento</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre_cliente">Nombre Cliente</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{ $movimiento->nombre_cliente }}" readonly>
            </div>
            <div class="form-group">
                <label for="concepto">Concepto</label>
                <input type="text" class="form-control" id="concepto" name="concepto" value="{{ $movimiento->concepto }}" readonly>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="text" class="form-control" id="monto" name="monto" value="{{ $movimiento->monto }}" readonly>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $movimiento->tipo }}" readonly>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.movimientos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
