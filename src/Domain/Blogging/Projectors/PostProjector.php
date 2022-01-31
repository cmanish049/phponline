<?php

declare(strict_types=1);

namespace Domain\Blogging\Projectors;

use Domain\Blogging\Actions\CreatePost;
use Domain\Blogging\Events\PostWasCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PostProjector extends  Projector
{
    public function onPostWasCreate(PostWasCreated $event): void
    {
        CreatePost::handle(
            object: $event->object
        );
    }
}
