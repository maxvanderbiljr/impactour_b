<?php

namespace App\Filament\Resources\HowItWorks\Pages;

use App\Filament\Resources\HowItWorks\HowItWorksResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHowItWorks extends EditRecord
{
    protected static string $resource = HowItWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                ->button()
                ->color('info') // ou 'success', 'danger', etc.
                ->icon('heroicon-o-eye'),
                DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }
        protected  function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
            ->label('Salvar alterações')
            ->color('success'),

            $this->getCancelFormAction()
                ->label('Cancelar')
                ->color('primary'),
        ];
    }

}
