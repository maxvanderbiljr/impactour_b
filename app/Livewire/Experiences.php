<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Experience;

class Experiences extends Component
{
    public function render()
    {
        $experiences = Experience::all();
        return view('livewire.experiences', compact('experiences'));
    }
}