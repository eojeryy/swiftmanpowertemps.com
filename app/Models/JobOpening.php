<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'slug',
    'category',
    'company_name',
    'location',
    'employment_type',
    'schedule',
    'summary',
    'description',
    'image_path',
    'tags',
    'responsibilities',
    'requirements',
    'status',
    'published_at',
])]
class JobOpening extends Model
{
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'responsibilities' => 'array',
            'requirements' => 'array',
            'published_at' => 'datetime',
        ];
    }
}
