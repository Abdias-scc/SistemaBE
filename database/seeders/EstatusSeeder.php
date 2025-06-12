<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estatus')->insert([
            ['id' => 1, 'nombre' => 'Activo'],
            ['id' => 2, 'nombre' => 'Inactivo'],
            ['id' => 3, 'nombre' => 'Suspendido'],
            ['id' => 4, 'nombre' => 'Eliminado'],
        ]);
    }
}
