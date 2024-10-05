<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KXPOController;

Route::get('/', function () {
    return view('index.index');
});

Route::post('/calcolaKXPO', [KXPOController::class, 'calcolaKXPO'])->name('calcolaKXPO');