<?php

namespace App\Models\Clientes;

use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Domicilio;
use App\Models\Ventas\FormaPago;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    use HasFactory;

    const CLIENTE_PARTICULAR    = 1;
    const CLIENTE_INSTITUCIONAL = 2;

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

    public function ciudad()
    {
        $domicilio = DB::table('domicilio_cliente')->whereCliente_id($this->id)->first();
        $ubicacion = Domicilio::find($domicilio->id);
        $ciudad    = Ciudad::find($ubicacion->ciudad_id);
        $lugar     = $ciudad->nombre;
        return $lugar;
    }
}
