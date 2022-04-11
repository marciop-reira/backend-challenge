<?php

namespace App\External\SpaceFlightNewsAPI\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/**
 *
 */
class ApiRepository
{

    /**
     * @var string
     */
    private string $baseUrl;

    /**
     *
     */
    public function __construct()
    {
        $this->baseUrl = config('services.space_flight_news.base_url');
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return array|mixed
     * @throws RequestException
     */
    public function get(string $endpoint, array $params = [])
    {
        $response = Http::accept('application/json')
            ->get($this->baseUrl.$endpoint, $params);

        $response->throw();

        return $response->json();
    }

}
