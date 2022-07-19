<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::all();
        return view('pais.index',["paises"=> $paises]);
    }

    public function guardar(Request $request)
    {
        $pais = new Pais;
        $pais->nombre = $request->get('nombre');
        $pais->save();
        
        return redirect()->route('pais.index');
    }
}
