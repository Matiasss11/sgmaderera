<?php

namespace App\Models\Productos;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $caracteristicas
 * @property $stock
 * @property $precio_base
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'stock' => 'required',
		'precio_base' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','caracteristicas','stock','precio_base','imagen','estado'];

    public function categorias()
    {
        return $this->belongsToMany(CategoriaProducto::class, "producto-categoria", "producto_id", "categoria_id");
    }
}
