<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//3行追加
use APP\Models\Alcohol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AlcoholsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一行追加
        \App\Models\Alcohol::factory()->count(10)->create();
    }
}
