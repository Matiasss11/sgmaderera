<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Presupuesto
 *
 * @property $id
 * @property $cliente_id
 * @property $venta_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Presupuesto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','venta_id'];



}
