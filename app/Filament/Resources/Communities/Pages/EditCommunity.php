<?php

namespace App\Filament\Resources\Communities\Pages;

use App\Filament\Resources\Communities\CommunityResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCommunity extends EditRecord
{
    protected static string $resource = CommunityResource::class;

    public function mount($record): void
    {
        parent::mount($record);

        if (!auth()->user()->can('edit comunidades')) {
            abort(403, 'Acesso negado');
        }

        // Usuários 'comunidade' só podem editar suas próprias comunidades
        if (auth()->user()->hasRole('comunidade') && $this->record->user_id !== auth()->id()) {
            abort(403, 'Acesso negado');
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()->visible(fn() => auth()->user()->can('view comunidades')),
            DeleteAction::make()->visible(fn() => auth()->user()->can('delete comunidades')),
            ForceDeleteAction::make()->visible(fn() => auth()->user()->can('delete comunidades')),
            RestoreAction::make()->visible(fn() => auth()->user()->can('delete comunidades')),
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