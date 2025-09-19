<?php

namespace App\Filament\Resources\Impacts\Pages;

use App\Filament\Resources\Impacts\ImpactResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditImpact extends EditRecord
{
    protected static string $resource = ImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()->visible(fn() => auth()->user()->can('delete impactos')),
            ForceDeleteAction::make()->visible(fn() => auth()->user()->can('delete impactos')),
            RestoreAction::make()->visible(fn() => auth()->user()->can('edit impactos')),
        ];
    }
}