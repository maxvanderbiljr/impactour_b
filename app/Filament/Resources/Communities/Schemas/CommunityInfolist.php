<?php

namespace App\Filament\Resources\Communities\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;


class CommunityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextEntry::make('nome')
                ->label('Nome'),

            TextEntry::make('descricao')
                ->label('Descrição'),

         
        ]);
    }
}