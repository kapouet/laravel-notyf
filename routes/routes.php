<?php

use Illuminate\Support\Facades\Route;
use Kapouet\Notyf\Http\Controllers\AssetsController;

Route::prefix('notyf')->group(static function () {
    Route::get('css/{file}', [AssetsController::class, 'css'])->where('file', '^(themes\/)?\w+\.(css|css\.map)$');
    Route::get('js/{file}', [AssetsController::class, 'js'])->where('file', '^(themes\/)?\w+\.(js|js\.map)$');
});
