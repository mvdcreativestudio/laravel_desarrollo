@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mr-auto d-flex align-items-center">
            Point of Sale 
            <i class="fas fa-th ml-3 cursor-pointer" id="grid-view" onclick="changeView('grid')"></i>
            <i class="fas fa-list ml-1 cursor-pointer" id="list-view" onclick="changeView('list')"></i>
        </h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Productos</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-productos" data-toggle="tab" href="#productos">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-categorias" data-toggle="tab" href="#categorias">Categorías</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="productos">
                                <div class="input-group mb-3">
                                    <form action="{{ route('admin.pos.searchProduct') }}" method="GET" class="w-100">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Buscar productos" name="search_term" id="search-products-input" value="{{ old('search_term') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="search-products-button">Buscar</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                                <div id="list-view-container">
                                    <table class="table table-striped" id="productos-table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th class="text-center">Precio</th>
                                                <th class="col-1 text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td class="text-center">${{ $product->price }}</td>
                                                    <td class="col-1 text-right">
                                                        <form action="{{ route('admin.pos.agregar-producto') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="producto_id" value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $products->links() }}
                                </div>
                                <div id="grid-view-container" style="display: none;">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img class="card-img-top mx-auto" src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}" style="width:100px; height:100px; object-fit:cover">
                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="card-title">{{ \Illuminate\Support\Str::limit($product->name, 20) }}</h6>
                                                    <p class="card-text">${{ $product->price }}</p>
                                                    <form action="{{ route('admin.pos.agregar-producto') }}" method="POST" class="mt-auto">
                                                        @csrf
                                                        <input type="hidden" name="producto_id" value="{{ $product->id }}">
                                                        <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-4">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="tab-pane fade" id="categorias">
                                <!-- Código de la vista de categorías -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Productos de la orden</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productosOrden as $productoOrden)
                                <tr>
                                    <td>{{ Str::limit($productoOrden['name'], 20) }}</td>
                                    <td class="precio-producto">{{ $productoOrden['price'] }}</td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn-sm" type="button" onclick="decrementCantidad(this)">-</button>
                                            </div>
                                            <input type="number" class="form-control form-control-sm cantidad" name="cantidad" value="1" min="1">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="button" onclick="incrementCantidad(this)">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.pos.eliminar-producto') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $productoOrden['id'] }}">

                                            <button class="btn btn-danger btn-action btn-delete" data-toggle="tooltip" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <button class="col-12 btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-vaciar-productos').submit();">Vaciar productos</button>
                        <form id="form-vaciar-productos" action="{{ route('admin.pos.vaciar-productos') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                    
                    </div>
                    
                    <div class="card-footer">
                        
                    
                        <div class="form-group">
                            <div class="btn-group mb-3 col-12 w-100 p-0">
                                <button class="btn btn-primary col-4" id="btn-agregar-cupon">Agregar Cupón</button>
                                <button class="btn btn-primary col-4" id="btn-agregar-porcentaje">Descuento en %</button>
                                <button class="btn btn-primary col-4" id="btn-agregar-precio">Descuento en $</button>
                            </div>
                            <div class="form-group" id="cupon-descuento-container" style="display: none;">
                                <label for="cupon-descuento">Cupón de Descuento</label>
                                <input type="text" class="form-control" id="cupon-descuento" placeholder="Ingrese el cupón">
                            </div>
                    
                            <div class="form-group" id="descuento-porcentaje-container" style="display: none;">
                                <label for="descuento-porcentaje">Descuento (%)</label>
                                <input type="number" class="form-control" id="descuento-porcentaje" placeholder="Ingrese el porcentaje de descuento">
                            </div>
                    
                            <div class="form-group" id="descuento-precio-container" style="display: none;">
                                <label for="descuento-precio">Descuento (Precio)</label>
                                <input type="number" class="form-control" id="descuento-precio" placeholder="Ingrese el descuento en precio fijo">
                            </div>
                    
                            <div class="form-group mt-3">
                                <label for="medio-pago">Seleccione el medio de pago</label>
                                <select class="form-control" id="medio-pago">
                                    <option>Efectivo</option>
                                    <option>Tarjeta Débito/Crédito</option>
                                    <option>Cheque</option>
                                </select>
                            </div>
                    
                            <div class="form-group">
                                <label for="forma-entrega">Forma de Entrega</label>
                                <select class="form-control" id="forma-entrega">
                                    <option>Retiro en el Local</option>
                                    <option>Entrega a Domicilio</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <h6>Subtotal:</h6>
                                <h6 class="total-venta">${{ number_format($total, 2) }}</h6>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <h6>Total:</h6>
                                <h6 class="total-venta">${{ number_format($total, 2) }}</h6>
                            </div>
                    
                            <div class="d-flex btn-group w-100">
                                <button class="btn btn-primary col-12">Finalizar Venta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnAgregarCupon = document.getElementById('btn-agregar-cupon');
        var btnAgregarPorcentaje = document.getElementById('btn-agregar-porcentaje');
        var btnAgregarPrecio = document.getElementById('btn-agregar-precio');
        var cuponDescuentoContainer = document.getElementById('cupon-descuento-container');
        var descuentoPorcentajeContainer = document.getElementById('descuento-porcentaje-container');
        var descuentoPrecioContainer = document.getElementById('descuento-precio-container');
        
        btnAgregarCupon.addEventListener('click', function() {
            cuponDescuentoContainer.style.display = (cuponDescuentoContainer.style.display === 'none') ? 'block' : 'none';
            descuentoPorcentajeContainer.style.display = 'none';
            descuentoPrecioContainer.style.display = 'none';
        });
        
        btnAgregarPorcentaje.addEventListener('click', function() {
            cuponDescuentoContainer.style.display = 'none';
            descuentoPorcentajeContainer.style.display = (descuentoPorcentajeContainer.style.display === 'none') ? 'block' : 'none';
            descuentoPrecioContainer.style.display = 'none';
        });
        
        btnAgregarPrecio.addEventListener('click', function() {
            cuponDescuentoContainer.style.display = 'none';
            descuentoPorcentajeContainer.style.display = 'none';
            descuentoPrecioContainer.style.display = (descuentoPrecioContainer.style.display === 'none') ? 'block' : 'none';
        });
    });
</script>

<script>
    function incrementCantidad(button) {
        var input = button.parentNode.previousElementSibling.querySelector('.cantidad');
        var currentValue = parseInt(input.value);
        input.value = currentValue + 1;
    }
    
    function decrementCantidad(button) {
        var input = button.parentNode.nextElementSibling.querySelector('.cantidad');
        var currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    }
</script>

<script>
        // JavaScript para cambiar las vistas
        function changeView(view) {
        var listView = document.getElementById('list-view-container');
        var gridView = document.getElementById('grid-view-container');
        
        if(view === 'grid') {
            listView.style.display = 'none';
            gridView.style.display = 'block';
        } else {
            listView.style.display = 'block';
            gridView.style.display = 'none';
        }
        
        // Guardamos la preferencia del usuario
        localStorage.setItem('productView', view);
    }

    // Cargamos la preferencia del usuario cuando el documento esté listo
    document.addEventListener('DOMContentLoaded', function() {
        var view = localStorage.getItem('productView') || 'list';
        changeView(view);
    });
</script>


@endsection
