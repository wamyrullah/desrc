<?php

namespace App\Livewire\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    #[On('profile-updated')]
    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
