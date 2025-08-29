<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'localizacao',
        'data',
        'user_id',
        // Adicione outros campos conforme sua tabela
    ];
}