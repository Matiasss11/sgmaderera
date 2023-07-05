<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrega extends Model
{
    use HasFactory;

    CONST PENDIENTE  = 1;
    CONST ENTREGADO  = 2;

    protected $perPage = 20;

    protected $fillable = [
        'venta_id', 'cliente_id', 'fecha_entrega', 'domicilio_id', 'estado_entrega_id'
    ];

    protected $casts = [
        'fecha_entrega' => 'datetime:Y-m-d',
    ];

    /**
     * Get the venta that owns the Entrega
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venta(): BelongsTo
    {
        return $this->belongsTo(Venta::class);
    }
}
