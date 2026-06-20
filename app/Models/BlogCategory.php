<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'slug',
    'description',
    'status',
])]
class BlogCategory extends Model
{
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
