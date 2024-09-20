<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnilhasPendentesTable extends Migration {
    public function up() {
        Schema::create('anilhas_pendentes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('codigo', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('anilhas_pendentes');
    }
}