<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class CoinMarketApiService
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $this->apiKey = config('services.coinmarket.key');
    }

    /**
     * @throws ConnectionException
     */
    public function getCurrencies(): array
    {
        $response = Http::withHeaders([
            'Accepts' => 'application/json',
            'X-CMC_PRO_API_KEY' => $this->apiKey
        ])->get($this->baseUrl);

        if(!$response->ok()){
            throw new \RuntimeException("Error fetching currencies");
        }

        return $response->json();
    }
}
