<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Empresa\Sucursal;
use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Domicilio;
use App\Models\Sistema\Pais;
use App\Models\Sistema\Provincia;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function encontrarProvincia(Request $request)
	{
	    $provincias=Provincia::select('nombre','id')
			->where('pais_id',$request->id)
            ->get();
        return response()->json($provincias);
    }

    public function encontrarCiudad(Request $request)
	{
	    $ciudades=Ciudad::select('nombre','id')
			->where('provincia_id',$request->id)
            ->get();
        return response()->json($ciudades);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        $sucursales = Sucursal::all();
        $paises = Pais::all();
        $provincias = Provincia::all();
        $ciudades = Ciudad::all();

        return view("sucursal.index", compact('empresas','sucursales','paises','provincias','ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::all();

        return view("sucursal.create", [
            "paises"            =>  $paises,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $domicilio = new Domicilio;
        $domicilio->direccion = $request->get('direccion');
        $domicilio->departamento = $request->get('departamento');
        $domicilio->piso = $request->get('piso');
        $domicilio->ciudad_id = $request->get('ciudad_id');
        $domicilio->save();
        
        $sucursal = new Sucursal;
        $sucursal->razon_social=$request->get('razon_social');
        $sucursal->telefono=$request->get('telefono');
        $sucursal->cuit=$request->get('cuit');
        $sucursal->email=$request->get('email');
        $sucursal->fecha_creacion=$request->get('fecha_creacion');
        $sucursal->domicilio_id=$domicilio->id;
        

        if($request->file('logo')){

            $image = $request->logo_sistema;
            $image->move(public_path() . '/imagenes/logo/', $image->getClientOriginalName());
            $sucursal->logo = $image->getClientOriginalName();

        }

        $sucursal->save();

        return redirect()->route('sucursal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal=Sucursal::findOrFail($id);
        $paises=Pais::all();
        $provincias=Provincia::all();
        $ciudades=Ciudad::all();

        return view("sucural.edit",["sucursal"=>$sucursal,"paises"=>$paises,"provincias"=>$provincias,"ciudades"=>$ciudades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucural
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        $domicilio=Domicilio::find($sucursal->domicilio_id);
        $domicilio->direccion = $request->get('direccion');
        $domicilio->departamento = $request->get('departamento');
        $domicilio->piso = $request->get('piso');
        $domicilio->ciudad_id = $request->get('ciudad_id');
        $domicilio->update();
        //dd($domicilio);
        
        $sucursal->razon_social=$request->get('razon_social');
        $sucursal->telefono=$request->get('telefono');
        $sucursal->cuit=$request->get('cuit');
        $sucursal->email=$request->get('email');
        $sucursal->fecha_creacion=$request->get('fecha_creacion');

        //$sucursal->authorize('update', $sucursal);
        if($request->file('logo')){

            $image = $request->logo;
            $image->move(public_path() . '/imagenes/logo/', $image->getClientOriginalName());
            $sucursal->logo = $image->getClientOriginalName();

        }

        $sucursal->update();

        return redirect()->route('sucursal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        //
    }
}
