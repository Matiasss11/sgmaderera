<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;

class ProductoService
{
    public static function saveImage($imagen)
    {
        $name = Str::random(4).date('d_m_Y_H_i_s').'.'.$imagen->extension();
        Storage::putFileAs('public/productos', new File($imagen), $name);
        return $name;
    }

    public static function updateImage($imagenExistente, $imagen)
    {
        Storage::delete('public/productos/'.$imagenExistente);
        $imageNueva = ProductoService::saveImage($imagen);
        return $imageNueva;
    }

    public static function modificarStock($producto, $cantidad)
    {
        $producto->stock = $producto->stock + $cantidad;
        $producto->save();
        return $producto->stock;
    }

    public static function modificarPrecio($producto, $incremento)
    {
        $producto->precio_base = $producto->precio_base + $producto->precio_base * ($incremento/100);
        $producto->save();
        return $producto->precio_base;
    }

    // ATENCION, LAS SIGUIENTES FUNCIONES NO SON APTAS PARA TODO PUBLICO, SENSIBLES ABSTENERSE //

    public static function getStringCaracteristicas($array)
    {
        $string = "";
        if (isset($array["nombres"])) {
            for ($i=0; $i < sizeof($array["nombres"]) ; $i++) { 
                $string = $string.$array["nombres"][$i].":=".$array["valores"][$i]."|";
            }
        }

        return $string;
    }

    public static function getArrayCaracteristicas($string)
    {
        $array["nombres"] = [];
        $array["valores"] = [];
        $aux = explode("|", $string);
        for ($i=0; $i < sizeof($aux) - 1 ; $i++) { 
            $caracteristica = explode(":=", $aux[$i]);
            $array["nombres"][] = $caracteristica[0];
            $array["valores"][] = $caracteristica[1];
        }
        return $array;
    }
}
