<?php

namespace App\Http\Controllers;

use App\Models\Productos\ElementosDeLista;
use App\Models\Productos\ListaDeProducto;
use App\Models\Ventas\Presupuesto;
use App\Models\Ventas\Venta;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::whereNotNull('fecha_de_retiro')->paginate(10);

        return view('reserva.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = new Venta();
        return view('reserva.create', compact('venta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $venta = Venta::create($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elementos = [];
        $precio_total = 0;
        $venta = Venta::find($id);
        $presupuesto = Presupuesto::where('venta_id', $id)->first();
        $lista = ListaDeProducto::where('presupuesto_id', $presupuesto->id)->first();
        $array = ElementosDeLista::leftJoin('productos','productos.id', 'elementos_de_lista.producto_id')
                                            ->where('lista_id', $lista->id)
                                            ->select('elementos_de_lista.*', 
                                                    'productos.nombre as nombre',
                                                    'productos.precio_base as precio_base')
                                            ->get();
        foreach ($array as $item) {
            $elementos[] = [
                                    'cantidad' => $item->cantidad, 
                                    'producto_id' => $item->producto_id, 
                                    'nombre' => $item->nombre,
                                    'precio_unitario' => $item->precio_base,
                                    'precio' => $item->precio_base * $item->cantidad
                                ];
            $precio_total += $item->precio_base * $item->cantidad;
        }


        return view('reserva.show', compact('venta', 'elementos', 'precio_total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);

        return view('reserva.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        request()->validate(Venta::$rules);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta deleted successfully');
    }
}
