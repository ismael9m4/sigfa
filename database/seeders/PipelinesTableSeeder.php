<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pipeline;
class PipelinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pipeline::create([
            'positiong'=>'-24.169219994231113, -65.39555720478666',
            'country'=>'ARGENTINA',
            'province'=>'JUJUY',
            'location'=>'SAN SALVADOR DE JUJUY',
            'neighborhood'=>'VILLA JARDIN DE REYES',
            'district'=>'A - LAS PERAS',
            'material'=>'PVC',
            'diameter'=>'32 mm',
            'thickness'=>'2.8 mm',
            'length'=>'4 mts',
            'depth_earth'=>'0',
            'type_cover'=>'Pavimento',
            'life_time'=>'2 años',
        ]);
        Pipeline::create([
            'positiong'=>'-24.194274, -65.437379',
            'country'=>'ARGENTINA',
            'province'=>'JUJUY',
            'location'=>'SAN SALVADOR DE JUJUY',
            'neighborhood'=>'GUERRERO',
            'district'=>'A - FINCA EL OBISPO',
            'material'=>'PVC',
            'diameter'=>'32 mm',
            'thickness'=>'2.8 mm',
            'length'=>'4 mts',
            'depth_earth'=>'0',
            'type_cover'=>'Arena',
            'life_time'=>'10 años',
        ]);
    }
}
