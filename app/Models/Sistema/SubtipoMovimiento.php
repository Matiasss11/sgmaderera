<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtipoMovimiento extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion','tipo_movimiento_id'
     ];
 
     public function tipo()
     {
         return $this->belongsTo(TipoMovimiento::class, 'tipo_movimiento_id');
     }
}
