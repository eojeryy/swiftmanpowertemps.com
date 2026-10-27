<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'slug',
    'seo_title',
    'meta_description',
    'primary_keyword',
    'target_audience',
    'search_intent',
    'image_alt',
    'category',
    'excerpt',
    'content',
    'image_path',
    'status',
    'published_at',
])]
class BlogPost extends Model
{
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
