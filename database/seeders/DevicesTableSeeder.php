<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;
class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
            'id'=>'8050237',
            'serie'=>'8050237',
            'details'=>'',
            'fk_pipeline'=>1,
        ]);
        Device::create([
            'id'=>'8050238',
            'serie'=>'8050247',
            'details'=>'Dispositivo ubicado en estacion de bombeo y control',
            'fk_pipeline'=>2,
        ]);
    }
}
