<?php

use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;

test('it gets correct status code', function () {
    get(route('api:v1:posts:index'))->assertStatus(Http::OK);
});
