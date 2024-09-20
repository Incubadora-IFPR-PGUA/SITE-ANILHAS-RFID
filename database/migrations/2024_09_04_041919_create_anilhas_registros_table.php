<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnilhasRegistrosTable extends Migration {
    public function up() {
        Schema::create('anilhas_registros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anilha_id');
            $table->foreign('anilha_id')->references('id')->on('anilhas_cadastros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('anilhas_registros');
    }
}