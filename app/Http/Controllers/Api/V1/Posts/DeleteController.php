<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Domain\Blogging\Jobs\Posts\DeletePost;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use JustSteveKing\StatusCode\Http;

class DeleteController extends Controller
{
    public function __invoke(Request $request, Post $post): Response
    {
        //delete resource - move this to job
        DeletePost::dispatch(
            postID: $post->id,
        );

        return response(
            content: null,
            status: Http::ACCEPTED,
        );
    }
}
