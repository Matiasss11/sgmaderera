<?php

namespace App\Models\Productos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;
    protected $table = "categorias_de_productos";

    public function productos()
    {
        return $this->belongsToMany(Productos::class, "producto-categoria", "categoria_id", "producto_id");
    }
}
