<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sistema\Pais;
class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create(['nombre'=>'Argentina']);
    }
}
