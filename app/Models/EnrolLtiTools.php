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
 * Model EnrolLtiTools
 * List of tools provided to the remote system
 */
class EnrolLtiTools extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_tools';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'enrolid' => 'integer',
        'contextid' => 'integer',
        'ltiversion' => 'string',
        'institution' => 'string',
        'lang' => 'string',
        'timezone' => 'string',
        'maxenrolled' => 'integer',
        'maildisplay' => 'integer',
        'city' => 'string',
        'country' => 'string',
        'gradesync' => 'boolean',
        'gradesynccompletion' => 'boolean',
        'membersync' => 'boolean',
        'membersyncmode' => 'boolean',
        'roleinstructor' => 'integer',
        'rolelearner' => 'integer',
        'secret' => 'string',
        'uuid' => 'string',
        'provisioningmodelearner' => 'integer',
        'provisioningmodeinstructor' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrol()
    {
        return $this->belongsTo(Enrol::class, 'enrolid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function enrolLtiToolConsumerMaps()
    {
        return $this->hasMany(EnrolLtiToolConsumerMap::class, 'toolid');
    }

    public function enrolLtiUserss()
    {
        return $this->hasMany(EnrolLtiUsers::class, 'toolid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'enrolid' => (int)$this->enrolid,
            'contextid' => (int)$this->contextid,
            'ltiversion' => (string)$this->ltiversion,
            'institution' => (string)$this->institution,
            'lang' => (string)$this->lang,
            'timezone' => (string)$this->timezone,
            'maxenrolled' => (int)$this->maxenrolled,
            'maildisplay' => (int)$this->maildisplay,
            'city' => (string)$this->city,
            'country' => (string)$this->country,
            'gradesync' => (int)$this->gradesync,
            'gradesynccompletion' => (int)$this->gradesynccompletion,
            'membersync' => (int)$this->membersync,
            'membersyncmode' => (int)$this->membersyncmode,
            'roleinstructor' => (int)$this->roleinstructor,
            'rolelearner' => (int)$this->rolelearner,
            'secret' => (string)$this->secret,
            'uuid' => (string)$this->uuid,
            'provisioningmodelearner' => (int)$this->provisioningmodelearner,
            'provisioningmodeinstructor' => (int)$this->provisioningmodeinstructor,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_tools_index';
    }
}
