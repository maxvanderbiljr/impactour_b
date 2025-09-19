<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AccountCustomWidget extends Widget
{
    protected string $view = 'filament.widgets.account-custom-widget';
    
    // Adicione esta propriedade para aparecer primeiro
    protected static ?int $sort = -100;
    
    // Opcional: fazer o widget ocupar toda a largura
    //protected int | string | array $columnSpan = 'full';

    public function getUser()
    {
        return auth()->user();
    }

    public function getProfileImage()
    {
        return $this->getUser()->getFirstMediaUrl('profile') ?: null;
    }
}