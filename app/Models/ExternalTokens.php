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
 * Model ExternalTokens
 * Security tokens for accessing of external services
 */
class ExternalTokens extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'external_tokens';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'token' => 'string',
        'privatetoken' => 'string',
        'tokentype' => 'integer',
        'userid' => 'integer',
        'externalserviceid' => 'integer',
        'sid' => 'string',
        'contextid' => 'integer',
        'creatorid' => 'integer',
        'iprestriction' => 'string',
        'validuntil' => 'integer',
        'timecreated' => 'integer',
        'lastaccess' => 'integer',
        'name' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function externalServices()
    {
        return $this->belongsTo(ExternalServices::class, 'externalserviceid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'creatorid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'token' => (string)$this->token,
            'privatetoken' => (string)$this->privatetoken,
            'tokentype' => (int)$this->tokentype,
            'userid' => (int)$this->userid,
            'externalserviceid' => (int)$this->externalserviceid,
            'sid' => (string)$this->sid,
            'contextid' => (int)$this->contextid,
            'creatorid' => (int)$this->creatorid,
            'iprestriction' => (string)$this->iprestriction,
            'validuntil' => (int)$this->validuntil,
            'timecreated' => (int)$this->timecreated,
            'lastaccess' => (int)$this->lastaccess,
            'name' => (string)$this->name,
        ];
    }

    public function searchableAs()
    {
        return 'external_tokens_index';
    }
}
