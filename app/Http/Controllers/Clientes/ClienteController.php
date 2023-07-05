<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Models\Clientes\Cliente;
use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Domicilio;
use App\Models\Sistema\Provincia;
use App\Models\Ventas\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($request);
        $cliente   = Cliente::create([
            'nombre'         => $request->get('nombre') ? $request->get('nombre') : null,
            'apellido'       => $request->get('apellido') ? $request->get('apellido') : null,
            'razon_social'   => $request->get('razon_social') ? $request->get('razon_social') : null,
            'cuil'           => $request->get('cuil') ? $request->get('cuil') : null,
            'cuit'           => $request->get('cuit') ? $request->get('cuit') : null,
            'forma_pago_id'  => $request->get('forma_pago_id'),
            'telefono'       => $request->get('telefono'),
            'email'          => $request->get('email'),
            'tipo_cliente_id'=> $request->get('razon_social') ? 2 : 1,
        ]);
        
        $domicilio = Domicilio::create([
            'piso'          => $request->get('piso') ? $request->get('piso') : null,
            'departamento'  => $request->get('departamento') ? $request->get('departamento') : null,
            'calle'         => $request->get('calle') ? $request->get('calle') : null,
            'numero'        => $request->get('numero') ? $request->get('numero') : null,
            'calle_id'      => $request->get('calle_id') ? $request->get('calle_id') : null,
            'ciudad_id'     => $request->get('ciudad_id') ? $request->get('ciudad_id') : null,
        ]);

        DB::table('domicilio_cliente')->insert([
            'cliente_id'   => $cliente->id, 
            'domicilio_id' => $domicilio->id,  
        ]);

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
