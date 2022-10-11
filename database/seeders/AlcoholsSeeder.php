<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 2行追加
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// 1行追加
use App\Models\Alcohol;


class AlcoholsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1行追加
        \App\Models\Alcohol::factory()->count(10)->create();
    }
}
