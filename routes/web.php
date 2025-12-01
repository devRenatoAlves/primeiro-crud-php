<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

Route::get('/', [MangaController :: class, 'mangaPage']);

Route::get('/mangaindex', [MangaController :: class, 'mangaIndex'])->name('manga.index');

Route::post('/mangastore', [MangaController :: class, 'mangaStore'])->name('manga.store');