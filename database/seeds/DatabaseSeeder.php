<?php

use Illuminate\Database\Seeder;
use App\Rol;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'rol' => 'Beneficiarios',
            'description' => 'This is the first rol'
        ]);

        Rol::create([
            'rol' => 'Donadores',
            'description' => 'This is the second rol'
        ]);
    }
}
