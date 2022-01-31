<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use Domain\Blogging\Jobs\Posts\CreatePost;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Response
    {

        CreatePost::dispatch(
            PostFactory::create(
                attributes: $request->validated(),
            )
        );

        return response(
            content: null,
            status: Http::CREATED,
        );
    }
}
