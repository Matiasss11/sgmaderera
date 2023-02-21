<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $movimientos = Movimiento::where('sucursal_id',Auth::user()->sucursal_id)->get();
        
        return view('movimiento.index',["movimientos"=> $movimientos]);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movimientos=Movimiento::all();
        // $subtipomovimientos=SubTipoMovimiento::all();
        // $tipomovimientos=TipoMovimiento::all();
        // $empresa=Empresa::all();

        $desde=$request->desde;
        $hasta=$request->hasta;
        
        if(count($request->all())>1)
        {
            //dd($request->all());
            $sql = Movimiento::select('movimientos.*');

            if($request->desde)
            {
                $sql = $sql->whereDate('created_at','>=',$request->desde);
            }            
            if($request->hasta)
            {
                $sql = $sql->whereDate('created_at','<=',$request->hasta);
            }
            /*if($request->tipo_movimiento_id)
            {
                $sql = $sql->whereTipo_movimiento_id($request->tipo_movimiento_id); //creo la consulta y almaceno en "sql"
            }
            if($request->subtipo_movimiento_id)
            {
                $sql = $sql->whereSubtipo_movimiento_id($request->subtipo_movimiento_id); //creo la consulta y almaceno en "sql"
            }*/
            
            $movimientos=$sql->orderBy('created_at','desc')->get();
            // $tipo_movimiento_id=$request->tipo_movimiento_id;
            // $subtipo_movimiento_id=$request->tipo_movimiento_id;


        }
        else
        {

            // $tipo_movimiento_id=null;
            // $subtipo_movimiento_id=null;

            $hoy=date('Y-m-d');
            //$movimientos=Movimiento::whereTipo_movimiento_id(1)->orderBy('created_at','desc')->get();
            $movimientos=Movimiento::whereCreated_at($hoy)->orderBy('created_at','desc')->get();
            //dd($hoy);
        }

        return view('movimiento.index',[
            "movimientos"                =>  $movimientos,
            // "tipomovimientos"            =>  $tipomovimientos,
            // "subtipomovimientos"         =>  $subtipomovimientos,
            "desde"                      =>  $desde,
            "hasta"                      =>  $hasta,
            // "tipo_movimiento_id"         =>  $tipo_movimiento_id, //si los id son identicos que me mantenga el valor
            // "subtipo_movimiento_id"      =>  $subtipo_movimiento_id,
            // "empresa"                    =>  $empresa,

        ]);
    }
}
