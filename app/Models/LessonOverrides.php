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
 * Model LessonOverrides
 * The overrides to lesson settings.
 */
class LessonOverrides extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson_overrides';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lessonid' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
        'available' => 'integer',
        'deadline' => 'integer',
        'timelimit' => 'integer',
        'review' => 'integer',
        'maxattempts' => 'integer',
        'retake' => 'integer',
        'password' => 'string',
    ];

    // Relationships: BelongsTo
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lessonid');
    }

    public function groups()
    {
        return $this->belongsTo(Groups::class, 'groupid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lessonid' => (int)$this->lessonid,
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
            'available' => (int)$this->available,
            'deadline' => (int)$this->deadline,
            'timelimit' => (int)$this->timelimit,
            'review' => (int)$this->review,
            'maxattempts' => (int)$this->maxattempts,
            'retake' => (int)$this->retake,
            'password' => (string)$this->password,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_overrides_index';
    }
}
