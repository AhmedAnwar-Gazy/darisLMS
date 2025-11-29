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
 * Model EnrolLtiAppRegistration
 * Details of each application that has been registered with the tool
 */
class EnrolLtiAppRegistration extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_app_registration';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'platformid' => 'string',
        'clientid' => 'string',
        'uniqueid' => 'string',
        'platformclienthash' => 'string',
        'platformuniqueidhash' => 'string',
        'authenticationrequesturl' => 'string',
        'jwksurl' => 'string',
        'accesstokenurl' => 'string',
        'status' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: HasMany
    public function enrolLtiDeployments()
    {
        return $this->hasMany(EnrolLtiDeployment::class, 'platformid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'platformid' => (string)$this->platformid,
            'clientid' => (string)$this->clientid,
            'uniqueid' => (string)$this->uniqueid,
            'platformclienthash' => (string)$this->platformclienthash,
            'platformuniqueidhash' => (string)$this->platformuniqueidhash,
            'authenticationrequesturl' => (string)$this->authenticationrequesturl,
            'jwksurl' => (string)$this->jwksurl,
            'accesstokenurl' => (string)$this->accesstokenurl,
            'status' => (int)$this->status,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_app_registration_index';
    }
}
