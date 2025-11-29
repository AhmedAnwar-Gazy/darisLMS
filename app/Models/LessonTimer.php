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
 * Model LessonTimer
 * lesson timer for each lesson
 */
class LessonTimer extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson_timer';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lessonid' => 'integer',
        'userid' => 'integer',
        'starttime' => 'integer',
        'lessontime' => 'integer',
        'completed' => 'boolean',
        'timemodifiedoffline' => 'integer',
    ];

    // Relationships: BelongsTo
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lessonid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lessonid' => (int)$this->lessonid,
            'userid' => (int)$this->userid,
            'starttime' => (int)$this->starttime,
            'lessontime' => (int)$this->lessontime,
            'completed' => (int)$this->completed,
            'timemodifiedoffline' => (int)$this->timemodifiedoffline,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_timer_index';
    }
}
