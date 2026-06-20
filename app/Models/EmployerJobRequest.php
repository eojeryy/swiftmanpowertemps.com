<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'company_name',
    'website',
    'industry',
    'company_phone',
    'company_address',
    'contact_first_name',
    'contact_last_name',
    'profile_link',
    'username',
    'email',
    'phone',
    'interest',
    'specialization',
    'job_location',
    'pay_rate',
    'position_hiring_for',
    'preferred_pronoun',
    'openings_count',
    'subject',
    'message',
    'status',
    'job_opening_id',
    'approved_at',
])]
class EmployerJobRequest extends Model
{
    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
        ];
    }
}
