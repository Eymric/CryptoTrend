<?php

namespace App\Livewire;

use Livewire\Component;

class ResultRow extends Component
{
    public $result;

    public function render()
    {
        return view('livewire.result-row');
    }
}
