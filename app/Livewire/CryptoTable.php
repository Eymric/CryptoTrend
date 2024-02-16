<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use App\Services\CoinGeckoService;
use Livewire\Component;

class CryptoTable extends Component
{
    public $sortField = 'market_cap';
    public $sortDirection = 'desc';
    public $currentPage = 1;
    public $perPage = 100;

    public $columns = [
        'market_cap_rank' => '#',
        'id' => 'Name',
        'current_price' => 'Price',
        'price_change_percentage_1h_in_currency' => '1h %',
        'price_change_percentage_24h_in_currency' => '24h %',
        'price_change_percentage_7d_in_currency' => '7d %',
        'market_cap' => 'Market Cap',
        'volume' => 'Volume(24h)',
        'circulating_supply' => 'Circulating Supply',
    ];

    public function changePage($direction)
    {
        $direction === 'previous' ? $this->currentPage-- : $this->currentPage++;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function render()
    {
        $coinGeckoService = app(CoinGeckoService::class);
        $cryptos = $coinGeckoService->getMarketData($this->sortField, $this->sortDirection, $this->currentPage, $this->perPage);

        return view('livewire.crypto-table', [
            'cryptos' => $cryptos,
        ]);
    }
}
