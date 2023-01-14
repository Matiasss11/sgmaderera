<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nombre', 'descripcion'
    ];

    protected $table = 'tipo_movimientos';

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
