<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnilhaRegistrosSeeder extends Seeder {
    public function run(): void {
        $data = [
            [
                "anilha_id" => 1, 
                "created_at" => now(),
            ],
            [
                "anilha_id" => 2, 
                "created_at" => now(),
            ],
            [
                "anilha_id" => 3, 
                "created_at" => now(),
            ],
        ];
        DB::table('anilhas_registros')->insert($data);
    }
}