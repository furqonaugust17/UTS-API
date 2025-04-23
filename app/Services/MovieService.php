<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PDO;

class MovieService
{

    protected $client;
    protected $apikey;
    protected $MOVIE_BASE_PATH = 'https://api.themoviedb.org/3/movie/';
    protected $SEARCH_BASE_PATH = 'https://api.themoviedb.org/3/search/';

    public function __construct()
    {
        $this->client = new Client();
        $this->apikey = env('TMDB_KEY');
    }

    public function getNowPlayings()
    {
        try {
            $response = $this->client->request('GET', $this->MOVIE_BASE_PATH . 'now_playing?language=en-US', [
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
            $response = $this->client->request('GET', $this->MOVIE_BASE_PATH . 'upcoming?language=en-US', [
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
            $response = $this->client->request('GET', $this->MOVIE_BASE_PATH . $id . '?language=en-US', [
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
            $response = $this->client->request('GET', $this->MOVIE_BASE_PATH . $id . '/videos?language=en-US', [
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
            $response = $this->client->request('GET', $this->MOVIE_BASE_PATH . $id . '/similar?language=en-US', [
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

    public function searchMovies(array $filter)
    {
        $filter['query'] = $filter['query'] ?? 'movie';
        $filter['page'] = $filter['page'] ?? 1;
        try {
            $response = $this->client->request('GET', $this->SEARCH_BASE_PATH . 'movie?query=' . $filter['query'] . '&include_adult=false&language=en-US&page=' . (int)$filter['page'], [
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
