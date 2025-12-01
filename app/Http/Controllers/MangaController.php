<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{   
    public function mangaStore (Request $request) { //cria as info no db
        $request -> validate([
            'manga_name' => 'required|max:255',
            'volumes' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        Manga::create([
            'manga_name' => $request->manga_name,
            'volumes' => $request->volumes,
            'status' => $request->status,
        ]);

        return redirect()->route('manga.index')->with('success', 'Mangá inserido com sucesso!');
    }

    public function mangaIndex () { // le as info no db
        return ;
    }

    public function mangaUpdate () { // atualiza as info no db
        return ;
    }

    public function mangaDestroy () { // exclui as info no db
        return ;
    }

    public function mangaPage () 
    {
        return view('welcome');
    }
}
