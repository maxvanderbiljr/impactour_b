<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HowItWorks;

class HowItWorksSection extends Component
{
    public $steps;

    public function mount()
    {
        $this->steps = HowItWorks::orderBy('etapa')->get();
    }

    public function render()
    {
        return view('livewire.how-it-works', [
            'steps' => $this->steps,
        ]);
    }
}