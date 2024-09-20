<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder {
    public function run(): void {
        $data = [
            // ADMIN
            ["role_id" => 1, "resource_id" => 1, "permission" => true],
            ["role_id" => 1, "resource_id" => 2, "permission" => true],
            ["role_id" => 1, "resource_id" => 3, "permission" => true],
            // USER
            ["role_id" => 2, "resource_id" => 3, "permission" => true],
        ];
        DB::table('permissions')->insert($data);
    }
}