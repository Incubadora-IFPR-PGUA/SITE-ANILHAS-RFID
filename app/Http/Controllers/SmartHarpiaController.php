<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ApiService;

class SmartHarpiaController extends Controller {
    protected $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function index() {
        //$data = $this->apiService->getMacAddressInJson();
        return view('macaddress.index');
    }

    public function macaddressReload() {
        $data = [
            [
                'dataHora' => '2024-09-17 10:30:00',
                'localizacao' => 'Sala A',
                'permitido' => true,
                'mac' => '00:14:22:01:23:45',
                'fabricante' => 'Apple',
                'esp' => 'ESP-001',
            ],
            [
                'dataHora' => '2024-09-17 11:00:00',
                'localizacao' => 'Sala B',
                'permitido' => false,
                'mac' => '00:14:22:01:23:46',
                'fabricante' => 'Samsung',
                'esp' => 'ESP-002',
            ],
            [
                'dataHora' => '2024-09-17 12:15:00',
                'localizacao' => 'Sala C',
                'permitido' => true,
                'mac' => '00:14:22:01:23:47',
                'fabricante' => 'Dell',
                'esp' => 'ESP-003',
            ]
        ];
    
        return response()->json($data);
    }    

    public function anilhaIndex() {
        return view('home.anilhaIndex');
    }

    public function macaddressIndex() {
        return view('home.macaddressIndex');
    }
}