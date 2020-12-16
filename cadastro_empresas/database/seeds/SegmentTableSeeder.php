<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
