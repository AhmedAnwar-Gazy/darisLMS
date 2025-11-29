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
 * Model LtiToolProxies
 * LTI tool proxy registrations
 */
class LtiToolProxies extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_tool_proxies';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'regurl' => 'string',
        'state' => 'integer',
        'guid' => 'string',
        'secret' => 'string',
        'vendorcode' => 'string',
        'capabilityoffered' => 'string',
        'serviceoffered' => 'string',
        'toolproxy' => 'string',
        'createdby' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: HasMany
    public function ltiToolSettingss()
    {
        return $this->hasMany(LtiToolSettings::class, 'toolproxyid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'regurl' => (string)$this->regurl,
            'state' => (int)$this->state,
            'guid' => (string)$this->guid,
            'secret' => (string)$this->secret,
            'vendorcode' => (string)$this->vendorcode,
            'capabilityoffered' => (string)$this->capabilityoffered,
            'serviceoffered' => (string)$this->serviceoffered,
            'toolproxy' => (string)$this->toolproxy,
            'createdby' => (int)$this->createdby,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'lti_tool_proxies_index';
    }
}
