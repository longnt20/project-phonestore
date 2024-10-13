<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            ['name'=>'Lập trình PHP 3','credits'=>'3'],
            ['name'=>'Xây Dựng Trang Web 2','credits'=>'3'],
            ['name'=>'Pháp Luật','credits'=>'2'],
            ['name'=>'Phát triển cá nhân 2','credits'=>'4'],
        ]);
    }
}
