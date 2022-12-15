<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name'=>'SOPORTE TELEFONICO',
            'description'=>'Atencion realizada por personal no especializado',
        ]);
        Level::create([
            'name'=>'SOPORTE TELEFONICO TECNICO',
            'description'=>'Atencion realizada por personal especializado',
        ]);
        Level::create([
            'name'=>'SOPORTE DE ASISTENCIA',
            'description'=>'Atencion realizada en locacion especifica',
        ]);
    }
}
