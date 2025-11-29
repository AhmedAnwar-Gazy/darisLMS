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
 * Model EnrolLtiContext
 * Each row represents a context in the platform, where resource links are added within a deployment.
 */
class EnrolLtiContext extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_context';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'string',
        'ltideploymentid' => 'integer',
        'type' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiDeployment()
    {
        return $this->belongsTo(EnrolLtiDeployment::class, 'ltideploymentid');
    }

    // Relationships: HasMany
    public function enrolLtiResourceLinks()
    {
        return $this->hasMany(EnrolLtiResourceLink::class, 'lticontextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (string)$this->contextid,
            'ltideploymentid' => (int)$this->ltideploymentid,
            'type' => (string)$this->type,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_context_index';
    }
}
