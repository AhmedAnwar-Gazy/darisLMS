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
 * Model AssignGrades
 * Grading information about a single assignment submission.
 */
class AssignGrades extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign_grades';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'userid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'grader' => 'integer',
        'grade' => 'float',
        'attemptnumber' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    // Relationships: HasMany
    public function assignfeedbackEditpdfAnnots()
    {
        return $this->hasMany(AssignfeedbackEditpdfAnnot::class, 'gradeid');
    }

    public function assignfeedbackEditpdfCmnts()
    {
        return $this->hasMany(AssignfeedbackEditpdfCmnt::class, 'gradeid');
    }

    public function assignfeedbackCommentss()
    {
        return $this->hasMany(AssignfeedbackComments::class, 'grade');
    }

    public function assignfeedbackFiles()
    {
        return $this->hasMany(AssignfeedbackFile::class, 'grade');
    }

    public function assignfeedbackEditpdfRots()
    {
        return $this->hasMany(AssignfeedbackEditpdfRot::class, 'gradeid');
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
            'grader' => (int)$this->grader,
            'grade' => (float)$this->grade,
            'attemptnumber' => (int)$this->attemptnumber,
        ];
    }

    public function searchableAs()
    {
        return 'assign_grades_index';
    }
}
