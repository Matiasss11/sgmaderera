<?php

namespace App\Models\Empresa;

use App\Models\Sistema\Domicilio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sucursal extends Model
{
    const DEFAULT = 1;

    use HasFactory;

    protected $table = "sucursales";

    protected $fillable = 
    [
        'razon_social', 
        'fecha_creacion',
        'telefono', 
        'email', 
        'empresa_id',
        'domicilio_id'];

    public function domicilio()
    {
        return $this->belongsTo(Domicilio::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    /**
     * Get all of the usuarios for the Sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
