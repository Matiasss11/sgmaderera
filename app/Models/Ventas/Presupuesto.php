<?php

namespace App\Models\Ventas;

use App\Models\Clientes\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Presupuesto
 *
 * @property $id
 * @property $atencion
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
    const ATENCION_TELEFONICA = 1;
    CONST ATENCION_MOSTRADOR  = 2;
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['atencion','cliente_id','venta_id','sucursal_id'];


    /**
     * Get the cliente that owns the Presupuesto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }



}
