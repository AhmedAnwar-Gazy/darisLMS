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
 * Model Oauth2UserFieldMapping
 * Mapping of oauth user fields to moodle fields.
 */
class Oauth2UserFieldMapping extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'oauth2_user_field_mapping';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timemodified' => 'integer',
        'timecreated' => 'integer',
        'usermodified' => 'integer',
        'issuerid' => 'integer',
        'externalfield' => 'string',
        'internalfield' => 'string',
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
            'timemodified' => (int)$this->timemodified,
            'timecreated' => (int)$this->timecreated,
            'usermodified' => (int)$this->usermodified,
            'issuerid' => (int)$this->issuerid,
            'externalfield' => (string)$this->externalfield,
            'internalfield' => (string)$this->internalfield,
        ];
    }

    public function searchableAs()
    {
        return 'oauth2_user_field_mapping_index';
    }
}
