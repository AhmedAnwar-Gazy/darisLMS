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
 * Model LessonBranch
 * branches for each lesson/user
 */
class LessonBranch extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson_branch';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lessonid' => 'integer',
        'userid' => 'integer',
        'pageid' => 'integer',
        'retry' => 'integer',
        'flag' => 'integer',
        'timeseen' => 'integer',
        'nextpageid' => 'integer',
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

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lessonid' => (int)$this->lessonid,
            'userid' => (int)$this->userid,
            'pageid' => (int)$this->pageid,
            'retry' => (int)$this->retry,
            'flag' => (int)$this->flag,
            'timeseen' => (int)$this->timeseen,
            'nextpageid' => (int)$this->nextpageid,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_branch_index';
    }
}
