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
 * Model EnrolLtiLti2ResourceLink
 * Link from the consumer to the tool
 */
class EnrolLtiLti2ResourceLink extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_resource_link';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'consumerid' => 'integer',
        'ltiresourcelinkkey' => 'string',
        'settings' => 'string',
        'primaryresourcelinkid' => 'integer',
        'shareapproved' => 'boolean',
        'created' => 'integer',
        'updated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiLti2Context()
    {
        return $this->belongsTo(EnrolLtiLti2Context::class, 'contextid');
    }

    public function enrolLtiLti2ResourceLink()
    {
        return $this->belongsTo(EnrolLtiLti2ResourceLink::class, 'primaryresourcelinkid');
    }

    public function enrolLtiLti2Consumer()
    {
        return $this->belongsTo(EnrolLtiLti2Consumer::class, 'consumerid');
    }

    // Relationships: HasMany
    public function enrolLtiLti2ResourceLinks()
    {
        return $this->hasMany(EnrolLtiLti2ResourceLink::class, 'primaryresourcelinkid');
    }

    public function enrolLtiLti2UserResults()
    {
        return $this->hasMany(EnrolLtiLti2UserResult::class, 'resourcelinkid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'consumerid' => (int)$this->consumerid,
            'ltiresourcelinkkey' => (string)$this->ltiresourcelinkkey,
            'settings' => (string)$this->settings,
            'primaryresourcelinkid' => (int)$this->primaryresourcelinkid,
            'shareapproved' => (int)$this->shareapproved,
            'created' => (int)$this->created,
            'updated' => (int)$this->updated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_resource_link_index';
    }
}
