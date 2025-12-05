<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{
    /**
     * @OA\Post(
     * path="/manga",
     * operationId="storeManga",
     * tags={"Mangás"},
     * summary="Cria um novo mangá",
     * description="Registra um novo mangá na coleção.",
     * @OA\RequestBody(
     * required=true,
     * description="Dados do mangá a ser criado",
     * @OA\JsonContent(
     * required={"manga_name","volumes","status"},
     * @OA\Property(property="manga_name", type="string", example="Shingeki no Kyojin"),
     * @OA\Property(property="volumes", type="integer", example=34),
     * @OA\Property(property="status", type="string", example="Planejo Ler"),
     * @OA\Property(property="lidos", type="integer", example=0)
     * )
     * ),
     * @OA\Response(
     * response=302,
     * description="Redirecionamento após criação bem-sucedida (Retorna HTML na web, mas representa a criação na API)"
     * ),
     * @OA\Response(
     * response=422,
     * description="Erro de Validação"
     * )
     * )
     */
    public function store (Request $request) { //cria as info no db
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

    /**
     * @OA\Get(
     * path="/manga",
     * operationId="getMangasList",
     * tags={"Mangás"},
     * summary="Lista todos os mangás",
     * description="Retorna todos os mangás da coleção.",
     * @OA\Response(
     * response=200,
     * description="Lista de mangás retornada com sucesso (Retorna View/HTML na web, mas representa a lista na API)",
     * @OA\JsonContent(
     * type="array",
     * @OA\Items(ref="#/components/schemas/Manga")
     * )
     * )
     * )
     */
    public function index () { // le as info no db
        $manga = Manga::all();
        return view('welcome', compact('manga'));
    }

    /**
     * @OA\Get(
     * path="/manga/{id}/edit",
     * operationId="editManga",
     * tags={"Mangás"},
     * summary="Exibe o formulário de edição (Web)",
     * description="Retorna a view de edição para um mangá específico. Note que esta rota é focada em Web.",
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do mangá a ser editado",
     * @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     * response=200,
     * description="View de edição retornada com sucesso."
     * ),
     * @OA\Response(
     * response=404,
     * description="Mangá não encontrado."
     * )
     * )
     */
    public function edit($id)
    {
        $manga = Manga::findOrFail($id);
        return view('edit', compact('manga'));
    }

    /**
     * @OA\Put(
     * path="/manga/{id}",
     * operationId="updateManga",
     * tags={"Mangás"},
     * summary="Atualiza um mangá existente",
     * description="Atualiza os dados de um mangá específico pelo ID. O método é PUT/PATCH e redireciona (302).",
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do mangá a ser atualizado",
     * @OA\Schema(type="integer")
     * ),
     * @OA\RequestBody(
     * required=true,
     * description="Dados do mangá a serem atualizados",
     * @OA\JsonContent(
     * @OA\Property(property="manga_name", type="string", example="Jujutsu Kaisen"),
     * @OA\Property(property="volumes", type="integer", example=25),
     * @OA\Property(property="lidos", type="integer", example=25),
     * @OA\Property(property="status", type="string", example="Finalizado")
     * )
     * ),
     * @OA\Response(
     * response=302,
     * description="Redirecionamento após atualização bem-sucedida"
     * ),
     * @OA\Response(
     * response=404,
     * description="Mangá não encontrado."
     * ),
     * @OA\Response(
     * response=422,
     * description="Erro de Validação"
     * )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'manga_name' => 'required|max:255',
            'volumes' => 'required|integer|min:1',
            'lidos' => 'nullable|integer|min:0',
            'status' => 'required',
        ]);

        $manga = Manga::findOrFail($id);
        $manga->update($request->only(['manga_name', 'volumes', 'lidos', 'status']));

        return redirect()->route('manga.index')->with('success', 'Mangá atualizado com sucesso!');
    }

    /**
     * @OA\Delete(
     * path="/manga/{id}",
     * operationId="deleteManga",
     * tags={"Mangás"},
     * summary="Deleta um mangá",
     * description="Remove um mangá da coleção pelo ID.",
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do mangá a ser excluído",
     * @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     * response=302,
     * description="Redirecionamento após exclusão bem-sucedida"
     * ),
     * @OA\Response(
     * response=404,
     * description="Mangá não encontrado."
     * )
     * )
     */
    public function destroy ($id) { // exclui as info no db

        $manga = Manga::findOrFail($id);
        $manga->delete();

        return redirect()->route('manga.index')->with('success','Mangá excluido com sucesso!');
    }
}