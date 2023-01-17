<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NominaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('nominas')->insert([
            'id' => 1,
            'nombre' => 'Estatal',
        ]);

        DB::table('nominas')->insert([
            'id' => 2,
            'nombre' => 'Federal',
        ]);

        DB::table('nominas')->insert([
            'id' => 3,
            'nombre' => 'Eventual',
        ]);

        DB::table('nominas')->insert([
            'id' => 4,
            'nombre' => 'Regularizado',
        ]);

        
    }
}
