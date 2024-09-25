<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ApiService;

class SmartHortaController extends Controller {
    protected $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function index() {
        $data = $this->apiService->getHortaInJson();
        return view('horta.index');
    }

    public function hortaReload() {
        $data = $this->apiService->getHortaInJson();
        return response()->json($data);
    }
}