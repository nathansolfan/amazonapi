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

    public function searchProducts($query, $page = 1, $country = 'US', $sortBy = 'RELEVANCE', $condition = 'ALL')
    {
        try {
            $response = $this->client->request('GET', 'https://real-time-amazon-data.p.rapidapi.com/search', [
                'headers' => [
                    'x-rapidapi-host' => 'real-time-amazon-data.p.rapidapi.com',
                    'x-rapidapi-key' => env('RAPIDAPI_KEY'),
                ],
                'query' => [
                    'query' => $query,
                    'page' => $page,
                    'country' => $country,
                    'sort_by' => $sortBy,
                    'product_condition' => $condition,
                ],
                'verify' => false, // Disable SSL verification
            ]);

            $body = $response->getBody();
            return json_decode($body, true);
        } catch (\Exception $e) {
            return [];
        }
    }
}
