<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService {
    protected $baseUrl;

    public function __construct() {
        $this->baseUrl = config('services.api.base_url');
    }

    // Anilhas Cadastradas
    public function listarAnilhasCadastradas() {
        $response = Http::get("{$this->baseUrl}/listarAnilhasCadastradas");
        return $response->json();
    }

    public function atualizarAnilhaCadastrada($id, $dados) {
        $response = Http::put("{$this->baseUrl}/atualizarAnilhaCadastrada/{$id}", $dados);
        return $response->json();
    }

    public function obterAnilhaCadastradaPorId($id) {
        $response = Http::get("{$this->baseUrl}/obterAnilhaCadastradaPorId/{$id}");
        return $response->json();
    }

    public function deletarAnilhaCadastrada($id){
        $response = Http::delete("{$this->baseUrl}/deletarAnilhaCadastrada/{$id}");
        return $response->json();
    }

    // Anilhas Pendentes
    public function aceitarPendente($id) {
        $response = Http::post("{$this->baseUrl}/aceitarPendente/{$id}");
        return $response->json();
    }

    public function listarAnilhasPendentes() {
        $response = Http::get("{$this->baseUrl}/listarAnilhasPendentes");
        return $response->json();
    }

    public function atualizarAnilhaPendente($id, $dados) {
        $response = Http::put("{$this->baseUrl}/atualizarAnilhaPendente/{$id}", $dados);
        return $response->json();
    }

    public function obterAnilhaPendentePorId($id) {
        $response = Http::get("{$this->baseUrl}/obterAnilhaPendentePorId/{$id}");
        return $response->json();
    }

    public function deletarAnilhaPendente($id){
        $response = Http::delete("{$this->baseUrl}/deletarAnilhaPendente/{$id}");
        return $response->json();
    }

    // Anilhas Registros
    public function getAnilhasRegistros() {
        $response = Http::get("{$this->baseUrl}/listarAnilhaRegistros");
        return $response->json();
    }

    public function getAnilhasRegistrosInJson() {
        $response = Http::get("{$this->baseUrl}/listarAnilhaRegistros");
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }    

    // HORTA API
    public function listarHortaEmJson(){
        $response = Http::get("{$this->baseUrl}/listarHorta");
        return $response->json();
    }

    // MAC API
    public function getMacAddressInJson(){
        $response = Http::get("{$this->baseUrl}/listarMacsCapturados");
        return $response->json();
    }
}