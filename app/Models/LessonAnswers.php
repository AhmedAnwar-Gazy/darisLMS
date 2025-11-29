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
 * Model LessonAnswers
 * Defines lesson_answers
 */
class LessonAnswers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson_answers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lessonid' => 'integer',
        'pageid' => 'integer',
        'jumpto' => 'integer',
        'grade' => 'integer',
        'score' => 'integer',
        'flags' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'answer' => 'string',
        'answerformat' => 'integer',
        'response' => 'string',
        'responseformat' => 'integer',
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

    // Relationships: HasMany
    public function lessonAttemptss()
    {
        return $this->hasMany(LessonAttempts::class, 'answerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lessonid' => (int)$this->lessonid,
            'pageid' => (int)$this->pageid,
            'jumpto' => (int)$this->jumpto,
            'grade' => (int)$this->grade,
            'score' => (int)$this->score,
            'flags' => (int)$this->flags,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'answer' => (string)$this->answer,
            'answerformat' => (int)$this->answerformat,
            'response' => (string)$this->response,
            'responseformat' => (int)$this->responseformat,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_answers_index';
    }
}
