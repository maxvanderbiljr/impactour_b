<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

       protected function getRedirectUrl(): string
    {
       return $this->getResource()::getUrl('index');
    }

    protected  function getFormActions(): array
    {
        return [
           $this->getCreateFormAction()
                ->label('Cadastrar')
                ->color('success'),

           $this->getCreateAnotherFormAction()
                ->label('Salvar e Criar Novo')        
                ->color('gray'),

            $this->getCancelFormAction()
                ->label('Cancelar')
                ->color('primary'),
        ];
    }


}
