<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PDO;

class MovieService
{

    protected $client;
    protected $apikey;
    protected $BASE_PATH = 'https://api.themoviedb.org/3/movie/';

    public function __construct()
    {
        $this->client = new Client();
        $this->apikey = env('TMDB_KEY');
    }

    public function getNowPlayings()
    {
        try {
            $response = $this->client->request('GET', $this->BASE_PATH . 'now_playing?language=en-US', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apikey,
                    'accept' => 'application/json',
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getUpComings()
    {
        try {
            $response = $this->client->request('GET', $this->BASE_PATH . 'upcoming?language=en-US', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apikey,
                    'accept' => 'application/json',
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getDetail(String $id)
    {
        try {
            $response = $this->client->request('GET', $this->BASE_PATH . $id . '?language=en-US', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apikey,
                    'accept' => 'application/json',
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getVideos(String $id)
    {
        try {
            $response = $this->client->request('GET', $this->BASE_PATH . $id . '/videos?language=en-US', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apikey,
                    'accept' => 'application/json',
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getSimilars(String $id)
    {
        try {
            $response = $this->client->request('GET', $this->BASE_PATH . $id . '/similar?language=en-US', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apikey,
                    'accept' => 'application/json',
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
