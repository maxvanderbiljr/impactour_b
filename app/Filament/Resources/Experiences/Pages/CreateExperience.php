<?php

namespace App\Filament\Resources\Experiences\Pages;

use App\Filament\Resources\Experiences\ExperienceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExperience extends CreateRecord
{
    protected static string $resource = ExperienceResource::class;

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
