<?php

namespace App\Livewire;

use App\Services\CoinGeckoService;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';
    public $searchResults = [];

    public function updatedSearchTerm()
    {
        if(strlen($this->searchTerm) >= 3) {
            $coinGeckoService = app(CoinGeckoService::class);
            $this->searchResults = $coinGeckoService->search($this->searchTerm);
        } else {
            $this->searchResults = [];
        }
    }
    public function render()
    {
        return view('livewire.search', ['searchResults' => $this->searchResults]);
    }
}