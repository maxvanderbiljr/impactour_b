<?php

namespace App\Filament\Resources\HowItWorks\Pages;

use App\Filament\Resources\HowItWorks\HowItWorksResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHowItWorks extends ViewRecord
{
    protected static string $resource = HowItWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->button()
                ->color('warning')
                ->icon('heroicon-o-pencil'),

        ];
    }
}
