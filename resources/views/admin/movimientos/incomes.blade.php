@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mr-auto">Ingresos</h1>
        <div class="card-header-action text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary">Atrás</a>
        </div>
    </div>

    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Nombre del Cliente</th>
                    <th>Tipo</th>
                    <th>Concepto de Movimiento</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr class="text-center">
                        <td>{{ $movimiento->id }}</td>
                        <td>{{ $movimiento->nombre_cliente }}</td>
                        <td>
                            @if ($movimiento->tipo === 'Cobro')
                                <span class="text-success font-weight-bold">Ingreso</span>
                            @else
                                <span class="text-danger font-weight-bold">Egreso</span>
                            @endif
                        </td>
                        <td>{{ $movimiento->concepto }}</td>
                        <td>{{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y') }}</td>
                        <td>${{ number_format($movimiento->monto, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>



@endsection