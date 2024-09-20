<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnilhaRegistro extends Model {
    use HasFactory;

    public function cadastro() {
        return $this->belongsTo(AnilhaCadastro::class, 'anilha_id');
    }

    protected $table = 'anilhas_registros'; 
}