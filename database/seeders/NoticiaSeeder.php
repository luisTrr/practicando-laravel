<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 15 ; $i++) { 
            DB::table('noticias')->insert([
                'Titulo' => Str::random(15),
                'contenido' => Str::random(15),
                'evento_id' => random_int(1,10)
            ]);
        }
    }
}
