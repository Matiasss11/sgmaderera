<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Ventas\Entrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregas = Entrega::paginate(10);

        // dd($entregas);

        return view('entregas.index', compact('entregas'))
            ->with('i', (request()->input('page', 1) - 1) * $entregas->perPage());
    }
}
