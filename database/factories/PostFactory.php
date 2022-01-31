<?php
declare(strict_types=1);

namespace Database\Factories;

use Domain\Blogging\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        $title = $this->faker->words(5, true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->randomHtml,
            'description' => $this->faker->sentence(2, true), // max 120 char
            'published' => $this->faker->boolean,
        ];
    }
}
