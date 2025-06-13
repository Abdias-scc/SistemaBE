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
            'nombre_estatus' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('estatus')->insert([
            'nombre_estatus' => 'Inactivo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
