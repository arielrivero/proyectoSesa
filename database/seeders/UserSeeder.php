<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('users')->insert([
            
            'name' => 'Ariel Rivero',
            'email' => 'aarm10@outlook.com',
            'id_rol' => '1',
            'password' =>  bcrypt('admin123'),

        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
