<?php

namespace App\Http\Livewire;

use App\Models\ElementosDeLista;
use App\Models\ListaDeProducto;
use App\Models\Presupuesto;
use App\Models\Producto;
use App\Models\Venta;
use Livewire\Component;

class ListaDeProductos extends Component
{   
    // Inputs
    public $cantidad;
    public $producto_id;
    public $precio_total;
    public $stock;

    // Collections
    public $productos;

    public $presupuesto_id;
    public $elementos = [];
    public $lista;

    public function mount()
    {
        $this->precio_total = 0;
        $this->productos = Producto::all();

        if ($this->presupuesto_id) {
            // Obtener lista de productos
            [$this->elementos, $this->precio_total] = $this->cargarElementos($this->getElementos());
        }else {
            // Crear lista de productos
            $this->lista = new ListaDeProducto();
        }  
    }

    public function render()
    {
        return view('livewire.lista-de-productos');
    }

    /** */
    public function agregarProductos(){
        $producto = Producto::find($this->producto_id);
        // Aumentar cantidad de un producto ya cargado
        $cargarNuevo = true;
        foreach ($this->elementos as $key => $elemento) {
            if ($elemento['producto_id'] == $this->producto_id) {
                $this->elementos[$key]['cantidad'] = $elemento['cantidad'] + $this->cantidad;
                $this->elementos[$key]['precio_unitario'] = $producto->precio_base;
                $this->elementos[$key]['precio'] = ($elemento['cantidad'] + $this->cantidad) * $producto->precio_base;
                $cargarNuevo = false;
            }
        }
        // Cargar nuevo elemento a la lista
        if ($cargarNuevo) {
            $this->elementos[] = [
                                    'cantidad' => $this->cantidad, 
                                    'producto_id' => $this->producto_id, 
                                    'nombre' => $producto->nombre,
                                    'precio_unitario' => $producto->precio_base,
                                    'precio' => $producto->precio_base * $this->cantidad
                                ];
        }
        $this->precio_total += $producto->precio_base * $this->cantidad;
    }

    /** */
    public function quitarProductos($producto_id){
        foreach ($this->elementos as $key => $elemento) {
            if ($producto_id == $elemento['producto_id']) {
                $this->precio_total -= $elemento['precio'];
                unset($this->elementos[$key]);
            }
        }
    }

    /** */
    public function mostrarStock(){
        if ($this->producto_id) {
            $producto = Producto::find($this->producto_id);
            $this->stock = $producto->stock;
        }else{
            $this->stock = null;
        }
        return true;
    }

    /** */
    public function ejecutarReserva(){
        $this->guardarPresupuesto();
        return redirect()->route('presupuestos.index');
    }

    /** */
    public function ejecutarVenta(){
        $venta = Venta::create();
        $this->guardarPresupuesto($venta->id);
        return redirect()->route('ventas.index');
    }

    // Metodos

    /** */
    public function cargarElementos($lista){
        $elementos = []; $precio_total = 0;
        foreach ($lista as $item) {
            $elementos[] = [
                        'cantidad' => $item->cantidad, 
                        'producto_id' => $item->producto_id, 
                        'nombre' => $item->nombre,
                        'precio_unitario' => $item->precio_base,
                        'precio' => $item->precio_base * $item->cantidad
                    ];
            $precio_total += $item->precio_base * $item->cantidad;
        }
        return [$elementos, $precio_total];
    }

    /** */
    public function getElementos(){
        $this->lista = ListaDeProducto::where('presupuesto_id', $this->presupuesto_id)->first();
        return ElementosDeLista::leftJoin('productos','productos.id', 'elementos_de_lista.producto_id')
                                ->where('lista_id', $this->lista->id)
                                ->select('elementos_de_lista.*', 
                                        'productos.nombre as nombre',
                                        'productos.precio_base as precio_base',
                                        'productos.stock as stock')
                                ->get();
    }

    /** Guardar presupuesto, guardar lista y eliminar elementos previos y guardar los nuevos */
    public function guardarPresupuesto($venta_id = null){
        // Obtener presupuesto
        if ($this->presupuesto_id) {
            Presupuesto::find($this->presupuesto_id)->update(['venta_id' => $venta_id]);
        }else {
            $presupuesto = Presupuesto::create(['venta_id' => $venta_id]);
            $this->presupuesto_id = $presupuesto->id;
        }

        // Guardar lista
        $this->lista->presupuesto_id = $this->presupuesto_id;
        $this->lista->save();

        // Eliminar elementos antiguos
        ElementosDeLista::where('lista_id', $this->lista->id)->delete();

        // Guardar elementos
        foreach ($this->elementos as $elemento) {
            $elemento['lista_id'] = $this->lista->id;
            ElementosDeLista::create($elemento);
        }

        return true;
    }
}
