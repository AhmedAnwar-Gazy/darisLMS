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
 * Model GradeOutcomes
 * This table describes the outcomes used in the system. An outcome is a statement tied to a rubric scale from low to high, such as âNot met, Borderline, Metâ (stored as 0,1 or 2)
 */
class GradeOutcomes extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_outcomes';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'shortname' => 'string',
        'fullname' => 'string',
        'scaleid' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class, 'scaleid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Relationships: HasMany
    public function gradeOutcomesHistorys()
    {
        return $this->hasMany(GradeOutcomesHistory::class, 'oldid');
    }

    public function gradeOutcomesCoursess()
    {
        return $this->hasMany(GradeOutcomesCourses::class, 'outcomeid');
    }

    public function gradeItemss()
    {
        return $this->hasMany(GradeItems::class, 'outcomeid');
    }

    public function gradeItemsHistorys()
    {
        return $this->hasMany(GradeItemsHistory::class, 'outcomeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'shortname' => (string)$this->shortname,
            'fullname' => (string)$this->fullname,
            'scaleid' => (int)$this->scaleid,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'grade_outcomes_index';
    }
}
