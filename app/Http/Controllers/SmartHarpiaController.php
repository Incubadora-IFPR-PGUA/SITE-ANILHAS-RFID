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
        $data = $this->apiService->getMacAddressInJson();
        return view('macaddress.index');
    }

    public function macaddressReload() {
        $data = $this->apiService->getMacAddressInJson();
        return response()->json($data);
    } 

    public function anilhaIndex() {
        return view('home.anilhaIndex');
    }

    public function macaddressIndex() {
        return view('home.macaddressIndex');
    }

    public function hortaIndex() {
        return view('home.hortaIndex');
    }
}