<?php

namespace App\Models\Sistema;

use App\Models\Clientes\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;

    protected $fillable = [
        'piso',
        'departamento',
        'numero',
        'calle_id',
        'ciudad_id',
    ];

    protected $table = 'domicilios';

    public function calle()
    {
        return $this->belongsTo(Calle::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }

    public function empresa()
    {
        return $this->hasOne(Empresa::class);
    }
}
