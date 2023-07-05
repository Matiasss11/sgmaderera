<?php

namespace Database\Seeders;

use App\Models\Ventas\FormaPago;
use Illuminate\Database\Seeder;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPago::create([
            'nombre'=>'Efectivo',
            'descripcion'=>'Pago en efectivo',
        ]);
        FormaPago::create([
            'nombre' => 'Debito',
            'descripcion' => 'Pago con tarjeta de debito'
        ]);
        FormaPago::create([
            'nombre'=>'Credito',
            'descripcion'=>'Pago con tarjeta de credito',
        ]);
        FormaPago::create([
            'nombre' => 'Cheque',
            'descripcion' => 'Pago con cheque'
        ]);
        FormaPago::create([
            'nombre' => 'Cuenta Corriente',
            'descripcion' => 'El cliente tiene una cuenta corriente'
        ]);
    }
}
