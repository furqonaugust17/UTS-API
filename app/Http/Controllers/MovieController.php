<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $nowPlayings = $this->movieService->getNowPlayings();
        $upComings = $this->movieService->getUpComings();
        return view('movies.main', compact('nowPlayings', 'upComings'));
    }

    public function detail(String $id)
    {
        $movie = $this->movieService->getDetail($id);
        $similars = $this->movieService->getSimilars($id);
        $videos = $this->movieService->getVideos($id);
        return view('movies.detail', compact('movie', 'similars', 'videos'));
    }
}
