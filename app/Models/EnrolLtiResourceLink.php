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
 * Model EnrolLtiResourceLink
 * Each row represents a resource link for a platform and deployment
 */
class EnrolLtiResourceLink extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_resource_link';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'resourcelinkid' => 'string',
        'ltideploymentid' => 'integer',
        'resourceid' => 'integer',
        'lticontextid' => 'integer',
        'lineitemsservice' => 'string',
        'lineitemservice' => 'string',
        'lineitemscope' => 'string',
        'resultscope' => 'string',
        'scorescope' => 'string',
        'contextmembershipsurl' => 'string',
        'nrpsserviceversions' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiDeployment()
    {
        return $this->belongsTo(EnrolLtiDeployment::class, 'ltideploymentid');
    }

    public function enrolLtiContext()
    {
        return $this->belongsTo(EnrolLtiContext::class, 'lticontextid');
    }

    // Relationships: HasMany
    public function enrolLtiUserResourceLinks()
    {
        return $this->hasMany(EnrolLtiUserResourceLink::class, 'resourcelinkid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'resourcelinkid' => (string)$this->resourcelinkid,
            'ltideploymentid' => (int)$this->ltideploymentid,
            'resourceid' => (int)$this->resourceid,
            'lticontextid' => (int)$this->lticontextid,
            'lineitemsservice' => (string)$this->lineitemsservice,
            'lineitemservice' => (string)$this->lineitemservice,
            'lineitemscope' => (string)$this->lineitemscope,
            'resultscope' => (string)$this->resultscope,
            'scorescope' => (string)$this->scorescope,
            'contextmembershipsurl' => (string)$this->contextmembershipsurl,
            'nrpsserviceversions' => (string)$this->nrpsserviceversions,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_resource_link_index';
    }
}
