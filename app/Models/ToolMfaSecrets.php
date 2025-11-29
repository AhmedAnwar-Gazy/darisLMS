<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model ToolMfaSecrets
 * Table to store factor secrets
 */
class ToolMfaSecrets extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_mfa_secrets';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'factor' => 'string',
        'secret' => 'string',
        'timecreated' => 'integer',
        'expiry' => 'integer',
        'revoked' => 'boolean',
        'sessionid' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'factor' => (string)$this->factor,
            'secret' => (string)$this->secret,
            'timecreated' => (int)$this->timecreated,
            'expiry' => (int)$this->expiry,
            'revoked' => (int)$this->revoked,
            'sessionid' => (string)$this->sessionid,
        ];
    }

    public function searchableAs()
    {
        return 'tool_mfa_secrets_index';
    }
}
