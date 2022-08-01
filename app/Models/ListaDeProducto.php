<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ListaDeProducto
 *
 * @property $id
 * @property $presupuesto_id
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ListaDeProducto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['presupuesto_id'];



}
