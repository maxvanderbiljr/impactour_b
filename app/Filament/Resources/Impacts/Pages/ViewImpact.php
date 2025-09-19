<?php

namespace App\Filament\Resources\Impacts\Pages;

use App\Filament\Resources\Impacts\ImpactResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewImpact extends ViewRecord
{
    protected static string $resource = ImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->visible(fn() => auth()->user()->can('edit impactos')),
        ];
    }
}