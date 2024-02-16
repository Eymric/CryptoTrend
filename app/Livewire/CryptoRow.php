<?php

namespace App\Livewire;

use Livewire\Component;

class CryptoRow extends Component
{
    public $crypto;

    public function render()
    {
        return view('livewire.crypto-row');
    }
}
