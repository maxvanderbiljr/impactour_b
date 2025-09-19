<?php

namespace App\Filament\Resources\Communities\Pages;

use App\Filament\Resources\Communities\CommunityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCommunity extends CreateRecord
{
    protected static string $resource = CommunityResource::class;

    public function mount(): void
    {
        parent::mount();

        if (!auth()->user()->can('create comunidades')) {
            abort(403, 'Acesso negado');
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Cadastrar')->color('success'),
            $this->getCreateAnotherFormAction()->label('Salvar e Criar Novo')->color('gray'),
            $this->getCancelFormAction()->label('Cancelar')->color('primary'),
        ];
    }
}