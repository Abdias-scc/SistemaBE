<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //Tablas sin relaciones
            EstatusSeeder::class,
            EstadoSeeder::class,
            SedeSeeder::class,
            //Tablas con relaciones
            PerfilSeeder::class,
            PersonaSeeder::class,
        ]);
    }
}
