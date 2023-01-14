<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([
            'razon_social'      =>  'Maderas Ecke-Sucursal 1',
            'cuit'              =>  '00-00000000-0',
            'telefono'          =>  '(0000) 00-0000',
            'email'             =>  'maderasEckeSucursal1@email.com',
            'fecha_creacion'    =>  '2020-08-03',
            'empresa_id'        =>  1,
            'domicilio_id'      =>  1,
        ]);

        Sucursal::create([
            'razon_social'      =>  'Maderas Ecke-Sucursal 2',
            'cuit'              =>  '00-00000000-0',
            'telefono'          =>  '(0000) 00-0000',
            'email'             =>  'maderasEckeSucursal2@email.com',
            'fecha_creacion'    =>  '2021-09-01',
            'empresa_id'        =>  1,
            'domicilio_id'      =>  2
        ]);
    }
}
