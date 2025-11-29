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
 * Model EnrolLtiLti2Consumer
 * LTI consumers interacting with moodle
 */
class EnrolLtiLti2Consumer extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_consumer';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'consumerkey256' => 'string',
        'consumerkey' => 'string',
        'secret' => 'string',
        'ltiversion' => 'string',
        'consumername' => 'string',
        'consumerversion' => 'string',
        'consumerguid' => 'string',
        'profile' => 'string',
        'toolproxy' => 'string',
        'settings' => 'string',
        'protected' => 'boolean',
        'enabled' => 'boolean',
        'enablefrom' => 'integer',
        'enableuntil' => 'integer',
        'lastaccess' => 'integer',
        'created' => 'integer',
        'updated' => 'integer',
    ];

    // Relationships: HasMany
    public function enrolLtiLti2ToolProxys()
    {
        return $this->hasMany(EnrolLtiLti2ToolProxy::class, 'consumerid');
    }

    public function enrolLtiLti2Contexts()
    {
        return $this->hasMany(EnrolLtiLti2Context::class, 'consumerid');
    }

    public function enrolLtiLti2Nonces()
    {
        return $this->hasMany(EnrolLtiLti2Nonce::class, 'consumerid');
    }

    public function enrolLtiLti2ResourceLinks()
    {
        return $this->hasMany(EnrolLtiLti2ResourceLink::class, 'consumerid');
    }

    public function enrolLtiToolConsumerMaps()
    {
        return $this->hasMany(EnrolLtiToolConsumerMap::class, 'consumerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'consumerkey256' => (string)$this->consumerkey256,
            'consumerkey' => (string)$this->consumerkey,
            'secret' => (string)$this->secret,
            'ltiversion' => (string)$this->ltiversion,
            'consumername' => (string)$this->consumername,
            'consumerversion' => (string)$this->consumerversion,
            'consumerguid' => (string)$this->consumerguid,
            'profile' => (string)$this->profile,
            'toolproxy' => (string)$this->toolproxy,
            'settings' => (string)$this->settings,
            'protected' => (int)$this->protected,
            'enabled' => (int)$this->enabled,
            'enablefrom' => (int)$this->enablefrom,
            'enableuntil' => (int)$this->enableuntil,
            'lastaccess' => (int)$this->lastaccess,
            'created' => (int)$this->created,
            'updated' => (int)$this->updated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_consumer_index';
    }
}
