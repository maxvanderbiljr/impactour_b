<?php

namespace App\Filament\Resources\HowItWorks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HowItWorksInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('etapa')
                    ->label('Etapa'),
                TextEntry::make('titulo')
                    ->label('Título'),
                TextEntry::make('descricao')
                    ->label('Descrição'),
                TextEntry::make('created_at')
                    ->label('Criado em')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime(),
            ]);
    }
}
