<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("sede")->insert([
            [
                'nombre_sede' => 'Acarigua',
                'id_estado_ve' => 2, 
            ],
        ]);
    }
}
