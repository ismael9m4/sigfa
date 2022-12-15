<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reading;
class ReadingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reading::create([
            'year'=>'2021',
            'hour'=>'20:15:32',
            'date'=>'2021-08-31',
            'value'=>'26.4875',
            'unit'=>'L/min',
            'details'=>'Sensor de agua, para medicion de consumo por efecto hall',
            'fk_sensor'=>'8050237',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'22:15:32',
            'date'=>'2021-08-31',
            'value'=>'20.4875',
            'unit'=>'L/min',
            'details'=>'Sensor de agua, para medicion de consumo por efecto hall',
            'fk_sensor'=>'8050237',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'21:15:32',
            'date'=>'2021-08-24',
            'value'=>'26.4875',
            'unit'=>'L/min',
            'details'=>'Sensor de agua, para medicion de consumo por efecto hall',
            'fk_sensor'=>'8050237',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'22:15:32',
            'date'=>'2021-08-24',
            'value'=>'25.4875',
            'unit'=>'L/min',
            'details'=>'Sensor de agua, para medicion de consumo por efecto hall',
            'fk_sensor'=>'8050237',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'21:15:32',
            'date'=>'2021-08-31',
            'value'=>'26.4875',
            'unit'=>'L/min',
            'details'=>'Sensor de agua, para medicion de consumo por efecto hall',
            'fk_sensor'=>'8050238',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'13:15:32',
            'date'=>'2021-08-31',
            'value'=>'12.4875',
            'unit'=>'kPa',
            'details'=>'Sensor de presion de agua, para medicion de presion en tuberia',
            'fk_sensor'=>'8050239',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'15:15:32',
            'date'=>'2021-08-24',
            'value'=>'15.4875',
            'unit'=>'kPa',
            'details'=>'Sensor de presion de agua, para medicion de presion en tuberia',
            'fk_sensor'=>'8050239',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'15:15:32',
            'date'=>'2021-08-31',
            'value'=>'15.4875',
            'unit'=>'kPa',
            'details'=>'Sensor de presion de agua, para medicion de presion en tuberia',
            'fk_sensor'=>'8050239',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'15:15:32',
            'date'=>'2021-08-24',
            'value'=>'11.4875',
            'unit'=>'kPa',
            'details'=>'Sensor de presion de agua, para medicion de presion en tuberia',
            'fk_sensor'=>'8050239',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'13:15:32',
            'date'=>'2021-08-24',
            'value'=>'0.0100',
            'unit'=>'Vuelta',
            'details'=>'Sensor de registro de giro de valvula',
            'fk_sensor'=>'8050240',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'13:15:32',
            'date'=>'2021-08-31',
            'value'=>'0.0500',
            'unit'=>'Vuelta',
            'details'=>'Sensor de registro de giro de valvula',
            'fk_sensor'=>'8050240',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'15:15:32',
            'date'=>'2021-08-31',
            'value'=>'0.3100',
            'unit'=>'Vuelta',
            'details'=>'Sensor de registro de giro de valvula',
            'fk_sensor'=>'8050240',
        ]);
        Reading::create([
            'year'=>'2021',
            'hour'=>'15:15:32',
            'date'=>'2021-08-24',
            'value'=>'0.3100',
            'unit'=>'Vuelta',
            'details'=>'Sensor de registro de giro de valvula',
            'fk_sensor'=>'8050240',
        ]);
        
    }
}
