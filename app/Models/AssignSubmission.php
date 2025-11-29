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
 * Model AssignSubmission
 * This table keeps information about student interactions with the mod/assign. This is limited to metadata about a student submission but does not include the submission itself which is stored by plugins.
 */
class AssignSubmission extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign_submission';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'userid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'timestarted' => 'integer',
        'status' => 'string',
        'groupid' => 'integer',
        'attemptnumber' => 'integer',
        'latest' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    // Relationships: HasMany
    public function assignsubmissionOnlinetexts()
    {
        return $this->hasMany(AssignsubmissionOnlinetext::class, 'submission');
    }

    public function assignsubmissionFiles()
    {
        return $this->hasMany(AssignsubmissionFile::class, 'submission');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'assignment' => (int)$this->assignment,
            'userid' => (int)$this->userid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'timestarted' => (int)$this->timestarted,
            'status' => (string)$this->status,
            'groupid' => (int)$this->groupid,
            'attemptnumber' => (int)$this->attemptnumber,
            'latest' => (int)$this->latest,
        ];
    }

    public function searchableAs()
    {
        return 'assign_submission_index';
    }
}
