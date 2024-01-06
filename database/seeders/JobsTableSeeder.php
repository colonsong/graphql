<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('jobs')->insert([
            'user_id' => 1,
            'name' => '前端开发工程师',
            'description' => '前端前端'
        ]);
        DB::table('jobs')->insert([
            'user_id' => 2,
            'name' => 'PHP开发工程师',
            'description' => 'PHP'
        ]);
    }
}
