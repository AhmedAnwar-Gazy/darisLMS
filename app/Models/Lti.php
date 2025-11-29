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
 * Model Lti
 * This table contains Basic LTI activities instances
 */
class Lti extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'typeid' => 'integer',
        'toolurl' => 'string',
        'securetoolurl' => 'string',
        'instructorchoicesendname' => 'boolean',
        'instructorchoicesendemailaddr' => 'boolean',
        'instructorchoiceallowroster' => 'boolean',
        'instructorchoiceallowsetting' => 'boolean',
        'instructorcustomparameters' => 'string',
        'instructorchoiceacceptgrades' => 'boolean',
        'grade' => 'integer',
        'launchcontainer' => 'integer',
        'resourcekey' => 'string',
        'password' => 'string',
        'debuglaunch' => 'boolean',
        'showtitlelaunch' => 'boolean',
        'showdescriptionlaunch' => 'boolean',
        'servicesalt' => 'string',
        'icon' => 'string',
        'secureicon' => 'string',
    ];

    // Relationships: HasMany
    public function ltiToolSettingss()
    {
        return $this->hasMany(LtiToolSettings::class, 'coursemoduleid');
    }

    public function ltiserviceGradebookservicess()
    {
        return $this->hasMany(LtiserviceGradebookservices::class, 'ltilinkid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'typeid' => (int)$this->typeid,
            'toolurl' => (string)$this->toolurl,
            'securetoolurl' => (string)$this->securetoolurl,
            'instructorchoicesendname' => (int)$this->instructorchoicesendname,
            'instructorchoicesendemailaddr' => (int)$this->instructorchoicesendemailaddr,
            'instructorchoiceallowroster' => (int)$this->instructorchoiceallowroster,
            'instructorchoiceallowsetting' => (int)$this->instructorchoiceallowsetting,
            'instructorcustomparameters' => (string)$this->instructorcustomparameters,
            'instructorchoiceacceptgrades' => (int)$this->instructorchoiceacceptgrades,
            'grade' => (int)$this->grade,
            'launchcontainer' => (int)$this->launchcontainer,
            'resourcekey' => (string)$this->resourcekey,
            'password' => (string)$this->password,
            'debuglaunch' => (int)$this->debuglaunch,
            'showtitlelaunch' => (int)$this->showtitlelaunch,
            'showdescriptionlaunch' => (int)$this->showdescriptionlaunch,
            'servicesalt' => (string)$this->servicesalt,
            'icon' => (string)$this->icon,
            'secureicon' => (string)$this->secureicon,
        ];
    }

    public function searchableAs()
    {
        return 'lti_index';
    }
}
