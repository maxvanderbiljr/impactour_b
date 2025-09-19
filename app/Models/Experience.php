<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Experience extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
       'titulo',
        'descricao',
        'localizacao',
        'data',
        'user_id',
        'community_id',
        'traveler_id',
        // Adicione outros campos conforme sua tabela
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function traveler()
    {
        return $this->belongsTo(User::class, 'traveler_id');
    }
}