<?php

declare(strict_types=1);

namespace Domain\Blogging\Jobs\Posts;

use Domain\Blogging\Actions\CreatePost as CreatePostAction;
use Domain\Blogging\Aggregates\PostAggregate;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreatePost implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public PostValueObject $object
    )
    {}

    public function handle()
    {
        PostAggregate::retrieve(
            uuid: Str::uuid()->toString()
        )->createPost(
            object: $this->object,
            userId: 1
        )->persist();
    }
}
