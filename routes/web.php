<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

// Landing Page
// redireciona a raiz para a listagem gerada por Route::resource
Route::redirect('/', '/manga');

Route::resource('manga',MangaController::class);
