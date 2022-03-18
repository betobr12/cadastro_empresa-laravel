<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SegmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('segments')->insert([
            'description' => 'Produto',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('segments')->insert([
            'description' => 'Serviço',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('segments')->insert([
            'description' => 'Produto e Serviço',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
