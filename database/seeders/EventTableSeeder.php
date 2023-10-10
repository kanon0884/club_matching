<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('events')->insert([
            'title' => '説明会',
            'datetime' => '2023-10-10 18:30',
            'place' => '集会所',
            'description' => '説明会します',
        ]);
    }
}
