<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function mangaPage () 
    {
        return view('welcome');
    }
}
