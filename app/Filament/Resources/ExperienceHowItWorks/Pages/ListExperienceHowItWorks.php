<?php

namespace App\Filament\Resources\ExperienceHowItWorks\Pages;

use App\Filament\Resources\ExperienceHowItWorks\ExperienceHowItWorksResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExperienceHowItWorks extends ListRecords
{
    protected static string $resource = ExperienceHowItWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
