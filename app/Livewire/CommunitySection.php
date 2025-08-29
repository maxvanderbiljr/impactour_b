<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Community;

class CommunitySection extends Component
{
    public $comunidades;

    public function mount()
    {
        $this->comunidades = Community::all();
    }

    public function render()
    {
        return view('livewire.community', [
            'comunidades' => $this->comunidades,
        ]);
    }
}