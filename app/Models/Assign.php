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
 * Model Assign
 * This table saves information about an instance of mod_assign in a course.
 */
class Assign extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'alwaysshowdescription' => 'integer',
        'nosubmissions' => 'integer',
        'submissiondrafts' => 'integer',
        'sendnotifications' => 'integer',
        'sendlatenotifications' => 'integer',
        'duedate' => 'integer',
        'allowsubmissionsfromdate' => 'integer',
        'grade' => 'integer',
        'timemodified' => 'integer',
        'requiresubmissionstatement' => 'integer',
        'completionsubmit' => 'integer',
        'cutoffdate' => 'integer',
        'gradingduedate' => 'integer',
        'teamsubmission' => 'integer',
        'requireallteammemberssubmit' => 'integer',
        'teamsubmissiongroupingid' => 'integer',
        'blindmarking' => 'integer',
        'hidegrader' => 'integer',
        'revealidentities' => 'integer',
        'attemptreopenmethod' => 'string',
        'maxattempts' => 'integer',
        'markingworkflow' => 'integer',
        'markingallocation' => 'integer',
        'sendstudentnotifications' => 'integer',
        'preventsubmissionnotingroup' => 'integer',
        'activity' => 'string',
        'activityformat' => 'integer',
        'timelimit' => 'integer',
        'submissionattachments' => 'integer',
    ];

    // Relationships: HasMany
    public function assignSubmissions()
    {
        return $this->hasMany(AssignSubmission::class, 'assignment');
    }

    public function assignPluginConfigs()
    {
        return $this->hasMany(AssignPluginConfig::class, 'assignment');
    }

    public function assignUserMappings()
    {
        return $this->hasMany(AssignUserMapping::class, 'assignment');
    }

    public function assignGradess()
    {
        return $this->hasMany(AssignGrades::class, 'assignment');
    }

    public function assignUserFlagss()
    {
        return $this->hasMany(AssignUserFlags::class, 'assignment');
    }

    public function assignOverridess()
    {
        return $this->hasMany(AssignOverrides::class, 'assignid');
    }

    public function assignsubmissionOnlinetexts()
    {
        return $this->hasMany(AssignsubmissionOnlinetext::class, 'assignment');
    }

    public function assignsubmissionFiles()
    {
        return $this->hasMany(AssignsubmissionFile::class, 'assignment');
    }

    public function assignfeedbackCommentss()
    {
        return $this->hasMany(AssignfeedbackComments::class, 'assignment');
    }

    public function assignfeedbackFiles()
    {
        return $this->hasMany(AssignfeedbackFile::class, 'assignment');
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
            'alwaysshowdescription' => (int)$this->alwaysshowdescription,
            'nosubmissions' => (int)$this->nosubmissions,
            'submissiondrafts' => (int)$this->submissiondrafts,
            'sendnotifications' => (int)$this->sendnotifications,
            'sendlatenotifications' => (int)$this->sendlatenotifications,
            'duedate' => (int)$this->duedate,
            'allowsubmissionsfromdate' => (int)$this->allowsubmissionsfromdate,
            'grade' => (int)$this->grade,
            'timemodified' => (int)$this->timemodified,
            'requiresubmissionstatement' => (int)$this->requiresubmissionstatement,
            'completionsubmit' => (int)$this->completionsubmit,
            'cutoffdate' => (int)$this->cutoffdate,
            'gradingduedate' => (int)$this->gradingduedate,
            'teamsubmission' => (int)$this->teamsubmission,
            'requireallteammemberssubmit' => (int)$this->requireallteammemberssubmit,
            'teamsubmissiongroupingid' => (int)$this->teamsubmissiongroupingid,
            'blindmarking' => (int)$this->blindmarking,
            'hidegrader' => (int)$this->hidegrader,
            'revealidentities' => (int)$this->revealidentities,
            'attemptreopenmethod' => (string)$this->attemptreopenmethod,
            'maxattempts' => (int)$this->maxattempts,
            'markingworkflow' => (int)$this->markingworkflow,
            'markingallocation' => (int)$this->markingallocation,
            'sendstudentnotifications' => (int)$this->sendstudentnotifications,
            'preventsubmissionnotingroup' => (int)$this->preventsubmissionnotingroup,
            'activity' => (string)$this->activity,
            'activityformat' => (int)$this->activityformat,
            'timelimit' => (int)$this->timelimit,
            'submissionattachments' => (int)$this->submissionattachments,
        ];
    }

    public function searchableAs()
    {
        return 'assign_index';
    }
}
