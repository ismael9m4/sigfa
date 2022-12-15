<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ismael Mamani',
            'email' => 'admin@admin.com',
            'password' => bcrypt('38655155'),
            'username' => 'imamani',
            'role' => 0,
        ]);
        User::create([
            'name' => 'Ricardo Mamani',
            'email' => 'user@enterprise.com',
            'password' => bcrypt('ricardo22'),
            'username' => 'rmamani',
            'role' => 1,
        ]);
    }
}
