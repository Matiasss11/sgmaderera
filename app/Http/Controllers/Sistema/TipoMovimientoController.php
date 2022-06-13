<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\TipoMovimiento;
use Illuminate\Http\Request;

class TipoMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipomovimientos = TipoMovimiento::all();
        return view('tipomovimiento.index',["tipomovimientos"=> $tipomovimientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoMovimiento  $tipoMovimiento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMovimiento $tipoMovimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoMovimiento  $tipoMovimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMovimiento $tipoMovimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoMovimiento  $tipoMovimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMovimiento $tipomovimiento)
    {
        $tipomovimiento->nombre=$request->get('nombre');
        $tipomovimiento->descripcion=$request->get('descripcion');

        $tipomovimiento->update();

        return redirect()->route('tipomovimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoMovimiento  $tipoMovimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMovimiento $tipoMovimiento)
    {
        //
    }
}
