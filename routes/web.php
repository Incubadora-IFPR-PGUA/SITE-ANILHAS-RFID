<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnilhaPendenteController;
use App\Http\Controllers\SmartHarpiaController;

Route::get('/', function () {
    return view('main');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::middleware('auth')->group(function () {
    Route::controller(SmartHarpiaController::class)->group(function () {
        Route::get('/smart-anilhas', 'anilhaIndex')->name('smart-anilhas');
        Route::get('/mac-address', 'macaddressIndex')->name('mac-address');;
    });

    Route::resource('macaddress', 'App\Http\Controllers\SmartHarpiaController');
    Route::resource('cadastro', 'App\Http\Controllers\AnilhaCadastroController');
    Route::resource('pendente', 'App\Http\Controllers\AnilhaPendenteController');
    Route::resource('registro', 'App\Http\Controllers\AnilhaRegistroController');

    Route::get('/cadastroReload', 'App\Http\Controllers\AnilhaCadastroController@reload');
    Route::get('/registroReload', 'App\Http\Controllers\AnilhaRegistroController@reload');
    Route::get('/pendenteReload', 'App\Http\Controllers\AnilhaPendenteController@reload');
    Route::get('/macaddressReload', 'App\Http\Controllers\SmartHarpiaController@macaddressReload');

    Route::post('/pendente/{id}', 'App\Http\Controllers\AnilhaPendenteController@acceptRequest');

    Route::delete('/cadastroDelete/{id}', 'App\Http\Controllers\AnilhaCadastroController@destroy');
    Route::put('/cadastroUpdate/{id}', 'App\Http\Controllers\AnilhaCadastroController@update');
    Route::delete('/pendenteDelete/{id}', 'App\Http\Controllers\AnilhaPendenteController@destroy');
    Route::put('/pendenteUpdate/{id}', 'App\Http\Controllers\AnilhaPendenteController@update');
});

require __DIR__.'/auth.php';