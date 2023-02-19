<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Venta
 *
 * @property $id
 * @property $user_id
 * @property $sucursal_id
 * @property $fecha_de_retiro
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','fecha_de_retiro', 'precio_total','sucursal_id'];
    protected $casts = [
        'fecha_de_retiro' => 'datetime:Y-m-d',
    ];

    /**
     * Get the presupuesto associated with the Venta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function presupuesto(): HasOne
    {
        return $this->hasOne(Presupuesto::class);
    }



}
