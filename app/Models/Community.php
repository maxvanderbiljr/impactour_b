<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Community extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'nome',
        'descricao',
        'localizacao',
        'data',
        'user_id',
        'community_id',
        'traveler_id',
    ];

    // Quem criou a experiência
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A qual comunidade pertence
    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    // Caso queira diferenciar viajante do user normal
    public function traveler()
    {
        return $this->belongsTo(User::class, 'traveler_id');
    }
}