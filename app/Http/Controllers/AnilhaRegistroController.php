<?php

namespace App\Http\Controllers;

use App\Models\AnilhaRegistro;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnilhaRegistroController extends Controller {
    protected $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function index() {
        $this->authorize('hasFullPermission', AnilhaRegistro::class);
        $data = $this->apiService->getAnilhasRegistros();    
        return view('registro.index', compact('data'));
    }

    public function reload() {
        $this->authorize('hasFullPermission', AnilhaRegistro::class);
        $data = $this->apiService->getAnilhasRegistrosInJson();
        return response()->json($data); 
    }
}