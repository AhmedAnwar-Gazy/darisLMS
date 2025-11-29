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
 * Model CourseCompletions
 * Course completion records
 */
class CourseCompletions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_completions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'course' => 'integer',
        'timeenrolled' => 'integer',
        'timestarted' => 'integer',
        'timecompleted' => 'integer',
        'reaggregate' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'course' => (int)$this->course,
            'timeenrolled' => (int)$this->timeenrolled,
            'timestarted' => (int)$this->timestarted,
            'timecompleted' => (int)$this->timecompleted,
            'reaggregate' => (int)$this->reaggregate,
        ];
    }

    public function searchableAs()
    {
        return 'course_completions_index';
    }
}
