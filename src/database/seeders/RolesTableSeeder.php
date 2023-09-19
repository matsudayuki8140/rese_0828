<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'role' => 3,
        ];
        DB::table('roles')->insert($param);

        $param = [
            'user_id' => 2,
            'role' => 2,
        ];
        DB::table('roles')->insert($param);

        for($a = 3; $a <= 5; $a++) {
            $param = [
                'user_id' => $a,
                'role' => 1,
            ];
            DB::table('roles')->insert($param);
        }
    }
}
