<?php

namespace App\Models\Productos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;
    protected $table = "categorias_de_productos";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];

    public function productos()
    {
        return $this->belongsToMany(Productos::class, "producto-categoria", "categoria_id", "producto_id");
    }
}
