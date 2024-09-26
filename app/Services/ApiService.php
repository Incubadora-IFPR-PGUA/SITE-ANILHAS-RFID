<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService {
    protected $baseUrl;

    public function __construct() {
        $this->baseUrl = config('services.api.base_url');
    }

    public function acceptRequest($id) {
        $response = Http::post("{$this->baseUrl}/pendente/{$id}");
        return $response->json();
    }

    // Anilhas Cadastradas
    public function getAnilhasCadastros() {
        $response = Http::get("{$this->baseUrl}/listarAnilhaCadastradas");
        return $response->json();
    }

    public function getAnilhasCadastrosInJson() {
        $response = Http::get("{$this->baseUrl}/listarAnilhaCadastradas");
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }    

    public function setAnilhasCadastros($id, $dados) {
        $response = Http::put("{$this->baseUrl}/atualizarAnilhaCadastrada/{$id}", $dados);
        return $response->json();
    }

    public function getAnilhasCadastrosById($id) {
        $response = Http::get("{$this->baseUrl}/getAnilhaCadastradaById/{$id}");
        return $response->json();
    }

    public function deleteAnilhasCadastrosById($id){
        $response = Http::delete("{$this->baseUrl}/excluirAnilhaCadastrada/{$id}");
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

    // Anilhas Pendentes
    public function getAnilhasPendentes() {
        $response = Http::get("{$this->baseUrl}/listarAnilhaPendentes");
        return $response->json();
    }

    public function getAnilhasPendentesInJson() {
        $response = Http::get("{$this->baseUrl}/listarAnilhaPendentes");
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }    

    public function setAnilhasPendentes($id, $dados) {
        $response = Http::put("{$this->baseUrl}/atualizarAnilhaPendente/{$id}", $dados);
        return $response->json();
    }

    public function getAnilhasPendentesById($id) {
        $response = Http::get("{$this->baseUrl}/getAnilhaPendenteById/{$id}");
        return $response->json();
    }

    public function deleteAnilhasPendentesById($id){
        $response = Http::delete("{$this->baseUrl}/excluirAnilhaPendente/{$id}");
        return $response->json();
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