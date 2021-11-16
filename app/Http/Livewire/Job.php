<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{
    public $job;

    public function render()
    {
        return view('livewire.job');
    }

    public function addLike()
    {
        if (auth()->check()) {
            # code...
            auth()->user()->likes()->toggle($this->job->id);
        } else {
            $this->emit('flash', 'merci de vous connectez pour ajouter un favoris', 'error');
        }

        //on emet un evenement
    }
}
