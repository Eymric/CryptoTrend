@extends('layouts.app')

@section('content')
    <x-header />

    <div class="container mx-auto px-4 mt-24">
        <div class="flex flex-wrap mx-4">

            <nav class="p-3 rounded w-full m-8">
                <ol class="list-reset flex text-grey-dark">
                    <li><a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>{{ $crypto['name'] }}</li>
                </ol>
            </nav>
            <div class="w-1/4 px-4 mb-4">
                <img src="{{ $crypto['image']['large'] }}" alt="Logo" class="mx-auto">
                <h2 class="text-xl font-bold text-center mt-4">{{ $crypto['name'] }}</h2>
                <div class="mt-6 space-y-4">
                    @php
                        $infos = [
                            'BTC Price' => '$' . number_format($crypto['market_data']['current_price']['usd'] ?? 0, 2),
                            'Rank' => '#' . $crypto['market_cap_rank'],
                            'Market Cap' => '$' . number_format($crypto['market_data']['market_cap']['usd'] ?? 0, 0, '.', ','),
                            'Fully Diluted Valuation' => '$' . number_format($crypto['market_data']['fully_diluted_valuation']['usd'] ?? 0, 0, '.', ','),
                            '24 Hour Trading Vol' => '$' . number_format($crypto['market_data']['total_volume']['usd'] ?? 0, 0, '.', ','),
                            'Circulating Supply' => number_format($crypto['market_data']['circulating_supply'] ?? 0, 0, '.', ','),
                            'Total Supply' => $crypto['market_data']['total_supply'] ? number_format($crypto['market_data']['total_supply'], 0, '.', ',') : 'N/A',
                            'Max Supply' => $crypto['market_data']['max_supply'] ? number_format($crypto['market_data']['max_supply'], 0, '.', ',') : 'N/A',
                        ];
                    @endphp
                    @foreach ($infos as $label => $value)
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-gray-400">{{ $label }}:</span>
                            <span class="font-bold text-black">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-3/4 px-4">
                <h1 class="text-3xl font-bold">{{ $crypto['name'] }}</h1>
                <p class="text-gray-600 mt-10">{!! $crypto['description']['en'] !!}</p>
            </div>
        </div>
    </div>
@endsection
