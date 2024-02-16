<?php

namespace App\Services;

use GuzzleHttp\Client;

class CoinGeckoService
{
    protected $client;
    protected $apiKey;
    protected const BASE_URI = 'https://api.coingecko.com/api/v3/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
            'verify' => false,
        ]);
        $this->apiKey = env('COINGECKO_API_KEY', '');
    }

    public function getMarketData(string $sort = 'market_cap', string $direction = 'desc', int $page = 1, int $perPage = 100): array
    {
        $order = "{$sort}_{$direction}";

        $response = $this->client->request('GET', 'coins/markets', [
            'query' => [
                'vs_currency' => 'usd',
                'order' => $order,
                'per_page' => $perPage,
                'page' => $page,
                'sparkline' => false,
                'price_change_percentage' => '1h,24h,7d',
                'x_cg_demo_api_key' => $this->apiKey,
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getCoinDetails(string $id): array
    {
        try {
            $response = $this->client->request('GET', "coins/{$id}");

            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            throw new \Exception('Failed to retrieve cryptocurrency details.');
        }
    }

    public function search(string $searchTerm): array
    {
        $response = $this->client->request('GET', 'search', [
            'query' => [
                'query' => $searchTerm,
                'x_cg_demo_api_key' => $this->apiKey,
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents(), true)['coins'];
        }

        return [];
    }
}
