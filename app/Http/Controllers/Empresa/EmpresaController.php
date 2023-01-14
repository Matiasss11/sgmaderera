<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Pais;
use App\Models\Sistema\Provincia;
use Illuminate\Http\Request;

class EmpresaController extends Controller
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
        $paises = Pais::all();
        $provincias = Provincia::all();
        $ciudades = Ciudad::all();

        return view("empresa.index", compact('empresas','paises','provincias','ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::all();

        return view("empresa.create", [
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
        $empresa = new Empresa;
        $empresa->razon_social=$request->get('razon_social');
        $empresa->telefono=$request->get('telefono');
        $empresa->cuit=$request->get('cuit');
        $empresa->email=$request->get('email');
        $empresa->fecha_creacion=$request->get('fecha_creacion');
        

        if($request->file('logo')){

            $image = $request->logo_sistema;
            $image->move(public_path() . '/imagenes/logo/', $image->getClientOriginalName());
            $empresa->logo = $image->getClientOriginalName();

        }

        $empresa->save();

        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
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
        $empresa=Empresa::findOrFail($id);
        $paises=Pais::all();
        $provincias=Provincia::all();
        $ciudades=Ciudad::all();

        return view("empresa.edit",["empresa"=>$empresa,"paises"=>$paises,"provincias"=>$provincias,"ciudades"=>$ciudades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresa->razon_social=$request->get('razon_social');
        $empresa->telefono=$request->get('telefono');
        $empresa->cuit=$request->get('cuit');
        $empresa->email=$request->get('email');
        $empresa->fecha_creacion=$request->get('fecha_creacion');

        //$empresa->authorize('update', $empresa);
        if($request->file('logo')){

            $image = $request->logo;
            $image->move(public_path() . '/imagenes/logo/', $image->getClientOriginalName());
            $empresa->logo = $image->getClientOriginalName();

        }

        $empresa->update();

        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
