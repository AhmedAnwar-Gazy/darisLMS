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
 * Model LtiSubmission
 * Keeps track of individual submissions for LTI activities.
 */
class LtiSubmission extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_submission';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'ltiid' => 'integer',
        'userid' => 'integer',
        'datesubmitted' => 'integer',
        'dateupdated' => 'integer',
        'gradepercent' => 'float',
        'originalgrade' => 'float',
        'launchid' => 'integer',
        'state' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'ltiid' => (int)$this->ltiid,
            'userid' => (int)$this->userid,
            'datesubmitted' => (int)$this->datesubmitted,
            'dateupdated' => (int)$this->dateupdated,
            'gradepercent' => (float)$this->gradepercent,
            'originalgrade' => (float)$this->originalgrade,
            'launchid' => (int)$this->launchid,
            'state' => (int)$this->state,
        ];
    }

    public function searchableAs()
    {
        return 'lti_submission_index';
    }
}
