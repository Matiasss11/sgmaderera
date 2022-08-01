<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'razon_social'      =>  'Maderas Ecke',
            'cuit'              =>  '00-00000000-0',
            'telefono'          =>  '(0000) 00-0000',
            'email'             =>  'maderasEcke@email.com',
            'fecha_creacion'    =>  '2020-08-03',
            'logo'              =>  'logo.png',
        ]);
    }
}
