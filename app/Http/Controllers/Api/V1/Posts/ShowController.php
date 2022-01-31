<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Posts\PostResource;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    public function __invoke(Request $request, Post $post)
    {
        return $post;
    }
}
