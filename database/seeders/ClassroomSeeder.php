<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            ['name'=>'WD18412','teacher_name'=>'DucTV44'],
            ['name'=>'WD18406','teacher_name'=>'Hungnq06'],
            ['name'=>'VIE1206','teacher_name'=>'Huongpt55'],
            ['name'=>'WD18405','teacher_name'=>'Trangtt24'],
        ]);
    }
}
