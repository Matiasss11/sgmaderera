<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nombre', 'descripcion'
    ];

    protected $table = 'tipo_movimientos';

    public function subtipos()
    {
        return $this->hasMany(SubTipoMovimiento::class);
    }
}
