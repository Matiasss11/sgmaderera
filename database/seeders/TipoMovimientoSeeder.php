<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sistema\TipoMovimiento;

class TipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMovimiento::create([
            'nombre'=>'Ingreso',
            'descripcion'=>'Movimientos de ingresos de la organizacion',
        ]);
        TipoMovimiento::create([
            'nombre' => 'Egreso',
            'descripcion' => 'Movimientos de egresos de la organizacion'
        ]);
    }
}
