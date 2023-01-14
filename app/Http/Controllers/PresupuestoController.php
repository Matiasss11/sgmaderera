<?php

namespace App\Http\Controllers;

use App\Models\Productos\ElementosDeLista;
use App\Models\Productos\ListaDeProducto;
use App\Models\Ventas\Presupuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PresupuestoController
 * @package App\Http\Controllers
 */
class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuesto::where('venta_id', null)
                                ->where('sucursal_id', Auth::user()->id)
                                ->paginate();

        return view('presupuesto.index', compact('presupuestos'))
            ->with('i', (request()->input('page', 1) - 1) * $presupuestos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presupuesto = new Presupuesto();
        return view('presupuesto.create', compact('presupuesto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Presupuesto::$rules);

        $presupuesto = Presupuesto::create($request->all());

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuesto = Presupuesto::find($id);

        return view('presupuesto.show', compact('presupuesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presupuesto = Presupuesto::find($id);

        return view('presupuesto.edit', compact('presupuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        request()->validate(Presupuesto::$rules);

        $presupuesto->update($request->all());

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lista = ListaDeProducto::where('presupuesto_id',$id)->first();
        ElementosDeLista::where('lista_id', $lista->id)->delete();
        ListaDeProducto::find($lista->id)->delete();
        Presupuesto::find($id)->delete();

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto deleted successfully');
    }
}
