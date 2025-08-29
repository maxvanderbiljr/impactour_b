<?php

namespace App\Filament\Resources\HowItWorks\Pages;

use App\Filament\Resources\HowItWorks\HowItWorksResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHowItWorks extends ListRecords
{
    protected static string $resource = HowItWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Criar Como Funciona') // Altere o texto do botão
                ->color('success')       // Altere a cor (ex: 'primary', 'success', 'danger')
                ->icon('heroicon-o-plus'),
        ];
    }
}
