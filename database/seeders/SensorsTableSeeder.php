<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sensor;
class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sensor::create([
            'id'=>'8050237',
            'state'=>'Funcionando',
            'condition_sensor'=>'Listo',
            'type'=>'Consumo',
            'description'=>'',
            'fk_device'=>'8050237',
        ]);
        Sensor::create([
            'id'=>'8050238',
            'state'=>'Funcionando',
            'condition_sensor'=>'Listo',
            'type'=>'Caudal',
            'description'=>'',
            'fk_device'=>'8050237',
        ]);
        Sensor::create([
            'id'=>'8050239',
            'state'=>'Funcionando',
            'condition_sensor'=>'Listo',
            'type'=>'Presion',
            'description'=>'',
            'fk_device'=>'8050237',
        ]);
        Sensor::create([
            'id'=>'8050240',
            'state'=>'Funcionando',
            'condition_sensor'=>'Listo',
            'type'=>'Giro de Valvula',
            'description'=>'',
            'fk_device'=>'8050238',
        ]);
    }
}
