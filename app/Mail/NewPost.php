<?php

declare(strict_types=1);

namespace App\Mail;

use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPost extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public PostValueObject $object
    ) {}

    public function build()
    {
        return $this->markdown('emails.posts.new-post');
    }
}
