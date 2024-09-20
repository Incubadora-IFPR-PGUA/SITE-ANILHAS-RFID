<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnilhaPendentesSeeder extends Seeder {
    public function run(): void {
        $data = [
            [
                "name" => "CALOPSITA", 
                "codigo" => "1444567891", 
                "created_at" => now(),
            ],
            [
                "name" => "GUARA", 
                "codigo" => "1231115591", 
                "created_at" => now(),
            ],
            [
                "name" => "CORUJA", 
                "codigo" => "1098722212", 
                "created_at" => now(),
            ],
        ];
        DB::table('anilhas_pendentes')->insert($data);
    }
}