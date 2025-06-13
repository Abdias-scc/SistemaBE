<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("direccion")->insert([
            'sector' => "Av. Circunvalación Sur",
            'calle' => " Calle B",
            'id_persona' => 1,
            'id_municipio' => 1
        ]);
    }
}
