<?php

namespace App\Models\Clientes;

use App\Models\Sistema\Domicilio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    protected $fillable = ['nombre','cuil','telefono','email','estado','forma_pago_id','domicilio_id'];

    /**
     * Get the domicilio associated with the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function domicilio(): HasOne
    {
        return $this->hasOne(Domicilio::class);
    }
}
