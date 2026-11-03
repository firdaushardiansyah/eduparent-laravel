<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'is_active' => 'boolean',
            'must_change_password' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Check if user is a Guru.
     */
    public function isGuru(): bool
    {
        return $this->role === UserRole::Guru;
    }

    /**
     * Check if user is an Orang Tua.
     */
    public function isOrtu(): bool
    {
        return $this->role === UserRole::Ortu;
    }

    /**
     * Set role explicitly (not mass-assignable).
     */
    public function setRole(UserRole $role): void
    {
        $this->role = $role;
    }

    /**
     * Set active status explicitly (not mass-assignable).
     */
    public function setActive(bool $isActive): void
    {
        $this->is_active = $isActive;
    }

    /**
     * Set must change password flag explicitly (not mass-assignable).
     */
    public function setMustChangePassword(bool $mustChange): void
    {
        $this->must_change_password = $mustChange;
    }

    /**
     * Get login audits for this user.
     */
    public function loginAudits(): HasMany
    {
        return $this->hasMany(LoginAudit::class);
    }
}
