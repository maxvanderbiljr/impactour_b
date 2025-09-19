<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
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
