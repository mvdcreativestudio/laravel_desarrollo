@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mr-auto">Todos los usuarios</h1>
        <div class="card-header-action text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary">Atrás</a>
        </div>
    </div>
    <div class="">
        <div class="text-right mb-4">
            <button type="button" class="btn btn-primary" id="crearUsuarioBtn">
                Crear Usuario
            </button>
            
        </div>

        <div id="crearUsuarioForm" class="mb-5" style="display: none;">
            <!-- Vista del formulario -->
            <form action="{{ route('users.agregarUsuario') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tipo_usuario">Tipo de Usuario</label>
                    <select name="tipo_usuario" class="form-control" required>
                        <option value="cliente">Cliente</option>
                        <option value="proveedor">Proveedor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Agregar Usuario</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="text-center">
                        <td>{{ ucwords($usuario->nombre) }}</td>
                        <td>{{ ucwords($usuario->direccion) }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td> {{ $usuario->tipo_usuario}} </td>
                        <td> {{ ucwords($usuario->status)}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
</section>

<script>
    var crearUsuarioBtn = document.getElementById('crearUsuarioBtn');
    var crearUsuarioForm = document.getElementById('crearUsuarioForm');

    crearUsuarioBtn.addEventListener('click', function() {
        if (crearUsuarioForm.style.display === 'none') {
            crearUsuarioForm.style.display = 'block';
        } else {
            crearUsuarioForm.style.display = 'none';
        }
    });
</script>

@endsection
