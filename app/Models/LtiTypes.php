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
 * Model LtiTypes
 * Basic LTI pre-configured activities
 */
class LtiTypes extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_types';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'baseurl' => 'string',
        'tooldomain' => 'string',
        'state' => 'integer',
        'course' => 'integer',
        'coursevisible' => 'boolean',
        'ltiversion' => 'string',
        'clientid' => 'string',
        'toolproxyid' => 'integer',
        'enabledcapability' => 'string',
        'parameter' => 'string',
        'icon' => 'string',
        'secureicon' => 'string',
        'createdby' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'description' => 'string',
    ];

    // Relationships: HasMany
    public function ltiTypesCategoriess()
    {
        return $this->hasMany(LtiTypesCategories::class, 'typeid');
    }

    public function ltiAccessTokenss()
    {
        return $this->hasMany(LtiAccessTokens::class, 'typeid');
    }

    public function ltiToolSettingss()
    {
        return $this->hasMany(LtiToolSettings::class, 'typeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'baseurl' => (string)$this->baseurl,
            'tooldomain' => (string)$this->tooldomain,
            'state' => (int)$this->state,
            'course' => (int)$this->course,
            'coursevisible' => (int)$this->coursevisible,
            'ltiversion' => (string)$this->ltiversion,
            'clientid' => (string)$this->clientid,
            'toolproxyid' => (int)$this->toolproxyid,
            'enabledcapability' => (string)$this->enabledcapability,
            'parameter' => (string)$this->parameter,
            'icon' => (string)$this->icon,
            'secureicon' => (string)$this->secureicon,
            'createdby' => (int)$this->createdby,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'description' => (string)$this->description,
        ];
    }

    public function searchableAs()
    {
        return 'lti_types_index';
    }
}
