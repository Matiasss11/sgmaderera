<?php

namespace App\Models\Productos;

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
class ElementosDeLista extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;
    protected $table = 'elementos_de_lista';
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','producto_id','lista_id'];



}
