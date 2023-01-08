<?php

namespace Database\Seeders;

use App\Models\Productos\CategoriaProducto;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaProducto::create([
            'nombre' => 'Maderas Blandas',
            'descripcion' => 'Conjunto de maderas blandas',
        ]);

        CategoriaProducto::create([
            'nombre' => 'Maderas Duras',
            'descripcion' => 'Conjunto de maderas duras',
        ]);
    }
}
