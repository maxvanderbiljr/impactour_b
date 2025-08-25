<?php

namespace App\Filament\Resources\ExperienceHowItWorks\Pages;

use App\Filament\Resources\ExperienceHowItWorks\ExperienceHowItWorksResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExperienceHowItWorks extends ViewRecord
{
    protected static string $resource = ExperienceHowItWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
