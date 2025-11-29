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
 * Model EnrolLtiLti2UserResult
 * Results for each user for each resource link
 */
class EnrolLtiLti2UserResult extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_user_result';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'resourcelinkid' => 'integer',
        'ltiuserkey' => 'string',
        'ltiresultsourcedid' => 'string',
        'created' => 'integer',
        'updated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiLti2ResourceLink()
    {
        return $this->belongsTo(EnrolLtiLti2ResourceLink::class, 'resourcelinkid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'resourcelinkid' => (int)$this->resourcelinkid,
            'ltiuserkey' => (string)$this->ltiuserkey,
            'ltiresultsourcedid' => (string)$this->ltiresultsourcedid,
            'created' => (int)$this->created,
            'updated' => (int)$this->updated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_user_result_index';
    }
}
