<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 1;
        $fp = fopen(public_path('storage/A4pL7MY8osMBVBJ6TH4RhW6bwqavCguaDyyp9JCv.txt'), 'r');
        while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c = 0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
        }
        fclose($fp);
    }
}
