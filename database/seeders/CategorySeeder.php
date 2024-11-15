<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'=>'Apple Chính Hãng',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Android Chính Hãng',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
