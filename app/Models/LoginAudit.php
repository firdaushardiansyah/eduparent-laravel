<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginAudit extends Model
{
    public const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'email_attempted',
        'ip_address',
        'user_agent',
        'event',
    ];

    /**
     * Get the user that owns the login audit.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
