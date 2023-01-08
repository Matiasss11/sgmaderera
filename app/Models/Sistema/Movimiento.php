<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'monto', 'subtipo_movimiento_id', 'sucursal_id', 'operacion_id'
   ];
 
   public function subtipo_movimiento()
   {
       return $this->belongsTo(SubtipoMovimiento::class, 'subtipo_movimiento_id');
   }
}
