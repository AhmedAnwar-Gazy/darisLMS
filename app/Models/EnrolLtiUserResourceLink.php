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
 * Model EnrolLtiUserResourceLink
 * Join table mapping users to resource links as this is a many:many relationship
 */
class EnrolLtiUserResourceLink extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_user_resource_link';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'ltiuserid' => 'integer',
        'resourcelinkid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiUsers()
    {
        return $this->belongsTo(EnrolLtiUsers::class, 'ltiuserid');
    }

    public function enrolLtiResourceLink()
    {
        return $this->belongsTo(EnrolLtiResourceLink::class, 'resourcelinkid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'ltiuserid' => (int)$this->ltiuserid,
            'resourcelinkid' => (int)$this->resourcelinkid,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_user_resource_link_index';
    }
}
