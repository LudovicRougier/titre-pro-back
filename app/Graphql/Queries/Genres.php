<?php

namespace App\Graphql\Queries;

use App\Services\TMDBService;
use Illuminate\Support\Facades\Auth;


final class Genres
{
    public function __invoke(): array
    {
        $TMDBService = new TMDBService(Auth::user()->country->value);

        return ($TMDBService->getAllGenres());
    }
}
