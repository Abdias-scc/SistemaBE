<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaPnfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("persona_pnf")->insert([
            'id_persona' => 1,
            'id_pnf' => 1,
            'fecha_inicio' => now()->format('Y-m-d'),
            'fecha_fin' => null,
        ]);
    }
}
