<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void{
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AnilhaCadastrosSeeder::class);
        $this->call(AnilhaPendentesSeeder::class);
        $this->call(AnilhaRegistrosSeeder::class);
    }
}