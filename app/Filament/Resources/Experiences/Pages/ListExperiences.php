<?php

namespace App\Filament\Resources\Experiences\Pages;

use App\Filament\Resources\Experiences\ExperienceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExperiences extends ListRecords
{
    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nova Experiência') // Altere o texto do botão
                ->color('success')       // Altere a cor (ex: 'primary', 'success', 'danger')
                ->icon('heroicon-o-plus'),
        ];
    }

}
