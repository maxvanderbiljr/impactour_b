<?php

namespace App\Filament\Resources\HowItWorks\Pages;

use App\Filament\Resources\HowItWorks\HowItWorksResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHowItWorks extends CreateRecord
{
    protected static string $resource = HowItWorksResource::class;

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