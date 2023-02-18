<?php

namespace App\Models\Clientes;

use App\Models\Sistema\Domicilio;
use App\Models\Ventas\FormaPago;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'razon_social',
        'cuil',
        'cuit',
        'telefono',
        'email',
        'estado',
        'forma_pago_id',
        'domicilio_id',
        'tipo_cliente_id'];

    /**
     * The domicilios that belong to the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function domicilios(): BelongsToMany
    {
        return $this->belongsToMany(Domicilio::class);
    }

    /**
     * Get the formaPago that owns the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formaPago(): BelongsTo
    {
        return $this->belongsTo(FormaPago::class);
    }
}
