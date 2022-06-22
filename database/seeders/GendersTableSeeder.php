<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'gender' => '男性',
        ];
        DB::table('genders')->insert($param);
        
        $param = [
            'id' => '2',
            'gender' => '女性',
        ];
        DB::table('genders')->insert($param);
    }
}
