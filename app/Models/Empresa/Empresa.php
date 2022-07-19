<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Empresa extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['razon_social', 'fecha_creacion', 'domicilio_id', 'telefono', 'email', 'logo', 'cuit'];

    public function domicilio()
    {
        return $this->belongsTo(Domicilio::class);
    }
}
