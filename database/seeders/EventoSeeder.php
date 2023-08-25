<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 15 ; $i++) { 
            DB::table('eventos')->insert([
                'tichet_numero' => random_int(1, 100),
                'descripcion' => Str::random(15)
            ]);
        }
    }
}
