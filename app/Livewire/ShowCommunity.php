<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Community;

class ShowCommunity extends Component
{
 public $community;

        public function mount($id){
            $this->community = Community::findOrFail($id);
        }

        public function render()
        {
        return view('livewire.show-community',[
            'community' => $this->community
        ]);
     }
}