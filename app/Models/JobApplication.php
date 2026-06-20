<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'fname',
    'lname',
    'email',
    'phone',
    'address',
    'education',
    'skills',
    'experience',
    'qualities',
    'upload_file',
    'job_number',
    'work_status',
    'message',
    'status',
])]
class JobApplication extends Model
{
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
        ];
    }
}
