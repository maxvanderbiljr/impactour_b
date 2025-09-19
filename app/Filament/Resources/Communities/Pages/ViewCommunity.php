<?php

namespace App\Filament\Resources\Communities\Pages;

use App\Filament\Resources\Communities\CommunityResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCommunity extends ViewRecord
{
    protected static string $resource = CommunityResource::class;

    public function mount($record): void
    {
        parent::mount($record);

        // Bloqueia acesso se não tiver permissão para ver comunidades
        if (!auth()->user()->can('view comunidades')) {
            abort(403, 'Acesso negado');
        }

        // Usuários 'comunidade' só podem ver suas próprias comunidades
        if (
            auth()->user()->hasRole('comunidade') &&
            $this->record->user_id !== auth()->id()
        ) {
            abort(403, 'Acesso negado');
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(fn() => auth()->user()->can('edit comunidades')),
        ];
    }
}