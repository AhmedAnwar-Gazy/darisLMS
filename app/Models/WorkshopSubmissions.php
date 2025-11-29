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
 * Model WorkshopSubmissions
 * Info about the submission and the aggregation of the grade for submission, grade for assessment and final grade. Both grade for submission and grade for assessment can be overridden by teacher. Final grade is always the sum of them. All grades are stored as of 0-100.
 */
class WorkshopSubmissions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshop_submissions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'workshopid' => 'integer',
        'example' => 'integer',
        'authorid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'contentformat' => 'integer',
        'contenttrust' => 'integer',
        'attachment' => 'integer',
        'grade' => 'float',
        'gradeover' => 'float',
        'gradeoverby' => 'integer',
        'feedbackauthor' => 'string',
        'feedbackauthorformat' => 'integer',
        'timegraded' => 'integer',
        'published' => 'integer',
        'late' => 'integer',
    ];

    // Relationships: BelongsTo
    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshopid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'gradeoverby');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'authorid');
    }

    // Relationships: HasMany
    public function workshopAssessmentss()
    {
        return $this->hasMany(WorkshopAssessments::class, 'submissionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'workshopid' => (int)$this->workshopid,
            'example' => (int)$this->example,
            'authorid' => (int)$this->authorid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'title' => (string)$this->title,
            'content' => (string)$this->content,
            'contentformat' => (int)$this->contentformat,
            'contenttrust' => (int)$this->contenttrust,
            'attachment' => (int)$this->attachment,
            'grade' => (float)$this->grade,
            'gradeover' => (float)$this->gradeover,
            'gradeoverby' => (int)$this->gradeoverby,
            'feedbackauthor' => (string)$this->feedbackauthor,
            'feedbackauthorformat' => (int)$this->feedbackauthorformat,
            'timegraded' => (int)$this->timegraded,
            'published' => (int)$this->published,
            'late' => (int)$this->late,
        ];
    }

    public function searchableAs()
    {
        return 'workshop_submissions_index';
    }
}
