<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Community;

class CommunitySection extends Component
{
    public $communities;

    public function mount()
    {
        $user = auth()->user();

        // Usuário admin vê todas as comunidades
        if ($user->hasRole('admin')) {
            $this->communities = Community::orderBy('nome', 'ASC')->get();
        } 
        // Usuário comunidade vê apenas suas próprias comunidades
        elseif ($user->hasRole('comunidade')) {
            $this->communities = Community::where('user_id', $user->id)
                                          ->orderBy('nome', 'ASC')
                                          ->get();
        } 
        // Usuário aluno ou viajante só visualiza
        elseif ($user->can('view comunidades')) {
            $this->communities = Community::orderBy('nome', 'ASC')->get();
        } 
        else {
            $this->communities = collect(); // Sem permissão, vazio
        }
    }

    public function render()
    {
        return view('livewire.community', [
            'communities' => $this->communities,
        ]);
    }
}
