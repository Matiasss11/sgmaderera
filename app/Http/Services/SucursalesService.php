<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;
use App\Models\empresa\Sucursal;
use Illuminate\Support\Facades\Auth;

class SucursalesService
{
    public function __construct()
    {
    }

    public static function getStaticUserSucursal()
    {
        $userSucursalId    = Sucursal::DEFAULT;

        if (Session::has('userSucursalIdDefault')) {
            $userSucursalId    =  Session::get('userSucursalIdDefault');
        }

        return $userSucursalId;
    }

    public static function getUserSucursal()
    {
        if (Auth::user()->foto == null) {
            $userSucursalId    = Sucursal::DEFAULT;
        } else {
            $userSucursalId = Auth::user()->sucursal_id;
        }

        return $userSucursalId;       

    }
}
