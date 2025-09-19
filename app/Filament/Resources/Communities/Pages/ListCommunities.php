<?php

namespace App\Filament\Resources\Communities\Pages;

use App\Filament\Resources\Communities\CommunityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class ListCommunities extends ListRecords
{
    protected static string $resource = CommunityResource::class;

    public function mount(): void
    {
        parent::mount();

        // Bloqueia acesso se o usuário não tiver permissão
        if (!auth()->user()->can('view comunidades')) {
            abort(403, 'Acesso negado');
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nova Comunidade')
                ->color('success')
                ->icon('heroicon-o-plus')
                ->visible(fn() => auth()->user()->can('create comunidades')),
        ];
    }

    // Corrigido: tipagem compatível com a classe base
    protected function getTableQuery(): Builder|Relation|null
    {
        $query = parent::getTableQuery();

        // Usuários com papel 'comunidade' só veem suas próprias comunidades
        if (!auth()->user()->hasRole('admin') && auth()->user()->hasRole('comunidade')) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }
}