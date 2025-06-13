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
            //Tablas con relaciones (NO QUITAR EL ORDEN DE LOS SEEDERS)
            SedeSeeder::class,
            MunicipioSeeder::class,
            PnfSeeder::class,
            PerfilSeeder::class,
            PersonaSeeder::class,
            PersonaPnfSeeder::class,
            DireccionSeeder::class,
        ]);
    }
}
