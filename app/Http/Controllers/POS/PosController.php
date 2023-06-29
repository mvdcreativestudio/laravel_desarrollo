<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;


class PosController extends Controller
{
    public function dashboard()
    {
        $products = Product::paginate(8);

        // Obtener los productos agregados a la orden de la sesión
        $productosOrden = session()->get('productosOrden', []);

        // Calcular el total sumando los precios de los productos en la orden
        $total = 0;
        foreach ($productosOrden as $producto) {
            $total += $producto['price'] * $producto['cantidad'];
        }

        return view('admin.pos.dashboard')->with('products', $products)
                                        ->with('productosOrden', $productosOrden)
                                        ->with('total', $total);

    }

    public function agregarProducto(Request $request)
    {
        // Obtener el ID del producto enviado desde la solicitud
        $productoId = $request->input('producto_id');

        // Buscar el producto en la base de datos por su ID
        $producto = Product::findOrFail($productoId);


        if ($producto) {
            // Obtener los productos agregados a la orden de la sesión
            $productosOrden = session()->get('productosOrden', []);

            // Verificar si el producto ya existe en la lista de productos de la orden
            $indice = array_search($productoId, array_column($productosOrden, 'id'));

            if ($indice !== false) {
                // Si el producto ya existe, incrementar la cantidad
                $productosOrden[$indice]['cantidad']++;
            } else {
                // Si el producto no existe, agregarlo a la lista de productos de la orden
                $productosOrden[] = [
                    'id' => $producto->id,
                    'name' => $producto->name,
                    'price' => $producto->price,
                    'cantidad' => 1,
                ];
            }

            // Almacenar la lista actualizada de productos de la orden en la sesión
            session()->put('productosOrden', $productosOrden);
        }

        // Redireccionar a la página de la sección de productos de la orden
        return redirect()->route('admin.pos.dashboard');
    }

    public function eliminarProducto(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Obtener los productos agregados a la orden de la sesión
        $productosOrden = session()->get('productosOrden', []);

        // Buscar el índice del producto en la lista de productos de la orden
        $indice = $productosOrden->pluck('id')->search($productoId);


        if ($indice !== false) {
            // Eliminar el producto de la lista de productos de la orden
            array_splice($productosOrden, $indice, 1);

            // Almacenar la lista actualizada de productos de la orden en la sesión
            session()->put('productosOrden', $productosOrden);
        }

        // Redireccionar a la página de la sección de productos de la orden
        return redirect()->route('admin.pos.dashboard');
    }

    public function vaciarProductos()
    {
        // Vaciar la lista de productos de la orden en la sesión
        session()->forget('productosOrden');

        // Redireccionar a la página de la sección de productos de la orden
        return redirect()->route('admin.pos.dashboard');
    }

    public function searchProduct(Request $request)
    {
        $searchTerm = $request->input('search_term');

        $products = Product::when($searchTerm, function ($query) use ($searchTerm) {
    return $query->where('name', 'like', '%' . $searchTerm . '%');
})->paginate(8);


        // Obtener los productos agregados a la orden de la sesión
        $productosOrden = session()->get('productosOrden', []);

        // Calcular el total sumando los precios de los productos en la orden
        $total = 0;
        foreach ($productosOrden as $producto) {
            $total += $producto['price'] * $producto['cantidad'];
        }

        return view('admin.pos.dashboard', compact('products', 'productosOrden', 'total'));
    }
}
