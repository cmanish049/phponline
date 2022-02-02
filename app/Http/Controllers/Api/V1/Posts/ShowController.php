<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Posts\PostResource;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{

    public function __invoke(Request $request, Post $post)
    {
        $post = QueryBuilder::for(
                subject: $post
            )
            ->allowedIncludes(
                includes: ['user']
            )->first();

        return response()->json(
            data: new PostResource($post),
            status: Response::HTTP_OK
        );
    }
}
