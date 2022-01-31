<?php

namespace Domain\Blogging\Models;

use Database\Factories\PostFactory;
use Domain\Blogging\Models\Builders\PostBuilder;
use Domain\Blogging\Models\Concerns\HasSlug;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Post extends Model
{
    use HasKey;
    use HasSlug;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'key',
      'title',
      'slug',
      'body',
      'description',
      'published',
      'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'key';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    public static function newFactory(): Factory
    {
        return PostFactory::new();
    }

    public  function newEloquentBuilder($query): PostBuilder
    {
        return new PostBuilder(
            query: $query
        );
    }
}
