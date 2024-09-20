<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnilhasCadastrosTable extends Migration {
    public function up() {
        Schema::create('anilhas_cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('codigo', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('anilhas_cadastros');
    }
}