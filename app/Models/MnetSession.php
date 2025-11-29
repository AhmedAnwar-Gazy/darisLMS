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
 * Model MnetSession
 * Store session data from users migrating to other sites
 */
class MnetSession extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_session';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'username' => 'string',
        'token' => 'string',
        'mnethostid' => 'integer',
        'useragent' => 'string',
        'confirm_timeout' => 'integer',
        'session_id' => 'string',
        'expires' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function mnetHost()
    {
        return $this->belongsTo(MnetHost::class, 'mnethostid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'username' => (string)$this->username,
            'token' => (string)$this->token,
            'mnethostid' => (int)$this->mnethostid,
            'useragent' => (string)$this->useragent,
            'confirm_timeout' => (int)$this->confirm_timeout,
            'session_id' => (string)$this->session_id,
            'expires' => (int)$this->expires,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_session_index';
    }
}
