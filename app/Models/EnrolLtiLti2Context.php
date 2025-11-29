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
 * Model EnrolLtiLti2Context
 * Information about a specific LTI contexts from the consumers
 */
class EnrolLtiLti2Context extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_context';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'consumerid' => 'integer',
        'lticontextkey' => 'string',
        'type' => 'string',
        'settings' => 'string',
        'created' => 'integer',
        'updated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiLti2Consumer()
    {
        return $this->belongsTo(EnrolLtiLti2Consumer::class, 'consumerid');
    }

    // Relationships: HasMany
    public function enrolLtiLti2ResourceLinks()
    {
        return $this->hasMany(EnrolLtiLti2ResourceLink::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'consumerid' => (int)$this->consumerid,
            'lticontextkey' => (string)$this->lticontextkey,
            'type' => (string)$this->type,
            'settings' => (string)$this->settings,
            'created' => (int)$this->created,
            'updated' => (int)$this->updated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_context_index';
    }
}
