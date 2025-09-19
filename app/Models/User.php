<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; 
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    protected $fillable = [
        'name_profile',
        'name',
        'email',
        'password',
        'endereco',
        'telefone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     public function getFilamentAvatarUrl(): ?string
    {
        // Se tiver mídia no profile, retorna o primeiro
        if ($this->hasMedia('profile')) {
            return $this->getFirstMediaUrl('profile');
        }

        // Se não, retorna algum avatar padrão
        return null;
    }

    // Configuração da coleção de mídia (PRECISO REVER SE VAMOS CONTINUAR USANDO)
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile')
            ->useDisk('profile'); // <-- importante!
    }
}
