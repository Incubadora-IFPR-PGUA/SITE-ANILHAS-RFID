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
        
        // Validação do input
        $request->validate([
            'name' => 'required|string|max:255', // Adapte conforme necessário
        ]);
    
        // Verifica se o cadastro existe
        $data = $this->apiService->getAnilhasCadastrosById($id);
        if (isset($data)) {
            $dadosAtualizacao = [
                'name' => $request->input('name'),
                'updated_at' => now(), // Adiciona o timestamp de atualização
            ];
    
            // Atualiza os dados através da API
            $this->apiService->setAnilhasCadastros($id, $dadosAtualizacao);
            
            return redirect()->route('cadastro.index')->with('success', 'Cadastro atualizado com sucesso!'); // Mensagem de sucesso
        }
        
        return redirect()->route('cadastro.index')->with('error', 'ERRO: CADASTRO NÃO ENCONTRADO!'); // Mensagem de erro
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