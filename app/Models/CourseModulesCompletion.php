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
 * Model CourseModulesCompletion
 * Stores the completion state (completed or not completed, etc) of each user on each activity.
 */
class CourseModulesCompletion extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_modules_completion';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'coursemoduleid' => 'integer',
        'userid' => 'integer',
        'completionstate' => 'boolean',
        'overrideby' => 'integer',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'coursemoduleid' => (int)$this->coursemoduleid,
            'userid' => (int)$this->userid,
            'completionstate' => (int)$this->completionstate,
            'overrideby' => (int)$this->overrideby,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'course_modules_completion_index';
    }
}
