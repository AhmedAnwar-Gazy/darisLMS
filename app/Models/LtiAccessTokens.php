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
 * Model LtiAccessTokens
 * Security tokens for accessing of LTI services
 */
class LtiAccessTokens extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_access_tokens';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'typeid' => 'integer',
        'scope' => 'string',
        'token' => 'string',
        'validuntil' => 'integer',
        'timecreated' => 'integer',
        'lastaccess' => 'integer',
    ];

    // Relationships: BelongsTo
    public function ltiTypes()
    {
        return $this->belongsTo(LtiTypes::class, 'typeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'typeid' => (int)$this->typeid,
            'scope' => (string)$this->scope,
            'token' => (string)$this->token,
            'validuntil' => (int)$this->validuntil,
            'timecreated' => (int)$this->timecreated,
            'lastaccess' => (int)$this->lastaccess,
        ];
    }

    public function searchableAs()
    {
        return 'lti_access_tokens_index';
    }
}
