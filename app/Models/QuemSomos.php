<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuemSomos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome_social',
        'nome_fantasia',
        'inscricao_estadual',
        'cnpj',
        'telefone',
        'telefone2',
        'email',
        'linkedin',
        'instagram',
        'facebook',
        'visao',
        'missao',
        'valores',

        'youtube',
        'video_youtube',
        'endereco_matriz',
        'endereco_matriz_link',
        'endereco_filial',
        'endereco_filial_link',
        'quemsomos',
    ];
}
