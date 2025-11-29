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
 * Model Oauth2Endpoint
 * Describes the named endpoint for an oauth2 service.
 */
class Oauth2Endpoint extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'oauth2_endpoint';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'name' => 'string',
        'url' => 'string',
        'issuerid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function oauth2Issuer()
    {
        return $this->belongsTo(Oauth2Issuer::class, 'issuerid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'name' => (string)$this->name,
            'url' => (string)$this->url,
            'issuerid' => (int)$this->issuerid,
        ];
    }

    public function searchableAs()
    {
        return 'oauth2_endpoint_index';
    }
}
