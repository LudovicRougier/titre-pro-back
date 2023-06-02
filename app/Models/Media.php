<?php

namespace App\Models;

class Media
{
    protected $id;
    protected $title;
    protected $overview;
    protected $backdrop_path;
    protected $poster_path;
    protected $runtime;
    protected $directors;
    protected $actors;
    protected $genres;

    public function __construct($infos = [
        'id' => null,
        'title' => null,
        'overview' => null,
        'backdrop_path' => null,
        'poster_path' => null,
        'runtime' => null,
        'directors' => null,
        'actors' => null,
        'genres' => null,
    ])
    {
        $this->id = $infos['id'];
        $this->title = $infos['title'];
        $this->overview = $infos['overview'];
        $this->backdrop_path = $infos['backdrop_path'];
        $this->poster_path = $infos['poster_path'];
        $this->runtime = $infos['runtime'];
        $this->directors = $infos['directors'];
        $this->actors = $infos['actors'];
        $this->genres = $infos['genres'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'overview' => $this->overview,
            'backdrop_path' => $this->backdrop_path,
            'poster_path' => $this->poster_path,
            'runtime' => $this->runtime,
            'directors' => $this->directors,
            'actors' => $this->actors,
            'genres' => $this->genres,
        ];
    }
}
