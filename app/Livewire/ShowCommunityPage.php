<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Community;

class ShowCommunityPage extends Component
{
    public function render()
    {
        $communities = Community::orderBy('nome', 'ASC')->get();
        return view('livewire.show-community-page', [
            'communities' => $communities
        ]);
    }
}