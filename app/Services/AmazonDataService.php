<?php

namespace App\Services;

use GuzzleHttp\Client;

class AmazonDataService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getProductData($asin)
    {
        $response = $this->client->request('GET', 'https://real-time-amazon-data.p.rapidapi.com/api_endpoint', [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
                'X-RapidAPI-Host' => 'real-time-amazon-data.p.rapidapi.com',
            ],
            'query' => [
                'asin' => $asin,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
