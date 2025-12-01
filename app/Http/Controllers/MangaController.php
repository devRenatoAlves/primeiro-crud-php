<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{   
    public function mangaStore (Request $request) { //cria as info no db
        $request -> validate([
            'manga_name' => 'require|max:255',
            'qtd_pg' => 'require|integer|min:1',
            'status' => 'require',
        ]);

        Manga::create([
            'manga_name' => $request->manga_name,
            'qtd_pg' => $request->qtd_page,
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
