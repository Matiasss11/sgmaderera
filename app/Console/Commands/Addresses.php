<?php

namespace App\Console\Commands;

use App\Models\Sistema\Ciudad;
use App\Models\Sistema\Provincia;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Addresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response   = Http::get('https://apis.datos.gob.ar/georef/api/provincias');
        $response   = json_decode($response->getBody(),true);
        $provincias = json_encode($response['provincias']);
        $provincias = json_decode($provincias);

        foreach ($provincias as $provincia) {
            Provincia::UpdateOrCreate([
                'nombre'   => $provincia->nombre,
            ]);
        }

        // return true;

        $response   = Http::get('https://apis.datos.gob.ar/georef/api/localidades?provincia="La Pampa"&max=4142');
        $response   = json_decode($response->getBody(),true);
        $ciudades = json_encode($response['localidades']);
        $ciudades = json_decode($ciudades);

        foreach ($ciudades as $ciudad) {
            $provincia = Provincia::whereNombre($ciudad->provincia->nombre)->first();
            Ciudad::create([
                'nombre'       => $ciudad->localidad_censal->nombre,
                'provincia_id' => $provincia->id
            ]);
        }

    }
}
