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
 * Model WorkshopAssessments
 * Info about the made assessment and automatically calculated grade for it. The proposed grade can be overridden by teacher.
 */
class WorkshopAssessments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshop_assessments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'submissionid' => 'integer',
        'reviewerid' => 'integer',
        'weight' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'grade' => 'float',
        'gradinggrade' => 'float',
        'gradinggradeover' => 'float',
        'gradinggradeoverby' => 'integer',
        'feedbackauthor' => 'string',
        'feedbackauthorformat' => 'integer',
        'feedbackauthorattachment' => 'integer',
        'feedbackreviewer' => 'string',
        'feedbackreviewerformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function workshopSubmissions()
    {
        return $this->belongsTo(WorkshopSubmissions::class, 'submissionid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'gradinggradeoverby');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'reviewerid');
    }

    // Relationships: HasMany
    public function workshopGradess()
    {
        return $this->hasMany(WorkshopGrades::class, 'assessmentid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'submissionid' => (int)$this->submissionid,
            'reviewerid' => (int)$this->reviewerid,
            'weight' => (int)$this->weight,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'grade' => (float)$this->grade,
            'gradinggrade' => (float)$this->gradinggrade,
            'gradinggradeover' => (float)$this->gradinggradeover,
            'gradinggradeoverby' => (int)$this->gradinggradeoverby,
            'feedbackauthor' => (string)$this->feedbackauthor,
            'feedbackauthorformat' => (int)$this->feedbackauthorformat,
            'feedbackauthorattachment' => (int)$this->feedbackauthorattachment,
            'feedbackreviewer' => (string)$this->feedbackreviewer,
            'feedbackreviewerformat' => (int)$this->feedbackreviewerformat,
        ];
    }

    public function searchableAs()
    {
        return 'workshop_assessments_index';
    }
}
