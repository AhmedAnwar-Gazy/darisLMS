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
 * Model LessonAttempts
 * Defines lesson_attempts
 */
class LessonAttempts extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson_attempts';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lessonid' => 'integer',
        'pageid' => 'integer',
        'userid' => 'integer',
        'answerid' => 'integer',
        'retry' => 'integer',
        'correct' => 'integer',
        'useranswer' => 'string',
        'timeseen' => 'integer',
    ];

    // Relationships: BelongsTo
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lessonid');
    }

    public function lessonPages()
    {
        return $this->belongsTo(LessonPages::class, 'pageid');
    }

    public function lessonAnswers()
    {
        return $this->belongsTo(LessonAnswers::class, 'answerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lessonid' => (int)$this->lessonid,
            'pageid' => (int)$this->pageid,
            'userid' => (int)$this->userid,
            'answerid' => (int)$this->answerid,
            'retry' => (int)$this->retry,
            'correct' => (int)$this->correct,
            'useranswer' => (string)$this->useranswer,
            'timeseen' => (int)$this->timeseen,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_attempts_index';
    }
}
