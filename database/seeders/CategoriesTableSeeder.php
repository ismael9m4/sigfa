<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Observable: Por fisura',
            'details'=>'',
        ]);
        
        Category::create([
            'name'=>'Observable: Por orificio',
            'details'=>'',
        ]);
        Category::create([
            'name'=>'Observable: Por reventamiento',
            'details'=>'',
        ]);
        Category::create([
            'name'=>'No Observable',
            'details'=>'',
        ]);

    }
}
