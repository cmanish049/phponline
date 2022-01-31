<?php

namespace Domain\Blogging\Jobs\Posts;

use Domain\Blogging\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeletePost implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public int $postID
    )
    { }

    public function handle(): void
    {
        $post = Post::find($this->postID);
        $post->delete();
    }
}
