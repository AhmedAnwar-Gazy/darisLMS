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
 * Model Scorm
 * each table is one SCORM module and its configuration
 */
class Scorm extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'scormtype' => 'string',
        'reference' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'version' => 'string',
        'grademethod' => 'integer',
        'whatgrade' => 'integer',
        'maxattempt' => 'integer',
        'forcecompleted' => 'boolean',
        'forcenewattempt' => 'boolean',
        'lastattemptlock' => 'boolean',
        'masteryoverride' => 'boolean',
        'displayattemptstatus' => 'boolean',
        'displaycoursestructure' => 'boolean',
        'updatefreq' => 'boolean',
        'sha1hash' => 'string',
        'md5hash' => 'string',
        'revision' => 'integer',
        'launch' => 'integer',
        'skipview' => 'boolean',
        'hidebrowse' => 'boolean',
        'hidetoc' => 'boolean',
        'nav' => 'boolean',
        'navpositionleft' => 'integer',
        'navpositiontop' => 'integer',
        'auto' => 'boolean',
        'popup' => 'boolean',
        'options' => 'string',
        'width' => 'integer',
        'height' => 'integer',
        'timeopen' => 'integer',
        'timeclose' => 'integer',
        'timemodified' => 'integer',
        'completionstatusrequired' => 'boolean',
        'completionscorerequired' => 'integer',
        'completionstatusallscos' => 'boolean',
        'autocommit' => 'boolean',
    ];

    // Relationships: HasMany
    public function scormScoess()
    {
        return $this->hasMany(ScormScoes::class, 'scorm');
    }

    public function scormAttempts()
    {
        return $this->hasMany(ScormAttempt::class, 'scormid');
    }

    public function scormAiccSessions()
    {
        return $this->hasMany(ScormAiccSession::class, 'scormid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'scormtype' => (string)$this->scormtype,
            'reference' => (string)$this->reference,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'version' => (string)$this->version,
            'maxgrade' => (string)$this->maxgrade,
            'grademethod' => (int)$this->grademethod,
            'whatgrade' => (int)$this->whatgrade,
            'maxattempt' => (int)$this->maxattempt,
            'forcecompleted' => (int)$this->forcecompleted,
            'forcenewattempt' => (int)$this->forcenewattempt,
            'lastattemptlock' => (int)$this->lastattemptlock,
            'masteryoverride' => (int)$this->masteryoverride,
            'displayattemptstatus' => (int)$this->displayattemptstatus,
            'displaycoursestructure' => (int)$this->displaycoursestructure,
            'updatefreq' => (int)$this->updatefreq,
            'sha1hash' => (string)$this->sha1hash,
            'md5hash' => (string)$this->md5hash,
            'revision' => (int)$this->revision,
            'launch' => (int)$this->launch,
            'skipview' => (int)$this->skipview,
            'hidebrowse' => (int)$this->hidebrowse,
            'hidetoc' => (int)$this->hidetoc,
            'nav' => (int)$this->nav,
            'navpositionleft' => (int)$this->navpositionleft,
            'navpositiontop' => (int)$this->navpositiontop,
            'auto' => (int)$this->auto,
            'popup' => (int)$this->popup,
            'options' => (string)$this->options,
            'width' => (int)$this->width,
            'height' => (int)$this->height,
            'timeopen' => (int)$this->timeopen,
            'timeclose' => (int)$this->timeclose,
            'timemodified' => (int)$this->timemodified,
            'completionstatusrequired' => (int)$this->completionstatusrequired,
            'completionscorerequired' => (int)$this->completionscorerequired,
            'completionstatusallscos' => (int)$this->completionstatusallscos,
            'autocommit' => (int)$this->autocommit,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_index';
    }
}
