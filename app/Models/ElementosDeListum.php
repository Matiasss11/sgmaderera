<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ElementosDeListum
 *
 * @property $id
 * @property $cantidad
 * @property $producto_id
 * @property $lista_id
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ElementosDeListum extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','producto_id','lista_id'];



}
