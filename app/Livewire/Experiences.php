<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Experience;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Experiences extends Component
{
    public function render()
    {
        $experiences = Experience::all();
        return view('livewire.experiences', compact('experiences'));
    }
}