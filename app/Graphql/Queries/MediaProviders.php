<?php

namespace App\GraphQL\Queries;

use App\Services\TMDBService;
use Illuminate\Support\Facades\Auth;

final class MediaProviders
{
    public function __invoke(): array
    {
        $TMDBService = new TMDBService(Auth::user()->country->value);

        return $TMDBService->getItems('media_providers');
    }
}
