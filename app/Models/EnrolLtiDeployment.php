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
 * Model EnrolLtiDeployment
 * Each row represents a deployment of a tool within a platform.
 */
class EnrolLtiDeployment extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_deployment';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'deploymentid' => 'string',
        'platformid' => 'integer',
        'legacyconsumerkey' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiAppRegistration()
    {
        return $this->belongsTo(EnrolLtiAppRegistration::class, 'platformid');
    }

    // Relationships: HasMany
    public function enrolLtiContexts()
    {
        return $this->hasMany(EnrolLtiContext::class, 'ltideploymentid');
    }

    public function enrolLtiResourceLinks()
    {
        return $this->hasMany(EnrolLtiResourceLink::class, 'ltideploymentid');
    }

    public function enrolLtiUserss()
    {
        return $this->hasMany(EnrolLtiUsers::class, 'ltideploymentid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'deploymentid' => (string)$this->deploymentid,
            'platformid' => (int)$this->platformid,
            'legacyconsumerkey' => (string)$this->legacyconsumerkey,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_deployment_index';
    }
}
