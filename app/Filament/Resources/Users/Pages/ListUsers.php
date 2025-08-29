<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Novo Usuário') // Altere o texto do botão
                ->color('success')       // Altere a cor (ex: 'primary', 'success', 'danger')
                ->icon('heroicon-o-plus'),
        ];
    }
}
