<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sistema\Domicilio;

class DomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domicilio::create([
            'departamento'  =>  '2000',
            'piso'          =>   '2',
            'direccion'     => 'Lopez y Planes, 500',
            'ciudad_id'     =>  1,
            ]);

    }
}
