<?php

namespace App\Filament\Resources\ExperienceHowItWorks\Pages;

use App\Filament\Resources\ExperienceHowItWorks\ExperienceHowItWorksResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditExperienceHowItWorks extends EditRecord
{
    protected static string $resource = ExperienceHowItWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
