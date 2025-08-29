<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ExperienceInfolist
{
    public static function configure(Schema $schema): Schema
    {
         return $schema
        ->components([
            TextEntry::make('titulo')->label('Título'),
            TextEntry::make('descricao')->label('Descrição'),
            TextEntry::make('localizacao')
                ->label('Localização')
                ->formatStateUsing(fn($state) => $state ?? '[vazio]'),
            TextEntry::make('data')
                ->label('Data')
                ->date('d/m/Y'),
            TextEntry::make('created_at')->label('Criado em')->dateTime('d/m/Y H:i'),
        ]);
    }
}