<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sistema\SubtipoMovimiento;

class SubtipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubTipoMovimiento::create([
            'nombre' => 'Ventas',
            'descripcion' => 'Ingreso por ventas',
            'tipo_movimiento_id' => 1
            ]);
        SubTipoMovimiento::create([
            'nombre' => 'Pagos por Compras',
            'descripcion' => 'Egreso debido a pagos por compras',
            'tipo_movimiento_id' => 2
            ]);
    }
}
