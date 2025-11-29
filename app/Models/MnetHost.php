<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model MnetHost
 * Information about the local and remote hosts for RPC
 */
class MnetHost extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels, SoftDeletes;

    protected $table = 'mnet_host';
    public $timestamps = false;
    const DELETED_AT = 'deleted';

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'deleted' => 'boolean',
        'wwwroot' => 'string',
        'ip_address' => 'string',
        'name' => 'string',
        'public_key' => 'string',
        'public_key_expires' => 'integer',
        'transport' => 'integer',
        'portno' => 'integer',
        'last_connect_time' => 'integer',
        'last_log_id' => 'integer',
        'force_theme' => 'boolean',
        'theme' => 'string',
        'applicationid' => 'integer',
        'sslverification' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function mnetApplication()
    {
        return $this->belongsTo(MnetApplication::class, 'applicationid');
    }

    // Relationships: HasMany
    public function mnetserviceEnrolEnrolmentss()
    {
        return $this->hasMany(MnetserviceEnrolEnrolments::class, 'hostid');
    }

    public function mnetSessions()
    {
        return $this->hasMany(MnetSession::class, 'mnethostid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'deleted' => (int)$this->deleted,
            'wwwroot' => (string)$this->wwwroot,
            'ip_address' => (string)$this->ip_address,
            'name' => (string)$this->name,
            'public_key' => (string)$this->public_key,
            'public_key_expires' => (int)$this->public_key_expires,
            'transport' => (int)$this->transport,
            'portno' => (int)$this->portno,
            'last_connect_time' => (int)$this->last_connect_time,
            'last_log_id' => (int)$this->last_log_id,
            'force_theme' => (int)$this->force_theme,
            'theme' => (string)$this->theme,
            'applicationid' => (int)$this->applicationid,
            'sslverification' => (int)$this->sslverification,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_host_index';
    }
}
