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
 * Model EnrolLtiUsers
 * User access log and gradeback data
 */
class EnrolLtiUsers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_users';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'toolid' => 'integer',
        'serviceurl' => 'string',
        'sourceid' => 'string',
        'ltideploymentid' => 'integer',
        'consumerkey' => 'string',
        'consumersecret' => 'string',
        'membershipsurl' => 'string',
        'membershipsid' => 'string',
        'lastgrade' => 'float',
        'lastaccess' => 'integer',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function enrolLtiTools()
    {
        return $this->belongsTo(EnrolLtiTools::class, 'toolid');
    }

    public function enrolLtiDeployment()
    {
        return $this->belongsTo(EnrolLtiDeployment::class, 'ltideploymentid');
    }

    // Relationships: HasMany
    public function enrolLtiUserResourceLinks()
    {
        return $this->hasMany(EnrolLtiUserResourceLink::class, 'ltiuserid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'toolid' => (int)$this->toolid,
            'serviceurl' => (string)$this->serviceurl,
            'sourceid' => (string)$this->sourceid,
            'ltideploymentid' => (int)$this->ltideploymentid,
            'consumerkey' => (string)$this->consumerkey,
            'consumersecret' => (string)$this->consumersecret,
            'membershipsurl' => (string)$this->membershipsurl,
            'membershipsid' => (string)$this->membershipsid,
            'lastgrade' => (float)$this->lastgrade,
            'lastaccess' => (int)$this->lastaccess,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_users_index';
    }
}
