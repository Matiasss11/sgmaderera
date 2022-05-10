<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductoServ;
use App\Http\Services\ProductoService;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    // INDEX
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    // CREATE
    public function create()
    {
        $producto = new Producto();
        $categorias = CategoriaProducto::all();
        return view('producto.create', compact('producto','categorias'));
    }

    // STORE
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        //Imagen
        if ($request->hasFile("productoImage")) {
            $request["imagen"] =  ProductoService::saveImage($request->file('productoImage'));
        }

        //Caracteristicas
        $request["caracteristicas"] = ProductoService::getStringCaracteristicas($request->arrayCaracteristicas);

        $producto = Producto::create($request->all());

        //Sync relaciones de categorías
        $producto->categorias()->sync($request->categorias);

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    // EDIT
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = CategoriaProducto::all();

        //Convertir en array para obtener las categorias del producto
        $array = json_decode( json_encode( $producto->categorias ), true );
        
        //Obtener el arrays de ids de categorias del producto
        $categoriasDelProducto = array_column($array, "id");

        $caracteristicas = ProductoService::getArrayCaracteristicas($producto->caracteristicas);

        return view('producto.edit', compact('producto','categorias','categoriasDelProducto','caracteristicas'));
    }

    // UPDATE
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        //Imagen
        if ($request->hasFile("productoImage")) {
            $request["imagen"] =  ProductoService::updateImage($producto->imagen, $request->file('productoImage'));
        }
        //Caracteristicas
        $request["caracteristicas"] = ProductoService::getStringCaracteristicas($request->arrayCaracteristicas);
        //Actualizacion
        $producto->update($request->all());
        //Sync relaciones de categorías
        $producto->categorias()->sync($request->categorias);

        return redirect()->route('productos.index')
            ->with('success', "$producto->nombre actualizado con éxito.");
    }

    // DESTROY
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }

    // STOCK
    public function stock(Request $request)
    {
        $producto = Producto::find($request->producto_id);
        if ($producto) {
            $stock = ProductoService::modificarStock($producto, $request->stock);
            return redirect()->route('productos.index')
                ->with('success', "Actualización exitosa, el stock de $producto->nombre ahora es $stock.");
        }

        return redirect()->route('productos.index')
            ->with('success', "Actualización fallida");
    }

    // PRECIOS
    public function precios(Request $request)
    {
        foreach ($request->productos as $producto_id) {
            ProductoService::modificarPrecio(Producto::find($producto_id), $request->incremento);
        }

        return redirect()->route('productos.index')
            ->with('success', "Actualización exitosa.");
    }
}
