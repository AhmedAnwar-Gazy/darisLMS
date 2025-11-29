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
 * Model Workshop
 * This table keeps information about the module instances and their settings
 */
class Workshop extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshop';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'instructauthors' => 'string',
        'instructauthorsformat' => 'integer',
        'instructreviewers' => 'string',
        'instructreviewersformat' => 'integer',
        'timemodified' => 'integer',
        'phase' => 'integer',
        'useexamples' => 'integer',
        'usepeerassessment' => 'integer',
        'useselfassessment' => 'integer',
        'grade' => 'float',
        'gradinggrade' => 'float',
        'strategy' => 'string',
        'evaluation' => 'string',
        'gradedecimals' => 'integer',
        'submissiontypetext' => 'boolean',
        'submissiontypefile' => 'boolean',
        'nattachments' => 'integer',
        'submissionfiletypes' => 'string',
        'latesubmissions' => 'integer',
        'maxbytes' => 'integer',
        'examplesmode' => 'integer',
        'submissionstart' => 'integer',
        'submissionend' => 'integer',
        'assessmentstart' => 'integer',
        'assessmentend' => 'integer',
        'phaseswitchassessment' => 'integer',
        'conclusion' => 'string',
        'conclusionformat' => 'integer',
        'overallfeedbackmode' => 'integer',
        'overallfeedbackfiles' => 'integer',
        'overallfeedbackfiletypes' => 'string',
        'overallfeedbackmaxbytes' => 'integer',
    ];

    // Relationships: BelongsTo
    public function courseRelation()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    // Relationships: HasMany
    public function workshopSubmissionss()
    {
        return $this->hasMany(WorkshopSubmissions::class, 'workshopid');
    }

    public function workshopformRubrics()
    {
        return $this->hasMany(WorkshopformRubric::class, 'workshopid');
    }

    public function workshopformCommentss()
    {
        return $this->hasMany(WorkshopformComments::class, 'workshopid');
    }

    public function workshopformNumerrorss()
    {
        return $this->hasMany(WorkshopformNumerrors::class, 'workshopid');
    }

    public function workshopformAccumulatives()
    {
        return $this->hasMany(WorkshopformAccumulative::class, 'workshopid');
    }

    public function workshopAggregationss()
    {
        return $this->hasMany(WorkshopAggregations::class, 'workshopid');
    }

    public function workshopformNumerrorsMaps()
    {
        return $this->hasMany(WorkshopformNumerrorsMap::class, 'workshopid');
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
            'instructauthors' => (string)$this->instructauthors,
            'instructauthorsformat' => (int)$this->instructauthorsformat,
            'instructreviewers' => (string)$this->instructreviewers,
            'instructreviewersformat' => (int)$this->instructreviewersformat,
            'timemodified' => (int)$this->timemodified,
            'phase' => (int)$this->phase,
            'useexamples' => (int)$this->useexamples,
            'usepeerassessment' => (int)$this->usepeerassessment,
            'useselfassessment' => (int)$this->useselfassessment,
            'grade' => (float)$this->grade,
            'gradinggrade' => (float)$this->gradinggrade,
            'strategy' => (string)$this->strategy,
            'evaluation' => (string)$this->evaluation,
            'gradedecimals' => (int)$this->gradedecimals,
            'submissiontypetext' => (int)$this->submissiontypetext,
            'submissiontypefile' => (int)$this->submissiontypefile,
            'nattachments' => (int)$this->nattachments,
            'submissionfiletypes' => (string)$this->submissionfiletypes,
            'latesubmissions' => (int)$this->latesubmissions,
            'maxbytes' => (int)$this->maxbytes,
            'examplesmode' => (int)$this->examplesmode,
            'submissionstart' => (int)$this->submissionstart,
            'submissionend' => (int)$this->submissionend,
            'assessmentstart' => (int)$this->assessmentstart,
            'assessmentend' => (int)$this->assessmentend,
            'phaseswitchassessment' => (int)$this->phaseswitchassessment,
            'conclusion' => (string)$this->conclusion,
            'conclusionformat' => (int)$this->conclusionformat,
            'overallfeedbackmode' => (int)$this->overallfeedbackmode,
            'overallfeedbackfiles' => (int)$this->overallfeedbackfiles,
            'overallfeedbackfiletypes' => (string)$this->overallfeedbackfiletypes,
            'overallfeedbackmaxbytes' => (int)$this->overallfeedbackmaxbytes,
        ];
    }

    public function searchableAs()
    {
        return 'workshop_index';
    }
}
