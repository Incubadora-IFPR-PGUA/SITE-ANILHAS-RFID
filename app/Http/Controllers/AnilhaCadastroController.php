<?php

namespace App\Http\Controllers;

use App\Models\AnilhaCadastro;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnilhaCadastroController extends Controller {
    protected $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function reload() {
        $this->authorize('hasFullPermission', AnilhaCadastro::class);
        $data = $this->apiService->getAnilhasCadastrosInJson();
        return response()->json($data); 
    }
    
    public function index() {
        $this->authorize('hasFullPermission', AnilhaCadastro::class);
        $data = $this->apiService->getAnilhasCadastros();
        return view('cadastro.index', compact('data'));
    }

    public function update(Request $request, $id) {
        $this->authorize('hasFullPermission', AnilhaCadastro::class);
        $data = $this->apiService->getAnilhasCadastrosById($id);
        if(isset($data)) {
            $dadosAtualizacao = [
                'name' => $request->input('name'),
            ];
            $data = $this->apiService->setAnilhasCadastros($id, $dadosAtualizacao);
            return redirect()->route('cadastro.index');
        }
        return "<h1>ERRO: CADASTRO NÃO ENCONTRADO!</h1>";
    }
    
    public function destroy($id) {
        $this->authorize('hasFullPermission', AnilhaCadastro::class);
        $data = $this->apiService->getAnilhasCadastrosById($id);
        if(isset($data)) {
            $data = $this->apiService->deleteAnilhasCadastrosById($id);
            return redirect()->route('cadastro.index');
        }
        return "<h1>ERRO: ANILHA NÃO ENCONTRADA!</h1>";
    }
}