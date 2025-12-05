<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * schema="Manga",
 * title="Mangá",
 * description="Estrutura de dados de um item na coleção de mangás.",
 * required={"manga_name", "volumes", "status"},
 * @OA\Property(
 * property="id",
 * description="ID único do mangá (gerado automaticamente).",
 * type="integer",
 * format="int64",
 * readOnly=true
 * ),
 * @OA\Property(
 * property="manga_name",
 * description="Nome do mangá.",
 * type="string",
 * example="One Piece"
 * ),
 * @OA\Property(
 * property="volumes",
 * description="Número total de volumes publicados.",
 * type="integer",
 * example=100
 * ),
 * @OA\Property(
 * property="lidos",
 * description="Número de volumes lidos pelo usuário.",
 * type="integer",
 * example=50,
 * default=0
 * ),
 * @OA\Property(
 * property="status",
 * description="Status atual de leitura.",
 * type="string",
 * enum={"Lendo", "Dropei", "Finalizado", "Planejo Ler"},
 * example="Lendo"
 * ),
 * @OA\Property(
 * property="created_at",
 * description="Data de criação do registro.",
 * type="string",
 * format="date-time",
 * readOnly=true
 * ),
 * @OA\Property(
 * property="updated_at",
 * description="Data da última atualização do registro.",
 * type="string",
 * format="date-time",
 * readOnly=true
 * )
 * ) */
class Manga extends Model
{
    protected $table = 'manga';
    use HasFactory;

    protected $fillable = [
        'manga_name',
        'volumes',
        'lidos',
        'status'
    ];
}