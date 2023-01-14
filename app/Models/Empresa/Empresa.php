<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['razon_social', 'fecha_creacion', 'telefono', 'email', 'logo', 'cuit'];


    /**
     * Get all of the sucursales for the Empresa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sucursales(): HasMany
    {
        return $this->hasMany(Sucursal::class);
    }
}
