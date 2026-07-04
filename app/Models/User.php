<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'is_super_admin', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    public const ROLE_SUPER_ADMIN = 'super_admin';
    public const ROLE_EMPLOYEE = 'employee';
    public const ROLE_BLOG_STAFF = 'blog_staff';

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPER_ADMIN || $this->is_super_admin;
    }

    public function isBlogStaff(): bool
    {
        return $this->role === self::ROLE_BLOG_STAFF;
    }

    public function isEmployee(): bool
    {
        return $this->role === self::ROLE_EMPLOYEE || (! $this->is_super_admin && $this->role !== self::ROLE_BLOG_STAFF);
    }

    public function canAccessAdminPanel(): bool
    {
        return $this->isSuperAdmin() || $this->isBlogStaff();
    }

    public function adminLabel(): string
    {
        return $this->isSuperAdmin() ? 'Super Admin' : 'Blog Staff';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'is_super_admin' => 'boolean',
            'password' => 'hashed',
        ];
    }
}
