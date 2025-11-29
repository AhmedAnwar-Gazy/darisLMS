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
 * Model CourseCompletionCriteria
 * Course completion criteria
 */
class CourseCompletionCriteria extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_completion_criteria';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'criteriatype' => 'integer',
        'module' => 'string',
        'moduleinstance' => 'integer',
        'courseinstance' => 'integer',
        'enrolperiod' => 'integer',
        'timeend' => 'integer',
        'gradepass' => 'float',
        'role' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'criteriatype' => (int)$this->criteriatype,
            'module' => (string)$this->module,
            'moduleinstance' => (int)$this->moduleinstance,
            'courseinstance' => (int)$this->courseinstance,
            'enrolperiod' => (int)$this->enrolperiod,
            'timeend' => (int)$this->timeend,
            'gradepass' => (float)$this->gradepass,
            'role' => (int)$this->role,
        ];
    }

    public function searchableAs()
    {
        return 'course_completion_criteria_index';
    }
}
