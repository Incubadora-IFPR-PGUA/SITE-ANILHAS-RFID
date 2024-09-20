<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnilhaCadastrosSeeder extends Seeder {
    public function run(): void {
        $data = [
            [
                "name" => "PICA-PAU", 
                "codigo" => "1234567891", 
                "created_at" => now(),
            ],
            [
                "name" => "ANDORINHA", 
                "codigo" => "1232565591", 
                "created_at" => now(),
            ],
            [
                "name" => "PAPAGAIO", 
                "codigo" => "1098764512",
                "created_at" => now(), 
            ],
        ];
        DB::table('anilhas_cadastros')->insert($data);
    }
}