<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("municipio")->insert([
            'nombre_municipio' => 'Acarigua',
            'id_estado_ve' => 1,
        ]);
    }
}
