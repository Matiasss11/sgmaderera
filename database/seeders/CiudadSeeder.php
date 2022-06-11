<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class CiudadSeeder extends Seeder
{
 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Ciudad::create([
            'nombre'=>'Posadas',
            'codigo_postal'=>3300,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Iguazú',
            'codigo_postal'=>3370,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Gral. Manuel Belgrano',
            'codigo_postal'=>3338,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Eldorado',
            'codigo_postal'=>3380,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'San Pedro',
            'codigo_postal'=>3364,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Montecarlo',
            'codigo_postal'=>3384,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Guaraní',
            'codigo_postal'=>3361,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'25 de Mayo',
            'codigo_postal'=>3363,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'San Ignacio',
            'codigo_postal'=>3300,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Oberá',
            'codigo_postal'=>3360,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Candelaria',
            'codigo_postal'=>3308,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Leandro N. Alem',
            'codigo_postal'=>3315,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'San Javier',
            'codigo_postal'=>3357,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Apóstoles',
            'codigo_postal'=>3350,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Concepción de la Sierra',
            'codigo_postal'=>3355,
            'provincia_id'=>1]);

        Ciudad::create([
            'nombre'=>'Puerto Rico',
            'codigo_postal'=>3334,
            'provincia_id'=>1]);

    }
}
