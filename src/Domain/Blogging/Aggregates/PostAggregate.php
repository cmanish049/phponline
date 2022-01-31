<?php

declare(strict_types=1);

namespace Domain\Blogging\Aggregates;

use Domain\Blogging\Events\PostWasCreated;
use Domain\Blogging\ValueObjects\PostValueObject;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class PostAggregate extends AggregateRoot
{
    public function createPost(PostValueObject $object, int $userId): self
    {
        $this->recordThat(
            domainEvent: new PostWasCreated(
                object: $object,
                userId: $userId)
        );

        return $this;
    }

}
