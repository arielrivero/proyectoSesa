<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rols')->insert([
            'id' => 1,
            'nombre' => 'Administrador',
        ]);

        DB::table('rols')->insert([
            'id' => 2,
            'nombre' => 'Usuario',
        ]);
        
    }
}
