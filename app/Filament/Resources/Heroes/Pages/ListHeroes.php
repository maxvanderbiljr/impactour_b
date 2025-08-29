<?php

namespace App\Filament\Resources\Heroes\Pages;

use App\Filament\Resources\Heroes\HeroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeroes extends ListRecords
{
    protected static string $resource = HeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Novo Slide') // Altere o texto do botão
                ->color('success')       // Altere a cor (ex: 'primary', 'success', 'danger')
                ->icon('heroicon-o-plus'),
        ];
    }
}
