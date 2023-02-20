<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Models\Clientes\Cliente;
use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Provincia;
use App\Models\Ventas\FormaPago;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes   = Cliente::paginate();
        $formas     = FormaPago::all();
        $provincias = Provincia::whereIn('id', [8, 12, 23])->get();

        return view('clientes.index', compact('clientes','formas', 'provincias'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Se ha registrado un cliente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', "$cliente->nombre actualizado con éxito.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado con exito');
    }

    public function encontrarCiudad(Request $request)
	{
	    $ciudades=Ciudad::select('nombre','id')
			->where('provincia_id',$request->id)
            ->get();
        return response()->json($ciudades);
    }
}
