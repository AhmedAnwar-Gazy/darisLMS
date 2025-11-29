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
 * Model CoursePublished
 * Information about how and when an local courses were published to hubs
 */
class CoursePublished extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_published';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'huburl' => 'string',
        'courseid' => 'integer',
        'timepublished' => 'integer',
        'enrollable' => 'boolean',
        'hubcourseid' => 'integer',
        'status' => 'boolean',
        'timechecked' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'huburl' => (string)$this->huburl,
            'courseid' => (int)$this->courseid,
            'timepublished' => (int)$this->timepublished,
            'enrollable' => (int)$this->enrollable,
            'hubcourseid' => (int)$this->hubcourseid,
            'status' => (int)$this->status,
            'timechecked' => (int)$this->timechecked,
        ];
    }

    public function searchableAs()
    {
        return 'course_published_index';
    }
}
