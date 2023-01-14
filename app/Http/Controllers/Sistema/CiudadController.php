<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Pais;
use App\Models\Sistema\Provincia;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function encontrarProvincia(Request $request)
	{
	    $provincias=Provincia::select('nombre','id')
			->where('pais_id',$request->id)
            ->get();
        return response()->json($provincias);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises=Pais::all();
        $provincias=Provincia::all();
        $ciudades=Ciudad::all();

        return view('ciudad.index', ["paises"=> $paises, "provincias"=> $provincias, "ciudades"=> $ciudades]);
    }


    public function guardar(Request $request)
    {
        $ciudad=new Ciudad;
        $ciudad->nombre=$request->get('nombre');
        $ciudad->codigo_postal=$request->get('codigo_postal');
        $ciudad->provincia_id=$request->get('provincia_id');
        $ciudad->save();
        
        return redirect()->route('ciudad.index');
    }
}
