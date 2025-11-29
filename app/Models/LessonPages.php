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
 * Model LessonPages
 * Defines lesson_pages
 */
class LessonPages extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson_pages';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lessonid' => 'integer',
        'prevpageid' => 'integer',
        'nextpageid' => 'integer',
        'qtype' => 'integer',
        'qoption' => 'integer',
        'layout' => 'integer',
        'display' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'title' => 'string',
        'contents' => 'string',
        'contentsformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lessonid');
    }

    // Relationships: HasMany
    public function lessonBranchs()
    {
        return $this->hasMany(LessonBranch::class, 'pageid');
    }

    public function lessonAnswerss()
    {
        return $this->hasMany(LessonAnswers::class, 'pageid');
    }

    public function lessonAttemptss()
    {
        return $this->hasMany(LessonAttempts::class, 'pageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lessonid' => (int)$this->lessonid,
            'prevpageid' => (int)$this->prevpageid,
            'nextpageid' => (int)$this->nextpageid,
            'qtype' => (int)$this->qtype,
            'qoption' => (int)$this->qoption,
            'layout' => (int)$this->layout,
            'display' => (int)$this->display,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'title' => (string)$this->title,
            'contents' => (string)$this->contents,
            'contentsformat' => (int)$this->contentsformat,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_pages_index';
    }
}
