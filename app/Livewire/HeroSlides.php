<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hero;

class HeroSlides extends Component
{
    public $slides;

    public function mount()
    {
        // Corrigido: busca os slides no model Hero
        $this->slides = Hero::with('media')->get();
    }

    public function render()
    {
        return view('livewire.hero-slides', [
            'slides' => $this->slides,
        ]);
    }
}