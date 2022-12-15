<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incident;
class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incident::create([
            'title'=>'REBALSE EN AVENIDA CENTRICA',
            'description'=>'Hubo una fuga en Avda Canonigo Gorriti interseccion 19 de Abril. Barrio Centro',
            'severity'=>'0',
            'fk_level'=>'3',
            'fk_client'=>'1',
            'fk_support'=>'2',
        ]);
    }
}
