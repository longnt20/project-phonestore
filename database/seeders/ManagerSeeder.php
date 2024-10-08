<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('managers')->insert([
            ['manager_name'=> 'IT123'],
            ['manager_name'=> 'MKT456'],
            ['manager_name'=> 'FNL789'],
        ]);
    }
}
