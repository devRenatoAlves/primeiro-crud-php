<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 * @OA\Info(
 * version="1.0.0",
 * title="API de Gerenciamento de Mangás",
 * description="Documentação da API CRUD para gerenciar sua coleção de mangás.",
 * @OA\Contact(
 * email="seu-email@exemplo.com"
 * )
 * ),
 * @OA\Server(
 * url=L5_SWAGGER_CONST_HOST,
 * description="Servidor principal da API"
 * ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}