<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder {
    public function run(): void {
        $data = [
            ["name" => "cadastros"],
            ["name" => "pendencias"],
            ["name" => "registros"],
        ];
        DB::table('resources')->insert($data);
    }
}