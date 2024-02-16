<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\CoinGeckoService;
use Illuminate\Support\Facades\Log;

class CryptoController extends Controller
{
    protected $coinGeckoService;

    public function __construct(CoinGeckoService $coinGeckoService)
    {
        $this->coinGeckoService = $coinGeckoService;
    }

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'sort' => 'in:name,current_price,market_cap,volume,etc',
            'direction' => 'in:asc,desc',
        ]);

        $sort = $validated['sort'] ?? 'market_cap';
        $direction = $validated['direction'] ?? 'desc';

        $cryptos = $this->coinGeckoService->getMarketData($sort, $direction);
        return view('home', ['cryptos' => $cryptos]);
    }

    public function show($id)
    {
        try {
            $crypto = $this->coinGeckoService->getCoinDetails($id);

            return view('crypto.details', ['crypto' => $crypto]);
        } catch (\Exception $e) {
            Log::error("Erreur Cryptocurrency not found. " . $e->getMessage());
            abort(404, 'Cryptocurrency not found.');
        }
    }

    public function counter(): View
    {
        return view('livewire.counter');
    }
}
