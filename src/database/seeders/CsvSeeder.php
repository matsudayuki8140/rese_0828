<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = database_path('shopsTable.csv');
        $csvData = File::get($csvFile);
        $rows = explode("\n", $csvData);

        foreach($rows as $row) {
            $data = str_getcsv($row);

            DB::table('shops')->insert([
                'name' => $data[0],
                'area' => $data[1],
                'genre' => $data[2],
                'description' => $data[3],
                'imageURL' => $data[4],
            ]);
        }
    }
}